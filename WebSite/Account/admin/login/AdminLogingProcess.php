<?php
require_once("../../../../Connection/dbconnecting.php");

// Simple debugging message to verify the script is being accessed
// echo "PHP script is being accessed";

// if (isset($_POST['email']) && isset($_POST['password'])) {
    // $email = $_POST['email'];
    // $password = $_POST['password'];

    // echo "Received email: $email and password: $password"; // Debugging message

    // $query = "SELECT * FROM users WHERE UserName='$email' AND Password='$password'";
    // $result = $db_handle->query($query);

    // if ($result->num_rows > 0) {
        // echo "success";
    // } else {
        // echo "error";
    // }
// } else {
    // echo "Invalid input";
// }
	$LoginSuccess=false;
	$Check_user='';
	if(isset($_POST["Insert_Email"]))
	{
		$Email=$_POST["Insert_Email"];
		$password=$_POST["password"];
		$AdminChecking=$_POST["AdminChecking"];
		$TechnicianChecking=$_POST["TechnicianChecking"];
		
		if($AdminChecking==1){
			$queryA = "SELECT * FROM users WHERE UserName='$Email' AND Password='$password'";
			$Check_user='0';
			
		}else if ($TechnicianChecking==1){
			$queryA = "SELECT * FROM technicians WHERE Email='$Email' AND Password='$password'";
			$Check_user='1';
		}else{
			$queryA = "SELECT * FROM customeraccounts WHERE Email='$Email' AND Password='$password'";
			$Check_user='2';
			
		}	
		
		
		$result = $db_handle->runQuery($queryA);
		
		if ($result->num_rows > 0) {
			$LoginSuccess=true;
		} else {
			$LoginSuccess=false;
		}

		?>
		<input type="text" id="HiddenSuccess_T" value="<?php echo $LoginSuccess; ?>" hidden />
		<input type="text" id="heck_User" value="<?php echo $Check_user; ?>" hidden />
		<?php 
	}	
?>
