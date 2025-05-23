<?php 
	//AJAX 
	include('BookingAjax.php');

	//open connection
	require_once("../../Connection/dbconnecting.php");
	
	$todayDate=date("Y-m-d");
	date_default_timezone_set("Asia/Colombo");
	$todayTime=date("H:i:s");
	
	
	$AppoinmentID_=0;
	$resultAC = $db_handle->runQuery("SELECT `AppoinmentID` FROM `customerappoinments` ORDER BY `AppoinmentID` ASC");  //WHERE appoinmentservicetype.`AppoinmentID` =''
	if(!empty($resultAC)){
		foreach ($resultAC as $r) {
			$AppoinmentID_=$r['AppoinmentID'];
		
		}
		
	}
	$AppoinmenID = $AppoinmentID_ + 1;
	
	$query = "DELETE FROM `appoinmentservicetype` WHERE `AppoinmentID`='$AppoinmenID'";
	$result = $db_handle->deleteQuery($query);
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Booking Service</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

	<script>
	
	
	</script>
</head>
<body>
    <div class="main-container">
        <div class="left-container">
            <div class="background-image"></div>

            <div class="main-title-content">
                <div class="logo-container">
                    <a href="#" class="logo">AutoHub Service Center</a>
                    <br>
                    <a href="#" class="logo">Service Booking</a>
                </div>
            </div>
        </div>
		<div id="Load_Details" ></div>
		<div id="Load_CusDetails" ></div>
        <div class="right-container">
            <div class="service-booking-content">
                <form action="">
					
                    <div class="title">
                        <h2>Booking Here</h2><br>
						<div class="textalert20" style="color:red; font-weight:bold;"  ></div>
                    </div>
					
					<input type="text" id="txtAppoinmentID" hidden Value="<?php echo $AppoinmenID;?>" >
                    <div class="inputbox">
                        <input type="text" placeholder="NIC" id="NIC" maxlength=10>
						<div class="textalert2" style="color:red; font-weight:bold;"  ></div>
                        <i class="ri-profile-line"></i>
                    </div>
					<div class="inputbox">
                        <div class="button-content" >
							<a id="NIC_ClickLoard" > Type NIC and press 'Enter'</a>
							
						
						</div>
                    </div>
					<div class="inputbox">
						 <input type="text" id="txtHiiddenID" hidden >
                        <input type="text" placeholder="Name" id="name" disabled>
						<div class="textalert1" style="color:red; font-weight:bold;"  ></div>
                        <i class="ri-file-user-fill"></i>
                    </div>
                    
                    <div class="inputbox" hidden>
                        <input type="email" placeholder="Email Address" id="email">
						<div class="textalert3" style="color:red; font-weight:bold;"  ></div>
                        <i class="ri-mail-fill"></i>
                    </div>
					<div class="inputbox">
                        <input type="tel" placeholder="Phone Number" maxlength=10 id="phone" disabled>
						<div class="textalert4" style="color:red; font-weight:bold;"  ></div>
                        <i class="ri-phone-fill"></i>
					</div>
					
					<div class="inputbox">
                       
                            <select id="vehicleType" name="vehicleType" disabled>
								<option value="">Vehicle Type</option>
								<?php 
								$resultA = $db_handle->runQuery("SELECT * FROM vehicletype ORDER BY ID");
								foreach ($resultA as $rowDepA) {
								?>
								<option value="<?php echo $rowDepA["ID"];?>"><?php echo $rowDepA["VehicleType"];?></option>
								<?php		
								}
								?>	
							</select>
                       
						<div class="textalert5" style="color:red; font-weight:bold;"  ></div>
                         <i class="ri-roadster-fill"></i>
                    </div>
					<div class="inputbox">
                       
                            <select id="vehicleModel" name="vehicleModel" disabled>
								<option value="">Vehicle Model</option>
								<?php 
								$resultA = $db_handle->runQuery("SELECT * FROM vehiclemodels ORDER BY ID");
								foreach ($resultA as $rowDepA) {
								?>
								<option value="<?php echo $rowDepA["ID"];?>"><?php echo $rowDepA["VehicleModels"];?></option>
								<?php		
								}
								?>	
							</select>
                       
						<div class="textalert5_" style="color:red; font-weight:bold;"  ></div>
                         <i class="ri-roadster-fill"></i>
                    </div>
					<div class="inputbox">
                        <input type="text" placeholder="Vehicle Number" id="vehicleNumber" disabled>
						<div class="textalert6" style="color:red; font-weight:bold;"  ></div>
                        <i class="ri-roadster-fill"></i>
                    </div>
					
					
					<div class="inputbox">
                        <div class="button-content" >
							<a id="viewServicesBtn" ><i class="ri-list-view"></i> Choose your services</a>
							<div class="textalert7" style="color:red; font-weight:bold;"  ></div>
						
						</div>
                    </div>
					<input type="text"  id="txtCheckInsert" hidden>
				
					<!--div class="button-content" >
                        <a id="viewServicesBtn" style="width:550px;"><i class="ri-list-view"></i> Select Services you want</a>
						<div class="textalert7" style="color:red; font-weight:bold;"  ></div>
                    </div-->
					<div class="inputbox">
                        <input type="date" placeholder="Appointment Date" id="date" value="<?php //echo $todayDate; ?>">
						<div class="textalert8" style="color:red; font-weight:bold;"  ></div>
                        <i class="ri-calendar-fill"></i>
                    </div>
                    <div class="inputbox">
                        <input type="time" placeholder="Time" id="time">
						<div class="textalert9" style="color:red; font-weight:bold;"  ></div>
                        <i class="ri-time-fill"></i>
                    </div>
                    
                   
                   
                   
				    
                    <!--div class="inputbox">
                        <select id="name">
                            <option value="" disabled selected>Select Service You Want</option>
                            <option value="oil-change">Oil Change</option>
                            <option value="tire-replacement">Tire Replacement</option>
                            <option value="brake-service">Brake Service</option>
                        </select>
                        <i class="ri-tools-fill"></i>
                    </div-->
                    
					<!--div class="button-content">
                        <a id="viewServicesBtn"><i class="ri-list-view"></i> Services you want</a>
                    </div-->
                    <div class="inputbox" >
                        <textarea placeholder="Note" rows="3" id="comments" style="width:550px;"></textarea>
                        <i class="ri-chat-3-fill"></i>
                    </div>
                    
                    <div class="inputbox">
                        <input type="submit" value="Submit" id="Submit_Button">
                    </div>
                </form>
                <div class="signup-content">
                    <p>Create New Account <a href="../Account/admin/signup/CreateAccount.php">Sign Up</a></p>
                </div>
                <div class="buttons-container">
                    <div class="home-button-content">
                        <a href="../Home/index.html"><i class="ri-home-gear-fill"></i> Home</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    
    <!-- The Modal -->
    <div id="myModal" class="modal" >
        <div class="modal-content" style="width:850px;">
            <span class="close">&times;</span>
            <h3>Select Services you want</h3>
			
				<input type="text"  id="HiddenPopupID" hidden >
				<select id="ServiceType" name="ServiceType" >
					<option value="">Select Services</option>
					<?php 
					$resultA = $db_handle->runQuery("SELECT * FROM servicetype ORDER BY ID");
					foreach ($resultA as $rowDepA) {
					?>
					<option value="<?php echo $rowDepA["ID"];?>"><?php echo $rowDepA["ServiceType"];?></option>
					<?php		
					}
					?>	
				</select>
				
			
            <button id="addServiceBtn"  style="">Add</button>
			<div class="alertWarning" style="color:red; font-weight:bold;"  ></div>
            <div id="displayPopupdelete" ></div>
			<div class="container" style="height:300px; overflow-y: auto;border: 3px solid #ddd;  ">
            <div id="Load_RequestedServicesDetails" >
			<table id="servicesTable">
                <thead>
                    <tr>
                        <th>Delete</th>
                        <th>Requested Services</th>
                    </tr>
                </thead>
                <tbody>
				<?php 
			
				$queryAD="SELECT  appoinmentservicetype.ID,ServiceType.ServiceType  
				FROM `appoinmentservicetype` 
				INNER JOIN ServiceType ON ServiceType.ID = appoinmentservicetype.AppoinmentID
				WHERE appoinmentservicetype.`AppoinmentID` ='$AppoinmenID'";
				$resultAD = $db_handle->runQuery($queryAD);  //
				$i=0;
				if(!empty($resultAD)){
					foreach ($resultAD as $r) {
						$ID=$r['ID'];
				
						if($i%2==0)
							$classname="evenRow";
						else
							$classname="oddRow";
						?>
						<tr id="show">
						<td style="width:20px;"><a href="#" id="<?php echo $ID; ?>" class="deleteP" title="Delete"><img width="20" height="20" src="../../images/delete2.png"  title="Delete" /></a></td>
						<td><?php echo $r['ServiceType'];?></td>
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

    <script src="script.js"></script>
</body>
</html>
