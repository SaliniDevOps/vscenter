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
	
	  
	tr:hover td {
	  background:#a6a6a6;
	  color:#FFFFFF;
	}
	 
	tr:nth-child(odd) td {
	  background:#EBEBEB;
	}
	 
	tr:nth-child(odd):hover td {
	  background:#a6a6a6;
	}	
	#ValiAlertCSS_S {
    position: relative;
    z-index: 10;
    padding: 10px;
    background-color: #f8d7da;
    color: #721c24;
    font-size: 14px;
    width: calc(100% - 2px); /* Same width as the input box with border adjustment */
    margin-top: 4px;
    border-radius: 4px;
    border: 1px solid #f5c6cb;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    display: none; /* Hidden by default */
}
  
  </style>
<body>

	<?php 
	
	include('../../include/header.php');
	include('../../include/sidebar.php');
	?>

	<main id="main" class="main">

    <div class="pagetitle">
      <h1>Assign Order to Technicians</h1>
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
			<div class="col-lg-8">
				<div class="row">
					<section class="section">
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<form id="form1" name="form1" method="post" autocomplete="off" action="">
											<div class="d-flex justify-content-between align-items-center">
												<br><br><br><br><br>
												<div class="col-md-11 main-content d-flex align-items-center">
													<label for="jobNumber" class="col-form-label col-md-3">Select Job Number</label>
													<input type="text" hidden id="txtTechnicianID">
													<div class="form-group mb-6" style="position: relative;">
														
														<select id="jobNumber" name="jobNumber" class="form-control" style="width: 350px;">
															<option value="">Select Job Number</option>
															<?php 
															$query = "SELECT customerappoinments.AppoinmentID AS JobNumber, techniciansassigned.Status
																		FROM customerappoinments
																		LEFT JOIN techniciansassigned ON techniciansassigned.JobNumber = customerappoinments.AppoinmentID
																		WHERE techniciansassigned.Status = 0
																		   OR techniciansassigned.Status IS NULL
																		   GROUP BY customerappoinments.AppoinmentID";
															$result = $db_handle->runQuery($query);   //
															foreach ($result as $rowDep1) {
																?>
																<option value="<?php echo $rowDep1["JobNumber"];?>"><?php echo $rowDep1["JobNumber"];?></option>
																<?php		
															}
															?>
														</select>
														<div class="textalert1" id="ValiAlertCSS"></div>
													</div>
												</div>
											</div>
											
											

											<div class="d-flex justify-content-between align-items-center">
												<div class="col-md-11 main-content d-flex align-items-center">
													<label for="cmbTechnician" class="col-form-label col-md-3" style="margin-left:60px;">Select Technician</label>
													<div class="form-group mb-6" style="position: relative;">
													
													<select id="cmbTechnician" name="cmbTechnician" class="form-control" style="width: 348;">
														<option value="">Select Technician</option>
														<?php 
														$query = "SELECT * FROM `Technicians`";
														$result = $db_handle->runQuery($query);
														foreach ($result as $rowDep1) {
															?>
															<option value="<?php echo $rowDep1["ID"];?>"><?php echo $rowDep1["Name"];?></option>
															<?php		
														}
														?>
													</select>
													<div class="textalert2" id="ValiAlertCSS_S"></div>
													</div>
													&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary ml-2" id="Add_Button">Add</button>
													
													
												</div>
											</div>
											
												
										</form>
										
										<div id="displaydelete"></div>
										<div id="Row_ID_update"></div>
											<br>
										 <div class="alertSave" id="Save_AlertCSS" style="display:none"></div>
										 <div class="alertWarning" id="Warning_AlertCSS" style="display:none"></div>
										<div id="Insert_Technicians">
										<div id="Insert_Data">
											<div class="row">
												<div class="card-body">
													
													<table class="table table-bordered" style="max-width: 600px; margin: auto;">
														<!--table class="table table-bordered" style="max-width: 500px; margin-right: auto;"-->
														<thead>
															<tr>
															   <th scope="col" class="center-align">Delete</th>
																<!--th scope="col" class="center-align">Edit</th-->
																<th scope="col" class="center-align">Job Number</th>
																<th scope="col" class="center-align">Technician Name</th>
															</tr>
														</thead>
														<tbody>
														<?php
														$queryA="SELECT techniciansassigned.ID,`technicians`.`Name`,`techniciansassigned`.`JobNumber`
															FROM `techniciansassigned` 
															INNER JOIN technicians ON techniciansassigned.TechnicianID = technicians.ID
															WHERE techniciansassigned.`Status`='0'
															ORDER BY techniciansassigned.`ID`";
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
																<td style="width:20px;"><a href="#" id="<?php echo $ID; ?>" class="delete" title="Delete"><img width="20" height="20" src="../../images/delete.png"  title="Delete" /></a></td>
																<!--td style="width:20px;"><a href="#" id="<?php echo $ID; ?>" class="Update" title="Update"><img width="20" height="20" src="../../images/edit.png"  title="Update" /></a></td-->
																<td style="width:150px;"><?php echo $r['JobNumber'];?></td>
																<td><?php echo $r['Name'];?></td>
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