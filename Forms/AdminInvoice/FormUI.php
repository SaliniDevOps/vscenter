<?php 
    // AJAX 
    include('FormAjax.php');

    // Open connection
    require_once("../../Connection/dbconnecting.php");
	$today=date("Y-m-d");
	date_default_timezone_set("Asia/Colombo");
	$todayTime=date("h:i:sa");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Invoice Page</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  
  <!-- Favicons -->
  <link href="../../assets/img/favicon.png" rel="icon">
  <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../../assets/css/style.css" rel="stylesheet">
  <link href="../../CommonCSS/stylecss.css" rel="stylesheet">
  
  <style>
    @import url('https://fonts.googleapis.com/css?family=Open+Sans:400,600');

    *, *:before, *:after {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

   

    table {
      background: #012B39;
      border-radius: 0.25em;
      border-collapse: collapse;
      margin: 1em;
      width: 100%;
    }

    th {
      border-bottom: 1px solid #364043;
      color: #E2B842;
      font-size: 0.85em;
      font-weight: 600;
      padding: 0.5em 1em;
      text-align: left;
    }

    td {
      color: #fff;
      font-weight: 400;
      padding: 0.65em 1em;
    }

    .disabled td {
      color: #4F5F64;
    }

    tbody tr {
      transition: background 0.25s ease;
    }

    tbody tr:hover {
      background: #014055;
    }
</style>
</head>

<body>
    <?php 
        include('../../include/header.php');
        include('../../include/sidebar.php');
		
		$InvoiceNumber=0;
		$InvoiceID=0;
		$result = $db_handle->runQuery ("SELECT `InvoiceID` As 	InvoiceIDAuto FROM `invoice` ORDER BY `InvoiceID`");
	 
		if(!empty($result)){
			foreach ($result as $rowDep1) {
				$InvoiceID=$rowDep1["InvoiceIDAuto"];
			}
		}	
		 $InvoiceNumber=$InvoiceID+1;
    ?>

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Invoice</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Invoice</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

		
        <section class="section dashboard">
            <div class="row">
				<div class="d-flex justify-content-between align-items-center">
					<div class="col-md-11 main-content d-flex align-items-center">
						<label for="spareName" class="col-form-label" style="margin-left:60px;">Select Job Number</label>
						<select id="jobNumber" name="jobNumber" class="form-control" style="width: 200; margin-left:10px; " >
							<option value="">Select Job Number</option>
							<?php 
							echo $query = "SELECT customerappoinments.AppoinmentID FROM `customerappoinments` 
							INNER JOIN techniciansassigned ON techniciansassigned.`JobNumber` = customerappoinments.`AppoinmentID`
							WHERE techniciansassigned.Status= 1 AND `IsInvoice` ='0' 
							GROUP BY customerappoinments.AppoinmentID
							ORDER BY AppoinmentID";
							$result = $db_handle->runQuery($query);
							foreach ($result as $rowDep1) {
								?>
								<option value="<?php echo $rowDep1["AppoinmentID"];?>"><?php echo $rowDep1["AppoinmentID"];?></option>
								<?php		
							}
							?>
						</select>
						&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary ml-2" id="ShowButton">Show</button>
						
						<label for="invoiceNumber" class="col-form-label" style="margin-left:60px;">Invoice Number</label>
						&nbsp;&nbsp;&nbsp;<input type="text" id="invoiceNumber"  class="form-control" style="width: 200;" value="<?php echo $InvoiceNumber;?>" disabled >
					</div>
				</div><br><br><br>
                <div class="col-lg-12">
                    <div class="card" style="background-color: #a3c2c2;">
                        <div class="card-body">
							<br>
                            <form id="form1" name="form1" method="post" autocomplete="off" action="">
								<li style="display:flex; align-items: center; width:1000px; margin:1px; padding:1px;">
									<ul class="form-style-6" style="display:flex; align-items: center; list-style-type:none; padding:0; " >
										
										<!-- New Label and Text Box -->
										 <li style="margin-right: 14px;">
											<label for="customerName" style="">&nbsp;Customer Name</label>
											<input type="text"  disabled id="customerName" name="customerName" class="form-control" style="width: 210;">
										</li>
										 <li style="margin-right: 14px;">
											<label for="mobile">&nbsp;Mobile</label>
											<input type="text"  disabled id="mobile" name="mobile" class="form-control" style="width: 210;">
										</li>
										 <li style="margin-right: 14px;">
											<label for="email">&nbsp;Email</label>
											<input type="email" disabled  id="email" name="email" class="form-control" style="width: 210;">
										</li> 
										<li style="margin-right: 14px;">
											<label for="vehicleTypetxt">&nbsp;Vehicle Type</label>
											<input type="text" disabled  id="vehicleTypetxt" name="vehicleTypetxt" class="form-control" style="width: 210;">
										</li>
										<li style="margin-right: 14px;">
											<label for="vehicleNumber">&nbsp;Vehicle Number</label>
											<input type="text"  disabled id="vehicleNumber" name="vehicleNumber" class="form-control" style="width: 210;">
										</li>
									</ul>
								</li><hr><br>
                                 <div id="LoadTextBoxes">
                               <div class="card-container d-flex justify-content-between">
									<div class="card" style="background-color: #012B39; width: 500px;">
										<div class="card-body">
											<!--h5 class="card-title" style="color: white;">Services</h5-->
											
											<table>
												<thead>
													<tr>
														<th>Services Performed</th>
														<th>Price</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>--------</td>
														<td><input type="text" class="price-input" style="background-color: #012B39; color:white;" value="-----"></td>
													</tr>
													<tr>
														<td>--------</td>
														<td><input type="text" class="price-input" style="background-color: #012B39; color:white;" value="-----"></td>
													</tr>
													<tr>
														<td>--------</td>
														<td><input type="text" class="price-input" style="background-color: #012B39; color:white;" value="-----"></td>
													</tr>
												</tbody>
											</table>
											
											
										</div>
									</div>
									
									<div class="card" style="background-color: #012B39; width: 500px;">
										<div class="card-body">
											<!--h6 class="card-title" style="color: white;">Spare Parts</h6-->
											<table>
												<thead>
													<tr>
														<th>Spare Items</th>
														<th>Price</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>--------</td>
														<td><input type="text" class="price-input" style="background-color: #012B39; color:white;" value="-----"></td>
													</tr>
													<tr>
														<td>--------</td>
														<td><input type="text" class="price-input" style="background-color: #012B39; color:white;" value="-----"></td>
													</tr>
													<tr>
														<td>--------</td>
														<td><input type="text" class="price-input" style="background-color: #012B39; color:white;" value="-----"></td>
													</tr>
												</tbody>
											</table>
											
										</div>
									</div>
								</div>
								</div>
                                
								<div class="d-flex justify-content-between align-items-center">
									<div class="col-md-12 main-content d-flex align-items-center">
										<label for="totalPrice" class="col-form-label" style="margin-left:10px;">Total</label>
										<input type="text" id="totalPrice" class="form-control total-price-input" style="width: 250; margin-left:10px; " value="<?php //echo number_format($totalPrice, 2); ?>" disabled>
										
										<label for="txtAdditionalCharges" class="col-form-label" style="margin-left:10px;" >Additional Charges</label>
										<input type="text" id="txtAdditionalCharges" class="form-control" style="width: 250; margin-left:10px; " onkeyup="updateSubtotal();">
										
										<label for="txtSubTotal" class="col-form-label" style="margin-left:70px;">Sub Total</label>
										<input type="text" id="txtSubTotal" disabled class="form-control total-price-input" style="width: 250; margin-left:10px; border-style: groove; border-color: #ff531a;  border-width: 2px; ">

									</div>
								</div><br>
								<script>

									function updateSubtotal() {
										
										var AdditionalCharges  = document.getElementById('txtAdditionalCharges').value;
										var SubTotal = document.getElementById('totalPrice').value;
									
										AdditionalCharges=parseFloat(AdditionalCharges);
										SubTotal=parseFloat(SubTotal);
										if(isNaN(AdditionalCharges)){AdditionalCharges=0;}
										if(isNaN(SubTotal)){SubTotal=0;}
										
										var NewSubTotal=parseFloat(NewSubTotal);
										NewSubTotal = (AdditionalCharges + SubTotal );
										
										document.getElementById('txtSubTotal').value=NewSubTotal;
										
										
									}
									
									function updateBalance() {
										
										var SubTotal  = document.getElementById('txtSubTotal').value;
										var PaidAmount = document.getElementById('PaidAmount').value;
									
										SubTotal=parseFloat(SubTotal);
										PaidAmount=parseFloat(PaidAmount);
										if(isNaN(SubTotal)){SubTotal=0;}
										if(isNaN(PaidAmount)){PaidAmount=0;}
										
										var Balance=parseFloat(Balance);
										Balance = (PaidAmount - SubTotal );
										
										document.getElementById('txtBalance').value=Balance;
										
										
									}
									
								</script>	
                               <div class="d-flex justify-content-between align-items-center">
									<div class="col-md-12 main-content d-flex align-items-center">
									
										
									
										<label for="spareName" class="col-form-label" style="margin-left:330px;">Payment Method</label>
										<select  id="cmbPaymentMethod" class="form-control" style="width: 250; margin-left:10px; ">
											<option value="">Select Payment Type</option>
											<option value="1">Cash</option>
											<option value="2">Card</option>
											<option value="2">Credit</option>
										
										</select>
														
										<label for="PaidAmount" class="" style="margin-left:108px;">Paid</label>
										<input type="text" onkeyup="updateBalance();" id="PaidAmount" class="form-control" style="width: 248; margin-left:10px; border-style: groove; border-color: #ff531a;  border-width: 2px; ">
										
									</div>
								</div><br>
								
								<div class="d-flex justify-content-between align-items-center">
								<div class="col-md-12 main-content d-flex align-items-center">
									
										<label for="spareName" class="col-form-label" style="margin-left:10px;">Note</label>
										<textarea id="text" id="txtNote" class="form-control" style="width: 660px; height:10px; margin-left: 10px;"></textarea>
													
									<label for="spareName"  class="col-form-label" style="margin-left:85px;">Balance</label>
									<input type="text" disabled id="txtBalance" class="form-control " style="width: 248; margin-left:10px; border-style: groove; border-color: #ff531a;  border-width: 2px;">
									
								</div>
								</div>
                                <div id="SaveInvoiceDetails" ></div>
                                <div class="d-flex justify-content-between align-items-right">
									<div class="col-md-12 main-content d-flex align-items-right">
										<div class="col-md-12 text-end">
											<button type="button" class="btn btn-success mt-4" id="printInvoice">Save and print Invoice</button>
										</div>
									</div>
                                </div>
                            </form>
                        </div><!-- End Card Body -->
                    </div><!-- End Card -->
                </div><!-- End Col -->
            </div><!-- End Row -->
        </section>
    </main><!-- End Main -->

    <?php include('../../include/footer.php'); ?>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/vendor/chart.js/chart.umd.js"></script>
    <script src="../../assets/vendor/echarts/echarts.min.js"></script>
    <script src="../../assets/vendor/quill/quill.min.js"></script>
    <script src="../../assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="../../assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="../../assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="../../assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../../assets/js/main.js"></script>
</body>
</html>
