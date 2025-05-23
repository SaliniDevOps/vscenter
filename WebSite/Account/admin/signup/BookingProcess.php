
<?php

    //open connection
	require_once("../../../../Connection/dbconnecting.php");
    
	$ID='';
	$ServiceType='';
	$fine_ =0;
	
	if(isset($_POST["Insert_ID"]))
	{
	    //Get variable
		$ID=$_POST["Insert_ID"];
		$name=$_POST["name"];
		$NIC=$_POST["NIC"];
		$email=$_POST["email"];
		$phone=$_POST["phone"];
		$vehicleNumber=$_POST["vehicleNumber"];
		$ServiceType=$_POST["ServiceType"];
		$date=$_POST["date"];
		$vehicleType=$_POST["vehicleType"];
		$time=$_POST["time"];
		$comments=$_POST["comments"];
		$vehicleModel=$_POST["vehicleModel"];
		$Password=$_POST["Password"];
		
		$resultA = $db_handle->runQuery("SELECT `ID` FROM `customeraccounts` WHERE `NIC`='$NIC'");
		if($resultA instanceof mysqli_result && $resultA->num_rows > 0){
			?>
			<script>
				$(".textalert2").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Already registered this NIC!');
				$(".textalert2").fadeIn().delay(2000).fadeOut();
				document.getElementById('NIC').focus(); 
			</script>
			<?php
		}else{
			$result = $db_handle->insertQuery("INSERT INTO `customeraccounts`( `Name`, `NIC`, `Mobile`, `Email`, `Password`, `VehicleType`, 
			`VehicleModel`, `VehicleNumber`) VALUES ('$name','$NIC','$phone','$email','$Password','$vehicleType','$vehicleModel','$vehicleNumber')");
			
			$fine_=1;
		}	
		
		
		?>
		
		<input type="text" hidden  id="Checking_Hidden" name="Checking_Hidden" value="<?php echo $fine_;?>" class="field-divided20"  />
		<?php 
		
		
	}		 
	
	?>
	