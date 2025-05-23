<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
<div class="right-container">
    <div class="login-content">
        <form id="loginForm">
            <div class="title">
                <h2>Welcome</h2>
            </div>
            <div class="inputbox">
                <input type="text" id="txtemail" placeholder="Email" required>
            </div>
            <div class="inputbox">
                <input type="password" id="txtPassword" placeholder="Password" required>
            </div>
            <div class="home-button-content">
                <button type="submit" id="SubmitButton">Login</button>
            </div>
        </form>
        <div class="signup-content">
            <p>Don't Have Account? <a href="../signup/index.html">Sign Up</a></p>
        </div>
        <div class="home-button-content">
            <a href=""><i class="ri-home-gear-fill"></i> Home</a>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $("#loginForm").on('submit', function(event) {
        event.preventDefault();
        
        var email = $("#txtemail").val();
        var password = $("#txtPassword").val();
        
        console.log('Sending AJAX request with email: ' + email + ' and password: ' + password);

        $.ajax({
            type: "POST",
            url: "", // Empty URL means it will post to the same page
            data: { email: email, password: password },
            success: function(response) {
                console.log('Server Response:', response);
                if (response.trim() === "success") {
                    swal({
                        title: "Success!",
                        text: "You have successfully logged in.",
                        icon: "success",
                        button: "OK",
                    }).then(() => {
                        window.location.href = '../../../../Forms/AdminViewAppoinments/FormUI.php';
                    });
                } else {
                    swal({
                        title: "Error!",
                        text: "Invalid email or password.",
                        icon: "error",
                        button: "OK",
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', status, error);
                swal({
                    title: "Error!",
                    text: "An error occurred. Please try again.",
                    icon: "error",
                    button: "OK",
                });
            }
        });
    });
});
</script>

<?php
// Ensure this is at the end of the file to handle the AJAX request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Enable error reporting for debugging
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // Include database connection file
    require_once("../../../../Connection/dbconnecting.php");
    
    $response = "error";
    
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Prepare and execute query
        $query = "SELECT * FROM users WHERE UserName=? AND Password=?";
        $stmt = $db_handle->prepare($query);
        
        if ($stmt) {
            $stmt->bind_param("ss", $email, $password);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $response = "success";
            }

            $stmt->close();
        } else {
            echo "Failed to prepare the statement: " . $db_handle->error;
        }
    } else {
        echo "Email or password is not set.";
    }

    echo $response;
    exit;
}
?>
</body>
</html>
