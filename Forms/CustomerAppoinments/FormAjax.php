 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 

 <script type="text/javascript">
    $(function() {
        $("#submitServiceForm").click(function() {
            var name = $("#name").val();
			var email = $("#email").val();
            var phone = $("#phone").val();
            var vehicleNumber = $("#vehicleNumber").val();
            var serviceType = $("#serviceType").val();
            var date = $("#date").val();
            var vehicleType = $("#vehicleType").val();
            var time = $("#time").val();
            var comments = $("#comments").val();
            var NIC = $("#NIC").val();

           
			var dataString = 'Insert_Data='+ name + '&email='+ email + '&phone='+ phone + '&vehicleNumber='+ vehicleNumber 
			+ '&serviceType='+ serviceType + '&date='+ date + '&vehicleType='+ vehicleType + '&time='+ time + '&comments='+ comments+ '&NIC='+ NIC; 
			alert(dataString)
            // if (name == '' || email == '' || phone == '' || vehicleNumber == '' || serviceType == 'Select services you want' || date == '' || vehicleType == 'Select Type' || time == '') {
                // alert("Please fill all required fields.");
                // return false;
            // } else {
                $.ajax({
                    type: "POST",
                    url: "FormProcess.php",
                    data: dataString,
                    cache: false,
                    success: function(response) {
                        $("#serviceBookingForm")[0].reset();
                        $('#largeModal').modal('hide');
                        alert("Form submitted successfully.");
                    }
                });
           // } 
            return false;
        });
    });
</script>
    
	

	
