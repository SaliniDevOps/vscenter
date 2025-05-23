<?php 
    //open connection
	require_once("../../Connection/dbconnecting.php");
	
	$typeID='';
	$ServiceType='';
	$Price='';
	
	//Row_ID_update
	if(isSet($_POST['Row_ID_update'])){
		
		$typeID=$_POST['Row_ID_update'];
		$query="SELECT * FROM `servicetype` WHERE ID='$typeID'";
		$result = $db_handle->runQuery($query);
		if(!empty($result)) {
			foreach ($result as $rowDep1) {
			
				$ServiceType=$rowDep1["ServiceType"]; 
				$Price=$rowDep1["Price"]; 
		
			}
		}	
		?>
			
		<input type="text" hidden  id="type_ID_t" name="type_ID_t" value="<?php echo $ServiceType;?>" class="field-divided20"  />
		<input type="text" hidden  id="Price_T" name="Price_T" value="<?php echo $Price;?>" class="field-divided20"  />
		<?php
	}
	
?>
