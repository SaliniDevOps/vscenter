
<?php

    //open connection
	require_once("../../Connection/dbconnecting.php");
    
	$ID='';
	$ServiceType='';
	
	
	if(isset($_POST["Insert_ID"]))
	{
	    //Get variable
		$ID=$_POST["Insert_ID"];
		$name=$_POST["name"];
		$NIC=$_POST["NIC"];
		$email=$_POST["email"];
		$phone=$_POST["phone"];
		$vehicleNumber=$_POST["vehicleNumber"];
		$ServiceType=$_POST["ServiceType"];
		$date=$_POST["date"];
		$vehicleType=$_POST["vehicleType"];
		$time=$_POST["time"];
		$comments=$_POST["comments"];
		$vehicleModel=$_POST["vehicleModel"];
		
		//if (empty($ID)) {
			// $resultA = $db_handle->runQuery("SELECT * FROM `servicetype` WHERE `servicetype`='$ServiceType'"); 
			// if($resultA instanceof mysqli_result && $resultA->num_rows > 0){
				// ?>
				<script>
					// $(".alertWarning").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Duplicate Record!');
					// $(".alertWarning").fadeIn().delay(2000).fadeOut();
					// document.getElementById('txtServiceType').value='';
					// document.getElementById('txtServiceType').focus();
				// </script>
				<?php
			// }else{
				$result = $db_handle->insertQuery("INSERT INTO `customerappoinments` (`Name`,`CustomerNIC`,`Email`,`Mobile1`,`VehicleRegNo`,
				`AppoinmentDate`,`AppoinmentTime`,`VehicleType`,`Comments`,`VehicleModel`) 
				Values('$name','$NIC','$email','$phone','$vehicleNumber','$date','$time','$vehicleType','$comments','$vehicleModel')");
				
				?>
				<script>
					$(".alertSave").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Save Successfully!');
					$(".alertSave").fadeIn().delay(2000).fadeOut();
					document.getElementById('txtServiceType').value='';
					document.getElementById('txtServiceType').focus();
				</script>
				<?php
			//}
			
		
	
		
	}		 
	
	//POPUP
	if(isset($_POST["Insert_ServiceType"]))
	{
		$ServiceType=$_POST["Insert_ServiceType"];
		$HiddenPopupID=$_POST["HiddenPopupID"];
		$AppID=$_POST["AppID"];
		$TestInsert='AlradyAdd';
		
		$resultA = $db_handle->runQuery("SELECT * FROM `appoinmentservicetype` WHERE `AppoinmentID`='$AppID' AND `ServiceTypeID`='$ServiceType'"); 
		if($resultA instanceof mysqli_result && $resultA->num_rows > 0){
			?>
			<script>
				$(".alertWarning").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Duplicate Record!');
				$(".alertWarning").fadeIn().delay(2000).fadeOut();
				document.getElementById('ServiceType').value='';
				document.getElementById('ServiceType').focus();
			</script>
			<?php
		}else{
			$result = $db_handle->insertQuery("INSERT INTO `appoinmentservicetype` (`AppoinmentID`,`ServiceTypeID`) Values('$AppID','$ServiceType')");
			
			?>
			<script>
				// $(".alertSave").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Save Successfully!');
				// $(".alertSave").fadeIn().delay(2000).fadeOut();
				// document.getElementById('txtServiceType').value='';
				// document.getElementById('txtServiceType').focus();
			</script>
			<?php
		}
		?>
		<table>
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
				INNER JOIN ServiceType ON ServiceType.ID = appoinmentservicetype.ServiceTypeID
				WHERE appoinmentservicetype.`AppoinmentID` ='$AppID'";
				$resultAD = $db_handle->runQuery($queryAD);  
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
		
		<input type="text" id="txtTextInsert_t" hidden value="<?php echo $TestInsert ; ?>"  />
		<?php 
	
		
	}
	
	?>
	<script type="text/javascript">
    $(document).ready(function () {
  
		$(".deleteP").click(function () {
			var element = $(this);
			var del_id = element.attr("id");

			if (confirm("Are you sure you want to delete this?")) {
				$.ajax({
					type: "POST",
					url: "FormPopupDelete.php",
					data: { id: del_id }, // Use object literal for data
					success: function (html) {
					$("#displayPopupdelete").html($(html)); // Treat response as jQuery object
					
					$("#ServiceType").focus().val('');
					$("#HiddenPopupID").val('');
				 
					},
				});
				$(this).parents("#show").animate({ backgroundColor:"#003"},"slow")
				.animate({ opacity:"hide"},"slow");
			}
		});
	});
</script>



<?php 

$Name='';
$Mobile='';
$VehicleModelID='';
$VehicleTypeID='';
$VehicleModels='';
$VehicleType='';
$VehicleNumber='';
$Email='';

if(isset($_POST["Loard_AccountDetails"]))
	{
		$NIC=$_POST["Loard_AccountDetails"];
		 
		
		$resultA = $db_handle->runQuery("SELECT * FROM `customeraccounts` WHERE `NIC`='$NIC'"); 
		//if($resultA instanceof mysqli_result && $resultA->num_rows > 0){ 	
			if(!empty($resultA)){
				foreach ($resultA as $r) {
					$Name=$r['Name'];
					$Mobile=$r['Mobile'];
					$VehicleModelID=$r['VehicleModel'];
					$VehicleTypeID=$r['VehicleType'];
					$Email=$r['Email'];
					$VehicleNumber=$r['VehicleNumber'];
				}
			}	
		//}
		
		$resultF = $db_handle->runQuery("SELECT VehicleModels FROM `vehiclemodels` WHERE ID='$VehicleModelID'"); 
		if($resultF instanceof mysqli_result && $resultF->num_rows > 0){ 	
			$i=0;
			if(!empty($resultF)){
				foreach ($resultF as $r) {
					$VehicleModels=$r['VehicleModels'];
				}
			}	
		}
		
		$resultD = $db_handle->runQuery("SELECT VehicleType FROM `vehicletype` WHERE ID='$VehicleTypeID'"); 
		if($resultD instanceof mysqli_result && $resultD->num_rows > 0){ 	
			$i=0;
			if(!empty($resultD)){
				foreach ($resultD as $r) {
					$VehicleType=$r['VehicleType'];
				}
			}	
		}
		
		?>
		
		
		<input type="text" hidden   id="Name_t" name="Name_t" value="<?php echo $Name;?>"   />
		<input type="text" hidden   id="Mobile_t" name="Mobile_t" value="<?php echo $Mobile;?>"   />
		<input type="text" hidden   id="vehicleNumber_t" name="vehicleNumber_t" value="<?php echo $VehicleNumber;?>"   />
		<input type="text" hidden id="VehicleTypeID_t"  value="<?php echo $VehicleTypeID ; ?>"  />
		
		
		<input type="text" hidden  id="VehicleModelID_t"  value="<?php echo $VehicleModelID ; ?>"  />
		<input type="text" hidden id="VehicleModels_t"  value="<?php echo $VehicleModels ; ?>"  />
		<input type="text" hidden id="VehicleType_t"  value="<?php echo $VehicleType ; ?>"  />
		<input type="text" hidden id="VEmail_t"  value="<?php echo $Email ; ?>"  />
		<?php 
	
		
	}
	
	?>