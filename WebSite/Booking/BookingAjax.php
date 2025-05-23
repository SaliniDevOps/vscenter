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
			
			var lenMobile = phone.toString().length;
			
			var dataString = 'Insert_ID='+ ID + '&name='+ name+ '&NIC='+ NIC+ '&email='+ email+ '&phone='+ phone+ '&vehicleNumber='+ vehicleNumber
			+ '&ServiceType='+ ServiceType+ '&date='+ date+ '&vehicleType='+ vehicleType+ '&time='+ time+ '&comments='+ comments 
			+ '&vehicleModel='+ vehicleModel; 
			
			//alert("kkk")
			
			// if(name==''){
				// $(".textalert1").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter your full name');
				// $(".textalert1").fadeIn().delay(2000).fadeOut();
				// document.getElementById('name').focus(); 
				
			// }
			if(NIC==''){
				$(".textalert2").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter your NIC');
				$(".textalert2").fadeIn().delay(2000).fadeOut();
				document.getElementById('NIC').focus(); 
				
			}
			else if (!validateNIC(NIC)) {
				$(".textalert2").fadeIn(100).html('<span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>Enter a valid NIC');
				$(".textalert2").fadeIn().delay(2000).fadeOut();
				document.getElementById('NIC').focus(); 
			}
			// else if(email==''){
				// $(".textalert3").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter your E-Mail');
				// $(".textalert3").fadeIn().delay(2000).fadeOut();
				// document.getElementById('email').focus(); 
				
			// }else if (!validateEmail(email)) {
                // $(".textalert3").fadeIn(100).html('<span class="closebtn" onclick="this.parentElement.style.display=\'none\';"></span>Enter a valid E-Mail');
                // $(".textalert3").fadeIn().delay(2000).fadeOut();
                // document.getElementById('email').focus();
				
			// }else if(phone==''){
				// $(".textalert4").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter your Phone Number');
				// $(".textalert4").fadeIn().delay(2000).fadeOut();
				// document.getElementById('phone').focus(); 
				
			// }else if(lenMobile != 10){
				// $(".textalert4").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Invalid Mobile Number');
				// $(".textalert4").fadeIn().delay(2000).fadeOut();
				// document.getElementById('phone').focus(); 
				
			// }
			// else if(vehicleType ==''){
				// $(".textalert5").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Select Vehicle Type');
				// $(".textalert5").fadeIn().delay(2000).fadeOut();
				// document.getElementById('vehicleType').focus(); 
			// }
			// else if(vehicleModel ==''){
				// $(".textalert5_").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Select Vehicle Model');
				// $(".textalert5_").fadeIn().delay(2000).fadeOut();
				// document.getElementById('vehicleModel').focus(); 
			// }
			// else if(vehicleNumber==''){
				// $(".textalert6").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter Vehicle Number');
				// $(".textalert6").fadeIn().delay(2000).fadeOut();
				// document.getElementById('vehicleNumber').focus(); 
				
			//}
			else if(txtCheckInsert==''){
				$(".textalert7").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Select Services You want');
				$(".textalert7").fadeIn().delay(2000).fadeOut();
				//document.getElementById('vehicleNumber').focus(); 
				
			}else if(date==''){
				$(".textalert8").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter Appoinmnet Date');
				$(".textalert8").fadeIn().delay(2000).fadeOut();
				document.getElementById('date').focus(); 
				
			}else if(time==''){
				$(".textalert9").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter Appoinment Time');
				$(".textalert9").fadeIn().delay(2000).fadeOut();
				document.getElementById('time').focus(); 
				
			}else{
			
				$.ajax({
					type: "POST",
					url: "BookingProcess.php",
					data: dataString,
					cache: false,
					success: function(html){

						$("#Load_Details").html(html);
						
						swal({
                        title: "Success!",
                        text: "Your booking has been successfully submitted.",
                        icon: "success",
                        button: "OK",
						}).then((value) => {
							//window.location.reload();
							//window.location.href = '../Account/admin/signup/CustomerDetails.php';
							window.location.href = '../Home/index.html';
						});
						
					}
				});
			}
			return false;
	    });
	});
	</script>
    
	

	
<script type="text/javascript">

	$(function() {
    $("#addServiceBtn").click(function() {
        var HiddenPopupID = $("#HiddenPopupID").val();
        var ServiceType = $("#ServiceType").val();
        var AppID = $("#txtAppoinmentID").val();
        
        var dataString = 'Insert_ServiceType=' + encodeURIComponent(ServiceType) + 
                         '&HiddenPopupID=' + encodeURIComponent(HiddenPopupID) + 
                         '&AppID=' + encodeURIComponent(AppID);
      
        $.ajax({
            type: "POST",
            url: "BookingProcess.php",
            data: dataString,
            cache: false,
            success: function(html) {
                $("#Load_RequestedServicesDetails").html(html);
                $("#ServiceType").focus().val('');
                $("#HiddenPopupID").val('');
				
				var txtTextInsert_t = $("#txtTextInsert_t").val();
							 
				document.getElementById('txtCheckInsert').value=txtTextInsert_t;
				
				
            }
        });
        
        return false;
    });
});
</script>

<script type="text/javascript">

	$(function() {
    $("#NIC_ClickLoard").click(function() {
        var NIC = $("#NIC").val();
        
        var dataString = 'Loard_AccountDetails=' + encodeURIComponent(NIC);
      
        $.ajax({
            type: "POST",
            url: "BookingProcess.php",
            data: dataString,
            cache: false,
            success: function(html) {
                $("#Load_CusDetails").html(html);
				
				var Name_t = $("#Name_t").val();
				var Mobile_t = $("#Mobile_t").val();
				var VehicleTypeID_t = $("#VehicleTypeID_t").val();
				var VehicleModelID_t = $("#VehicleModelID_t").val();
				var VehicleModels_t = $("#VehicleModels_t").val();
				var VehicleType_t = $("#VehicleType_t").val();
				var VEmail_t = $("#VEmail_t").val();
				var vehicleNumber_t = $("#vehicleNumber_t").val();
				
				if(Name_t !=''){
					
					document.getElementById('name').value=Name_t;
					document.getElementById('email').value=VEmail_t;
					document.getElementById('phone').value=Mobile_t;
					document.getElementById('vehicleNumber').value = vehicleNumber_t;
					
					
					document.getElementById('vehicleModel').value=VehicleModelID_t;
					document.getElementById('vehicleType').value = VehicleTypeID_t;
					
				}else{
					
					$(".textalert20").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>This NIC has been not registered. Create an  account!');
					$(".textalert20").fadeIn().delay(2000).fadeOut();
					
				}
				
				
				
				//$("#vehicleModel").val(VehicleModelID_t).change();
				
                // $("#Name_t").focus().val('');
                // $("#Mobile_t").val('');
                // $("#VehicleTypeID_t").val('');
                // $("#VehicleModelID_t").val('');
                // $("#VehicleModels_t").val('');
                // $("#VehicleType_t").val('');
				
				
							 
				//document.getElementById('name').value=Name_t;
				
				
            }
        });
        
        return false;
    });
});
</script>