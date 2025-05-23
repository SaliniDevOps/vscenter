

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
  
 <style>
        .popup-overlay {
            display: none;
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }
        .popup {
            display: none;
            position: fixed;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            border: 1px solid #204060;
            padding: 20px;
            background-color: white;
            z-index: 1000;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
            border-radius: 8px;
            max-width: 400px;
            width: 90%;
        }
        .close-btn {
            float: right;
            cursor: pointer;
            color: #204060;
            font-size: 20px;
        }
        .popup form div {
            margin-bottom: 15px;
        }
        .popup form label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
        .popup form input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        .popup form button {
            padding: 10px 20px;
            background-color: #204060;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .popup form button:hover {
            background-color: #16334c;
        }
    </style>
  
  
  

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
	
	
	.textalert {
            color: red;
            font-weight: bold;
            margin-left: 60px; /* Match the left margin of the labels */
        }
        .form-control {
            display: block;
        }
  
  </style>
<body>

	<?php 
	
	include('../../include/header.php');
	include('../../include/sidebar.php');
	?>

	<main id="main" class="main">

    <div class="pagetitle">
      <h1>Technicians Registration</h1>
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
			<div class="col-lg-11">
				<div class="row">
					<section class="section">
						<div class="row">
							<div class="col-md-12">
								<div class="card">
								
									<div class="card-body">
										<form id="form1" name="form1" method="post" autocomplete="off" action="">
											<br>
											<div class="d-flex justify-content-between align-items-center">
												<div class="col-md-12 main-content d-flex align-items-center">
													<label for="NIC" class="col-form-label" style="margin-left:60px;">NIC</label>
													<div style="width: 230px; margin-left:10px;">
														<input type="text" id="NIC" class="form-control">
														<div class="textalert1 textalert"></div>
													</div>

													<input type="text" id="HiddenID" hidden>

													<label for="Name" class="col-form-label" style="margin-left:60px;">Name &nbsp;</label>
													<div style="width: 230px;">
														<input type="text" id="Name" class="form-control">
														<div class="textalert2 textalert"></div>
													</div>

													<label for="Address" class="col-form-label" style="margin-left:60px;">Address &nbsp;</label>
													<div style="width: 300px;">
														<input type="text" id="Address" class="form-control">
														<div class="textalert3 textalert"></div>
													</div>
												</div>
											</div>
											<br>
											<div class="d-flex justify-content-between align-items-center">
												<div class="col-md-12 main-content d-flex align-items-center">
													<label for="Mobile" class="col-form-label" style="margin-left:35px;">Mobile </label>
													<div style="width: 230px; margin-left:10px;">
														<input type="text" id="Mobile" class="form-control">
														<div class="textalert4 textalert"></div>
													</div>

													<label for="Mail" class="col-form-label" style="margin-left:60px;">E-Mail</label>
													<div style="width: 235px;">
														<input type="text" id="Mail" class="form-control">
														<div class="textalert5 textalert"></div>
													</div>

													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary ml-3" style="margin-left:115px;" id="Add_Button">Add</button>
												</div>
											</div>
										</form>
										
										<div id="displaydelete"></div>
										<div id="Row_ID_update"></div>
										
										 <div class="alertSave" id="Save_AlertCSS" style="display:none"></div>
										 <div class="alertWarning" id="Warning_AlertCSS" style="display:none"></div>
										<div id="Insert_ServiceType">
										<div id="Insert_Data">
											<div class="row">
												<div class="card-body">
													
													<table class="table table-bordered" style="max-width: 1200px; margin: auto;">
														<!--table class="table table-bordered" style="max-width: 500px; margin-right: auto;"-->
														<thead>
															<tr>
																<th scope="col" class="center-align" style="background-color: #204060; color: white;">Delete</th>
																<th scope="col" class="center-align" style="background-color: #204060; color: white;">Edit</th>
																<th scope="col" class="center-align" style="background-color: #204060; color: white;">NIC</th>
																<th scope="col" class="center-align" style="background-color: #204060; color: white;">Name</th>
																<th scope="col" class="center-align" style="background-color: #204060; color: white;">Address</th>
																<th scope="col" class="center-align" style="background-color: #204060; color: white;">Mobile</th>
																<th scope="col" class="center-align" style="background-color: #204060; color: white;">E-Mail</th>
																<th scope="col" class="center-align" style="background-color: #204060; color: white;">Account Details</th>
															</tr>
														</thead>
														<tbody>
														<?php
														$queryA="SELECT * FROM `technicians` ORDER BY `ID`";
														$resultA = $db_handle->runQuery($queryA); 
														$i=0;
														if(!empty($resultA)){
															foreach ($resultA as $r) {
																$ID=$r['ID'];
																$Username=$r['Username'];
																$Password=$r['Password'];
																if($i%2==0)
																	$classname="evenRow";
																else
																	$classname="oddRow";
																?>
																<tr id="show">
																	<td style="width:20px;"><a href="#" id="<?php echo $ID; ?>" class="delete" title="Delete"><img width="20" height="20" src="../../images/delete.png"  title="Delete" /></a></td>
																	<td style="width:20px;"><a href="#" id="<?php echo $ID; ?>" class="Update" title="Update"><img width="20" height="20" src="../../images/edit.png"  title="Update" /></a></td>
																	<td style="width:120px;"><?php echo $r['NIC'];?></td>
																	<td style="width:250px;"><?php echo $r['Name'];?></td>
																	<td style="width:250px;"><?php echo $r['Address'];?></td>
																	<td style="width:100px;"><?php echo $r['Mobile1'];?></td>
																	<td style="width:200px;"><?php echo $r['Email'];?></td>
																	<td style="width:20px;"> <a href="#" data-id="<?php echo $ID; ?>" data-username="<?php echo $Username; ?>" data-password="<?php echo $Password; ?>" class="AccountDetails" title="AccountDetails">Account</a></td>
																	
																</tr>
																<?php
															}
														}	
														?>
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
	
	
	<!-- Popup Structure -->
     <div class="popup-overlay"></div>
    <div class="popup">
		
        <span class="close-btn">&times;</span>
        <form id="accountForm">
            <input type="hidden" id="techID" name="techID">
            <div Hidden>
                <label for="txtUserName">User Name</label>
                <input type="text" id="txtUserName" name="txtUserName" placeholder="Enter User Name" style="border: 1px solid black;">
				<div class="Atextalert1" id="Warning_AlertCSS" style="display:none"></div>
            </div>
            <div>
                <label for="txtPassword">Password</label>
                <input type="text" id="txtPassword" name="txtPassword" placeholder="Enter Password" style="border: 1px solid black;">
				<div class="Atextalert2" id="Warning_AlertCSS" style="display:none"></div>
            </div>
            <button type="button" id="AddAccountDetails" >Submit</button>
			<div id="Load_Credentials" ><div>
        </form>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".AccountDetails").on("click", function(e) {
                e.preventDefault();
                var techID = $(this).data("id");
                $("#techID").val(techID);
                $(".popup-overlay, .popup").show();
            });

            $(".close-btn, .popup-overlay").on("click", function() {
                $(".popup-overlay, .popup").hide();
            });
        });

       document.addEventListener('DOMContentLoaded', (event) => {
		document.querySelectorAll('.AccountDetails').forEach(item => {
        item.addEventListener('click', event => {
            event.preventDefault();
            let id = item.getAttribute('data-id');
            let username = item.getAttribute('data-username');
            let password = item.getAttribute('data-password');
			
			document.getElementById('txtUserName').value=username;
			document.getElementById('txtPassword').value=password;

            //alert("ID: " + id + "\nUsername: " + username + "\nPassword: " + password);
        });
    });
});
    </script>
	<script type="text/javascript">
	
	var accountID;
	

	$(document).on('click', '.AccountDetails', function() {
		accountID = $(this).data('id');
		
	});
	
	$("#AddAccountDetails").click(function() {
		
		var UserName = $("#txtUserName").val();
		var Password = $("#txtPassword").val();
		
		var dataString = 'Insert_UserName='+ UserName + '&Password='+ Password+ '&accountID='+ accountID; 
		//alert(dataString)
		
		// if(UserName==''){
				// $(".Atextalert1").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter the username');
				// $(".Atextalert1").fadeIn().delay(2000).fadeOut();
				// document.getElementById('txtUserName').focus(); 
				
		// }else 
			
		if (Password==''){
			$(".Atextalert2").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter the password');
			$(".Atextalert2").fadeIn().delay(2000).fadeOut();
			document.getElementById('txtPassword').focus(); 
			
		// }else if (!validatePassword(Password)) {
			// $(".Atextalert2").fadeIn(100).html('<span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>Password must be at least 8 characters long and contain at least one letter and one number');
			// $(".Atextalert2").fadeIn().delay(2000).fadeOut();
			// document.getElementById('txtPassword').focus();
		}
		
		
		else{
			
			$.ajax({
				type: "POST",
				url: "FormProcess.php",
				data: dataString,
				cache: false,
				success: function(html){

					$("#Load_Credentials").html(html);
					
					var Username_t = $("#Username_t").val();
					var Passworde_t = $("#Passworde_t").val();
							 
					document.getElementById('txtUserName').value=Username_t;
					document.getElementById('txtPassword').value=Passworde_t;
					
				}
			});
		}	
		
		return false; // Optional: Use this to prevent default action if necessary
	});
	
	
	
	function validatePassword(password) {
		var re = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
		return re.test(password);
	}	
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
	<script src="../assets/js/main.js"></script>

</body>

</html>