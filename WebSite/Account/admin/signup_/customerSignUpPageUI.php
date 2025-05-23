
<?php 
	//AJAX 
	include('customerSignUpPageAjax.php');

	//open connection
	require_once("../../../../Connection/dbconnecting.php");
	
										
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoHub SignUp</title>
    <link rel="stylesheet" href="../signup/style.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
	 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    <div class="background-image"></div>
    <div id="CreateNewUserAccount"></div>

    <div class="signup-content">
        <form id="loginForm">
            <div class="title">
                <h2>AutoHub Service Center=</h2>
                <h3>Create Account</h3>
            </div>
            <div class="inputbox">
                <input type="text" placeholder="User Name" id="txtUserName">
				<div class="textalert1" style="color:red; font-weight:bold;"  ></div>
                <i class="ri-file-user-fill"></i>
            </div>
            <div class="inputbox">
                <input type="text" placeholder="NIC" id="txtNIC">
				<div class="textalert2" style="color:red; font-weight:bold;"  ></div>
                <i class="ri-send-plane-fill"></i>
            </div>
            <div class="inputbox">
                <input type="number" placeholder="Contact No" id="txtMobileNumber">
				<div class="textalert4" style="color:red; font-weight:bold;"  ></div>
                <i class="ri-phone-fill"></i>
            </div>
            <div class="inputbox">
                <input type="email" placeholder="Email" id="Email">
				<div class="textaler5" style="color:red; font-weight:bold;"  ></div>
                <i class="ri-mail-fill"></i>
            </div>
            <div class="inputbox">
                <input type="password" placeholder="Password" id="Password">
					<div class="textaler6" style="color:red; font-weight:bold;"  ></div>
                <i class="ri-lock-fill"></i>
            </div>
			<div class="inputbox">
                <input type="password" placeholder="Confirm Password" id="PasswordConfirm">
					<div class="textaler7" style="color:red; font-weight:bold;"  ></div>
					
                <i class="ri-lock-fill"></i>
            </div>
            <!--div class="inputbox">
                <input type="submit" value="Sign Up">
            </div-->
			<div class="inputbox">
				<input type="submit" value="Sign Up" id="Submit_Button">
			</div>
        </form>
        <!--div class="login-content-link">
            <p>Already Have Account? <a href="../login/index.html">Log In</a></p>
        </div-->
        <div class="home-button-content">
            <a href="#"><i class="ri-home-gear-fill"></i> Home</a>
        </div>
    </div>
</body>
</html>