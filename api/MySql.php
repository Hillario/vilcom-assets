<?php
/**
 * @author Hillary Chesaro, Vilcom Networks
 * @version 1.0
 */
include 'Config.php';

class MySql {
    protected $host = DB_HOST;
    protected $user = DB_USER;
    protected $pass = DB_PASSWORD;
    protected $dbName = DB_NAME;
    
    protected $error;
    protected $inforResult;
    protected $numRows;
    protected $numCols;
    protected $id;
    protected $dataJson;
    protected $transacao;
    protected $sql;
    protected $converterUtf8 = true;
    protected $uppercase = false;

    protected $connection;

    function __construct() {}

    public function setDbName(string $dbName): bool {
        if (strlen(trim($dbName)) > 0) {
            $this->dbName = $dbName;
            return true;
        }
        return false;
    }

    public function getDbName(): string {
        return $this->dbName;
    }

    public function setHost(string $host): void {
        if (strlen(trim($host)) > 0) {
            $this->host = $host;
        }
    }

    public function getHost(): string {
        return $this->host;
    }

    public function setUser(string $user): void {
        if (strlen(trim($user)) > 0) {
            $this->user = $user;
        }
    }

    public function getUser(): string {
        return $this->user;
    }

    public function setPass(string $senha): void {
        if (strlen(trim($senha)) > 0) {
            $this->pass = $senha;
        }
    }

    public function getErros(): string {
        return print_r($this->error, true);
    }

    public function setUppercase(bool $bool): void {
        $this->uppercase = $bool;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getSql(): string {
        return $this->sql;
    }

    public function getNumRows(): int {
        return $this->numRows;
    }

    public function getNumCols(): int {
        return $this->numCols;
    }

    private function connect(): bool {
        try {
            $this->connection = new PDO("mysql:host={$this->host};dbname={$this->dbName}", $this->user, $this->pass);
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    private function logout(): void {
        $this->connection = null;
        $this->sql = null;
    }

    public function setUtf8(bool $bool): void {
        $this->converterUtf8 = $bool;
    }

    public function setSqlScript(string $sql, bool $complementation = false): void {
        $patterns = [
            "/''/", "/' '/", "/\" \"/", "/\"\"/",
            "/\"null\"/", "/\"NULL\"/", "/'null'/", "/'NULL'/",
            "/,[ \t\n\r\f\v]*,/", "/,,/", "/, ,/", "/=[ \t\n\r\f\v]*,/"
        ];
        $sql = preg_replace($patterns, "null", $sql);

        if ($complementation) {
            $this->sql .= $sql . "; \n";
        } else {
            $this->sql = $sql;
        }
    }

    public function select(string $sql): array {
        $this->connect();
        if (!$this->connection) {
            die("Error.");
        }

        $this->setSqlScript($sql);
        $pdo = $this->connection;
        $db = $pdo->prepare($this->sql);
        $result = $db->execute();

        if ($result) {
            $data = $db->fetchAll(PDO::FETCH_ASSOC);
            $this->id = $pdo->lastInsertId();
            $this->numRows = $db->rowCount();
            $this->numCols = $db->columnCount();
            $pdo = null;

            $return = [];
            foreach ($data as $key => $reg) {
                foreach ($reg as $campo => $val) {
                    $val = $this->converterUtf8 ? mb_convert_encoding($val, 'UTF-8', 'UTF-8') : $val;
                    $return[$key][$campo] = $this->uppercase ? strtoupper($val) : $val;
                }
            }
            return $return;
        } else {
            $this->error = $db->errorInfo();
            $this->error['sql'] = $this->sql;
            die($this->getErros());
        }
        $this->logout();
    }

    public function insert(string $sql): bool {
        $this->connect();
        if (!$this->connection) {
            die("Error.");
        }

        $sql = $this->converterUtf8 ? mb_convert_encoding($sql, 'UTF-8', 'UTF-8') : $sql;
        $this->setSqlScript($sql);
        $pdo = $this->connection;

        try {
            $transacao = $pdo->beginTransaction();
            if ($transacao) {
                $db = $pdo->prepare($this->sql);
                $result = $db->execute();
                if ($result) {
                    $this->id = $pdo->lastInsertId();
                    $this->numRows = $db->rowCount();
                    $this->numCols = $db->columnCount();

                    $commit = $pdo->commit();
                    if ($commit) {
                        $this->sql = null;
                        return true;
                    } else {
                        $this->error = $db->errorInfo();
                        $this->error['sql'] = $this->sql;
                        die("Error commit: " . $this->getErros());
                    }
                } else {
                    $this->error = $db->errorInfo();
                    $this->error['sql'] = $this->sql;
                    die("Error query: " . $this->getErros());
                }
            } else {
                $this->error['sql'] = $this->sql;
                die("Error: " . $this->getErros());
            }
        } catch (PDOException $e) {
            $pdo->rollBack();
            $this->error = $db->errorInfo();
            $this->error['sql'] = $this->sql;
            die("Failed: " . $e->getMessage() . $this->getErros());
        }
        $this->logout();
    }

    public function multInsert(array $sqlArray): bool {
        $this->connect();
        if (!$this->connection) {
            die("Error.");
        }

        if (!is_array($sqlArray)) {
            die('Error Script.');
        }

        $pdo = $this->connection;
        $Transaction = $pdo->beginTransaction();
        
        try {
            if ($Transaction) {
                foreach ($sqlArray as $sql) {
                    $this->setSqlScript($sql);
                    $db = $pdo->prepare($this->sql);
                    $result = $db->execute();

                    if (!$result) {
                        $this->error = $db->errorInfo();
                        $this->error['sql'] = $this->sql;
                        die("Error query: " . $this->getErros());
                    }
                }

                $commit = $pdo->commit();
                if ($commit) {
                    $pdo = null;
                    return true;
                } else {
                    $pdo->rollBack();
                    $this->error = $db->errorInfo();
                    $this->error['sql'] = $this->sql;
                    die("Error commit: " . $this->getErros());
                }
            } else {
                $this->error['sql'] = $this->sql;
                die("Error: " . $this->getErros());
            }
        } catch (PDOException $e) {
            $pdo->rollBack();
            $this->error = $db->errorInfo();
            $this->error['sql'] = $this->sql;
            die("Failed: " . $e->getMessage() . $this->getErros());
        }
        $this->logout();
    }
}
?>
