<?php 
    //open connection
	require_once("../../Connection/dbconnecting.php");
	
	$typeID='';
	$ServiceType='';
	
	//Row_ID_update
	if(isSet($_POST['Row_ID_update'])){
		
		$typeID=$_POST['Row_ID_update'];
		$query="SELECT * FROM `suppliers` WHERE ID='$typeID'";
		$result = $db_handle->runQuery($query);
		if(!empty($result)) {
			foreach ($result as $rowDep1) {
				$Company_T=$rowDep1["Company"]; 
				$SupplierName_T=$rowDep1["SupplierName"]; 
				$Mobile_T=$rowDep1["Mobile"]; 
				$Email_T=$rowDep1["Email"]; 
				$SupID=$rowDep1["ID"]; 
		
			}
		}	
		?>
			
		<input type="text" hidden  id="ID_T" name="ID_T" value="<?php echo $SupID;?>" class="field-divided20"  />
		<input type="text" hidden  id="Company_T" name="Company_T" value="<?php echo $Company_T;?>" class="field-divided20"  />
		<input type="text" hidden  id="SupplierName_T" name="SupplierName_T" value="<?php echo $SupplierName_T;?>" class="field-divided20"  />
		<input type="text" hidden  id="Mobile_T" name="Mobile_T" value="<?php echo $Mobile_T;?>" class="field-divided20"  />
		<input type="text" hidden  id="Email_T" name="Email_T" value="<?php echo $Email_T;?>" class="field-divided20"  />
		<?php
	}
	
?>
