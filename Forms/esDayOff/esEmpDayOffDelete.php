<?php 
    require_once("../../Connection/dbcontroller.php");
    $db_handle = new DBController(); 
	if($_POST['id']){
		$RowDayID='';
	    $RowDayID=$_POST['id'];	
		
	    $query = "DELETE FROM `rowdayoff` WHERE `ID`='$RowDayID'";
		$result = $db_handle->deleteQuery($query);
		  
	}
	
?>