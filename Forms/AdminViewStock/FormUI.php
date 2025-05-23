<?php 
	//AJAX 
	include('FormAjax.php');

	//open connection
	require_once("../../Connection/dbconnecting.php");
	
										
  ?>
<!DOCTYPE html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Add Spare Type Interface </title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  
  <!-- Favicons -->
  <link href="../../assets/img/favicon.png" rel="icon">
  <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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
  <!--link href="stylecss.css" rel="stylesheet"-->

</head>
<style>
   /* body {
        background-color: white;  Replace with your desired color 
    }*/
	.card {
		background-color: #b3cccc; /* Replace with your desired color  #006666*/
	}	
	
	  
	
	 
	
	
	
	@import url('https://fonts.googleapis.com/css?family=Open+Sans:400,600');

			*, *:before, *:after {
			  margin: 0;
			  padding: 0;
			  box-sizing: border-box;
			}

			/*body {
			  background: #105469;
			  font-family: 'Open Sans', sans-serif;
			}*/

			table {
			  background: #012B39;
			  border-radius: 0.25em;
			  border-collapse: collapse;
			  margin: 1em;
			  width: 97%;
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
			/* ======================================================*/
			
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
			/* ======================================================*/
			.table-container {
				height: 500px; /* Set your desired height */
				overflow-y: auto; /* Enable vertical scrolling */
				 /*border: 1px solid #ccc; Optional: Add a border around the container */
				  background: #012B39;
			}

			.table-container table {
				/*width: 100%;*/
				border-collapse: collapse;
			}

			.table-container thead {
				position: sticky;
				top: 0;
				z-index: 1;
			}

			.table-container th, .table-container td {
				padding: 8px;
				text-align: left;
				border: 1px solid #ddd;  Optional: /* Border around table cells */
			}

			.table-container tbody tr:nth-child(even) {
				/*background-color: #f9f9f9;  Optional: Zebra striping for rows */
			}
			
			
			
  
  </style>
<body>

	<?php 
	
	include('../../include/header.php');
	include('../../include/sidebar.php');
	?>

	<main id="main" class="main">

    <div class="pagetitle">
      <h1>View Stock</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

	<section class="section dashboard">
		<div class="row">

			<!-- Left side columns -->
			<div class="col-lg-10">
				<div class="row">
					<section class="section">
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<form id="form1" name="form1" method="post" autocomplete="off" action=""><br>
											<div class="d-flex justify-content-between align-items-center">
												<div class="col-md-11 main-content d-flex align-items-center">
													<div id="CustomerName" > </div>
													<div id="HiddenIDLoad" > </div>
													<label for="ItemName" class="col-form-label" style="margin-left:130px;">Item Name </label>
													<div class="form-group">
														<input type="text" id="ItemName" class="form-control" style="width: 400px; margin-left:10px;" oninput="showSuggestions()">
														<input type="text" id="StockID" hidden  />
														<div class="suggestionsBox1" id="suggesstions1"></div>
														<div class="textalert1" id="ValiAlertCSS"></div>
													</div>

													
													&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary ml-2" id="Serach_Button">Search</button>			
													
												</div>
											</div>	
										</form>
										<br>
											<div class="table-container">
											<div id="LoadData" >
										
												<table>
													<thead>
														<tr>
															<th>Item Code</th>
															<th>Item Name</th>
															<th>Unit Price</th>
															<th>Available Qty</th>
														</tr>
													</thead>
													<tbody>
														<?php
															
														$queryA="Select `spareparts`.`SpareName`,`spareparts`.`ItemCode`,`spareparts`.`Price`,`spareparts`.`ID`,`stock`.`AvalQTY`
														from `stock` 
														INNER JOIN  spareparts ON stock.SpareID = spareparts.ID";
														$resultA = $db_handle->runQuery($queryA); 
														$i=0;
														if(!empty($resultA)){
															foreach ($resultA as $r) {
																$ID=$r['ID'];
														
																if($i%2==0)
																	$classname="evenRow";
																else
																	$classname="oddRow";
																?>
																<tr id="show">
																<td><?php echo $r['ItemCode'];?></td>
																<td><?php echo $r['SpareName'];?></td>
																<td style="text-align:right;"><?php echo number_format($r['Price'],2);?></td>
																<td style="text-align:center;"><?php echo $r['AvalQTY'];?></td>
																</tr>
																<?php
															}
															
														}	?>	
													</tbody>
													</table>
											</div>
										
											</div>
										</div>
										</div>
										
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div><!-- End Left side columns -->
			
			
			<div class="alertDuplicate" id="warningDuplicate_AlertBtn" style="display:none"></div>
			<div class="alertUpdate" id="warningUpdate_AlertBtn" style="display:none"></div>
		
			<!-- Right side columns -->
			<div class="col-lg-4">
			  <!-- Right side content goes here -->
			</div><!-- End Right side columns -->

		</div>
	</section>


	</main><!-- End #main -->

	<?php 
	include('../../include/footer.php');
	?>

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
	<script src="../assets/js/main.js"></script>

</body>

</html>