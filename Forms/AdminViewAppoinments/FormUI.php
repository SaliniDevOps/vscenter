<?php 
	$todayDate=date("Y-m-d");
	date_default_timezone_set("Asia/Colombo");
	$todayTime=date("H:i:s");
	
	include('FormAjax.php');

	//open connection
	require_once("../../Connection/dbconnecting.php");
?>
	

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>View Appointments</title>
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
    .form-inline {
      display: flex;
      align-items: center;
    }
    .form-inline label {
      margin-right: 10px;
    }
    .form-inline input,
    .form-inline select {
      margin-right: 10px;
    }
    .table-container {
      margin-top: 20px;
    }
   
</style>
</head>

<body>

  <?php 
  include('../../include/header.php');
  include('../../include/sidebar.php');
  ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1 style="font-weight: 900;">View Appointments</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">View Appointments</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
	<div id="response"></div>
	
    <section class="section">
      <div class="container">
	 
        <form class="form-inline" method="post" action="" style="margin-left:150px;">
          <label for="fromDate" class="col-form-label col-md-1">From Date</label>
          <input type="date" id="fromDate" name="fromDate" class="form-control" value="<?php echo $todayDate;?>" style="width: 200px;">
          <label for="toDate" class="col-form-label col-md-1">To Date</label>
          <input type="date" id="toDate" name="toDate" class="form-control" value="<?php echo $todayDate;?>" style="width: 200px;">
          <button type="submit" id="searchButton" class="btn btn-primary ">Search</button>
        </form>

        <div class="table-container">
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
			
			
			
			/* Modal container */
			 
			.modal {
			  display: none; /* Hidden by default */
			  position: fixed; /* Stay in place */
			  z-index: 1; /* Sit on top */
			  left: 0;
			  top: 0;
			  width: 100%; /* Full width */
			  height: 100%; /* Full height */
			  overflow: auto; /* Enable scroll if needed */
			  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
			}

			/* Modal content */
			.modal-content {
			  background-color: #fff;
			  margin: 5% auto; /* Center the modal */
			  padding: 20px;
			  border: 1px solid #888;
			  border-radius: 10px;
			  width: 80%; /* Adjust the width as needed */
			  max-width: 600px; /* Max width for large screens */
			  box-shadow: 0 4px 8px rgba(0,0,0,0.2);
			}

			/* Close button */
			.close {
			   color: #aaa;
			  position: absolute;
			  top: 10px;
			  right: 20px;
			  font-size: 28px;
			  font-weight: bold;
			}

			.close:hover,
			.close:focus {
			  color: red;
			  text-decoration: none;
			  cursor: pointer;
			}

			/* Content styles */
			.modal-content p {
			  font-weight: bold;
			  margin-bottom: 5px;
			}

			.modal-content div {
			  margin-bottom: 15px;  
			}

			.modal-content .section-title {
			  font-size: 1.2em;
			  color: teal;
			  margin-bottom: 10px;
			  border-bottom: 2px solid teal;
			  padding-bottom: 5px;
			}

			.modal-content .info {
			  font-size: 1em;
			  color: #333;
			}
			
			.button-21 {
		  align-items: center;
		  appearance: button;
		  background-color: #006666;
		  border-radius: 8px;
		  border-style: none;
		  box-shadow: rgba(255, 255, 255, 0.26) 0 1px 2px inset;
		  box-sizing: border-box;
		  color: #fff;
		  cursor: pointer;
		  display: flex;
		  flex-direction: row;
		  flex-shrink: 0;
		  font-family: "RM Neue",sans-serif;
		  font-size: 100%;
		  line-height: 1.15;
		  margin: 0;
		  padding: 10px 21px;
		  text-align: center;
		  text-transform: none;
		  transition: color .13s ease-in-out,background .13s ease-in-out,opacity .13s ease-in-out,box-shadow .13s ease-in-out;
		  user-select: none;
		  -webkit-user-select: none;
		  touch-action: manipulation;
		  width:92px;
		  border: 1px solid #000; /* This sets the border width, style, and color */
			border-color: #cccc00; /* This explicitly sets the border color */
		}

		.button-21:active {
		  background-color: #006AE8;
		}

		.button-21:hover {
		  background-color: #4d4d00;
		}
		</style>

		<body>
		<div id="SerchBt">
        <table>
            <thead>
              <tr>
                <th>Job Number</th>
                <th>Customer Name</th>
                <th>Vehicle Type</th>
                <th>Date</th>
                <th>Time</th>
                <th>More Details</th>
                <th>Status</th>
              </tr>
            </thead>
			<tbody>
				<?php
			
				$queryA="SELECT * FROM `customerappoinments` ORDER BY `AppoinmentID` DESC";
				$resultA = $db_handle->runQuery($queryA); 
				$i=0;
				$Status=0;
				$VehicleType='';
				if(!empty($resultA)){
					foreach ($resultA as $r) {
						$ID=$r['AppoinmentID'];
						$Status=$r['Status'];
						$VehicleType=$r['VehicleType'];
						
						if($i%2==0)
							$classname="evenRow";
						else
							$classname="oddRow";
						?>
						<tr id="show">
						<td ><?php echo $r['AppoinmentID'];?></td>
						<td><?php echo $r['Name'];?></td>
						<?php 
						$resultB = $db_handle->runQuery("SELECT * FROM `vehicletype` WHERE `ID`='$VehicleType'"); 
						if(!empty($resultB)){
							foreach ($resultB as $rB) {
								?>
								<td><?php echo $rB['VehicleType'];?></td>
								<?php 
							}
						}
						?>	
						<td><?php echo $r['AppoinmentDate'];?></td>
						<td><?php echo $r['AppoinmentTime'];?></td>
						<td>
							<a href="#" id="more-details" data-id="<?php echo $r['AppoinmentID']; ?>" data-name="<?php echo $r['Name']; ?>" class="more-details-link" style="color:#e6e600;">
								<u>More Details</u>
							</a>
						</td>
						<?php
						
						if($Status==0){
							?>
							
							<td><a href="#" class="confirm-link" data-id="<?php echo $r['AppoinmentID']; ?>" style="color:red;">Confirm</a></td>
							<?php 
						}else{
							?>
							<td ><a href="#" id="" class="" style="color:#00ff00;">Confirmed</a></td>
							<?php
						}
						?>	
						
						</tr>
						<?php
					}
					
				}	?>	
			</tbody>
        </table>
		</div>
    </div>
    </div>
    </section>
	
	<div id="detailsModal" class="modal" style="display: none;">
		<div class="modal-content">
			<span class="close">&times;</span>
			<span class="close">&times;</span><br>
			<h5 style="background-color: teal;color: white; text-align: center;padding: 10px;border-radius: 5px;">Appoinment Summary</h5>
			<div id="modalContent"></div>
		</div>
	</div>


	
	<script>
	
	  
	  document.addEventListener('DOMContentLoaded', function () {
      // Get the modal
      var modal = document.getElementById("myModal");

      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close")[0];

      // Function to show the modal with the given data
      function showModal(data) {
        document.getElementById('modal-customer-name').textContent = data.name;
        
        modal.style.display = "block";
      }

      // Attach click event to all "More Details" links
      document.querySelectorAll('.more-details').forEach(function (link) {
        link.addEventListener('click', function (event) {
          event.preventDefault(); // Prevent the default action of the link
          var data = {
            id: link.getAttribute('data-id'),
            name: link.getAttribute('data-name'),
            
          };
          showModal(data);
        });
      });

      // When the user clicks on <span> (x), close the modal
      span.onclick = function () {
        modal.style.display = "none";
      }

      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function (event) {
        if (event.target == modal) {
          modal.style.display = "none";
        }
      }
    });
	</script>

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
