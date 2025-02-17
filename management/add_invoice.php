<?php

/**
 * Vilcom IMS
 *
 * PHP version 8.2.12
 *
 * @category    Frontend + Backend
 * @package     vilcom-assets
 * @author      Hillary Chesaro
 * @license     Saro  Labs
 * @link        https://github.com/Hillario/vilcom-assets.git
 */

/**
 * add_invoice.php
 *
 * This file enables the staff to generate invoices.
 * 
 * @author Hillary Chesaro
 */

 include "header.php";

 //temporarily suppress warnings
 error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);


 if ($_SERVER["REQUEST_METHOD"] == "POST") {    
    $due_date = trim($_POST['due_date']);
    $customer_name = trim($_POST['customer_name']);
    $customer_address = trim($_POST['customer_address']);    
    $customer_email = trim($_POST['customer_email']);
    $customer_phone = trim($_POST['customer_phone']);
    $bank_name = trim($_POST['bank_name']);
    $account_name = trim($_POST['account_name']);
    $account_number = trim($_POST['account_number']);
    $mpesa = trim($_POST['mpesa']);
    $mpesa_name = trim($_POST['mpesa_name']);
    $notes = trim($_POST['notes']);    
    $status = trim($_POST['status']);    
    
    if (isset($_POST['due_date'])) $due_date = $_POST['due_date'];
    if (isset($_POST['customer_name'])) $customer_name = $_POST['customer_name'];
    if (isset($_POST['customer_address'])) $customer_address= $_POST['customer_address'];    
    if (isset($_POST['customer_email'])) $customer_email = $_POST['customer_email'];
    if (isset($_POST['customer_phone'])) $customer_phone = $_POST['customer_phone'];
    if (isset($_POST['bank_name'])) $bank_name = $_POST['bank_name'];
    if (isset($_POST['account_name'])) $account_name = $_POST['account_name'];
    if (isset($_POST['account_number'])) $account_number = $_POST['account_number'];
    if (isset($_POST['mpesa'])) $mpesa = $_POST['mpesa'];
    if (isset($_POST['mpesa_name'])) $mpesa_name = $_POST['mpesa_name'];
    if (isset($_POST['notes'])) $notes = $_POST['notes'];
    if (isset($_POST['status'])) $status = $_POST['status'];    
    
    
    $error = array();    
    if (empty($_POST["due_date"])) {
        $error[] = 'Please enter the due date';
    }
    if (empty($_POST["customer_name"])) {
        $error[] = 'Please enter the customer name';
    }
    if (empty($_POST["customer_address"])) {
        $error[] = 'Please enter the customer address';
    }    
    if (empty($_POST["customer_email"])) {
        $error[] = 'Please enter the customer email';
    }
    if (empty($_POST["customer_phone"])) {
        $error[] = 'Please enter the customer phone';
    }
    if (empty($_POST["bank_name"])) {
        $error[] = 'Please enter the bank name';
    }
    if (empty($_POST["account_name"])) {
        $error[] = 'Please enter the bank account name';
    }
    if (empty($_POST["account_number"])) {
        $error[] = 'Please enter the bank account number';
    }
    if (empty($_POST["mpesa"])) {
        $error[] = 'Please enter the mpesa no., till no. or paybill no.';
    }
    if (empty($_POST["mpesa_name"])) {
        $error[] = 'Please enter the mpesa name or account number';
    }
    if (empty($_POST["notes"])) {
        $error[] = 'Please enter the notes for the quote';
    }    
    if (empty($_POST["status"])) {
        $error[] = 'Please select the status';
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
                                <h4 class="mb-sm-0">GENERATE INVOICE</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                        <li class="breadcrumb-item active">Add Invoice</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    
                    <div class="alert alert-info" role="alert">
                        <strong>Seamlessly</strong> generate invoices
                    </div>

                    <!-- Add office equipment form-->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">Add Invoice form</h4>
                                </div>
                                <form action="" method="POST" class="auth-input" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-lg-6">
                                            
                                        <!-- Invoice Number Generation -->

                                        <!-- Invoice Number Generation -->
                                            
                                        <div class="mt-3">
                                                <label class="form-label">Due Date</label>
                                                <div>                                                    
                                                    <input name="due_date" type="date" class="form-control" id="due_date">
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="mt-3">
                                                <label class="form-label">Customer Name</label>
                                                <div class="form-icon">
                                                        <input name="customer_name" type="text" class="form-control form-control-icon" id="customer_name" placeholder="Enter the customer name">
                                                        <i class="ri-edit-2-line"></i>
                                                    </div>
                                            </div> 

                                            <div class="mt-3">
                                                <label class="form-label">Customer Address</label>
                                                <div class="form-icon">
                                                        <input name="customer_address" type="text" class="form-control form-control-icon" id="customer_address" placeholder="Enter the customer address">
                                                        <i class="ri-map-pin-line"></i>
                                                    </div>
                                            </div>
                                            
                                            <div class="mt-3">
                                                <label class="form-label">Bank Name</label>
                                                <div class="form-icon">
                                                        <input name="bank_name" type="text" class="form-control form-control-icon" id="bank_name" placeholder="Enter the bank name">
                                                        <i class="ri-bank-line"></i>
                                                    </div>
                                            </div>

                                            <div class="mt-3">
                                                <label class="form-label">Bank Account Name</label>
                                                <div class="form-icon">
                                                        <input name="account_name" type="text" class="form-control form-control-icon" id="account_name" placeholder="Enter the bank account name">
                                                        <i class="ri-bank-line"></i>
                                                    </div>
                                            </div>

                                            <div class="mt-3">
                                                <label class="form-label">Bank Account Number</label>
                                                <div class="form-icon">
                                                        <input name="account_number" type="text" class="form-control form-control-icon" id="account_number" placeholder="Enter the bank account number">
                                                        <i class="ri-bank-line"></i>
                                                    </div>
                                            </div>
                                           
                                        </div>

                                        <div class="col-lg-6">
                                            
                                        
                                        <div class="mt-3">
                                                <label class="form-label">Customer Email</label>
                                                <div class="form-icon">
                                                        <input name="customer_email" type="email" class="form-control form-control-icon" id="customer_email" placeholder="Enter the customer email">
                                                        <i class="ri-mail-add-line"></i>
                                                    </div>
                                            </div>
                                        
                                            

                                        <div class="mt-3">
                                                <label class="form-label">Customer Phone</label>
                                                <div class="form-icon">
                                                        <input name="customer_phone" type="text" class="form-control form-control-icon" id="customer_phone" placeholder="Enter the customer phone">
                                                        <i class="ri-phone-line"></i>
                                                    </div>
                                            </div> 

                                            <div class="mt-3">
                                                <label class="form-label">Status</label>
                                                <div class="form-icon">
                                                <select name="status" id="source" class="form-select mb-3" aria-label="Default select example">
                                                    <option value="Paid" selected>Paid</option>
                                                    <option value="Unpaid">Unpaid</option>
                                                    <option value="Refunded">Refunded</option>
                                                    <option value="Cancelled">Cancelled</option>                                                         
                                                </select>                                                        
                                                    </div>
                                            </div>

                                            <div class="mt-3">
                                                <label class="form-label">MPESA</label>
                                                <div class="form-icon">
                                                        <input name="mpesa" type="text" class="form-control form-control-icon" id="mpesa" placeholder="Enter the mpesa number, till number or paybill number">
                                                        <i class="ri-cellphone-line"></i>
                                                    </div>
                                            </div>

                                            <div class="mt-3">
                                                <label class="form-label">MPESA ACCOUNT</label>
                                                <div class="form-icon">
                                                        <input name="mpesa_name" type="text" class="form-control form-control-icon" id="mpesa_name" placeholder="Enter the mpesa name or account number">
                                                        <i class="ri-cellphone-line"></i>
                                                    </div>
                                            </div>

                                            <div class="mt-3">
                                                <label class="form-label">Notes</label>
                                                <div class="form-icon">
                                                        <textarea name="notes" class="form-control form-control-icon" id="notes"></textarea>                                                        
                                                    </div>
                                            </div>

                                                                                
                                        </div>

                                        <div class="text-left">
                                                        <button type="submit" class="btn btn-info">Submit</button>
                                                    </div>
                                    </div>
                                </div>
                                </form>
                                <!-- end card body -->
                                <?php

                                //generate sequential invoice number
                                //select previous invoice number
                                $queryPreviousInvoiceNumber="SELECT invoice_number FROM invoice ORDER BY invoice_id DESC LIMIT 1";
                                $selectPreviousInvoiceNumber=$db->select($queryPreviousInvoiceNumber);
                                foreach($selectPreviousInvoiceNumber as $row)
                                {
                                    $lastInvoiceNumber=$row['invoice_number'];
                                }

                                //generate the new invoice number
                                function generateInvoiceNumber($previousInvoiceNumber) {
                                    $prefix = "VL59571";                                    
                                    
                                    if ($previousInvoiceNumber) {
                                        $lastSequence = intval(substr($previousInvoiceNumber, -3));
                                        $newSequence = str_pad($lastSequence + 1, 3, '0', STR_PAD_LEFT);
                                    } else {
                                        $newSequence = '001';
                                    }
                                
                                    return $prefix . $newSequence;
                                }

                                $newInvoiceNumber=generateInvoiceNumber($lastInvoiceNumber);                                
                                
                                                    //  form operations
                                                    if (isset($error)) {
                                                        if (!empty($error)) {
                                                            echo '<div class="alert alert-danger">
                                                            <i class="ri-megaphone-line"></i>
										<strong>Error Imminent! </strong>' . @implode('</li><li>', $error) . ' 
									</div>';
                                                        } else {                                                            
                                                                $insertQuery = "INSERT INTO `invoice` (`invoice_id`, `invoice_number`, `due_date`, `customer_name`, `customer_address`, `customer_email`, `customer_phone`, `bank_name`, `account_name`, `account_number`, `mpesa`, `mpesa_name`, `notes`, `status`, `discount`, `tax`, `total_amount`, `grand_total`, `user_id`, `updated_at`) VALUES (NULL, '".$newInvoiceNumber."', '".$due_date."', '".$customer_name."', '".$customer_address."', '".$customer_email."', '".$customer_phone."', '".$bank_name."', '".$account_name."', '".$account_number."', '".$mpesa."', '".$mpesa_name."', '".$notes."', '".$status."', '0.00', '0.00', '0.00', '0.00', '".$user_id."', CURRENT_TIMESTAMP);";
                                                                $db->insert($insertQuery);
                                                                echo '<div class="alert alert-info">										
										<strong>Success! </strong>Invoice has been added, proceed to add invoice items below
									</div>';
                                                            } 
                                                        }                                                    

                                                    ?>
                            </div>
                            <!-- end card -->

                            <?php
                            //select invoices to add
                            $queryInvoices="SELECT * FROM invoice WHERE user_id=$user_id ORDER BY invoice_id DESC";
                            $selectInvoices=$db->select($queryInvoices); 
                            ?>

                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Your Invoices</h5>
                                </div>
                                <div class="card-body">
                                    <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="width: 10px;">
                                                    <div class="form-check">
                                                        <input class="form-check-input fs-15" type="checkbox" id="checkAll" value="option">
                                                    </div>
                                                </th>
                                                <th data-ordering="false">ID</th>
                                                <th data-ordering="false">Invoice Number</th>
                                                <th data-ordering="false">Due Date</th>
                                                <th data-ordering="false">Customer Name</th>
                                                <th data-ordering="false">Customer Address</th>
                                                <th>Customer Email</th>
                                                <th>Customer Phone</th>
                                                <th>Bank Name</th>
                                                <th>Bank Account Name</th>
                                                <th>Bank Account Number</th>
                                                <th>Mpesa(No.,Till,Paybill)</th>
                                                <th>Mpesa Account(Name,Account No.)</th>
                                                <th>Notes</th>
                                                <th>Status</th>
                                                <th>Discount</th>
                                                <th>Tax</th>
                                                <th>Total Amount</th>
                                                <th>Grand Total</th>
                                                <th>Staff</th>
                                                <th>Updated_At</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            //check if data exists
                                            if(count($selectInvoices)){
                                                foreach($selectInvoices as $row){                                            
                                            ?>
                                            <tr>
                                                <th scope="row">
                                                    <div class="form-check">
                                                        <input class="form-check-input fs-15" type="checkbox" name="checkAll" value="option1">
                                                    </div>
                                                </th>
                                                <td><?php echo $row['invoice_id'];?></td>
                                                <td><?php echo $row['invoice_number'];?></td>
                                                <td><?php echo $row['due_date'];?></td>
                                                <td><?php echo $row['customer_name'];?></td>
                                                <td><?php echo $row['customer_address'];?></td>
                                                <td><?php echo $row['customer_email'];?></td>
                                                <td><?php echo $row['customer_phone'];?></td>
                                                <td><?php echo $row['bank_name'];?></td>
                                                <td><?php echo $row['account_name'];?></td>
                                                <td><?php echo $row['account_number'];?></td>
                                                <td><?php echo $row['mpesa'];?></td>
                                                <td><?php echo $row['mpesa_name'];?></td>
                                                <td><?php echo $row['notes'];?></td>                                                    
                                                <?php
                                  if($row['status']=='Unpaid')
                                  {
                                    echo '<td><span class="badge bg-warning-subtle text-warning ">'.$row['status'].'</span></td>';                                    
                                  }else if($row['status']=='Paid')
                                  {
                                    echo '<td><span class="badge bg-primary-subtle text-primary ">'.$row['status'].'</span></td>';
                                  }else if($row['status']=='Cancelled')
                                  {
                                    echo '<td><span class="badge bg-danger-subtle text-danger ">'.$row['status'].'</span></td>';
                                  }
                                  else
                                  {
                                    echo '<td><span class="badge bg-info-subtle text-info ">'.$row['status'].'</span></td>';
                                  }
                                  ?>

                                  <td><?php echo $row['discount'];?></td>
                                  <td><?php echo $row['tax'];?></td>

                                  <td><?php echo $row['total_amount'];?></td>
                                  <td><?php echo $row['grand_total'];?></td>
                                                                
                                  <?php
                                  //select staff from ID
                                  $office_user_id=$row['user_id'];
                                  $userQuery="SELECT first_name, last_name from user where user_id=$office_user_id";
                                  $userSelect=$db->select($userQuery);

                                  foreach($userSelect as $row1)
                                  {
                                    echo '<td>'.$row1['first_name'].' '.$row1['last_name'].'</td>';
                                  }
                                  ?>
                                  <td><?php echo $row['updated_at'];?></td>                                                                    
                                                
                                                <td>
                                                    <div class="dropdown d-inline-block">
                                                    <form method="post" action="add_invoice_item.php"><input type="hidden" name="myInvoiceId"  value="<?php echo $row['invoice_id'];?>">
                                                        <button name="add_items" id="add_items" class="btn btn-info" type="submit">
                                                        <i class="ri-sticky-note-add-line align-bottom me-1"></i>Add Items
                                                        </button>
                                                    </form>                                                        
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                          }
                      }
                      else
                      {
                          echo "Oops :( No Data Found";
                      }
                      ?>                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <!-- Add office equipment form-->

              
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            
            <?php
            include "footer.php";
            ?>