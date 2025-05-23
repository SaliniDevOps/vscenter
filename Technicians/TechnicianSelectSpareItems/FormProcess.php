 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 
<script type="text/javascript">
    $(document).ready(function () {
  
		$(".deleteS").click(function () {
			var element = $(this);
			var del_id = element.attr("id");

			if (confirm("Are you sure you want to delete this?")) {
				$.ajax({
					type: "POST",
					url: "FormDeleteSpareParts.php",
					data: { id: del_id }, // Use object literal for data
					success: function (html) {
					$("#displaydeleteSpare").html($(html)); // Treat response as jQuery object
					
					
				 
					},
				});
				$(this).parents("#show").animate({ backgroundColor:"#003"},"slow")
				.animate({ opacity:"hide"},"slow");
			}
		});
	});
</script>
<script type="text/javascript">
	
    //Update script
 	$(document).ready(function(){
		$('a[class="UpdateK"]').click(function(){
			var Row_ID = $(this).val();
			var Row_ID = $(this).attr("id");
			
			if(Row_ID){
				$.ajax({
					type:'POST',
					url: "FormUpdate.php",
					data:'Row_ID_update='+Row_ID,
						success:function(html){
						$('#Row_ID_update').html(html);
						
						var SpareName_t = $("#SpareName_t").val();
						var ItemCode_t = $("#ItemCode_t").val();
						var QTY_t = $("#QTY_t").val();
						var AppoinmentID_t = $("#AppoinmentID_t").val();
						var AvalQTY_t = $("#AvalQTY_t").val();
						
						document.getElementById('QTY').focus();
						document.getElementById('jobNumber').value=AppoinmentID_t;
						document.getElementById('ItemCode').value=ItemCode_t;
						document.getElementById('QTY').value=QTY_t;
						document.getElementById('ItemName').value=SpareName_t;
						document.getElementById('Hidden_SpareItemID').value=Row_ID;
						document.getElementById('availableQty').value=AvalQTY_t;
						
						document.getElementById('jobNumber').disabled = true;
						document.getElementById('ItemCode').disabled = true;
						document.getElementById('ItemName').disabled = true;
							
						//const input=document.getElementById('txtDays');
						input.focus();
						input.select();
						
					}
				}); 
			}else{
				$('#link_ShowData').html('<input type="text" value="g" >');
				$('#city').html('<input type="text" value="e" >'); 
			}
		});   
	});	
 
</script>
<script>
        $(function() {
            $("#AddButton2").click(function() {
                var ServiceType = $("#txtServiceType").val();
                var jobNumber = $("#txtAppoinmentID").val();

                // Create data string
                var dataString = 'Insert_ServiceTypes=' + jobNumber + '&ServiceType=' + ServiceType;

                $.ajax({
                    type: "POST",
                    url: "FormProcess.php",
                    data: dataString,
                    cache: false,
                    success: function(html) {
                        $("#Insert_F").html(html);

                        $('#txtServiceType').val('');
                        $('#txtServiceType').focus();
                       
                        // $('#customerName').val('');
                        
                    }
                });

                return false;
            });
        });
    </script>
	

<html lang="en">
<?php

    //open connection
	require_once("../../Connection/dbconnecting.php");
    
	$ID='';
	$SpareName='';
	$JobNumber='';
	$CustomerNIC = '';
	$Name = '';
	$Address = '';
	$Mobile1 = '';
	$Mobile2 = '';
	$Email = '';
	$VehicleType = '';
	$VehicleRegNo = '';
	$AppoinmentDate = '';
	$AppoinmentTime = '';
	$Status = '';
	$VehicleModels = '';
	$FuelType = '';
	
	
	if(isset($_POST["Load_Details"]))
	{
	    //Get variable
		$JobNumber=$_POST["Load_Details"];
		
		$resultA = $db_handle->runQuery("SELECT customerappoinments.*,vehicletype.ID AS VehicleTypeID,vehiclemodels.ID AS VehicleModelsID
					FROM customerappoinments
					INNER JOIN vehicletype ON vehicletype.ID = customerappoinments.VehicleType
					INNER JOIN vehiclemodels ON VehicleModels.ID = customerappoinments.VehicleModel
					WHERE customerappoinments.AppoinmentID='$JobNumber'"); 
					//INNER JOIN fueltype ON fueltype.ID = customerappoinments.FuelType 
		if(!empty($resultA)){
			foreach ($resultA as $r) {
				$CustomerNIC=$r['CustomerNIC'];
				$Name=$r['Name'];
				$Mobile1=$r['Mobile1'];
				$Mobile2=$r['Mobile2'];
				$Email=$r['Email'];
				$VehicleType=$r['VehicleTypeID'];
				$VehicleRegNo=$r['VehicleRegNo'];
				$AppoinmentDate=$r['AppoinmentDate'];
				$AppoinmentTime=$r['AppoinmentTime'];
				$Status=$r['Status'];
				$VehicleModels=$r['VehicleModelsID'];
				$FuelType=$r['FuelType'];
				
			}
		}	
	
		?>
		<input type="text" hidden id="T_customerNIC" name="T_customerNIC" value="<?php echo htmlspecialchars($CustomerNIC); ?>">
		<input type="text" hidden id="T_Name" name="T_Name" value="<?php echo htmlspecialchars($Name); ?>">
		<input type="text" hidden id="T_Address" name="T_Address" value="<?php echo htmlspecialchars($Address); ?>">
		<input type="text" hidden id="T_Mobile1" name="T_Mobile1" value="<?php echo htmlspecialchars($Mobile1); ?>">
		<input type="text" hidden id="T_Mobile2" name="T_Mobile2" value="<?php echo htmlspecialchars($Mobile2); ?>">
		<input type="text" hidden id="T_Email" name="T_Email" value="<?php echo htmlspecialchars($Email); ?>">
		<input type="text" hidden  id="T_VehicleType" name="T_VehicleType" value="<?php echo htmlspecialchars($VehicleType); ?>">
		<input type="text" hidden id="T_VehicleRegNo" name="T_VehicleRegNo" value="<?php echo htmlspecialchars($VehicleRegNo); ?>">
		<input type="text" hidden id="T_AppoinmentDate" name="T_AppoinmentDate" value="<?php echo htmlspecialchars($AppoinmentDate); ?>">
		<input type="text"  hidden id="T_AppoinmentTime" name="T_AppoinmentTime" value="<?php echo htmlspecialchars($AppoinmentTime); ?>">
		<input type="text" hidden id="T_Status" name="T_Status" value="<?php echo htmlspecialchars($Status); ?>">
		<input type="text" hidden id="T_VehicleModels" name="T_VehicleModels" value="<?php echo htmlspecialchars($VehicleModels); ?>">
		<input type="text" hidden id="T_FuelType" name="T_FuelType" value="<?php echo htmlspecialchars($FuelType); ?>">
		
		<!--div class="row">
			<div class="card-body">
				
				<table class="table table-bordered" style="max-width: 600px; margin: auto;" hidden>
					
					<thead>
						<tr>
						  <th scope="col">Requested Services</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$queryF="SELECT `servicetype`.`ServiceType`,`appoinmentservicetype`.`ID` 
							FROM `appoinmentservicetype` 
							INNER JOIN servicetype ON `servicetype`.`ID` = `appoinmentservicetype`.`ServiceTypeID` 
							WHERE appoinmentservicetype.AppoinmentID='$JobNumber'";
					$resultF = $db_handle->runQuery($queryF); 
					$i=0;
					if(!empty($resultF)){
						foreach ($resultF as $r) {
							//$ID=$r['ID'];
					
							if($i%2==0)
								$classname="evenRow";
							else
								$classname="oddRow";
							?>
							<tr id="show">
								<!--td style="width:20px;"><a href="#" id="<?php //echo $ID; ?>" class="Update" title="Update"><img width="20" height="20" src="../../images/edit.png"  title="Update" /></a></td>
								<td><?php echo $r['ServiceType'];?></td-->
							</tr>
							<?php
						}
						
					}	?>	
					<!--tbody>
				</table>
			</div>
		</div-->
		<div id="Insert_SpareDetails">
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
			<?php

			$queryR="SELECT spareparts.SpareName, spareparts.`ItemCode`,usedspareitems.`ID` ,usedspareitems.`QTY` 
			FROM usedspareitems 
			INNER JOIN spareparts ON spareparts.`ID` = usedspareitems.`SpareItemID`
			WHERE usedspareitems.`AppoinmentID`='$JobNumber';";
			$resultR = $db_handle->runQuery($queryR); 
			$i=0;
			//if(!empty($resultR)){
				if($resultR instanceof mysqli_result && $resultR->num_rows > 0){
				foreach ($resultR as $r) {
					
					$ID=$r['ID'];
			
					if($i%2==0)
						$classname="evenRow";
					else
						$classname="oddRow";
					?>
					<tr id="show">
						<td style="width:20px;"><a href="#" id="<?php echo $ID; ?>" class="deleteS" title="Delete"><img width="20" height="20" src="../../images/delete.png"  title="Delete" /></a></td>
						<td style="width:20px;"><a href="#" id="<?php echo $ID; ?>" class="UpdateK" title="Update"><img width="20" height="20" src="../../images/edit.png"  title="Update" /></a></td>
						<td><?php echo $JobNumber;?></td>
						<td><?php echo $r['ItemCode'];?></td>
						<td><?php echo $r['SpareName'];?></td>
						<td><?php echo $r['QTY'];?></td>
					</tr>
					<?php
				}
				
			}else{
				
				?>
				
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
				</tr><tr id="show" style="height:35px;">
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<?php

			}	
			?>	
			</tbody>
		</table>
		</div>
		</div>
		
		
		
<?php
	}


	//ServiceType POPUP
	if (isset($_POST['Insert_ServiceTypes'])) {
		$appointmentId = $_POST['Insert_ServiceTypes'];
		$ServiceType = $_POST['ServiceType'];
		
		$queryG="SELECT `servicetype`.`ServiceType`,`appoinmentservicetype`.`ID` 
				FROM `appoinmentservicetype` 
				INNER JOIN servicetype ON `servicetype`.`ID` = `appoinmentservicetype`.`ServiceTypeID` 
				WHERE appoinmentservicetype.AppoinmentID='$appointmentId' AND `appoinmentservicetype`.`ServiceTypeID` ='$ServiceType' ";
		$resultG = $db_handle->runQuery($queryG); 
		if($resultG instanceof mysqli_result && $resultG->num_rows > 0){
			?>
			<script>
			//$(".alertWarningM").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Duplicate Record!');
			//$(".alertWarningM").fadeIn().delay(2000).fadeOut();
			</script>
			<?php 
		}else{
			$result = $db_handle->insertQuery("INSERT INTO `appoinmentservicetype` (`AppoinmentID`,`ServiceTypeID`) Values('$appointmentId','$ServiceType')");
			
		}
		
		
			
		?>
		<table class="table table-bordered" style="max-width: 600px; margin: auto;">
			<thead>
				<tr>
					<th scope="col" class="center-align">Delete</th>
					<th scope="col" class="center-align">Requested Services </th>
				</tr>
			</thead>
			
			<tbody>
				<?php
			
				$queryA="SELECT `servicetype`.`ServiceType`,`appoinmentservicetype`.`ID` 
						FROM `appoinmentservicetype` 
						INNER JOIN servicetype ON `servicetype`.`ID` = `appoinmentservicetype`.`ServiceTypeID` 
						WHERE appoinmentservicetype.AppoinmentID='$appointmentId'";
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
						<td style="width:20px;"><a href="#" id="<?php echo $ID; ?>" class="deleteP" title="Delete"><img width="20" height="20" src="../../images/delete.png"  title="Delete" /></a></td>
						<td><?php echo $r['ServiceType'];?></td>
						</tr>
						<?php
					}
					
				}	?>	
			</tbody>
		</table>
		<?php 
	}


	
	if (isset($_POST['id'])) {
		$appointmentId = $_POST['id'];
		?>
		<div class="row">
			
				<form id="form1" name="form1" method="post" autocomplete="off" action="">
					<div class="d-flex justify-content-between align-items-center">
						<div class="col-md-11 main-content d-flex align-items-center" >
							<label for="spareName" class="col-form-label col-md-3" style=" margin-left:60px;">Select Service Type</label>
							<input type="text" hidden id="txtServiceTypeID">
							<input type="text" hidden id="txtAppoinmentID" value="<?php echo $appointmentId; ?>">
							<div class="form-group mb-6" style="position: relative;">
								<select id="txtServiceType" name="txtServiceType" class="form-control custom-width" style=" margin-left:10px;">
									<option value="">Select Type</option>
									<?php 
									$resultA = $db_handle->runQuery("SELECT * FROM servicetype ORDER BY ID");
									foreach ($resultA as $rowDepA) {
									?>
									<option value="<?php echo $rowDepA["ID"];?>"><?php echo $rowDepA["ServiceType"];?></option>
									<?php		
									}
									?>	
								</select>
								<div class="textalert1" id="ValiAlertCSS">Select a service type.</div>
							</div>
							&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary ml-2"  id="AddButton2">Add</button>
						</div>
					</div>
				</form>
					
				<div id="displaydelete"></div>
				<div id="Row_ID_update"></div>
					
				<div class="alertSave" id="Save_AlertCSS" style="display:none"></div>
				<div class="alertWarning" id="Warning_AlertCSS" style="display:none"></div>
				
					
						<div class="row">
							<div class="card-body">
								<div id="Insert_F">
								<table class="table table-bordered" style="max-width: 600px; margin: auto;">
									<!--table class="table table-bordered" style="max-width: 500px; margin-right: auto;"-->
									<thead>
										<tr>
											<th scope="col" class="center-align" style="background-color: #204060; color: white;">Delete</th>
											<th scope="col" class="center-align" style="background-color: #204060; color: white;">Requested Services </th>
										</tr>
									</thead>
									<tbody>
										<?php
									
										$queryA="SELECT `servicetype`.`ServiceType`,`appoinmentservicetype`.`ID` 
												FROM `appoinmentservicetype` 
												INNER JOIN servicetype ON `servicetype`.`ID` = `appoinmentservicetype`.`ServiceTypeID` 
												WHERE appoinmentservicetype.AppoinmentID='$appointmentId'";
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
												<tr id="show" >
												<td style="width:20px;">
													<a href="#" id="<?php echo $ID; ?>" class="deleteP" title="Delete">
														<img width="20" height="20" src="../../images/delete.png" title="Delete" />
													</a>
												</td>
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
		<script type="text/javascript">
        $(document).ready(function () {
            $(document).on('click', '.deleteP', function (e) {
                e.preventDefault(); // Prevent the default action of the link
                var element = $(this);
                var del_id = element.attr("id");
                
                
               
				$.ajax({
					type: "POST",
					url: "ServiceTypePopupDelete.php",
					data: { id: del_id },
					success: function (html) {
						$("#displaydeleteP").html(html);

						$('#txtServiceType').val('');
                        $('#txtServiceType').focus();
					}
				});
				element.parents("tr").animate({ backgroundColor: "#003" }, "slow")
				.animate({ opacity: "hide" }, "slow");
			
               
            });
        });
		</script>
		<?php 

	}
	
	
	if(isset($_POST["Insert_AddButton1"]))
	{
	    $JobNumber=$_POST["Insert_AddButton1"];
		$customerNIC=$_POST["customerNIC"];
		$customerName=$_POST["customerName"];
		$mobile=$_POST["mobile"];
		$email=$_POST["email"];
		$vehicleType=$_POST["vehicleType"];
		$modelType=$_POST["modelType"];
		$regNumber=$_POST["regNumber"];
		$AppDate=$_POST["AppDate"];
		$AppTime=$_POST["AppTime"];
		$IsCheckBox=$_POST["IsCheckBox"];
		
		if ($IsCheckBox=='1'){
			$result = $db_handle->insertQuery("INSERT INTO `customerappoinments` (`CustomerNIC`,`Name`,`Mobile1`,`Email`,`VehicleType`,`VehicleModel`,
			`VehicleRegNo`,`AppoinmentDate`,`AppoinmentTime`,`IsNewRecord`) Values('$customerNIC','$customerName',
			'$mobile','$email','$vehicleType','$modelType','$regNumber','$AppDate','$AppTime','$IsCheckBox')");
			?>
			<script>
			$(".alertSave1").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Save Successfully!');
			$(".alertSave1").fadeIn().delay(2000).fadeOut();
			</script>
			<?php 
		}else{
			
			$resultD = $db_handle->runQuery("SELECT * FROM customerappoinments WHERE customerappoinments.AppoinmentID='$JobNumber'"); 
			if(!empty($resultD)){
				if($resultD instanceof mysqli_result && $resultD->num_rows > 0){
				
				$resultB = $db_handle->updateQuery("UPDATE `customerappoinments` SET `Name` = '$customerName', `Mobile1` = '$mobile', 
				`Email` = '$email', `VehicleType` = '$vehicleType', 	   `VehicleModel` = '$modelType', `VehicleRegNo` = '$regNumber', 
				`AppoinmentDate` = '$AppDate', `AppoinmentTime` = '$AppTime', `CustomerNIC` = '$customerNIC', `IsNewRecord` = '$IsCheckBox' 
				WHERE `AppoinmentID` = '$JobNumber'");
				
				?>
				<script>
				$(".alertSave1").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Update Successfully!');
				$(".alertSave1").fadeIn().delay(2000).fadeOut();
				</script>
				<?php 
					
				}
			}				
			
		}
		
	}	
	
	
	//Other Details
	if (isset($_POST['Insert_txtYear'])) {
		$Year = $_POST['Insert_txtYear'];
		$OdometerRead = $_POST['OdometerRead'];
		$EngineType = $_POST['txtEngineType'];
		$EngineCapacity = $_POST['EngineCapacity'];
		$fuelType = $_POST['fuelType'];
		$userComment = $_POST['userComment'];
		$jobNumber = $_POST['jobNumber'];
		
		
		$result = $db_handle->insertQuery("INSERT INTO `vehiclemoredetails`(`Year`, `OdometerRead`, `EngineType`, `EngineCapacity`, `FuelType`,
		`OtherNotes`, `AppoinmentID`)
		Values('$Year','$OdometerRead','$EngineType','$EngineCapacity','$fuelType','$userComment','$jobNumber')");
		
	}
	
	
	$jobNumber='';
	$ItemCode='';
	$ItemName='';
	$HiddenID='';
	$QTY='';
	//Other Spare  Details
	if (isset($_POST['Insert_SpareDetails'])) {
		$jobNumber = $_POST['Insert_SpareDetails'];
		$ItemCode = $_POST['ItemCode'];
		$ItemName = $_POST['ItemName'];
		$HiddenID = $_POST['HiddenID'];
		$QTY = $_POST['QTY'];
		$Hidden_SpareItemID = $_POST['Hidden_SpareItemID'];
		
		if($Hidden_SpareItemID!=''){
			$resultF = $db_handle->updateQuery("UPDATE `usedspareitems` SET `QTY`='$QTY' WHERE ID='$Hidden_SpareItemID'"); 
			
			
		}else{
			$resultF = $db_handle->runQuery("SELECT * FROM usedspareitems WHERE usedspareitems.AppoinmentID='$jobNumber' AND SpareItemID='$HiddenID'"); 
			if(!empty($resultF)){
				if($resultF instanceof mysqli_result && $resultF->num_rows > 0){
					?>
					
					<script>
					alert("Duplicate Record!")
					</script>
					<?php 
					
				}else{
					$result = $db_handle->insertQuery("INSERT INTO `usedspareitems`(`AppoinmentID`, `SpareItemID` ,`QTY`)
					Values('$jobNumber','$HiddenID','$QTY')");

				}
			}

		}
		
		
		
		?>
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
			<?php

			$queryR="SELECT spareparts.SpareName, spareparts.`ItemCode`,usedspareitems.`ID` ,usedspareitems.`QTY` 
			FROM usedspareitems 
			INNER JOIN spareparts ON spareparts.`ID` = usedspareitems.`SpareItemID`
			WHERE usedspareitems.`AppoinmentID`='$jobNumber';";
			$resultR = $db_handle->runQuery($queryR); 
			$i=0;
			if(!empty($resultR)){
				foreach ($resultR as $r) {
					$ID=$r['ID'];
			
					if($i%2==0)
						$classname="evenRow";
					else
						$classname="oddRow";
					?>
					<tr id="show">
						<td style="width:20px;"><a href="#" id="<?php echo $ID; ?>" class="deleteS" title="Delete"><img width="20" height="20" src="../../images/delete.png"  title="Delete" /></a></td>
						<td style="width:20px;"><a href="#" id="<?php echo $ID; ?>" class="UpdateK" title="Update"><img width="20" height="20" src="../../images/edit.png"  title="Update" /></a></td>
						<td><?php echo $jobNumber;?></td>
						<td><?php echo $r['ItemCode'];?></td>
						<td><?php echo $r['SpareName'];?></td>
						<td><?php echo $r['QTY'];?></td>
					</tr>
					<?php
				}
				
			}	?>	
			</tbody>
		</table>
		<?php 
	}