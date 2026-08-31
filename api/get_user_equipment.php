<?php
// api/get_user_equipment.php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

// Handle preflight requests
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

// Database configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'your_database_name');
define('DB_USER', 'your_username');
define('DB_PASS', 'your_password');

// Function to get database connection
function getDBConnection() {
    try {
        $pdo = new PDO(
            "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4",
            DB_USER,
            DB_PASS,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]
        );
        return $pdo;
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode([
            'status' => 'error',
            'message' => 'Database connection failed',
            'data' => null
        ]);
        exit;
    }
}

// Function to validate email
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Function to send JSON response
function sendResponse($statusCode, $data, $message = null) {
    http_response_code($statusCode);
    $response = [
        'status' => $statusCode === 200 ? 'success' : 'error',
        'data' => $data,
        'message' => $message
    ];
    echo json_encode($response, JSON_PRETTY_PRINT);
    exit;
}

// Get email from GET or POST request
$email = null;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $email = isset($_GET['email']) ? trim($_GET['email']) : null;
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    $email = isset($input['email']) ? trim($input['email']) : null;
}

// Validate email
if (!$email) {
    sendResponse(400, null, 'Email parameter is required');
}

if (!validateEmail($email)) {
    sendResponse(400, null, 'Invalid email format');
}

try {
    $pdo = getDBConnection();
    
    // Updated query to match your table structure
    $sql = "SELECT 
                o.equipment_id,
                o.system_name,
                o.system_manufacturer,
                o.system_model,
                o.system_sku,
                o.processor,
                o.baseboard_product,
                o.installed_ram,
                o.storage_medium,
                o.serial_number,
                o.charger,
                o.mouse_assigned,
                o.date_issued,
                o.date_of_purchase,
                o.depreciation_rate,
                o.current_value,
                o.purchase_cost,
                o.origin,
                o.user_id,
                o.category_id,
                o.updated_at as equipment_updated_at,
                u.user_id,
                u.first_name,
                u.last_name,
                u.email,
                u.status as user_status,
                u.department_id,
                u.role_id
            FROM office_equipment o
            INNER JOIN user u ON o.user_id = u.user_id
            WHERE u.email = :email
            ORDER BY o.date_issued DESC";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':email' => $email]);
    
    $equipment = $stmt->fetchAll();
    
    if (empty($equipment)) {
        sendResponse(404, [], 'No equipment found for this user');
    }
    
    // Format the response data
    $formattedData = array_map(function($item) {
        // Format full name
        $fullName = trim(($item['first_name'] ?? '') . ' ' . ($item['last_name'] ?? ''));
        
        // Format dates
        $dateIssued = $item['date_issued'] ? date('Y-m-d', strtotime($item['date_issued'])) : null;
        $datePurchased = $item['date_of_purchase'] ? date('Y-m-d', strtotime($item['date_of_purchase'])) : null;
        
        return [
            'equipment_id' => (int)$item['equipment_id'],
            'system_name' => $item['system_name'],
            'system_manufacturer' => $item['system_manufacturer'],
            'system_model' => $item['system_model'],
            'system_sku' => $item['system_sku'],
            'processor' => $item['processor'],
            'baseboard_product' => $item['baseboard_product'],
            'installed_ram' => $item['installed_ram'],
            'storage_medium' => $item['storage_medium'],
            'serial_number' => $item['serial_number'],
            'charger' => $item['charger'],
            'mouse_assigned' => $item['mouse_assigned'],
            'date_issued' => $dateIssued,
            'date_of_purchase' => $datePurchased,
            'depreciation_rate' => $item['depreciation_rate'] ? (float)$item['depreciation_rate'] : null,
            'current_value' => $item['current_value'] ? (float)$item['current_value'] : null,
            'purchase_cost' => $item['purchase_cost'] ? (float)$item['purchase_cost'] : null,
            'origin' => $item['origin'],
            'category_id' => (int)$item['category_id'],
            'user' => [
                'user_id' => (int)$item['user_id'],
                'first_name' => $item['first_name'],
                'last_name' => $item['last_name'],
                'full_name' => $fullName,
                'email' => $item['email'],
                'status' => $item['user_status'],
                'department_id' => (int)$item['department_id'],
                'role_id' => (int)$item['role_id']
            ]
        ];
    }, $equipment);
    
    sendResponse(200, $formattedData, 'Equipment retrieved successfully');
    
} catch (PDOException $e) {
    // Log error (in production, use error_log)
    error_log('Database Error: ' . $e->getMessage());
    sendResponse(500, null, 'Database error occurred');
} catch (Exception $e) {
    error_log('Server Error: ' . $e->getMessage());
    sendResponse(500, null, 'Server error occurred');
}
?>