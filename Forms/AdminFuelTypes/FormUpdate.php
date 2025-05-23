<?php 
    //open connection
	require_once("../../Connection/dbconnecting.php");
	
	$typeID='';
	$ServiceType='';
	
	//Row_ID_update
	if(isSet($_POST['Row_ID_update'])){
		
		$typeID=$_POST['Row_ID_update'];
		$query="SELECT * FROM `fueltype` WHERE ID='$typeID'";
		$result = $db_handle->runQuery($query);
		if(!empty($result)) {
			foreach ($result as $rowDep1) {
			
				$ServiceType=$rowDep1["FuelType"]; 
		
			}
		}	
		?>
			
		<input type="text" hidden  id="type_ID_t" name="type_ID_t" value="<?php echo $ServiceType;?>" class="field-divided20"  />
		<?php
	}
	
?>
