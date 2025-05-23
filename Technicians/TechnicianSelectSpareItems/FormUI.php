<?php 
//open connection
	require_once("../../Connection/dbconnecting.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Select Spare Items</title>
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
  <link href="styles.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
  <style>
        .group-box {
            border: 2px solid #ccc;
            padding: 20px;
            margin: 20px 0;
            border-radius: 5px;
			background-color:#008080;
			color:white;
        }
        .group-box legend {
            font-weight: bold;
            padding: 0 10px;
        }
        .form-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .form-item label {
            margin-right: 10px;
        }
        .form-item input, .form-item select {
            padding: 5px;
            width: 200px;
        }
		.custom-width {
			width: 250px; /* Set the desired width */
		}
		.custom-width2 {
			width: 200px; /* Set the desired width */
		}
		
		
		/* View Requested Services Button */
		.button-22 {
		  align-items: center;
		  appearance: button;
		  background-color: black;
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
		  width:250px;
		}

		.button-22:active {
		  background-color: #006AE8;
		}

		.button-22:hover {
		  background-color: gray;
		}
		
		/* First Add Button Button */
		.button-21 {
		  align-items: center;
		  appearance: button;
		  background-color: #0a2929;
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
		  width:80px;
		  border: 1px solid #000; /* This sets the border width, style, and color */
			border-color: #cccc00; /* This explicitly sets the border color */
		}

		.button-21:active {
		  background-color: #006AE8;
		}

		.button-21:hover {
		  background-color: #4d4d00;
		}
		
		/* Model */
		
		.modal {
		display: none; /* Hidden by default */
		position: fixed; /* Stay in place */
		z-index: 1; /* Sit on top */
		left: 0;
		top: 0;
		width: 100%; /* Full width */
		height: 100%; /* Full height */
		overflow: auto; /* Enable scroll if needed */
		background-color: rgb(0,0,0); /* Fallback color */
		background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
	}

	/* Modal Content/Box */
	.modal-content {
		background-color: #fefefe;
		margin: 5% auto; /* 15% from the top and centered */
		padding: 20px;
		border: 1px solid #888;
		width: 50%; /* Could be more or less, depending on screen size */
	}

	/* The Close Button */
	.close {
		color: #aaa;
		float: right;
		font-size: 28px;
		font-weight: bold;
		 right: 10px;
		top: 10px;
	}

	.close:hover,
	.close:focus {
		color: black;
		text-decoration: none;
		cursor: pointer;
	}
	
	
	/* The Card */
	.card {
		display: none; /* Hidden by default */
		position: relative;
		width: 95%; /* Adjust as needed */
		margin: 20px auto; /* Center it horizontally */
		background-color: #fefefe;
		border: 1px solid #ddd;
		border-radius: 4px;
		box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
	}

	/* Card Content */
	.card-content {
		padding: 20px;
		position: relative;
	}

	/* The Close Button */
	.close {
		color: #aaa;
		font-size: 24px;
		font-weight: bold;
		position: absolute;
		right: 10px;
		top: 10px;
		cursor: pointer;
	}

	.close:hover,
	.close:focus {
		color: red;
		text-decoration: none;
	}
	
	
	/* suggesions */
	.suggestionsBox1 {
		position: absolute;
		z-index: 10;
		background-color: #fff;
		border: 1px solid #2d8f9b;
		display: none;
		width:220px;
		margin-left:5px;
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
  include('../../include/headerTechnicians.php');
  include('../../include/sidebarTechnicians.php');
  include('FormAjax.php');
  ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Select Spare Parts</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Select Spare Parts</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
	
	
	
	
	 <div class="alertSave1" id="Save_AlertCSS" style="display:none"></div>
	<div class="alertWarning" id="Warning_AlertCSS" style="display:none"></div>
	
	
	
	
	
	
	
	
	
	
	

	
	<section class="section" >
        <div class="container" >
            <fieldset class="group-box" style="background-color:#004d00;"> <legend>Select Spare Parts</legend>
				<form id="form1" name="form1" method="post" autocomplete="off" action="">
					<div class="d-flex justify-content-between align-items-center" >
						
						<li style="margin-right: 100px; list-style-type: none;"></li>
						
						<div class="col-md-12 main-content d-flex align-items-center">
					
							<div id="ItemCodeSuggets" ></div>
							<div id="HiddenIDLoad" ></div>
							
							
							 <!--li style="display:flex; align-items: center; width:500px; margin:1px; padding:1px;">
								<ul class="form-style-6" style="display:flex; align-items: center; list-style-type:none; padding:0;">
									
									

									
								</ul>
							</li-->
							<input type="text" id="Hidden_SpareItemID"  name="Hidden_SpareItemID"   hidden >
							<div class="form-group d-flex align-items-center mr-4" style="margin-right: 20px;">
								<div>
										<label>&nbsp;Job Number&nbsp;</label>
										<select id="jobNumber" name="jobNumber" class="form-control ">
											<option value="">Select Number</option>
											<?php 
											$query = "SELECT customerappoinments.AppoinmentID AS JobNumber, techniciansassigned.Status
																		FROM customerappoinments
																		LEFT JOIN techniciansassigned ON techniciansassigned.JobNumber = customerappoinments.AppoinmentID
																		WHERE techniciansassigned.Status = 0
																		   OR techniciansassigned.Status IS NULL
																		   GROUP BY customerappoinments.AppoinmentID";
											$result = $db_handle->runQuery($query);
											foreach ($result as $rowDep1) {
												?>
												<option value="<?php echo $rowDep1["JobNumber"];?>"><?php echo $rowDep1["JobNumber"];?></option>
												<?php		
											}
											?>
										</select>
									
									</div>
							</div>
							<div class="form-group d-flex align-items-center mr-4" style="margin-right: 20px;">
								<div>
								<label for="ItemCode">&nbsp;Select Item Code</label>
								<input type="text" id="HiddenID" hidden name="HiddenID"  class="form-control" style="width: 250;"  >
								<input type="text" id="ItemCode" name="ItemCode"  class="form-control" style="width: 250;">
								<div class="suggestionsBox1" id="suggesstions1"></div>
								<div style="display:none; color:red;" class="alert2" ></div>
								</div>
							</div>

							<div class="form-group d-flex align-items-center mr-4" style="margin-right: 20px;">
								<div>
								<label for="ItemName">&nbsp;Select Item Name</label>
								<input type="text" id="ItemName" name="ItemName"  class="form-control" style="width: 250;">
								</div>
							</div>
							<div class="form-group d-flex align-items-center mr-4" style="margin-right: 20px;">
								<div>
								<label for="QTY">&nbsp;QTY</label>
								<input type="text" id="QTY" name="QTY"  class="form-control" style="width: 100px;" onkeyup="CheckingQTY();">
								<div style="display:none; color:red;" class="alert3" ></div>
								</div>
							</div>
							<div class="form-group d-flex align-items-center mr-4" style="margin-right: 20px;">
								<div>
								<label for="QTY">&nbsp;Ava.QTY</label>
								<input type="text" id="availableQty" name="availableQty" class="form-control" style="width: 60px;" disabled>
								
								</div>
							</div>
							<div><br>
							<button type="button" class="button-21" id="Add_Button_SparePart" onclick="preventScroll(event)">Add</button>
							</div>
						</div>
					</div>
					<script>
					
						function CheckingQTY() {
							
							var QTY  = document.getElementById('QTY').value;
							var availableQty = document.getElementById('availableQty').value;
						
							QTY=parseFloat(QTY);
							availableQty=parseFloat(availableQty);
							if(isNaN(QTY)){QTY=0;}
							if(isNaN(availableQty)){availableQty=0;}
							
							if(availableQty<QTY){
								document.getElementById('QTY').value="";
							}	
							
							
							
							
						}
						
							
						
					</script>
					<script>
						function preventScroll(event) {
							event.preventDefault();
						}
					</script>
					
					<div id="Adding_Details"></div>
					<div id="displaydelete"></div>
					<div id="displaydeleteP"></div>
					<div id="Row_ID_update"></div>
					<div id="displaydeleteSpare"></div>
					<div id="Insert_ServiceType"></div>
										
					<div class="textalertAC" style="color:red; font-weight:bold;"  ></div>
					<div class="alertWarning" id="Warning_AlertCSS" style="display:none"></div>
					
						<div id="Insert_Data">
							<div class="row">
								
									<div class="card-body" >
										<div class="container" >
										
												<div id="LoadDetails">
												
												
													<table class="table table-bordered" style="max-width: 1000px; margin: auto;">
														<!--table class="table table-bordered" style="max-width: 500px; margin-right: auto;"-->
														<thead>
															<tr>
																<th scope="col" class="center-align" style="background-color: #204060; color: white;">Delete</th>
																<th scope="col" class="center-align" style="background-color: #204060; color: white;">Edit</th>
																<th scope="col" class="center-align" style="background-color: #204060; color: white;">Job Number</th>
																<th scope="col" class="center-align" style="background-color: #204060; color: white;">Spare Item Code</th>
																<th scope="col" class="center-align" style="background-color: #204060; color: white;">Spare Item Name</th>
																<th scope="col" class="center-align" style="background-color: #204060; color: white;">QTY</th>
															</tr>
														</thead>
														<tbody>
															<tr id="show" style="height:35px;">
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
															</tr><tr id="show" style="height:35px;">
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
															</tr><tr id="show" style="height:35px;">
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
															</tr>
															<tr id="show" style="height:35px;">
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
															</tr>
														</tbody>
													</table>
											
											</div>
										</div>
									</div>
								</div>
							</div>
						
					</div>	
				</form>
			</fieldset>
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

<script>
$(document).ready(function() {
    $('#openCardLink').on('click', function(e) {
        e.preventDefault();
        $('#detailsCard').show();
    });

    // Close the card when the user clicks on <span> (x)
    $(document).on('click', '.close', function() {
        $('#detailsCard').hide();
    });
});
</script>


	