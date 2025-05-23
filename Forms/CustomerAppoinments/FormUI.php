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

<body>

	<?php 
	
	include('../../include/header.php');
	include('../../include/sidebar.php');
	?>

	<main id="main" class="main">

    <div class="pagetitle">
      <h1>Add Spare Parts</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

	
			<!-- Button to trigger the modal -->
	<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal">
		Customer Appoinmnets
	</button>
			
	<div class="modal fade" id="largeModal" tabindex="-1" aria-labelledby="largeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="largeModalLabel">Service Booking Form</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form>
						<div class="mb-3">
							<label for="name" class="form-label">Name</label>
							<input type="text" class="form-control" id="name" required>
						</div>
						<div class="mb-3">
							<label for="NIC" class="form-label">NIC</label>
							<input type="NIC" class="form-control" id="NIC" required>
						</div>
						<div class="mb-3">
							<label for="email" class="form-label">Email Address</label>
							<input type="email" class="form-control" id="email" required>
						</div>
						<div class="mb-3">
							<label for="phone" class="form-label">Phone Number</label>
							<input type="tel" class="form-control" id="phone" required>
						</div>
						<div class="mb-3">
							<label for="vehicleNumber" class="form-label">Vehicle Number</label>
							<input type="text" class="form-control" id="vehicleNumber" required>
						</div>
						<div class="mb-3">
							<label for="service" class="form-label">Service</label>
							<select id="ServiceType" name="ServiceType" class="form-control">
								<option>Select services you want</option>
								<?php 
								$resultC= $db_handle->runQuery("SELECT * FROM `servicetype` ORDER BY `ServiceType` ASC");
								foreach ($resultC as $rowDepC) {
								?>
								<option value="<?php echo $rowDepC["ID"];?>"><?php echo $rowDepC["ServiceType"];?></option>
								<?php		
								}
								?>	
							</select>
						</div>
						<div class="mb-3">
							<label for="date" class="form-label">Date</label>
							<input type="date" class="form-control" id="date" required>
						</div>
						<div class="mb-3">
							<label for="vehicleType" class="form-label">Vehicle Type</label>
							<select id="vehicleType" name="vehicleType" class="form-control">
							<option>Select Type</option>
							<?php 
							$resultA = $db_handle->runQuery("SELECT * FROM vehicletype ORDER BY ID");
							foreach ($resultA as $rowDepA) {
							?>
							<option value="<?php echo $rowDepA["VehicleType"];?>"><?php echo $rowDepA["VehicleType"];?></option>
							<?php		
							}
							?>	
							</select>
						</div>
						<div class="mb-3">
							<label for="time" class="form-label">Time</label>
							<input type="time" class="form-control" id="time" required>
						</div>
						<div class="mb-3">
							<label for="comments" class="form-label">Comments</label>
							<textarea class="form-control" id="comments" rows="3"></textarea>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="button" id="submitServiceForm" class="btn btn-primary">Submit</button>
				</div>
			</div>
		</div>
	</div>

		
			

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