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
                    
                    $queryInvoiceNumber="SELECT invoice_number from invoice WHERE invoice_id=$invoiceid";
                    $selectInvoiceNumber=$db->select($queryInvoiceNumber);
                    foreach($selectInvoiceNumber as $row)
                    {
                        $globalInvoiceNumber=$row['invoice_number'];
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

                                        <div class="col-lg-6">                                          
                                        
                                        <div class="mt-3">
                                        <label for="invoicenoInput">Total Amount</label>
                                        <input type="text" class="form-control bg-light border-0" id="invoicenoInput" placeholder="Invoice No" value="Ksh 0.00" readonly="readonly">
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
                                
                                                    //  form operations
                                                    if (isset($error)) {
                                                        if (!empty($error)) {
                                                            echo '<div class="alert alert-info">
                                                            <i class="ri-megaphone-line"></i>
										<strong>Take Note! </strong>' . @implode('</li><li>', $error) . ' 
									</div>';
                                                        } else {                                                            
                                                                $insertQuery = "INSERT INTO `invoice` (`invoice_id`, `invoice_number`, `due_date`, `customer_name`, `customer_address`, `customer_email`, `customer_phone`, `status`, `total_amount`, `user_id`, `updated_at`) VALUES (NULL, '".$newInvoiceNumber."', '".$due_date."', '".$customer_name."', '".$customer_address."', '".$customer_email."', '".$customer_phone."', '".$status."', '0.00', '".$user_id."', CURRENT_TIMESTAMP);";
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
                                                <th>Status</th>
                                                <th>Total Amount</th>
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

                                  <td><?php echo $row['total_amount'];?></td>
                                                                
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
                                                            Add Items
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