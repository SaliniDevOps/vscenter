 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


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
 
 
    $(function() {
		$("#SubmitButton").click(function() {
			var email = $("#txtemail").val();
			var password = $("#txtPassword").val();
			var AdminChecking = $("#AdminChecking").is(":checked") ? 1 : 0;
			var TechnicianChecking = $("#TechnicianChecking").is(":checked") ? 1 : 0;

			
			var dataString = 'Insert_Email='+ email + '&password='+ password+ '&AdminChecking='+ AdminChecking+ '&TechnicianChecking='+ TechnicianChecking;
			
				$.ajax({
					type: "POST",
					url: "AdminLogingProcess.php",
					data: dataString,
					cache: false,
					success: function(html){

						$("#Load_Details").html(html);
						
						var HiddenSuccess_T = $("#HiddenSuccess_T").val();
						var heck_User = $("#heck_User").val();

						// Convert heck_User to an integer for strict comparison
						heck_User = parseInt(heck_User, 10);

						if (HiddenSuccess_T) {
							if (heck_User === 0) {
							   // alert("qqq"); // Debugging: Check if this alert shows up
							   window.location.href = '../../../../Forms/AdminViewAppoinments/FormUI.php';
							} else if (heck_User === 1) {
							   
								
								//window.location.href = '../../../../Technicians/TechnicianViewOrders/FormUI.php';
								window.location.href = `../../../../Technicians/TechnicianViewOrders/FormUI.php?email=${encodeURIComponent(email)}`;
							} else if (heck_User === 2) {
								//alert("a"); // Debugging: Check if this alert shows up
								//window.location.href = '../signup/CustomerDetails.php';
								window.location.href = `../signup/CustomerDetails.php?email=${encodeURIComponent(email)}`;
							}
							// Optionally add a console log to see values for debugging
							console.log("HiddenSuccess_T:", HiddenSuccess_T, "heck_User:", heck_User);
						} else {
							// Debugging: Check if this else block executes
							$(".textalertLog").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Invalid Username or Password!');
							$(".textalertLog").fadeIn().delay(2000).fadeOut();
							document.getElementById('txtemail').focus(); 
						}

						
					}
				});
			
			return false;
	    });
	});
	</script>
	<script>
	$(document).ready(function() {
    // When Admin checkbox is clicked
    $("#AdminChecking").change(function() {
        if(this.checked) {
            $("#TechnicianChecking").prop("checked", false);
        }
    });

    // When Technician checkbox is clicked
    $("#TechnicianChecking").change(function() {
        if(this.checked) {
            $("#AdminChecking").prop("checked", false);
        }
    });
});
	</script>
	
