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
 * add_invoice_item.php
 *
 * This file enables the staff to add invoice items.
 * 
 * @author Hillary Chesaro
 */

 include "header.php";

 //temporarily suppress warnings
 error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

 //Retrieve Invoice ID
 if(isset($_POST['myInvoiceId']))
 {
     $_SESSION['invoiceid']=$_POST['myInvoiceId'];
 
 }

 $invoiceid=($_SESSION['invoiceid']);


 if ($_SERVER["REQUEST_METHOD"] == "POST") {    
    $item_name = @trim($_POST['item_name']);
    $description = @trim($_POST['description']);
    $quantity = @trim($_POST['quantity']);    
    $unit_price = @trim($_POST['unit_price']);     
        
    
    if (isset($_POST['item_name'])) $item_name = $_POST['item_name'];
    if (isset($_POST['description'])) $description = $_POST['description'];
    if (isset($_POST['quantity'])) $quantity= $_POST['quantity'];    
    if (isset($_POST['unit_price'])) $unit_price = $_POST['unit_price'];     
    
    
    $error = array();    
    if (empty($_POST["item_name"])) {
        $error[] = 'Please enter the item name';
    }
    if (empty($_POST["description"])) {
        $error[] = 'Please enter the description';
    }
    if (empty($_POST["quantity"])) {
        $error[] = 'Please enter the quantity';
    }    
    if (empty($_POST["unit_price"])) {
        $error[] = 'Please enter the unit price';
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
                                        <li class="breadcrumb-item active">Add Invoice Items</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <?php
                    //select invoice number
                    
                    $queryInvoiceNumber="SELECT invoice_number,total_amount,tax from invoice WHERE invoice_id=$invoiceid";
                    $selectInvoiceNumber=$db->select($queryInvoiceNumber);
                    foreach($selectInvoiceNumber as $row)
                    {
                        $globalInvoiceNumber=$row['invoice_number'];
                        $globalTotalAmount=$row['total_amount'];
                        $globalTax=$row['tax'];
                    }
                    ?>
                    
                    <div class="alert alert-info" role="alert">
                        Add Items for invoice number <strong><?php echo $globalInvoiceNumber;?></strong>
                    </div>

                    <!-- Add office equipment form-->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">Add Invoice Items form</h4>
                                </div>
                                <form action="" method="POST" class="auth-input" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-lg-6">
                                            
                                        
                                            
                                            
                                            <div class="mt-3">
                                                <label class="form-label">Item Name</label>
                                                <div class="form-icon">
                                                        <input name="item_name" type="text" class="form-control form-control-icon" id="item_name" placeholder="Enter the item name">
                                                        <i class="ri-edit-2-line"></i>
                                                    </div>
                                            </div> 

                                            <div class="mt-3">
                                                <label class="form-label">Description</label>
                                                <div class="form-icon">
                                                        <input name="description" type="text" class="form-control form-control-icon" id="description" placeholder="Enter the item description">
                                                        <i class="ri-file-edit-line"></i>
                                                    </div>
                                            </div>
                                            
                                             
                                            
                                           
                                        </div>

                                        <div class="col-lg-6">                                          
                                        
                                        
                                        <div class="mt-3">
                                                <label class="form-label">Quantity</label>
                                                <div class="form-icon">
                                                        <input name="quantity" type="number" class="form-control form-control-icon" id="quantity" placeholder="Enter the Quantity">
                                                        <i class="ri-hashtag"></i>
                                                    </div>
                                            </div>

                                            <div class="mt-3">
                                                <label class="form-label">Unit Price</label>
                                                <div class="form-icon">
                                                        <input name="unit_price" type="number" class="form-control form-control-icon" id="unit_price" placeholder="Enter the Unit Price in Ksh">
                                                        <i class="ri-price-tag-3-line"></i>
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
                                
                                //generate sequential item number
                                //select previous invoice number
                                $queryPreviousItemNumber="SELECT item_number FROM invoice_item WHERE invoice_id=$invoiceid ORDER BY invoice_item_id DESC LIMIT 1";
                                $selectPreviousItemNumber=$db->select($queryPreviousItemNumber);
                                foreach($selectPreviousItemNumber as $row)
                                {
                                    $lastItemNumber=$row['item_number'];
                                }

                                //generate the new invoice number
                                function generateItemNumber($previousItemNumber) {
                                    $prefix = "VL";                                    
                                    
                                    if ($previousItemNumber) {
                                        $lastSequence = intval(substr($previousItemNumber, -3));
                                        $newSequence = str_pad($lastSequence + 1, 3, '0', STR_PAD_LEFT);
                                    } else {
                                        $newSequence = '001';
                                    }
                                
                                    return $prefix . $newSequence;
                                }

                                $newItemNumber=generateItemNumber($lastItemNumber);
                                
                                                    //  form operations
                                                    if (isset($error)) {
                                                        if (!empty($error)) {
                                                            echo '<div class="alert alert-info">
                                                            <i class="ri-megaphone-line"></i>
										<strong>Take Note! </strong>' . @implode('</li><li>', $error) . ' 
									</div>';
                                                        } else {    
                                                                $localTotalAmount=$quantity*$unit_price;                                                        
                                                                $insertQuery = "INSERT INTO `invoice_item` (`invoice_item_id`, `item_number`, `item_name`, `description`, `quantity`, `unit_price`, `amount`, `invoice_id`, `updated_at`) VALUES (NULL, '".$newItemNumber."', '".$item_name."', '".$description."', '".$quantity."', '".$unit_price."', '".$localTotalAmount."', '".$invoiceid."', CURRENT_TIMESTAMP);";
                                                                $db->insert($insertQuery);
                                                                //update total_amount field in the invoice table                                                                
                                                                $finalTotalAmount=$globalTotalAmount+$localTotalAmount;
                                                                $taxAmount=0.16*$finalTotalAmount;
                                                                $grandTotal=$finalTotalAmount+$taxAmount;                                                                
                                                                //update invoice table
                                                                $updateQuery="UPDATE `invoice` SET `total_amount` = '".$finalTotalAmount."', `tax` = '".$taxAmount."', `grand_total` = '".$grandTotal."' WHERE `invoice`.`invoice_id` = '".$invoiceid."';";
                                                                $db->insert($updateQuery);
                                                                echo '<div class="alert alert-info">										
										<strong>Success! </strong>Invoice item has been added, please add another item or proceed to download invoice
									</div>';
                                                            } 
                                                        }                                                    

                                                    ?>
                            </div>
                            <!-- end card -->

                            <?php
                            //select invoice items by ID
                            $queryInvoices="SELECT * FROM invoice_item WHERE invoice_id=$invoiceid ORDER BY invoice_item_id ASC";
                            $selectInvoices=$db->select($queryInvoices); 
                            ?>

                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Invoice Items for Invoice Number: <?php echo $globalInvoiceNumber;?></h5>
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
                                                <th data-ordering="false">Item Number</th>
                                                <th data-ordering="false">Item Name</th>
                                                <th data-ordering="false">Description</th>
                                                <th data-ordering="false">Quantity</th>
                                                <th>Unit Price</th>
                                                <th>Amount</th>                                               
                                                <th>Updated_At</th>                                                
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
                                                <td><?php echo $row['invoice_item_id'];?></td>
                                                <td><?php echo $row['item_number'];?></td>
                                                <td><?php echo $row['item_name'];?></td>
                                                <td><?php echo $row['description'];?></td>
                                                <td><?php echo $row['quantity'];?></td>
                                                <td><?php echo $row['unit_price'];?></td>
                                                <td><?php echo $row['amount'];?></td>
                                  <td><?php echo $row['updated_at'];?></td>
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
                                    <div class="text-left">
                                    <form action="preview_invoice.php">
                                    <button type="submit" class="btn btn-info"><i class="ri-contract-line align-bottom me-1"></i>Preview Invoice</button>
                                    </form>
                                                    </div>
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