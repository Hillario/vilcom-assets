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
 * preview_quote.php
 *
 * This file enables the staff to preview and download the quote.
 * 
 * @author Hillary Chesaro
 */

 include "header.php";

 //Retrieve Quote ID


 $quoteid=($_SESSION['quoteid']);

 //select data for the invoice header
 $queryInvoice="SELECT * FROM quote WHERE quote_id=$quoteid";
 $selectInvoice=$db->select($queryInvoice);
 foreach($selectInvoice as $row)
 {
    $quoteNumber=$row['quote_number'];
    $quoteDate=$row['quote_date'];
    $customerName=$row['customer_name'];
    $customerAddress=$row['customer_address'];
    $customerEmail=$row['customer_email'];
    $customerPhone=$row['customer_phone'];
    $bankName=$row['bank_name'];
    $bankAccountName=$row['account_name'];
    $bankAccountNumber=$row['account_number'];
    $mpesaNumber=$row['mpesa'];
    $mpesaName=$row['mpesa_name'];
    $notes=$row['notes'];
    $status=$row['status'];
    $tax=$row['tax'];
    $totalAmount=$row['total_amount'];
    $grandTotal=$row['grand_total'];
    $invoiceDate=$row['updated_at'];
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
                                <h4 class="mb-sm-0">GENERATE QUOTE</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                        <li class="breadcrumb-item active">Preview Quote</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->              
                    
                    <div class="row justify-content-center">
                        <div class="col-xxl-9">
                            <div class="card" id="demo">
                                   <div class="card-body">
                                    <div class="row p-4">
                                        <div class="col-lg-9">
                                            <h3 class="fw-bold mb-4">Vilcom Networks Ltd. Quote </h3>
                                            <div class="row g-4">
                                                <div class="col-lg-6 col-6">
                                                    <p class="text-muted mb-1 text-uppercase fw-medium fs-14">Quote No</p>
                                                    <h5 class="fs-16 mb-0">#<?php echo $quoteNumber;?></span></h5>
                                                </div>
                                                <!--end col-->
                                                <div class="col-lg-6 col-6">
                                                    <p class="text-muted mb-1 text-uppercase fw-medium fs-14">Date</p>
                                                    <h5 class="fs-16 mb-0"><span id="invoice-date"><?php echo $invoiceDate;?></span></h5>
                                                </div>
                                                <!--end col-->
                                                <div class="col-lg-6 col-6">
                                                    <p class="text-muted mb-1 text-uppercase fw-medium fs-14">Approval Status</p>
                                                    <span class="badge bg-success-subtle text-success fs-11" id="payment-status"><?php echo $status;?></span>
                                                </div>
                                                <!--end col-->
                                                <div class="col-lg-6 col-6">
                                                    <p class="text-muted mb-1 text-uppercase fw-medium fs-14">Total Amount</p>
                                                    <h5 class="fs-16 mb-0">Ksh<span id="total-amount"><?php echo $grandTotal;?></span></h5>
                                                </div>
                                                <!--end col-->
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mt-sm-0 mt-3">
                                                <div class="mb-4">
                                                    <img src="../assets/images/logo-dark.png" class="card-logo card-logo-dark" alt="logo dark" height="17">
                                                    <img src="../assets/images/logo-light.png" class="card-logo card-logo-light" alt="logo light" height="17">
                                                </div>
                                                <h6 class="text-muted text-uppercase fw-semibold">Address</h6>
                                                <p class="text-muted mb-1" id="address-details">Ramco Court, Block B, Mombasa Road</p>
                                                <p class="text-muted mb-1" id="zip-code"><span></span>P.O Box 24559-00502 Nairobi</p>
                                                <h6><span class="text-muted fw-normal">Email:</span><span id="email">info@vilcom.co.ke</span></h6>
                                                <h6><span class="text-muted fw-normal">Website:</span> <a href="https://vilcom.co.ke/" class="link-primary" target="_blank" id="website">www.vilcom.co.ke</a></h6>
                                                <h6 class="mb-0"><span class="text-muted fw-normal">Contact No: </span><span id="contact-no">0726888777</span></h6>
                                            </div>
                                        </div>
                                    </div><!--end col-->

                                    <div class="row p-4 border-top border-top-dashed">
                                        <div class="col-lg-9">
                                            <div class="row g-3">
                                                <div class="col-6">
                                                    <h6 class="text-muted text-uppercase fw-semibold mb-3">Billing Address</h6>
                                                    <p class="fw-medium mb-2" id="billing-name"><?php echo $customerName;?></p>
                                                    <p class="text-muted mb-1" id="billing-address-line-1"><?php echo $customerAddress;?></p>
                                                    <p class="text-muted mb-1"><span>Phone: </span><span id="billing-phone-no"><?php echo $customerPhone;?></span></p>
                                                    <p class="text-muted mb-0"><span>Email: </span><span id="billing-tax-no"><?php echo $customerEmail;?></span> </p>
                                                </div>                                                
                                            </div>
                                            <!--end row-->
                                        </div><!--end col-->

                                        <div class="col-lg-3">
                                                <h6 class="text-muted text-uppercase fw-semibold mb-3">Total Amount(Ksh)</h6>
                                                <h3 class="fw-bold mb-2"><?php echo $grandTotal;?></h3>
                                                <span class="badge bg-success-subtle text-success fs-12">Quote Date: <?php echo $quoteDate?></span>
                                        </div>

                                    </div>

                                    <?php
                                    //select all quote items in respect to invoice id
                                    $queryInvoiceItem="SELECT * FROM quote_item WHERE quote_id=$quoteid ORDER BY quote_item_id ASC";
                                    $selectInvoiceItem=$db->select($queryInvoiceItem);
                                    ?>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card-body p-4">
                                                <div class="table-responsive">
                                                    <table class="table table-borderless text-center table-nowrap align-middle mb-0">
                                                        <thead>
                                                            <tr class="table-active">
                                                                <th scope="col" style="width: 50px;">#</th>
                                                                <th scope="col">Product Details</th>
                                                                <th scope="col">Rate</th>
                                                                <th scope="col">Quantity</th>
                                                                <th scope="col" class="text-end">Amount</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="products-list">
                                            <?php
                                            //check if data exists
                                            if(count($selectInvoiceItem)){
                                                foreach($selectInvoiceItem as $row1){                                            
                                            ?>
                                            <tr>
                                                                <th scope="row"><?php echo $row1['item_number'];?></th>
                                                                <td class="text-start">
                                                                    <span class="fw-medium"><?php echo $row1['item_name'];?></span>
                                                                    <p class="text-muted mb-0"><?php echo $row1['description'];?></p>
                                                                </td>
                                                                <td>Ksh<?php echo $row1['unit_price'];?></td>
                                                                <td><?php echo $row1['quantity'];?></td>
                                                                <td class="text-end">Ksh<?php echo $row1['amount'];?></td>
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
                                                        
                                                    </table><!--end table-->
                                                </div>
                                                <div class="border-top border-top-dashed mt-2">
                                                    <table class="table table-borderless table-nowrap align-middle mb-0 ms-auto" style="width:250px">
                                                        <tbody>
                                                            <tr>
                                                                <td>Sub Total</td>
                                                                <td class="text-end">Ksh<?php echo $totalAmount;?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>VAT (16.0%)</td>
                                                                <td class="text-end">Ksh<?php echo $tax;?></td>
                                                            </tr>
                                                            <tr class="border-top border-top-dashed fs-15">
                                                                <th scope="row">Total Amount</th>
                                                                <th class="text-end">Ksh<?php echo $grandTotal;?></th>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <!--end table-->
                                                </div>
                                                <div class="mt-3">
                                                    <h6 class="text-muted text-uppercase fw-semibold mb-3">Payment Details:</h6>
                                                    <p class="text-muted mb-1">Bank Name: <span class="fw-medium" id="payment-method"><?php echo $bankName;?></span></p>
                                                    <p class="text-muted mb-1">Bank Account Name: <span class="fw-medium" id="card-holder-name"><?php echo $bankAccountName;?></span></p>
                                                    <p class="text-muted mb-1">Bank Account Number: <span class="fw-medium" id="card-number"><?php echo $bankAccountNumber?></span></p>
                                                    <p class="text-muted mb-1">Mpesa Number/Till/Paybill: <span class="fw-medium" id="payment-method"><?php echo $mpesaNumber;?></span></p>
                                                    <p class="text-muted mb-1">MPesa Name/Account Number: <span class="fw-medium" id="payment-method"><?php echo $mpesaName;?></span></p>
                                                    <p class="text-muted">Total Amount: <span class="fw-medium" id="">Ksh </span><span id="card-total-amount"><?php echo $grandTotal;?></span></p>
                                                </div>
                                                <div class="mt-4">
                                                    <div class="alert alert-info">
                                                        <p class="mb-0"><span class="fw-semibold">NOTES:</span>
                                                            <span id="note"><?php echo $notes;?></span>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="hstack gap-2 justify-content-end d-print-none mt-4">
                                                    <a href="javascript:window.print()" class="btn btn-info"><i class="ri-printer-line align-bottom me-1"></i> Print</a>
                                                    <a href="javascript:window.print()" class="btn btn-primary"><i class="ri-download-2-line align-bottom me-1"></i> Download</a>
                                                </div>
                                            </div>
                                            <!--end card-body-->
                                        </div><!--end col-->
                                    </div>
                                   </div>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                   


              
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            
            <?php
            include "footer.php";
            ?>