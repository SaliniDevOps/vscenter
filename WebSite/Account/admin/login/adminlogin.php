<?php 
	//AJAX 
	include('AdminLogingAjax.php');

	//open connection
	require_once("../../../../Connection/dbconnecting.php");
	
										
  ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../login/style.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
</head>
<body>
    <div class="main-container">
        <div class="left-container">
            <div class="background-image"></div>

            <div class="main-title-content">
                <div class="logo-container">
                    <a href="#" class="logo">AutoHub Service Center</a>
                    <br>
                    <a href="#" class="logo"></a>
                </div>
            </div>
        </div>

        <!--div class="right-container">
            <div class="login-content">
                <form action="">
                    <div id="AdminSubmission"></div>
                    <div class="title">
                        <h2>Welcome</h2>
                    </div>
                    <div class="inputbox">
                        <input type="text" placeholder="Email" id="txtemail">
                        <i class="ri-mail-fill"></i>
                    </div>
					
                    <div class="inputbox">
                        <input type="password" placeholder="Password" id="txtPassword">
                        <i class="ri-lock-fill"></i>
                    </div>
                    <div class="inputbox">
                        <input type="submit" value="Log In" id="SubmitButton">
                    </div>
					<!--div class="home-button-content">
						<a href="../../../../Forms/AdminViewAppoinments/FormUI.php"><i class="ri-home-gear-fill"></i> Login</a>
					</div-->
                <!--/form>
                <div class="signup-content">
                    <p>Don't Have Account? <a href="../signup/index.html">Sign Up</a></p>
                </div>
                <div class="home-button-content">
                    <a href=""><i class="ri-home-gear-fill"></i> Home</a>
                </div>
            </div>
        </div-->
		
		<div id="Load_Details"></div>
		<div class="right-container">
    <div class="login-content">
        <form id="loginForm">
            <div class="title">
                <h2>Welcome</h2>
			</div>
			<input type="checkbox" id="AdminChecking" ><span> Admin </span>
			<input type="checkbox" id="TechnicianChecking" ><span> Technician </span>
            <div class="inputbox">
                <input type="email" id="txtemail" placeholder="Email" >
                <i class="ri-mail-fill"></i>
            </div>
            <div class="inputbox">
                <input type="password" id="txtPassword" placeholder="Password" >
                <i class="ri-lock-fill"></i>
            </div>
			<div class="textalertLog" style="color:red; font-weight:bold;"  ></div>
            <div class="home-button-content2">
                <!--button type="button" id="SubmitButton">Login</button-->
				<a href=""> <button type="button" id="SubmitButton">Login</button></a>
            </div>
			
        </form>
        <div id="AdminSubmission"></div>
        <div class="signup-content">
            <p>Don't Have Account? <a href="../signup/CreateAccount.php">Sign Up</a></p>
        </div>
        <div class="home-button-content">
            <a href="../../../Home/index.html"><i class="ri-home-gear-fill"></i> Home</a>
        </div>
    </div>
</div>
		
		
		
    </div>
</body>
</html>

<script>
        // document.getElementById('loginForm').addEventListener('submit', function(event) {
            // event.preventDefault();
            // const email = document.getElementById('email').value;
            // const password = document.getElementById('password').value;

            // if (email === 'Admin@123' && password === 'Abc@123') {
                // window.location.href = '../../../../Forms/AdminViewAppoinments/FormUI.php'; // Replace 'admin.html' with the path to your admin page
            // } else {
                // alert('Invalid email or password');
            // }
        // });
		
		
		
		
		
    </script>