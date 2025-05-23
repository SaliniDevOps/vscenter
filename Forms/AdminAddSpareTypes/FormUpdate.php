<?php 
    //open connection
	require_once("../../Connection/dbconnecting.php");
	
	$typeID='';
	$ServiceType='';
	$ServiceType=''; 
	$ItemCode=''; 
	$Price=''; 
	$ServiceTypeID	=''; 
	
	//Row_ID_update
	if(isSet($_POST['Row_ID_update'])){
		
		$typeID=$_POST['Row_ID_update'];
		$query="SELECT * FROM `spareparts` WHERE ID='$typeID'";
		$result = $db_handle->runQuery($query);
		if(!empty($result)) {
			foreach ($result as $rowDep1) {
				$ServiceType=$rowDep1["SpareName"]; 
				$ItemCode=$rowDep1["ItemCode"]; 
				$Price=$rowDep1["Price"]; 
				$ServiceTypeID	=$rowDep1["ServiceTypeID"]; 
		
			}
		}	
		?>
			
		<input type="text" hidden  id="type_ID_t" name="type_ID_t" value="<?php echo $ServiceType;?>" class="field-divided20"  />
		<input type="text" hidden  id="ItemCode_t" name="ItemCode_t" value="<?php echo $ItemCode;?>" class="field-divided20"  />
		<input type="text" hidden  id="Price_t" name="Price_t" value="<?php echo $Price;?>" class="field-divided20"  />
		<input type="text" hidden  id="ServiceTypeID_t" name="ServiceTypeID_t" value="<?php echo $ServiceTypeID;?>" class="field-divided20"  />
		<?php
	}
	
?>
