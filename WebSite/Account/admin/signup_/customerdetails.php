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
	if(isset($_POST["Create_newAccount"]))
	{
		$UserName=$_POST["Create_newAccount"];
		$txtNIC=$_POST["txtNIC"];
		$txtMobileNumber=$_POST["txtMobileNumber"];
		$Email=$_POST["Email"];
		$Password=$_POST["Password"];
		echo "INSERT INTO `customeraccounts`(`Name`, `NIC`, `Mobile`, `Email`, `Password`) 
		VALUES ('$UserName','$txtNIC','$txtMobileNumber','$Email','$Password')";
		$result = $db_handle->insertQuery("INSERT INTO `customeraccounts`(`Name`, `NIC`, `Mobile`, `Email`, `Password`) 
		VALUES ('$UserName','$txtNIC','$txtMobileNumber','$Email','$Password')");
		
		/*if ($result->num_rows > 0) {
			$LoginSuccess=true;
		} else {
			$LoginSuccess=false;
		}

		?>
		<input type="text" id="HiddenSuccess_T" value="<?php echo $LoginSuccess; ?>"/>
		<?php 
		*/
	}	
?>
