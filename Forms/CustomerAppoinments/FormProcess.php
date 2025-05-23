
<?php

    //open connection
	require_once("../../Connection/dbconnecting.php");
    
	$ID='';
	$SpareName='';
	
	
	if(isset($_POST["Insert_Data"]))
	{
	    //Get variable
		$name=$_POST["Insert_Data"];
		$email=$_POST["email"];
		$phone=$_POST["phone"];
		$vehicleNumber=$_POST["vehicleNumber"];
		$serviceType=$_POST["serviceType"];
		$date=$_POST["date"];
		$vehicleType=$_POST["vehicleType"];
		$time=$_POST["time"];
		$comments=$_POST["comments"];
		$NIC=$_POST["NIC"];
		
		$result = $db_handle->insertQuery("INSERT INTO customerappoinments (Name, Email, Mobile1, VehicleRegNo, VehicleType, AppoinmentDate, AppoinmentTime, Comments, CustomerNIC)
			VALUES ('$name', '$email', '$phone', '$vehicleNumber', '$serviceType', '$date', '$time', '$comments','$NIC')");

	
		
	}		 
	