<?php 
//open connection
	require_once("../../Connection/dbconnecting.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Create New Job</title>
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

  <style>
    body {
    font-family: Arial, sans-serif;
  }
  .main-content {
    padding: 20px;
  }
  .pagetitle {
    margin-bottom: 20px;
  }
  .section {
    background-color: #f8f9fa;
    padding: 20px;
    border-radius: 5px;
  }
  .breadcrumb {
    background: none;
    padding: 0;
  }
  .form-section {
    margin-bottom: 20px;
    padding: 15px;
    background-color: #ffffcc;
    border-radius: 5px;
  }
  .form-section h4 {
    background-color: #ffff99;
    padding: 10px;
    margin: -15px -15px 15px -15px;
    border-radius: 5px 5px 0 0;
  }
  .form-inline {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
  }
  .form-inline label {
    margin-right: 3px;
    margin-bottom: 10px;
    flex: 0 0 150px;
  }
  .form-inline input,
  .form-inline select {
    margin-right: 10px;
    margin-bottom: 10px;
    flex: 1;
  }
  .form-inline .btn {
    margin-top: 10px;
  }
  
   .form-section {
    margin-bottom: 20px;
    padding: 15px;
    background-color: #009999;
    border-radius: 5px;
  }
  .form-section h4 {
    background-color: #ffff99;
    padding: 10px;
    margin: -15px -15px 15px -15px;
    border-radius: 5px 5px 0 0;
  }
  .form-grid {
    display: grid;
    grid-template-columns: repeat(5, 1fr); /* Adjust the number of columns if needed */
    gap: 10px;
  }
  .form-grid label {
    grid-column: span 1;
    text-align: left; /* Center-align labels if needed */
  }
  .form-grid input,
  .form-grid select {
    grid-column: span 1;
  }
  </style>
  
</head>

<body>

  <?php 
  include('../../include/header.php');
  include('../../include/sidebar.php');
  include('FormAjax.php');
  ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Create New Job</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Create New Job</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="container">
        <form class="form-inline" method="post" action="">
			
			<div class="form-section">
				
				<div class="form-grid">
					<label for="jobNumber"> Job Number</label>
					<label for="customerNIC">Customer NIC</label>
					<label for="customerName">Customer Name</label>
					<label for="mobile">Mobile</label>
					<label for="email">E-mail</label>
				
					<select id="jobNumber" name="jobNumber" class="form-control">
						<option>Select Number=</option>
						<?php 
						$query = "SELECT `AppoinmentID` FROM `customerappoinments` WHERE Status='1'";
						$result = $db_handle->runQuery($query);
						foreach ($result as $rowDep1) {
							?>
							<option value="<?php echo $rowDep1["AppoinmentID"];?>"><?php echo $rowDep1["AppoinmentID"];?></option>
							<?php		
						}
						?>
					</select>
					<input type="text" id="customerNIC" name="customerNIC" class="form-control">
					<input type="text" id="customerName" name="customerName" class="form-control">
					<input type="text" id="mobile" name="mobile" class="form-control">
					<input type="email" id="email" name="email" class="form-control">
				</div>
			</div>
			
			<div id="LoadDetails"></div>
			<div class="form-section">
				<h4>Vehicle Details</h4>
				<div class="form-grid">
					<label for="vehicleType">Vehicle Type</label>
					<label for="modelType">Model Type</label>
					<label for="regNumber">Regi. Num.</label>
					<label for="chassisNumber">Chassis Number</label>
					<label for="fuelType">Fuel Type</label>
				
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
					<select id="modelType" name="modelType" class="form-control">
						<option>Select Model</option>
						<?php 
						$resultB= $db_handle->runQuery("SELECT * FROM vehiclemodels ORDER BY ID");
						foreach ($resultB as $rowDepB) {
						?>
						<option value="<?php echo $rowDepB["VehicleModels"];?>"><?php echo $rowDepB["VehicleModels"];?></option>
						<?php		
						}
						?>	
					</select>
					<input type="text" id="regNumber" name="regNumber" class="form-control">
					<input type="text" id="chassisNumber" name="chassisNumber" class="form-control">
					<select id="fuelType" name="fuelType" class="form-control">
						<option>Select Fuel</option>
						<?php 
						$resultC= $db_handle->runQuery("SELECT * FROM fueltype ORDER BY ID");
						foreach ($resultC as $rowDepC) {
						?>
						<option value="<?php echo $rowDepC["FuelType"];?>"><?php echo $rowDepC["FuelType"];?></option>
						<?php		
						}
						?>	
					</select>
				</div>
			  
				<div class="form-grid">
					<label for="engineNumber">Engine Number</label>
					<label for="regDate">Regi. Date</label>
					<label for="odometerRead">Odometer Read</label>
					<label for="color">Color</label>
					<label for="keyNumber">Key Number</label>
				  
					<input type="text" id="engineNumber" name="engineNumber" class="form-control">
					<input type="date" id="regDate" name="regDate" class="form-control">
					<input type="text" id="odometerRead" name="odometerRead" class="form-control">
					<input type="text" id="color" name="color" class="form-control">
					<input type="text" id="keyNumber" name="keyNumber" class="form-control">
				</div>
			</div>
			

			<div class="form-section">
				<h4>Service Types</h4>
				<div class="form-grid">
					<label for="serviceTypes">Select Service Types</label>
					<select id="serviceTypes" name="serviceTypes" class="form-control">
					  <option>Select Types</option>
					</select>
					<button type="button" class="btn btn-primary">Add</button>
					<div>
					  <input type="checkbox" id="fullService" name="fullService" value="fullService">
					  <label for="fullService">Full Service</label>
					</div>
					<div>
					  <input type="checkbox" id="airFilter" name="airFilter" value="airFilter">
					  <label for="airFilter">Air Filter</label>
					</div>
				</div>
			</div>

          <button type="submit" class="btn btn-primary">Assign Spare Parts</button>
          <button type="submit" class="btn btn-secondary">Save</button>
		  
        </form>
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
  <script src="../../assets/js/main.js"></script>

</body>
</html>
