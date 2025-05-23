 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


	<script type="text/javascript">
 
	/* $(function() {
		$("#SubmitButton").click(function() {
			var email = $("#txtemail").val();
			var password = $("#txtPassword").val();
			 //event.preventDefault();
			 console.log('Sending AJAX request with email: ' + email + ' and password: ' + password);
			//var dataString = 'Insert_Email='+ Email + '&Password='+ Password;
			//alert(dataString)
			
			$.ajax({
				type: "POST",
				url: "AdminLogingProcess.php",
				data: { email: email, password: password },
				success: function(response) {
					console.log('Server Response:', response);
					if (response.trim() === "success") {
						// swal({
							// title: "Success!",
							// text: "You have successfully logged in.",
							// icon: "success",
							// button: "OK",
						// }).then(() => {
							// window.location.href = '../../../../Forms/AdminViewAppoinments/FormUI.php';
						// });
						alert("a")
					} else {
						// swal({
							// title: "Error!",
							// text: "Invalid email or password.",
							// icon: "error",
							// button: "OK",
						// });
						alert("b")
					}
				},
				error: function() {
					// swal({
						// title: "Error!",
						// text: "An error occurred. Please try again.",
						// icon: "error",
						// button: "OK",
					// });
					alert("c")
				}
			});
			
			
			
		return false;
	    });
	});
     */
	</script>
    
	<script type="text/javascript">
//$(function() {
   // $("#Submit_Button").click(function() {
        // var UserName = $("#txtUserName").val();
        // var txtNIC = $("#txtNIC").val();
        // var txtMobileNumber = $("#txtMobileNumber").val();
        // var Email = $("#Email").val();
        // var Password = $("#Password").val();

        //var dataString = 'Create_newAccount=' + UserName + '&txtNIC=' + txtNIC + '&txtMobileNumber=' + txtMobileNumber + '&Email=' + Email + '&Password=' + Password;
       // alert'qwe');

        // /* $.ajax({
            // type: "POST",
            // url: "customerSignUpPageProcess.php",
            // data: dataString,
            // cache: false,
            // success: function(html) {
                // $("#CreateNewUserAccount").html(html);
                // alert("aa")
                // swal({
                    // title: "Success!",
                    // text: "Your account has been successfully created.",
                    // icon: "success",
                    // button: "OK"
                // });
          //  },
            // error: function(xhr, status, error) {
                // alert("An error occurred: " + error);
            // }
        // }); */
   // });
//});
</script>

	 <script>
	 
		function validateNIC(txtNIC) {
			var regex = /^[0-9]{9}[vV]$/;
			return regex.test(txtNIC);
		}
	 
		function validateEmail(Email) {
			const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
			return re.test(Email);
		}
	 
        $(function() {
            $("#Submit_Button").click(function(event) {
                // Collect form data
                var UserName = $("#txtUserName").val();
                var txtNIC = $("#txtNIC").val();
                var txtMobileNumber = $("#txtMobileNumber").val();
                var Email = $("#Email").val();
                var Password = $("#Password").val();
                var PasswordConfirm = $("#PasswordConfirm").val();

				var lenMobile = txtMobileNumber.toString().length;

                // Create a data string for the AJAX request
                var dataString = 'Create_newAccount=' + UserName + '&txtNIC=' + txtNIC + '&txtMobileNumber=' + txtMobileNumber + '&Email=' + Email + '&Password=' 
					+ Password+ '&PasswordConfirm=' + PasswordConfirm;
                
				if(UserName==''){
					$(".textalert1").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter your full name');
					$(".textalert1").fadeIn().delay(2000).fadeOut();
					document.getElementById('txtUserName').focus(); 
				
				}
				// else if(txtNIC==''){
					// $(".textalert2").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter your NIC');
					// $(".textalert2").fadeIn().delay(2000).fadeOut();
					// document.getElementById('txtNIC').focus(); 
					
				// }
				// else if (!validateNIC(txtNIC)) {
					// $(".textalert2").fadeIn(100).html('<span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>Enter a valid NIC');
					// $(".textalert2").fadeIn().delay(2000).fadeOut();
					// document.getElementById('txtNIC').focus(); 
					
				// }
				// else if(txtMobileNumber==''){
					// $(".textalert4").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter your Phone Number');
					// $(".textalert4").fadeIn().delay(2000).fadeOut();
					// document.getElementById('txtMobileNumber').focus(); 
					
				// }
				// else if(lenMobile != 10){
					// $(".textalert4").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Invalid Mobile Number');
					// $(".textalert4").fadeIn().delay(2000).fadeOut();
					// document.getElementById('txtMobileNumber').focus(); 
					
				// }
				// else if(Email==''){
					// $(".textaler5").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter your E-Mail');
					// $(".textaler5").fadeIn().delay(2000).fadeOut();
					// document.getElementById('Email').focus(); 
					
				// }
				// else if (!validateEmail(Email)) {
					// $(".textaler5").fadeIn(100).html('<span class="closebtn" onclick="this.parentElement.style.display=\'none\';"></span>Enter a valid E-Mail');
					// $(".textaler5").fadeIn().delay(2000).fadeOut();
					// document.getElementById('Email').focus();
					
				// }
				// else if(Password==''){
					// $(".textaler6").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter a password');
					// $(".textaler6").fadeIn().delay(2000).fadeOut();
					// document.getElementById('Password').focus(); 
					
				// }
				// else if(PasswordConfirm==''){
					// $(".textaler7").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Type the password again!');
					// $(".textaler7").fadeIn().delay(2000).fadeOut();
					// document.getElementById('Password').focus(); 
					
				// }
				// else if(PasswordConfirm != Password){
					// $(".textaler7").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Type same password..!');
					// $(".textaler7").fadeIn().delay(2000).fadeOut();
					// document.getElementById('PasswordConfirm').focus(); 
					
				// }
				else{
					
					$.ajax({
						type: "POST",
						url: "customerSignUpPageProcess.php",
						data: dataString,
						cache: false,
						success: function(html) {
							$("#CreateNewUserAccount").html(html);
							alert("Account created successfully!");
							swal({
								title: "Success!",
								text: "Your account has been successfully created.",
								icon: "success",
								button: "OK"
							});
						},
						error: function(xhr, status, error) {
							alert("An error occurred: " + error);
						}
					});
				
				}
                

                // Prevent the default form submission behavior
                event.preventDefault();
            });
        });
    </script>