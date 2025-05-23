<?php 
require_once("../../Connection/dbconnecting.php");
	$today=date("Y-m-d");
  ?>
<!DOCTYPE html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dash Board </title>
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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	<style>
	
	</style>
</head>

<body>

	<?php 
	
	include('../../include/header.php');
	include('../../include/sidebar.php');
	?>

	<main id="main" class="main">

    <div class="pagetitle">
      <h1>Dash Board</h1>
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

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>
				<!-- Number of appoinments -->
				<?php 
				$countAppoinmnet=0;
				$resultA = $db_handle->runQuery("SELECT COUNT(*) as countAppoinmnet FROM customerappoinments WHERE AppoinmentDate ='$today'"); 
				if($resultA instanceof mysqli_result && $resultA->num_rows > 0){
					if(!empty($resultA)){
						foreach ($resultA as $r) {
							$countAppoinmnet=$r['countAppoinmnet'];
						}
					}	
								
				}
				?>
                <div class="card-body">
					<h5 class="card-title">Total Appoinments <span>| Today</span></h5>

					<div class="d-flex align-items-center">
						<!--div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
						  <i class="bi bi-cart"></i>
						</div-->
						<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
							<i class="fas fa-calendar-alt"></i>
						</div>
						<div class="ps-3">
						  <h6><?php echo $countAppoinmnet;?></h6>
						  <!--span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span-->
						</div>
					</div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Number of appoinments   INNER JOIN customerappoinments ON customerappoinments.AppoinmentID =  invoice.JobNumber           -->
			<?php 
			$CompletedOrders=0;
			$resultB = $db_handle->runQuery("SELECT COUNT(*) as CompletedOrders 
			FROM invoice 
			WHERE invoice.`Date` ='$today'"); 
			if($resultB instanceof mysqli_result && $resultB->num_rows > 0){
				if(!empty($resultB)){
					foreach ($resultB as $r) {
						$CompletedOrders=$r['CompletedOrders'];
					}
				}	
							
			}
			?>
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Completed Orders<span>| Today</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                       <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $CompletedOrders;?></h6>
                      <!--span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span-->

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Number of              -->
			<?php 
			$Pendingorders=0;
			$resultC = $db_handle->runQuery("SELECT COUNT(DISTINCT techniciansassigned.JobNumber) AS PendingOrders  
				FROM techniciansassigned 
				INNER JOIN customerappoinments ON customerappoinments.AppoinmentID = techniciansassigned.JobNumber 
				WHERE techniciansassigned.Status = '0'"); 
			if($resultC instanceof mysqli_result && $resultC->num_rows > 0){
				if(!empty($resultC)){
					foreach ($resultC as $r) {
						$Pendingorders=$r['PendingOrders'];
					}
				}	
							
			}
			?>
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Pending Orders <span>| Today</span></h5>

                  <div class="d-flex align-items-center">
                   <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
						<i class="fas fa-spinner"></i>
					</div>
                    <div class="ps-3">
                      <h6><?php echo $Pendingorders; ?></h6>
                      <!--span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span-->
	
                    </div>
                  </div>
<br>
                </div>
              </div>

            </div><!-- End Customers Card -->

           
            

            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title"> Work Orders <span>| Today</span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#Job Number</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Vehicle Number</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <!--tbody>
                      <tr>
                        <th scope="row"><a href="#">#2457</a></th>
                        <td>Brandon Jacob</td>
                        <td><a href="#" class="text-primary">At praesentium minu</a></td>
                        <td>$64</td>
                        <td><span class="badge bg-success">Approved</span></td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#">#2147</a></th>
                        <td>Bridie Kessler</td>
                        <td><a href="#" class="text-primary">Blanditiis dolor omnis similique</a></td>
                        <td>$47</td>
                        <td><span class="badge bg-warning">Pending</span></td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#">#2049</a></th>
                        <td>Ashleigh Langosh</td>
                        <td><a href="#" class="text-primary">At recusandae consectetur</a></td>
                        <td>$147</td>
                        <td><span class="badge bg-success">Approved</span></td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#">#2644</a></th>
                        <td>Angus Grady</td>
                        <td><a href="#" class="text-primar">Ut voluptatem id earum et</a></td>
                        <td>$67</td>
                        <td><span class="badge bg-danger">Rejected</span></td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#">#2644</a></th>
                        <td>Raheem Lehner</td>
                        <td><a href="#" class="text-primary">Sunt similique distinctio</a></td>
                        <td>$165</td>
                        <td><span class="badge bg-success">Approved</span></td>
                      </tr>
                    </tbody-->
					
					
					<tbody>
					<?php
				
					$queryA="SELECT customerappoinments.*,techniciansassigned.Status 
					FROM `customerappoinments` 
					LEFT JOIN techniciansassigned ON `techniciansassigned`.`JobNumber` = `customerappoinments`.`AppoinmentID`
					WHERE customerappoinments.AppoinmentDate='$today'
					GROUP BY customerappoinments.`AppoinmentID` ORDER BY customerappoinments.`AppoinmentID` DESC ";
					$resultA = $db_handle->runQuery($queryA); 
					$i=0;
					$Status=0;
					$VehicleType='';
					if(!empty($resultA)){
						foreach ($resultA as $r) {
							$ID=$r['AppoinmentID'];
							$AppoinmentID=$r['AppoinmentID'];
							$Name=$r['Name'];
							$Status=$r['Status'];
							$VehicleType=$r['VehicleType'];
							$VehicleRegNo=$r['VehicleRegNo'];
							
							?>
								<tr>
								
								<td style=""><b><?php echo $AppoinmentID;?><b></td>
								<td style=""><?php echo $Name;?></td>
								<td style=""><?php echo $VehicleRegNo;?></td>
								<?php 
								if ($Status=='0')
								{
								?>
									<td><span class="badge bg-warning">Pending</span></td>
								<?php 
								}else if ($Status=='1'){
								?>
									<td><span class="badge bg-success">Finish</span></td>
								<?php 
									
								}else{
								?>
									<td><span class="badge bg-danger">Not Checked</span></td>
								<?php 
								}
								?>
								
							  </tr>
							<?php 
							
						}
					}
					
					?>	
						</tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->

            <!-- Top Selling -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body pb-0">
                  <h5 class="card-title">Invoiced <span>| Today</span></h5>

                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">#Job Number</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Vehicle Number</th>
                        <th scope="col">Amount</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php
				
					$queryA="SELECT invoice.SubTotal,invoice.JobNumber,customerappoinments.VehicleRegNo,customerappoinments.Name
						FROM `invoice` 
						INNER JOIN customerappoinments ON `invoice`.`JobNumber` = `customerappoinments`.`AppoinmentID`
						WHERE customerappoinments.AppoinmentDate='$today'";
					$resultA = $db_handle->runQuery($queryA); 
					$i=0;
					$Status=0;
					$VehicleType='';
					if(!empty($resultA)){
						foreach ($resultA as $r) {
							$AppoinmentID=$r['JobNumber'];
							$Name=$r['Name'];
							$Amount=$r['SubTotal'];
							$VehicleRegNo=$r['VehicleRegNo'];
							
							?>
							<tr>
								<td style=""><b><?php echo $AppoinmentID;?><b></td>
								<td style=""><?php echo $Name;?></td>
								<td style=""><?php echo $VehicleRegNo;?></td>
								<td style=""><?php echo $Amount;?></td>
							 </tr>
							<?php 
							
						}
					}
					
					?>	
						</tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Top Selling -->
			
			
			
			<div class="col-12">
              <div class="card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>
				
                <div class="card-body">
                  <h5 class="card-title">Revenue <span> | Month </span></h5>

                  <!-- Line Chart -->
                  <div id="reportsChart"></div>

    			  
					<script>
					$(document).ready(function() {
    $.ajax({
        url: 'FormProcess.php', // Path to your PHP script
        method: 'GET',
        dataType: 'json', // Ensure expecting JSON data
        success: function(response) {
            console.log("Raw response:", response); // Debug output

            try {
                const data = response.data;
                const categories = response.categories;

                const options = {
                    series: [{
                        name: 'Revenue',
                        data: data
                    }],
                    chart: {
                        height: 350,
                        type: 'line',
                        toolbar: {
                            show: false
                        }
                    },
                    markers: {
                        size: 4
                    },
                    colors: ['red'],
                    fill: {
                        type: "gradient",
                        gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.3,
                            opacityTo: 0.4,
                            stops: [0, 90, 100]
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        curve: 'smooth',
                        width: 2
                    },
                    xaxis: {
                        type: 'datetime',
                        categories: categories
                    },
                    tooltip: {
                        x: {
                            format: 'dd/MM/yy'
                        }
                    }
                };

                const chart = new ApexCharts(document.querySelector("#reportsChart"), options);
                chart.render();
            } catch (error) {
                console.error("Error parsing JSON response: ", error);
            }
        },
        error: function(xhr, status, error) {
            console.error("AJAX error:", status, error);
        }
    });
});
</script>
                </div>

            </div>
		</div><!-- End Reports -->
			
			
			
			
			
			
			
			
			

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Recent Activity -->
          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>
			<style>
        .dashboard-button {
            display: inline-block;
            width: 100%;
            max-width: 400px;
            margin: 10px auto;
            padding: 5px 15px;
            font-size: 17px;
            font-weight: bold;
            text-align: center;
            border: 2px solid black;
            border-radius: 8px;
            color: white;
            text-decoration: none;
            transition: background-color 0.3s, color 0.3s;
			background-color:#006666;
        }
        .dashboard-button:hover {
            background-color: #009999;
            color: #fff;
        }
    </style>
            <div class="card-body">
				<h5 class="card-title">Main Activities </h5>
				<div class="container">
					<div class="dashboard-buttons">
						<a href="../AdminViewAppoinments/FormUI.php" class="dashboard-button">View Appointments</a><br>
						<a href="../AdminAssignWorks/FormUI.php" class="dashboard-button">Assign Orders to Technicians</a><br>
						<a href="../AdminInvoice/FormUI.php" class="dashboard-button">Invoice</a><br>
						<a href="../AdminOrderStock/FormUI.php" class="dashboard-button">Order Stock</a><br>
						<a href="../AdminViewStock/FormUI.php" class="dashboard-button">View Stock</a><br>
					</div>
				</div>
			</div>
			<br>
			<div class="card-body">
				<h5 class="card-title">Zero Stocks <?php echo '0> ';?></h5>
				  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">Item Code</th>
                        <th scope="col">Item Name</th>
                      </tr>
                    </thead>
					<tbody>
					<?php
					$ItemCode='';
					$SpareName='';
					$queryS="SELECT stock.SpareID,spareparts.ItemCode,spareparts.SpareName
					FROM `stock` 
					INNER JOIN spareparts ON spareparts.`ID` = `stock`.`SpareID`
					WHERE stock.AvalQTY ='0' ";
					$queryS = $db_handle->runQuery($queryS); 
					$i=0;
					$Status=0;
					$VehicleType='';
					if(!empty($queryS)){
						foreach ($queryS as $r) {
							$ItemCode=$r['ItemCode'];
							$SpareName=$r['SpareName'];
							
							
							?>
								<tr>
								
								<td style=""><b><?php echo $ItemCode;?><b></td>
								<td style=""><?php echo $SpareName;?></td>
								
								
							  </tr>
							<?php 
							
						}
					}
					
					?>	
						</tbody>
                  </table>
			</div>
				<!--div class="activity">

					<div class="activity-item d-flex">
					  <div class="activite-label">32 min</div>
					  <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
					  <div class="activity-content">
						Quia quae rerum <a href="#" class="fw-bold text-dark">explicabo officiis</a> beatae
					  </div>
					</div><!-- End activity item-->

					<!--div class="activity-item d-flex">
					  <div class="activite-label">56 min</div>
					  <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
					  <div class="activity-content">
						Voluptatem blanditiis blanditiis eveniet
					  </div>
					</div><!-- End activity item-->

					<!--div class="activity-item d-flex">
					  <div class="activite-label">2 hrs</div>
					  <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
					  <div class="activity-content">
						Voluptates corrupti molestias voluptatem
					  </div>
					</div><!-- End activity item-->

					<!--div class="activity-item d-flex">
					  <div class="activite-label">1 day</div>
					  <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
					  <div class="activity-content">
						Tempore autem saepe <a href="#" class="fw-bold text-dark">occaecati voluptatem</a> tempore
					  </div>
					</div><!-- End activity item-->

					<!--div class="activity-item d-flex">
					  <div class="activite-label">2 days</div>
					  <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
					  <div class="activity-content">
						Est sit eum reiciendis exercitationem
					  </div>
					</div><!-- End activity item-->

					<!--div class="activity-item d-flex">
					  <div class="activite-label">4 weeks</div>
					  <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
					  <div class="activity-content">
						Dicta dolorem harum nulla eius. Ut quidem quidem sit quas
					  </div>
					</div><!-- End activity item-->

				<!--/div-->

            </div>
          </div><!-- End Recent Activity -->

          

         

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