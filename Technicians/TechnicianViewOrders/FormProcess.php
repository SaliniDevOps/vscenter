<?php
require_once("../../Connection/dbconnecting.php");

	$AppoinmentID='';
	$Name='';
	$Mobile1='';
	$CustomerNIC='';
	$VehicleType='';
	$VehicleModels='';
	$VehicleRegNo='';
	$AppoinmentDate='';
	$AppoinmentTime='';
	$ServiceType='';

if (isset($_POST['id'])) {
    $appointmentId = $_POST['id'];

	$resultM = $db_handle->runQuery("SELECT customerappoinments.*, vehicletype.VehicleType,vehiclemodels.VehicleModels
	FROM `customerappoinments` 
	INNER JOIN vehicletype ON vehicletype.ID = customerappoinments.VehicleType
	INNER JOIN vehiclemodels ON VehicleModels.ID = customerappoinments.VehicleModel
	WHERE  `customerappoinments`.`AppoinmentID` = '$appointmentId'"); 
	if(!empty($resultM)){
		foreach ($resultM as $rM) {
			$AppoinmentID=$rM['AppoinmentID'];
			$Name=$rM['Name'];
			$Mobile1=$rM['Mobile1'];
			$CustomerNIC=$rM['CustomerNIC'];
			$VehicleType=$rM['VehicleType'];
			$VehicleModels=$rM['VehicleModels'];
			$VehicleRegNo=$rM['VehicleRegNo'];
			$AppoinmentDate=$rM['AppoinmentDate'];
			$AppoinmentTime=$rM['AppoinmentTime'];
		}
	}	
	?>
	<p style="text-align: center;"> Job Number - <?php echo $AppoinmentID;?></p> 
	<div class="section-title">Customer Details</div>
	<table>
		<thead>
		  <tr>
			<th> <p>Customer NIC</p></th>
			<th> <p>Customer Name</p></th>
			<th> <p>Mobile Number</p></th>
			</tr>
		</thead>
		<tbody>
			<td><?php echo $CustomerNIC; ?></td>
			<td><?php echo $Name; ?></td>
			<td><?php echo $Mobile1; ?></td>
		</tbody>
	</table>
	<br>
	<div class="section-title">Vehicle Details</div>
	<table>
		<thead>
		  <tr>
			<th> <p>Vehicle Type</p></th>
			<th> <p>Vehicle Model</p></th>
			<th> <p>Vehicle Number</p></th>
			</tr>
		</thead>
		<tbody>
			<td><?php echo $VehicleType; ?></td>
			<td><?php echo $VehicleModels; ?></td>
			<td><?php echo $VehicleRegNo; ?></td>
		</tbody>
	</table>
	<br>
	<div class="section-title">Appoinment Details</div>
	<table>
		<thead>
		  <tr>
			<th> <p>Appoinment Date</p></th>
			<th> <p>Appoinment Time</p></th>
			
			</tr>
		</thead>
		<tbody>
			<td><?php echo $AppoinmentDate; ?></td>
			<td><?php echo $AppoinmentTime; ?></td>
		</tbody>
	</table>
	<br>
	<div class="section-title">Requested Services</div>
	<table >
		<tbody>
		<?php
		$resultF = $db_handle->runQuery("SELECT servicetype.ServiceType,`appoinmentservicetype`.`AppoinmentID` 
		FROM appoinmentservicetype 
		INNER JOIN 
		servicetype ON appoinmentservicetype.ServiceTypeID = servicetype.ID 
		WHERE appoinmentservicetype.AppoinmentID = '$AppoinmentID'"); 
		$i=0;
		if(!empty($resultF)){
			foreach ($resultF as $rF) {
				$ServiceType=$rF['ServiceType'];
		
				?>
				<tr>
				<td style="border: 1px solid yellow;"> <?php echo $ServiceType; ?></td>
				</tr>
				<?php
			}
			
		}	
		?>	
		</tbody>
	</table>
	<?php 
}


$UpdateConfirm='';

if (isset($_POST["UpdateConfirm"])) {
  
    $UpdateConfirm = $_POST["UpdateConfirm"];
	
    $result = $db_handle->updateQuery("Update `techniciansassigned` Set `Status`='1' WHERE JobNumber='$UpdateConfirm'");
}


if (isset($_POST["SearchData"])) {
  
    $fromDate = $_POST["SearchData"];
    $toDate = $_POST["toDate"];
	
    $resultD = $db_handle->runQuery("SELECT * FROM `customerappoinments` WHERE AppoinmentDate BETWEEN '$fromDate' AND  '$toDate'");
	if(!empty($resultD)){
		if($resultD instanceof mysqli_result && $resultD->num_rows > 0){
			?>
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
			
				$queryA="SELECT * FROM `customerappoinments` WHERE AppoinmentDate BETWEEN '$fromDate' AND  '$toDate'";
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
	<?php 
			
		}else{
			?>
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
				
			
				
			<tr id="show">
			<td style="text-align:center;"><?php echo "No Records !";?></td>
			</tr>
						
					
			</tbody>
        </table>
	<?php 
		}
	}	
	
	
	
}
?>
