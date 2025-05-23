 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


 <script type="text/javascript">
 
	function validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }
	
	function validateNIC(nic) {
		var regex = /^[0-9]{9}[vV]$/;
		return regex.test(nic);
	}
 
 
    $(function() {
		$("#Submit_Button").click(function() {
			//alert("aa")
			var ID = $("#txtHiiddenID").val();
			var name = $("#name").val();
			var NIC = $("#NIC").val();
			var email = $("#email").val();
			var phone = $("#phone").val();
			var vehicleNumber = $("#vehicleNumber").val();
			var ServiceType = $("#ServiceType").val();
			var date = $("#date").val();
			var vehicleType = $("#vehicleType").val();
			var time = $("#time").val();
			var comments = $("#comments").val();
			var txtCheckInsert = $("#txtCheckInsert").val();
			var vehicleModel = $("#vehicleModel").val();
			var Password = $("#Password").val();
			var ConfirmPassword = $("#ConfirmPassword").val();
			
			var lenMobile = phone.toString().length;
			
			var dataString = 'Insert_ID='+ ID + '&name='+ name+ '&NIC='+ NIC+ '&email='+ email+ '&phone='+ phone+ '&vehicleNumber='+ vehicleNumber
			+ '&ServiceType='+ ServiceType+ '&date='+ date+ '&vehicleType='+ vehicleType+ '&time='+ time+ '&comments='+ comments 
			+ '&vehicleModel='+ vehicleModel+ '&Password='+ Password; 
			
			//alert("kkk")
			
			if(name==''){
				$(".textalert1").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter your full name');
				$(".textalert1").fadeIn().delay(2000).fadeOut();
				document.getElementById('name').focus(); 
				
			}
			else if(NIC==''){
				$(".textalert2").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter your NIC');
				$(".textalert2").fadeIn().delay(2000).fadeOut();
				document.getElementById('NIC').focus(); 
				
			}
			
			else if (!validateNIC(NIC)) {
				$(".textalert2").fadeIn(100).html('<span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>Enter a valid NIC');
				$(".textalert2").fadeIn().delay(2000).fadeOut();
				document.getElementById('NIC').focus(); 
			}
			else if(phone==''){
				$(".textalert4").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter your Phone Number');
				$(".textalert4").fadeIn().delay(2000).fadeOut();
				document.getElementById('phone').focus(); 
				
			}
			else if(lenMobile != 10){
				$(".textalert4").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Invalid Mobile Number');
				$(".textalert4").fadeIn().delay(2000).fadeOut();
				document.getElementById('phone').focus(); 
				
			}else if(vehicleType ==''){
				$(".textalert5").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Select Vehicle Type');
				$(".textalert5").fadeIn().delay(2000).fadeOut();
				document.getElementById('vehicleType').focus(); 
			}
			else if(vehicleModel ==''){
				$(".textalert5_").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Select Vehicle Model');
				$(".textalert5_").fadeIn().delay(2000).fadeOut();
				document.getElementById('vehicleModel').focus(); 
			}
			else if(vehicleNumber==''){
				$(".textalert6").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter Vehicle Number');
				$(".textalert6").fadeIn().delay(2000).fadeOut();
				document.getElementById('vehicleNumber').focus(); 
				
			}
			else if(email==''){
				$(".textalert3").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter your E-Mail');
				$(".textalert3").fadeIn().delay(2000).fadeOut();
				document.getElementById('email').focus(); 
				
			}
			else if (!validateEmail(email)) {
                $(".textalert3").fadeIn(100).html('<span class="closebtn" onclick="this.parentElement.style.display=\'none\';"></span>Enter a valid E-Mail');
                $(".textalert3").fadeIn().delay(2000).fadeOut();
                document.getElementById('email').focus();
				
			}
			else if(Password==''){
				$(".textalert12").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter a password');
				$(".textalert12").fadeIn().delay(2000).fadeOut();
				document.getElementById('Password').focus(); 
				
			}
			else if(ConfirmPassword==''){
				$(".textalert13").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter the password again!');
				$(".textalert13").fadeIn().delay(2000).fadeOut();
				document.getElementById('ConfirmPassword').focus(); 
				
			}
			else if(ConfirmPassword!=Password){
				$(".textalert13").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Type the same password!!');
				$(".textalert13").fadeIn().delay(2000).fadeOut();
				document.getElementById('ConfirmPassword').focus(); 
				
			}
			
			else{
			
				$.ajax({
					type: "POST",
					url: "BookingProcess.php",
					data: dataString,
					cache: false,
					success: function(html){

						$("#Load_Details").html(html);
						
						
						var Checking_Hidden = $("#Checking_Hidden").val();
						//alert(Checking_Hidden)
						if(Checking_Hidden==1){
							swal({
							title: "Success!",
							text: "Your booking has been successfully submitted.",
							icon: "success",
							button: "OK",
							}).then((value) => {
								//window.location.reload();
								//window.location.href = 'CustomerDetails.php';
								$("#NIC_T").val(NIC);
								
								
								window.location.href = '../login/adminlogin.php';
								// $("#customerDetailsForm").submit();
								//window.location.href = `CustomerDetails.php?NIC=${encodeURIComponent(NIC)}`;
							});
						}
						
						
						
					}
				});
			}
			return false;
	    });
	});
	</script>
    
	

