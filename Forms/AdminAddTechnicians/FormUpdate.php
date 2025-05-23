<?php 
    //open connection
	require_once("../../Connection/dbconnecting.php");
	
	$typeID='';
	$ServiceType='';
	
	//Row_ID_update
	if(isSet($_POST['Row_ID_update'])){
		
		$typeID=$_POST['Row_ID_update'];
		$query="SELECT * FROM `technicians` WHERE ID='$typeID'";
		$result = $db_handle->runQuery($query);
		if(!empty($result)) {
			foreach ($result as $rowDep1) {
			
				$HiddenID=$rowDep1["ID"]; 
				$NIC=$rowDep1["NIC"]; 
				$Name=$rowDep1["Name"]; 
				$Address=$rowDep1["Address"]; 
				$Mobile1=$rowDep1["Mobile1"]; 
				$Email=$rowDep1["Email"]; 
		
			}
		}	
		?>
			
		<input type="text" hidden  id="ID_t" name="ID_t" value="<?php echo $HiddenID;?>" class="field-divided20"  />
		<input type="text" hidden  id="NIC_t" name="NIC_t" value="<?php echo $NIC;?>" class="field-divided20"  />
		<input type="text" hidden  id="Name_t" name="Name_t" value="<?php echo $Name;?>" class="field-divided20"  />
		<input type="text" hidden  id="Address_t" name="Address_t" value="<?php echo $Address;?>" class="field-divided20"  />
		<input type="text" hidden  id="Mobile1_t" name="Mobile1_t" value="<?php echo $Mobile1;?>" class="field-divided20"  />
		<input type="text" hidden  id="Email_t" name="Email_t" value="<?php echo $Email;?>" class="field-divided20"  />
		<?php
	}
	
?>
