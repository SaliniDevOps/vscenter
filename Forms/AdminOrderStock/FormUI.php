<?php 
    // AJAX 
    include('FormAjax.php');

    // Open connection
    require_once("../../Connection/dbconnecting.php");
	$todayDate=date("Y-m-d");
	date_default_timezone_set("Asia/Colombo");
	$todayTime=date("H:i:s");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Stock Order</title>
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
      width: 80%;
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
	/* ==================================== */
	.suggestionsBox1 {
				position: absolute;
				z-index: 10;
				background-color: #fff;
				border: 1px solid #2d8f9b;
				display: none;
				width:400px;
				margin-left:10px;
			}

			#suggesstions1 ul {
				margin: 0;
				padding: 0;
				list-style: none;
			}

			#suggesstions1 ul li {
				margin: 0;
				padding: 5px;
				border-bottom: 1px dotted #666;
				cursor: pointer;
			}

			#suggesstions1 ul li:hover {
				background-color: #c1c2cb;
				color: #000;
			}
</style>
</head>

<body>
    <?php 
        include('../../include/header.php');
        include('../../include/sidebar.php');
		
		$InvoiceNumber=0;
		$InvoiceID=0;
		$result = $db_handle->runQuery ("SELECT `OrderID` FROM `orderitems` ORDER BY `OrderID`");
	 
		if(!empty($result)){
			foreach ($result as $rowDep1) {
				$InvoiceID=$rowDep1["OrderID"];
			}
		}	
		 $InvoiceNumber=$InvoiceID+1;
		 
		 
		$query = "DELETE FROM `itemwiseorder` WHERE `Status`='0'";
		$result = $db_handle->deleteQuery($query);
    ?>

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Order Stock</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Order Stock</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
<div id="Load_SupplierDetails"></div>
        <section class="section dashboard">
            <div class="row">
				<div class="d-flex justify-content-between align-items-center">
					<div class="col-md-11 main-content d-flex align-items-center">
						<label for="suppliers" class="col-form-label" style="margin-left:60px;">Supplier Name</label>
						<select id="suppliers" name="suppliers" class="form-control" style="width: 350; margin-left:10px; " >
							<option value="">Select Supplier</option>
							<?php 
							$query = "SELECT * FROM `suppliers`";
							$result = $db_handle->runQuery($query);
							foreach ($result as $rowDep1) {
								?>
								<option value="<?php echo $rowDep1["ID"];?>"><?php echo $rowDep1["SupplierName"];?></option>
								<?php		
							}
							?>
						</select>
						&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" id="Show_Button" class="btn btn-primary ml-2">Show</button>
						
						<label for="OrderID" class="col-form-label" style="margin-left:60px;">Order ID</label>
						&nbsp;&nbsp;&nbsp;<input type="text" id="OrderID" value="<?php echo $InvoiceNumber;?>"  class="form-control" style="width: 200;" disabled >
					</div>
				</div><br><br><br>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form id="form1" name="form1" method="post" autocomplete="off" action="">
								<li style="display:flex; align-items: center; width:500px; margin:1px; padding:1px;">
									<ul class="form-style-6" style="display:flex; align-items: center; list-style-type:none; padding:0;">
										<br><br><br><br>
										<!-- New Label and Text Box -->
										
										 <li style="margin-right: 15px;">
											<label for="Company">&nbsp;Company</label>
											<input type="text" id="Company" name="Company" disabled class="form-control" style="width: 250;">
										</li>
										 <li style="margin-right: 15px;">
											<label for="Mobile">&nbsp;Mobile</label>
											<input type="text" id="Mobile" name="Mobile" disabled class="form-control" style="width: 250;">
										</li> 
										<li style="margin-right: 15px;">
											<label for="Email">&nbsp;Email</label>
											<input type="text" id="Email" name="Email" disabled class="form-control" style="width: 250;">
										</li>
										<li style="margin-right: 15px;">
											<label for="Date">&nbsp;Date</label>
											<input type="date" id="Date" name="Date" value="<?php echo $todayDate; ?>" disabled class="form-control" style="width: 250;">
										</li>
										
									</ul>
									
								</li>
								<div id="SaveData" ></div>
								<div id="ItemCodeSuggets" ></div>
                                <li style="display:flex; align-items: center; width:500px; margin:1px; padding:1px;">
									<ul class="form-style-6" style="display:flex; align-items: center; list-style-type:none; padding:0;">
										
										<li style="margin-right: 15px;">
											<label for="ItemCode">&nbsp;Item Code</label>
											<input type="text" id="HiddenID" name="HiddenID" hidden  class="form-control" style="width: 250;">
											<input type="text" id="ItemCode" name="ItemCode"  class="form-control" style="width: 250;">
											<div class="suggestionsBox1" id="suggesstions1"></div>
										</li>
										 <li style="margin-right: 15px;">
											<label for="ItemName">&nbsp;Item Name</label>
											<input type="text" id="ItemName" name="ItemName"  class="form-control" style="width: 250;">
										</li> 
										
										<li style="margin-right: 15px;">
											<label for="OrderQTY">&nbsp;Order QTY</label>
											<input type="text" id="OrderQTY" name="OrderQTY"  class="form-control" style="width: 250;">
										</li>
										<li style="margin-right: 15px;">
											<label for="NewPrice">&nbsp;New Price</label>
											<input type="text" id="NewPrice" name="NewPrice"  class="form-control" style="width: 120;">
										</li>
										<li style="margin-right: 15px;">
										&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" id="Add_Button" class="btn btn-danger" style="width: 120;">Add</button>			
										</li>
									</ul>
								</li>
                              
									<div class="table-container">
										<div id="LoadData" >
									
											<table>
												<thead>
													<tr>
														<th>Delete</th>
														<th>Item Code</th>
														<th>Item Name</th>
														<th>Order QTY</th>
														<th>New Unit Price</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td></td>
													</tr><tr>
														<td></td>
													</tr><tr>
														<td></td>
													</tr><tr>
														<td></td>
													</tr><tr>
														<td></td>
													</tr><tr>
														<td></td>
													</tr><tr>
														<td></td>
													</tr><tr>
														<td></td>
													</tr>
												</tbody>
											</table>	 
										</div>
									</div>
									<div class="col-lg-12" style="display: flex; justify-content: flex-end;">
										<li style="display: flex; align-items: center;  justify-content: flex-end;">
											<ul class="form-style-6" style="display: flex; align-items: center; list-style-type: none; padding: 0; margin: 0;">
												<li style="margin-right: 65px;">
													<button type="button" id="Save_Button" class="btn btn-success" style="width: 120px;">Save</button>
												</li>
											</ul>
										</li>
									</div>										
									
								
                                
								<!--div class="d-flex justify-content-between align-items-center">
								<div class="col-md-11 main-content d-flex align-items-center">
									<label for="spareName" class="col-form-label" style="margin-left:60px;">New Total QTY</label>
									<input type="text" id="price" class="form-control" style="width: 200; margin-left:10px; ">
									
													
									
								</div>
								</div-->
								
                              
							

                                

                                

                                

                               
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
