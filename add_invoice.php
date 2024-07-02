<?php
/**
 * Vilcom Staff Portal
 *
 * PHP version 8.2.12
 *
 * @category    Frontend + Backend
 * @package     vilcom-assets
 * @author      Hillary Chesaro
 * @license     Vilcom Networks
 * @link        https://github.com/Hillario/vilcom-assets.git
 */

/**
 * add_invoice.php
 *
 * This file enables the admin to input details of the invoice.
 * 
 * @author Hillary Chesaro
 */

 include "header.php";

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $system_name = trim($_POST['system_name']);
    $system_manufacturer = trim($_POST['system_manufacturer']);
    $system_model = trim($_POST['system_model']);
    $system_sku = trim($_POST['system_sku']);
    $processor = trim($_POST['processor']);
    $baseboard_product = trim($_POST['baseboard_product']);
    $installed_ram = trim($_POST['installed_ram']);
    $storage_medium = trim($_POST['storage_medium']);
    $serial_number = trim($_POST['serial_number']);
    $charger = trim($_POST['charger']);
    $mouse_assigned = trim($_POST['mouse_assigned']);
    $date_issued = trim($_POST['date_issued']);
    $purchase_cost = trim($_POST['purchase_cost']);
    $origin = trim($_POST['origin']);
    $staff = trim($_POST['staff']);
    
    if (isset($_POST['system_name'])) $system_name = $_POST['system_name'];
    if (isset($_POST['system_manufacturer'])) $system_manufacturer = $_POST['system_manufacturer'];
    if (isset($_POST['system_model'])) $system_model = $_POST['system_model'];
    if (isset($_POST['system_sku'])) $system_sku= $_POST['system_sku'];
    if (isset($_POST['processor'])) $processor = $_POST['processor'];
    if (isset($_POST['baseboard_product'])) $baseboard_product = $_POST['baseboard_product'];
    if (isset($_POST['installed_ram'])) $installed_ram = $_POST['installed_ram'];
    if (isset($_POST['storage_medium'])) $storage_medium = $_POST['storage_medium'];
    if (isset($_POST['serial_number'])) $serial_number = $_POST['serial_number'];
    if (isset($_POST['charger'])) $charger = $_POST['charger'];
    if (isset($_POST['mouse_assigned'])) $mouse_assigned = $_POST['mouse_assigned'];
    if (isset($_POST['date_issued'])) $date_issued = $_POST['date_issued'];
    if (isset($_POST['purchase_cost'])) $purchase_cost = $_POST['purchase_cost'];
    if (isset($_POST['origin'])) $origin = $_POST['origin'];
    if (isset($_POST['staff'])) $staff = $_POST['staff'];
    $error = array();
    if (empty($_POST["system_name"])) {
        $error[] = 'Please enter the system name';
    }
    if (empty($_POST["system_manufacturer"])) {
        $error[] = 'Please enter the system manufacturer';
    }
    if (empty($_POST["system_model"])) {
        $error[] = 'Please enter the system model';
    }
    if (empty($_POST["system_sku"])) {
        $error[] = 'Please enter the system sku';
    }
    if (empty($_POST["processor"])) {
        $error[] = 'Please enter the processor';
    }
    if (empty($_POST["baseboard_product"])) {
        $error[] = 'Please enter the baseboard product';
    }
    if (empty($_POST["installed_ram"])) {
        $error[] = 'Please enter the installed RAM';
    }
    if (empty($_POST["storage_medium"])) {
        $error[] = 'Please enter the storage medium';
    }
    if (empty($_POST["serial_number"])) {
        $error[] = 'Please enter the serial number';
    }
    if (empty($_POST["charger"])) {
        $error[] = 'Please enter the charger details';
    }
    if (empty($_POST["mouse_assigned"])) {
        $error[] = 'Please select if mouse is assigned';
    }
    if (empty($_POST["date_issued"])) {
        $error[] = 'Please choose the date of issue';
    }
    if (empty($_POST["purchase_cost"])) {
        $error[] = 'Please enter the purchase cost';
    }
    if (empty($_POST["origin"])) {
        $error[] = 'Please choose the origin of equipment';
    }
    if (empty($_POST["staff"])) {
        $error[] = 'Please choose staff';
    }
}

?>

<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">ADD OFFICE EQUIPMENT</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active">Add Office Equipment</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            
            <div class="alert alert-info" role="alert">
                <strong>Seamlessly</strong> add office equipment with ease
            </div>



<div class="row justify-content-center">
                        <div class="col-xxl-9">
                            <div class="card">
                                <form class="needs-validation" novalidate id="invoice_form">
                                    <div class="card-body border-bottom border-bottom-dashed p-4">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="row g-3">
                                                    <div class="col-lg-8 col-sm-6">
                                                        <label for="invoicenoInput">Invoice No</label>
                                                        <input type="text" class="form-control bg-light border-0" id="invoicenoInput" placeholder="Invoice No" value="#VL25000355" readonly="readonly">
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-lg-8 col-sm-6">
                                                        <div>
                                                            <label for="date-field">Date</label>
                                                            <input type="text" class="form-control bg-light border-0 flatpickr-input" id="date-field" data-provider="flatpickr" data-time="true" placeholder="Select Date-time" readonly="readonly">
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-lg-8 col-sm-6">
                                                        <label for="choices-payment-status">Payment Status</label>
                                                        <div class="input-light">
                                                            <select class="form-control bg-light border-0" data-choices data-choices-search-false id="choices-payment-status" required>
                                                                <option value="">Select Payment Status</option>
                                                                <option value="Paid">Paid</option>
                                                                <option value="Unpaid">Unpaid</option>
                                                                <option value="Refund">Refund</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-lg-8 col-sm-6">
                                                        <div>
                                                            <label for="totalamountInput">Total Amount</label>
                                                            <input type="text" class="form-control bg-light border-0" id="totalamountInput" placeholder="$0.00" readonly="">
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                </div>
                                                
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-4 ms-auto">
                                                <div class="profile-user mx-auto  mb-3">
                                                    <input id="profile-img-file-input" type="file" class="profile-img-file-input" />
                                                    <label for="profile-img-file-input" class="d-block" tabindex="0">
                                                        <span class="overflow-hidden border border-dashed d-flex align-items-center justify-content-center rounded" style="height: 60px; width: 256px;">
                                                            <img src="assets/images/logo-dark.png" class="card-logo card-logo-dark user-profile-image img-fluid" alt="logo dark">
                                                            <img src="assets/images/logo-light.png" class="card-logo card-logo-light user-profile-image img-fluid" alt="logo light">
                                                        </span>
                                                    </label>
                                                </div>

                                              
                                                <div>
                                                    <label for="companyAddress">Address</label>
                                                </div>
                                                <div class="mb-2">
                                                    <textarea class="form-control bg-light border-0" id="companyAddress" rows="3" placeholder="Company Address" required=""></textarea>
                                                    <div class="invalid-feedback">
                                                        Please enter a address
                                                    </div>
                                                </div>
                                                <div class="mb-2">
                                                    <input type="text" class="form-control bg-light border-0" id="companyaddpostalcode" minlength="5" maxlength="6" placeholder="Enter Postal Code" required="">
                                                    <div class="invalid-feedback">
                                                        The US zip code must contain 5 digits, Ex. 45678
                                                    </div>
                                                </div>
                                                
                                                <div class="mb-2">
                                                    <input type="email" class="form-control bg-light border-0" id="companyEmail" placeholder="Email Address" required />
                                                    <div class="invalid-feedback">
                                                        Please enter a valid email, Ex., example@gamil.com
                                                    </div>
                                                </div>
                                                <div class="mb-2">
                                                    <input type="text" class="form-control bg-light border-0" id="companyWebsite" placeholder="Website" required />
                                                    <div class="invalid-feedback">
                                                        Please enter a website, Ex., www.example.com
                                                    </div>
                                                </div>
                                                <div>
                                                    <input type="text" class="form-control bg-light border-0" data-plugin="cleave-phone" id="compnayContactno" placeholder="Contact No" required />
                                                    <div class="invalid-feedback">
                                                        Please enter a contact number
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <div class="card-body p-4 border-top border-top-dashed">
                                        <div class="row">
                                           
                                            <!--end col-->
                                            
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <div class="card-body p-4">
                                        <div class="table-responsive">
                                            <table class="invoice-table table table-borderless table-nowrap mb-0">
                                                <thead class="align-middle">
                                                    <tr class="table-active">
                                                        <th scope="col" style="width: 50px;">#</th>
                                                        <th scope="col">
                                                            Product Details
                                                        </th>
                                                        <th scope="col" style="width: 120px;">
                                                            <div class="d-flex currency-select input-light align-items-center">
                                                                Unit Price(Ksh)                                                                
                                                            </div>
                                                        </th>
                                                        <th scope="col" style="width: 120px;">Quantity</th>
                                                        <th scope="col" class="text-end" style="width: 150px;">Amount</th>
                                                        <th scope="col" class="text-end" style="width: 105px;"></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="newlink">
                                                    <tr id="1" class="product">
                                                        <th scope="row" class="product-id">1</th>
                                                        <td class="text-start">
                                                            <div class="mb-2">
                                                                <input type="text" class="form-control bg-light border-0" id="productName-1" placeholder="Product Name" required />
                                                                <div class="invalid-feedback">
                                                                    Please enter a product name
                                                                </div>
                                                            </div>
                                                            <textarea class="form-control bg-light border-0" id="productDetails-1" rows="2" placeholder="Product Details"></textarea>
                                                        </td>
                                                        <td>
                                                            <input type="number" class="form-control product-price bg-light border-0" id="productRate-1" step="0.01" placeholder="0.00" required />
                                                            <div class="invalid-feedback">
                                                                Please enter a rate
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input-step">
                                                                <button type="button" class='minus'>–</button>
                                                                <input type="number" class="product-quantity" id="product-qty-1" value="0" readonly>
                                                                <button type="button" class='plus'>+</button>
                                                            </div>
                                                        </td>
                                                        <td class="text-end">
                                                            <div>
                                                                <input type="text" class="form-control bg-light border-0 product-line-price" id="productPrice-1" placeholder="$0.00" readonly />
                                                            </div>
                                                        </td>
                                                        <td class="product-removal">
                                                            <a href="javascript:void(0)" class="btn btn-warning">Delete</a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tbody>
                                                    <tr id="newForm" style="display: none;"><td class="d-none" colspan="5"><p>Add New Form</p></td></tr>
                                                    <tr>
                                                        <td colspan="5">
                                                            <a href="javascript:new_link()" id="add-item" class="btn btn-soft-secondary fw-medium"><i class="ri-add-fill me-1 align-bottom"></i> Add Item</a>
                                                        </td>
                                                    </tr>
                                                    <tr class="border-top border-top-dashed mt-2">
                                                        <td colspan="3"></td>
                                                        <td colspan="2" class="p-0">
                                                            <table class="table table-borderless table-sm table-nowrap align-middle mb-0">
                                                                <tbody>
                                                                    <tr>
                                                                        <th scope="row">Sub Total</th>
                                                                        <td style="width:150px;">
                                                                            <input type="text" class="form-control bg-light border-0" id="cart-subtotal" placeholder="$0.00" readonly />
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Estimated Tax (12.5%)</th>
                                                                        <td>
                                                                            <input type="text" class="form-control bg-light border-0" id="cart-tax" placeholder="$0.00" readonly />
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Discount <small class="text-muted">(Invoika15)</small></th>
                                                                        <td>
                                                                            <input type="text" class="form-control bg-light border-0" id="cart-discount" placeholder="$0.00" readonly />
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Shipping Charge</th>
                                                                        <td>
                                                                            <input type="text" class="form-control bg-light border-0" id="cart-shipping" placeholder="$0.00" readonly />
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="border-top border-top-dashed">
                                                                        <th scope="row">Total Amount</th>
                                                                        <td>
                                                                            <input type="text" class="form-control bg-light border-0" id="cart-total" placeholder="$0.00" readonly />
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <!--end table-->
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!--end table-->
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-4">
                                                <div class="mb-2">
                                                    <label for="choices-payment-type" class="form-label text-muted text-uppercase fw-semibold">Payment Details</label>
                                                    <div class="input-light">
                                                        <select class="form-control bg-light border-0" data-choices data-choices-search-false data-choices-removeItem id="choices-payment-type">
                                                            <option value="">Payment Method</option>
                                                            <option value="Mastercard">Mastercard</option>
                                                            <option value="Credit Card">Credit Card</option>
                                                            <option value="Visa">Visa</option>
                                                            <option value="Paypal">Paypal</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-2">
                                                    <input class="form-control bg-light border-0" type="text" id="cardholderName" placeholder="Card Holder Name">
                                                </div>
                                                <div class="mb-2">
                                                    <input class="form-control bg-light border-0" type="text" id="cardNumber" placeholder="xxxx xxxx xxxx xxxx">
                                                </div>
                                                <div>
                                                    <input class="form-control  bg-light border-0" type="text" id="amountTotalPay" placeholder="$0.00" readonly />
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                        <div class="mt-4">
                                            <label for="exampleFormControlTextarea1" class="form-label text-muted text-uppercase fw-semibold">NOTES</label>
                                            <textarea class="form-control alert alert-info" id="exampleFormControlTextarea1" placeholder="Notes" rows="2" required>All accounts are to be paid within 7 days from receipt of invoice. To be paid by cheque or credit card or direct payment online. If account is not paid within 7 days the credits details supplied as confirmation of work undertaken will be charged the agreed quoted fee noted above.</textarea>
                                        </div>
                                        <div class="hstack gap-2 justify-content-end d-print-none mt-4">
                                            <button type="submit" class="btn btn-info"><i class="ri-printer-line align-bottom me-1"></i> Save</button>
                                            <a href="javascript:void(0);" class="btn btn-primary"><i class="ri-download-2-line align-bottom me-1"></i> Download Invoice</a>
                                            <a href="javascript:void(0);" class="btn btn-danger"><i class="ri-send-plane-fill align-bottom me-1"></i> Send Invoice</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->


                    <?php
            include "footer.php";
            ?>