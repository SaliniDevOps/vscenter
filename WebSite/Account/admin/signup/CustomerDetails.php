<?php 
//open connection
	require_once("../../../../Connection/dbconnecting.php");
	include('CustomerDetailsAJAX.php');
	
	$todayDate=date("Y-m-d");
	date_default_timezone_set("Asia/Colombo");
	$todayTime=date("h:i:sa");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
    <title>Service History Report</title>
    <style>
        
		.header{
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			padding: 30px 5%;
			background: #fff;
			display: flex;
			justify-content: space-between;
			align-items: center;
			z-index: 100;
			box-shadow: 0px 0px 5px #000;
		}
		.header .logo-container > .logo{
			font-family: "Orbitron", sans-serif;
			font-weight: bold;
			font-size: 24px;
			text-decoration: none;
			text-shadow: 2px 2px 1px #B9840A;
			color: #000;
		}

		.header .nav-container > .navbar a{
			font-size: 18px;
			text-decoration: none;
			font-weight: 500;
			color: #000;
			margin: 0 20px;
			transition: .3s;
		}

		.header .nav-container > .navbar a:hover,
		.header .nav-container > .navbar a.active{
			color: #B9840A;
		}

		.header .account-container > .account{
			padding: 8px 18px;
			background: #B9840A;
			border-radius: 5px;
			text-decoration: #000;
			color: #fff;
			box-shadow: 0px 0px 15px #fff;
			transition: .3s;
		}

		.header .account-container > .account:hover{
			background: #FFBC21; 
			box-shadow: 0px 0px 15px rgb(0, 0, 0, .2);
		}
		
		
		
		
		/*-----Costomer Details------*/
		body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 20px;
        }
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            background-color: white;
            border: 1px solid #ccc;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .section {
            margin-bottom: 40px;
        }
        .download-link {
            color: blue;
            text-decoration: underline;
            cursor: pointer;
        }
		
		
		
		
		
		
		
		
		.popup {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.5);
    align-items: center;
    justify-content: center;
}

/* Style for the popup content */
.popup-content {
    background-color: #fff;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 100%;
    max-width: 700px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    border-radius: 10px;
}

/* Style for the close button */
.close-button {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
}

.close-button:hover,
.close-button:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}







.popup {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        .popup-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close-button {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close-button:hover,
        .close-button:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .invoice-box {
            width: 100%;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
            border-collapse: collapse;
        }

        .invoice-box table, .invoice-box th, .invoice-box td {
            border: 1px solid #ddd;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }
		
		.fontcolor{
		color:black;	
		}	
    </style>
	
        
    
</head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
</head>
<body>
    <header class="header">
        <div class="logo-container">
            <a href="#" class="logo">AutoHub Service Center</a>
        </div>

        <div class="nav-container">
            <nav class="navbar">
                <a href="../../../Home/index.html" class="active">Home</a>
                <a href="../../../Booking/Booking.php">Book Online</a>
                <a href="../../../Home/index.html">Services</a>
                <a href="../../../Home/index.html">About Us</a>
            </nav>
        </div>

        <div class="account-container">
            <a href="../Account/admin/login/adminlogin.php" class="account"><i class="ri-account-box-fill"></i> Logout</a>
        </div>
    </header>
	
	<?php 
	
	$Name='';
	$Mobile='';
	$VehicleType='';
	$VehicleModel='';
	$VehicleNumber	='';
	$Email	='';
	$VehicleTypeID	='';
	$VehicleModels	='';
	$NIC	='';
	$email	='';
	
	if (isset($_GET['NIC'])) {
		$NIC = $_GET['NIC'];
	}if (isset($_GET['email'])) {
		$email = $_GET['email'];
	}
	
	$resultAC = $db_handle->runQuery("SELECT * FROM `customeraccounts` WHERE Email='$email'");  
	if(!empty($resultAC)){
		foreach ($resultAC as $r) {
			$Name=$r['Name'];
			$Mobile=$r['Mobile'];
			$VehicleTypeID=$r['VehicleType'];
			$VehicleModel=$r['VehicleModel'];
			$VehicleNumber	=$r['VehicleNumber'];
			$Email	=$r['Email'];
			$NIC	=$r['NIC'];
		
		}
		
	}
		
	$resultE = $db_handle->runQuery("SELECT VehicleType FROM `vehicletype` WHERE ID ='$VehicleTypeID'");  
	if(!empty($resultE)){
		foreach ($resultE as $r) {
			$VehicleType=$r['VehicleType'];
			
		}
		
	}
	
	$resultR = $db_handle->runQuery("SELECT VehicleModels FROM `vehiclemodels` WHERE ID ='$VehicleModel'");  
	if(!empty($resultR)){
		foreach ($resultR as $r) {
			$VehicleModels=$r['VehicleModels'];
			
		}
		
	}
	?>
	<!------- Customer Details ----------------->
	<div class="container">
        <h1>Service History Report</h1><br><br>
		
		<form id="customerDetailsForm" method="post" action="CustomerDetails.php">
			<!-- Hidden input to store NIC value -->
			<input type="text" id="NIC_T" name="NIC_T" hidden>
		</form>
		
        <div class="section">
            <h2><u>Customer Information</u></h2>
            <p><strong>Name:</strong><?php echo ' '.$Name;?> </p>
            <p><strong>Email:</strong><?php echo ' '.$Email;?> </p>
            <p><strong>Phone:</strong><?php echo ' '.$Mobile;?> </p>
            <p><strong>NIC:</strong><?php echo ' '.$NIC;?> </p>
        </div>
		
        <div class="section">
            <h2><u>Vehicle Information</u></h2>
            <p><strong>Vehicle Type:</strong> <?php echo ' '.$VehicleType;?></p>
            <p><strong>Vehicle Model:</strong>  <?php echo ' '.$VehicleModels;?></p>
            <p><strong>VehicleNumber</strong> <?php echo ' '.$VehicleNumber;?></p>
            <!--p><strong>VIN:</strong> 1HGCM82633A123456</p-->
        </div>
		
        <div class="section">
            <h2><u>Service History</u></h2><br>
            <table>
                <tr>
                    <th>Service Date</th>
                    <th>Service Type</th>
                    <th>Parts Replaced</th>
                    <th>Service Cost</th>
                    <th>#Invoice</th>
                </tr>
                
                <?php
					$AppoinmentID='';								
					$serviceTypesArray = [];						
					$SpareNameArray = [];						
					$serviceTypesString='';								
					$SpareNameArrayString='';								
					$Date='';								
					$SubTotal=0;								
					$queryA="SELECT customerappoinments.AppoinmentID , invoice.	Date, invoice.	SubTotal, invoice.	JobNumber,	invoice.InvoiceID
							FROM `customerappoinments`
							INNER JOIN invoice ON customerappoinments.AppoinmentID = invoice.JobNumber 
							WHERE customerappoinments.CustomerNIC='$NIC'";
					$resultA = $db_handle->runQuery($queryA); 
					$i=0;
					if($resultA instanceof mysqli_result && $resultA->num_rows > 0){
						foreach ($resultA as $r) {
							$AppoinmentID=$r['AppoinmentID'];
							$Date=$r['Date'];
							$SubTotal=$r['SubTotal'];
							$JobNumber=$r['JobNumber'];
							$InvoiceID=$r['InvoiceID'];
					
							if($i%2==0)
								$classname="evenRow";
							else
								$classname="oddRow";
							?>
							<tr id="show">
								<td><?php echo $Date;?></td>
								<?php
								
								$queryDA="SELECT appoinmentservicetype.ServiceTypeID ,servicetype.ServiceType
								FROM `appoinmentservicetype` 
								INNER JOIN servicetype ON servicetype.ID = appoinmentservicetype.ServiceTypeID
								WHERE appoinmentservicetype.AppoinmentID='$AppoinmentID'";
								$resultDA = $db_handle->runQuery($queryDA); 
								 if($resultDA instanceof mysqli_result && $resultDA->num_rows > 0){
									foreach ($resultDA as $r) {
										$serviceTypesArray[] = $r['ServiceType']; 
									}
								}
								$serviceTypesString = implode(', ', $serviceTypesArray);
								
								?>
								<td><?php echo $serviceTypesString;?></td>
								
								<?php
								
								$queryK="SELECT spareparts.SpareName 
								FROM `usedspareitems` 
								INNER JOIN spareparts ON spareparts.ID = usedspareitems.SpareItemID
								WHERE usedspareitems.AppoinmentID='$AppoinmentID'";
								$resultK = $db_handle->runQuery($queryK); 
								 if($resultK instanceof mysqli_result && $resultK->num_rows > 0){
									foreach ($resultK as $r) {
										$SpareNameArray[] = $r['SpareName']; 
									}
								}
								$SpareNameArrayString = implode(', ', $SpareNameArray);
								
								?>
								
								<td><?php echo $SpareNameArrayString;?></td>
								<td style="text-align:right;"><?php echo number_format($SubTotal,2);?></td>
								 <td>
								  <a class="download-link" href="#" data-jobnumber="<?php echo $JobNumber; ?>" data-invoicenumber="<?php echo $InvoiceID; ?>"> Invoice</a>
								</td>
								
							</tr>
							<?php
						}
						
					}else{
						?>
						<p><span style="color:red;"><b>No Service History Available!</b></span><p>
						<?php 
					}?>	
            </table>
        </div>
		
		
		<h3 style="color:brown;"><u>Appointments</u></h3><br>
		<?php 
		$queryV="SELECT * FROM `customerappoinments` WHERE CustomerNIC='$NIC' AND IsInvoice='0'";
		$resultV = $db_handle->runQuery($queryV); 
		if($resultV instanceof mysqli_result && $resultV->num_rows > 0){
			foreach ($resultV as $r) {
				$AppoinmentDate = $r['AppoinmentDate']; 
				$AppoinmentTime = $r['AppoinmentTime']; 
			}
			?>
			
			Date: <?php echo $AppoinmentDate;?><br><br>
			Time: <?php echo $AppoinmentTime;?><br>
			<?php 
		}else{
			echo "No Appointments Available.";
		}	
		
		
		
		?>
		<!----- POPUP ---->
	<div id="popup" class="popup">
        <div class="popup-content">
            <span class="close-button">&times;</span>
            <div class="invoice-box"><br><br>
                <h2 style="color:black;"><u>Invoice Details</u></h2><br>
                <div id="Display_POPUP"></div>
            </div>
        </div>
    </div>
		
		
		
		
		<script>
		document.addEventListener("DOMContentLoaded", function() {
		// Get the popup element
		var popup = document.getElementById("popup");

		// Get the link element
		var downloadLink = document.querySelector(".download-link");

		// Get the close button element
		var closeButton = document.querySelector(".close-button");

		// When the user clicks the download link, open the popup
		downloadLink.addEventListener("click", function(event) {
			event.preventDefault(); // Prevent the default link behavior
			popup.style.display = "flex";
		});

		// When the user clicks on the close button, close the popup
		closeButton.addEventListener("click", function() {
			popup.style.display = "none";
		});

		// When the user clicks anywhere outside of the popup content, close the popup
		window.addEventListener("click", function(event) {
			if (event.target === popup) {
				popup.style.display = "none";
			}
		});
	});
		</script>
        <!--div class="section">
            <h2>Service Reports</h2>
            <div class="report">
                <h3>Service Report: 2024-01-15</h3>
                <p><strong>Service Date:</strong> 2024-01-15</p>
                <p><strong>Service Type:</strong> Oil Change</p>
                <p><strong>Parts Replaced:</strong> Oil Filter, Engine Oil</p>
                <p><strong>Service Cost:</strong> $75.00</p>
                <p><strong>Service Center Location:</strong> Main Street Service Center, Springfield</p>
                <p><a class="download-link" href="#">Download Invoice</a></p>
            </div>
            <div class="report">
                <h3>Service Report: 2023-11-10</h3>
                <p><strong>Service Date:</strong> 2023-11-10</p>
                <p><strong>Service Type:</strong> Tire Rotation</p>
                <p><strong>Parts Replaced:</strong> None</p>
                <p><strong>Service Cost:</strong> $30.00</p>
                <p><strong>Service Center Location:</strong> Main Street Service Center, Springfield</p>
                <p><a class="download-link" href="#">Download Invoice</a></p>
            </div>
            <div class="report">
                <h3>Service Report: 2023-08-05</h3>
                <p><strong>Service Date:</strong> 2023-08-05</p>
                <p><strong>Service Type:</strong> Brake Service</p>
                <p><strong>Parts Replaced:</strong> Brake Pads</p>
                <p><strong>Service Cost:</strong> $150.00</p>
                <p><strong>Service Center Location:</strong> Elm Street Service Center, Springfield</p>
                <p><a class="download-link" href="#">Download Invoice</a></p>
            </div>
            <div class="report">
                <h3>Service Report: 2023-04-22</h3>
                <p><strong>Service Date:</strong> 2023-04-22</p>
                <p><strong>Service Type:</strong> Battery Replacement</p>
                <p><strong>Parts Replaced:</strong> Battery</p>
                <p><strong>Service Cost:</strong> $120.00</p>
                <p><strong>Service Center Location:</strong> Main Street Service Center, Springfield</p>
                <p><a class="download-link" href="#">Download Invoice</a></p>
            </div>
        </div-->

    


    
</body>
</html>
