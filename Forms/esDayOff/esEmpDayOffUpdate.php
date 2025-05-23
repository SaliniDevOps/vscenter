<?php 
    require_once("../../Connection/dbcontroller.php");
    $db_handle = new DBController(); 
	
	$FirstName='';
	$ID='';
	$EmployeeCode='';
	$RowDate='';
	$DayOffID='';
	
//Row_ID_update
	if(isSet($_POST['Row_ID_update'])){
		$DayOffID=$_POST['Row_ID_update'];
		//echo $DayOffID;
		  $query="SELECT rowdayoff.*, Employee.FirstName , rowdayoff.EmployeeID
				FROM rowdayoff INNER JOIN Employee ON
           		rowdayoff.EmployeeID = Employee. EmployeeCode
				where rowdayoff.ID='$DayOffID'
				Order By rowdayoff.ID ";
				
		$result = $db_handle->runQuery($query);
            if(!empty($result)) {
				foreach ($result as $rowDep1) {
				
					 $DayOffID=$rowDep1["ID"]; 
					 $EmployeeCode=$rowDep1["EmployeeID"]; 
					 $RowDate=$rowDep1["RowDate"]; 
					 $FirstName=$rowDep1["FirstName"];
			
				}
			}
			
		?>
			
		<input type="text" hidden id="RowID_t" name="RowID_t" value="<?php echo $DayOffID;?>" class="field-divided20"  />
		<input type="text" hidden id="cmbEmployeeName_t" name="cmbEmployeeName_t" value="<?php echo $FirstName;?>" class="field-divided5" placeholder="Employee Name "/>
		<input type="text" hidden id="txtCode_t" name="txtCode_t" value="<?php echo $EmployeeCode;?>" class="field-divided5" placeholder="Employee Code "maxlength="10" onkeypress="return IsNumberKey(event)"/>
		<input type="text"  onkeypress="return IsNumberKey(event)" hidden id="txtDate_t" name="txtDate_t" value="<?php echo $RowDate;?>" class="field-divided5" placeholder="No Pay Days" />
		<?php
	}
	
?>
