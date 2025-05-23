
<?php
	$todayDate=date("Y-m-d");
	date_default_timezone_set("Asia/Colombo");
	$todayTime=date("h:i:sa");

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
	
	
	if(isSet($_POST['Load_Details'])){
		
		$JobNumber=$_POST['Load_Details'];
		
		$resultA = $db_handle->runQuery("SELECT customerappoinments.*,vehicletype.VehicleType AS VehicleType,vehiclemodels.VehicleModels AS VehicleModels
					FROM customerappoinments
					INNER JOIN vehicletype ON vehicletype.ID = customerappoinments.VehicleType
					INNER JOIN vehiclemodels ON VehicleModels.ID = customerappoinments.VehicleModel
					WHERE customerappoinments.AppoinmentID='$JobNumber'"); 
					//INNER JOIN fueltype ON fueltype.ID = customerappoinments.FuelType 
		if(!empty($resultA)){
			foreach ($resultA as $r) {
				
				$Name=$r['Name'];
				$Mobile1=$r['Mobile1'];
				$Email=$r['Email'];
				$VehicleType=$r['VehicleType'];
				$VehicleRegNo=$r['VehicleRegNo'];
				$VehicleModels=$r['VehicleModels'];
				
				$VehicleType = $VehicleType.'-'.$VehicleModels;
				
			}
		}	
		?>
		
		<div class="card-container d-flex justify-content-between">
			<div class="card" style="background-color: #012B39; width: 500px;">
				<div class="card-body">
					<!--h5 class="card-title" style="color: white;">Services</h5-->
					
						<table>
							<thead>
								<tr>
									<th>Service Performed</th>
									<th>Price</th>
								</tr>
							</thead>
							<tbody>
							<?php
							$queryF="SELECT appoinmentservicetype.ServiceTypeID ,servicetype.ServiceType ,servicetype.Price 
							FROM `appoinmentservicetype` 
							INNER JOIN servicetype ON servicetype.ID = appoinmentservicetype.ServiceTypeID
							WHERE appoinmentservicetype.AppoinmentID='$JobNumber'";
							$resultF = $db_handle->runQuery($queryF); 
							$i=0;
							$totalPrice2 = 0;
							if(!empty($resultF)){
								foreach ($resultF as $r) {
									$totalPrice2 += $r['Price'];
							
									$classname = ($i % 2 == 0) ? "evenRow" : "oddRow";
									?>
									<tr id="show">
										<td><?php echo $r['ServiceType'];?></td>
										<td><input type="text" class="price-input" style="background-color: #012B39; color:white;" onchange="updateTotal()" value="<?php echo ' '. number_format ($r['Price'],2);?>"></td>
									</tr>
									<?php
									$i++;
								}
								
							}	?>	
							<tbody>
						</table>
					
				</div>
			</div>
		
			<div class="card" style="background-color: #012B39; width: 500px;">
				<div class="card-body">
					<!--h5 class="card-title" style="color: white;">Spare Parts</h5-->
					<table>
						<thead>
							<tr>
								<th>Spare Items</th>
								<th>QTY</th>
								<th>Price</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$queryF = "SELECT spareparts.SpareName, `spareparts`.`Price`,`usedspareitems`.`QTY`
									   FROM `usedspareitems`
									   INNER JOIN spareparts ON usedspareitems.SpareItemID = spareparts.ID
									   WHERE usedspareitems.AppoinmentID='$JobNumber'";
							$resultF = $db_handle->runQuery($queryF);
							$i = 0;
							$totalPrice = 0;
							if (!empty($resultF)) {
								foreach ($resultF as $r) {
									$totalPrice += $r['Price'] * $r['QTY'];
									$QTY = $r['QTY'];
									$classname = ($i % 2 == 0) ? "evenRow" : "oddRow";
									?>
									<tr id="show">
										<td><?php echo $r['SpareName']; ?></td>
										<td><?php echo $r['QTY']; ?></td>
										<td><input type="text" class="price-input" style="background-color: #012B39; color:white;" value="<?php echo number_format($r['Price']*$QTY, 2); ?>" onchange="updateTotal()"></td>
									</tr>
									<?php
									$i++;
								}
							}
							?>  
						</tbody>
					</table>
											
				</div>
			</div>
		</div>
		<div>
		
		<script>
        function updateTotal() {
            let total = 0;
            document.querySelectorAll('.price-input').forEach(function(element) {
                let value = parseFloat(element.value.replace(/,/g, ''));
                if (!isNaN(value)) {
                    total += value;
                }
            });
            document.getElementById('totalPrice').value = total.toFixed(2);
            document.getElementById('txtSubTotal').value = total.toFixed(2);
        }

        // Initial call to set the total when the page loads
        updateTotal();
    </script>
		
		
       
    </div>
		<input type="text" hidden  id="Name_t" name="Name_t" value="<?php echo $Name;?>" class="field-divided20"  />
		<input type="text" hidden  id="Mobile1_t" name="Mobile1_t" value="<?php echo $Mobile1;?>" class="field-divided20"  />
		<input type="text" hidden  id="Email_t" name="Email_t" value="<?php echo $Email;?>" class="field-divided20"  />
		<input type="text" hidden  id="VehicleType_t" name="VehicleType_t" value="<?php echo $VehicleType;?>" class="field-divided20"  />
		<input type="text" hidden  id="VehicleRegNo_t" name="VehicleRegNo_t" value="<?php echo $VehicleRegNo;?>" class="field-divided20"  />
		<?php
	}
	
	
	$jobNumber='';
	$totalPrice='';
	$txtSubTotal='';
	$cmbPaymentMethod='';
	$txtNote='';
	$txtBalance='';
	$AdditionalCharges='';
	$PaidAmount='';
		
	if(isSet($_POST['Load_SaveInvoice'])){
		
		$jobNumber=$_POST['Load_SaveInvoice'];
		$totalPrice=$_POST['totalPrice'];
		$txtSubTotal=$_POST['txtSubTotal'];
		$cmbPaymentMethod=$_POST['cmbPaymentMethod'];
		$txtNote=$_POST['txtNote'];
		$txtBalance=$_POST['txtBalance'];
		$AdditionalCharges=$_POST['txtAdditionalCharges'];
		$PaidAmount=$_POST['PaidAmount'];
		
		
		$result = $db_handle->insertQuery("INSERT INTO `invoice`(`JobNumber`, `TotalAmount`, `AdditionalCharges`, `SubTotal`, `Note`, 
		`PaidAmount`, `BalanceAmount`,`Date`, `Time`,	`IsInvoice`) 
		VALUES ('$jobNumber','$totalPrice','$AdditionalCharges','$txtSubTotal','$txtNote','$PaidAmount','$txtBalance','$todayDate','$todayTime',1)");
		
		
		$resultB = $db_handle->updateQuery("UPDATE `customerappoinments` SET `IsInvoice`='1' WHERE `AppoinmentID`='$jobNumber'");
		
		$SpareItemID='';
		$QTY='';
		$resultD = $db_handle->runQuery("SELECT * FROM `usedspareitems` WHERE AppoinmentID='$jobNumber'");
		if(!empty($resultD)){
			foreach ($resultD as $rD) {
				$SpareItemID = $rD['SpareItemID'];
				$QTY = $rD['QTY'];
				
				$resultF = $db_handle->updateQuery("UPDATE `stock` SET `AvalQTY` = `AvalQTY` - $QTY WHERE `SpareID` = '$SpareItemID'");
				
				
			}
		}	
		
		//$resultB = $db_handle->updateQuery("UPDATE `stock` SET `AvalQTY`='' WHERE `AppoinmentID`='$jobNumber'");
	
	}	
		