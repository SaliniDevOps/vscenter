<?php 
    //open connection
	require_once("../../Connection/dbconnecting.php");
	
	$typeID='';
	$SpareName='';
	$QTY='';
	$AppoinmentID='';
	$ItemCode='';
	
	//Row_ID_update
	if(isSet($_POST['Row_ID_update_Spare'])){
		
		$typeID=$_POST['Row_ID_update_Spare'];
		$query="SELECT spareparts.SpareName, spareparts.`ItemCode`,usedspareitems.`ID` ,usedspareitems.`QTY` ,usedspareitems.`AppoinmentID` 
			FROM usedspareitems 
			INNER JOIN spareparts ON spareparts.`ID` = usedspareitems.`SpareItemID`
			WHERE usedspareitems.`ID`='$typeID';";
		$result = $db_handle->runQuery($query);
		if(!empty($result)) {
			foreach ($result as $rowDep1) {
			
				$SpareName=$rowDep1["SpareName"]; 
				$ItemCode=$rowDep1["ItemCode"]; 
				$QTY=$rowDep1["QTY"]; 
				$AppoinmentID=$rowDep1["AppoinmentID"]; 
		
			}
		}	
		?>
			
		<input type="text" hidden  id="SpareName_t" name="SpareName_t" value="<?php echo $SpareName;?>" class="field-divided20"  />
		<input type="text" hidden  id="ItemCode_t" name="ItemCode_t" value="<?php echo $ItemCode;?>" class="field-divided20"  />
		<input type="text" hidden  id="QTY_t" name="QTY_t" value="<?php echo $QTY;?>" class="field-divided20"  />
		<input type="text" hidden  id="AppoinmentID_t" name="AppoinmentID_t" value="<?php echo $AppoinmentID;?>" class="field-divided20"  />
		<?php
	}
	
	
?>
