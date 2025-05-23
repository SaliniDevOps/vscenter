 <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script-->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 
 <script>
	$(document).ready(function(){
		$("#jobNumber").change(function() {
			var JobNumber = $("#jobNumber").val();
			var dataString = 'Load_Details='+ JobNumber;
			//alert(dataString)
			$.ajax({
				type: "POST",
				url: "FormProcess.php",
				data: dataString,
				cache: false,
				success: function(html){   
					$("#LoadDetails").html(html);
					
					var T_customerNIC = $("#T_customerNIC").val();
					var T_Name = $("#T_Name").val();
					var T_Address = $("#T_Address").val();
					var T_Mobile1 = $("#T_Mobile1").val();
					var T_Mobile2 = $("#T_Mobile2").val();
					var T_Email = $("#T_Email").val(); 
					var T_VehicleType = $("#T_VehicleType").val(); 
					
					var T_VehicleRegNo = $("#T_VehicleRegNo").val();
					var T_AppoinmentDate = $("#T_AppoinmentDate").val();
					var T_AppoinmentTime = $("#T_AppoinmentTime").val();
					
					var T_Status = $("#T_Status").val();
					var T_VehicleModels = $("#T_VehicleModels").val();
					var T_FuelType = $("#T_FuelType").val();
					
					document.getElementById('customerNIC').value=T_customerNIC;
					document.getElementById('customerName').value=T_Name;
					document.getElementById('mobile').value=T_Mobile1;
					document.getElementById('email').value= T_Email;
					document.getElementById('regNumber').value= T_VehicleRegNo;
					document.getElementById('AppDate').value= T_AppoinmentDate;
					document.getElementById('AppTime').value= T_AppoinmentTime;
					$("#vehicleType").val(T_VehicleType).change();
					$("#modelType").val(T_VehicleModels).change();
					$("#fuelType").val(T_FuelType).change();
					// document.getElementById('vehicleType').value=1;
					// document.getElementById('modelType').value=T_VehicleModels;
					// document.getElementById('fuelType').value=T_FuelType;	
					
				}
			});
			return false;
		});
	});
</script> 
<script>
$(document).ready(function() {
    $('.button-22').on('click', function(e) {
        e.preventDefault();
        
       
		var JobNumber = $("#jobNumber").val();
			
        // Send AJAX request to fetch details
        $.ajax({
            url: 'FormProcess.php', // The PHP script to handle the request
            method: 'POST',
            data: { id: JobNumber },
            success: function(response) {
                $('#modalContent').html(response);
                $('#detailsModal').css('display', 'block');
            }
        });
    });

    // Close the modal when the user clicks on <span> (x)
    $('.close').on('click', function() {
        $('#detailsModal').css('display', 'none');
    });

    // Close the modal when the user clicks anywhere outside of the modal
    $(window).on('click', function(event) {
        if ($(event.target).is('#detailsModal')) {
            $('#detailsModal').css('display', 'none');
        }
    });
});
</script>
<script>
$(document).ready(function() {
    $('#NewRecordOption').change(function() {
        if ($(this).is(':checked')) {
            $('#jobNumber').val('').prop('disabled', true);
			$('#customerNIC').val('');
			$('#customerName').val('');
			$('#mobile').val('');
			$('#email').val('');
			$('#vehicleType').val('');
			$('#modelType').val('');
			$('#regNumber').val('');
			$('#AppDate').val('');
			$('#AppTime').val('');
			$('#txtYear').val('');
			$('#OdometerRead').val('');
			$('#txtEngineType').val('');
			$('#EngineCapacity').val('');
			$('#fuelType').val('');
			$('#userComment').val('');
			$('#spareName').val('');
			$('#spareModel').val('');
			
			$("#ViewServiceTypeButt").prop('disabled', true);
			
        } else {
            $('#jobNumber').prop('disabled', false);
			$('#customerNIC').val('');
			$('#customerName').val('');
			$('#mobile').val('');
			$('#email').val('');
			$('#vehicleType').val('');
			$('#modelType').val('');
			$('#regNumber').val('');
			$('#AppDate').val('');
			$('#AppTime').val('');
			$('#txtYear').val('');
			$('#OdometerRead').val('');
			$('#txtEngineType').val('');
			$('#EngineCapacity').val('');
			$('#fuelType').val('');
			$('#userComment').val('');
			$('#spareName').val('');
			$('#spareModel').val('');
			 $("#ViewServiceTypeButt").prop('disabled', false);
        }
    });
});
</script>

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
		$(".AddButton1").click(function() {
			var jobNumber = $("#jobNumber").val();
			var customerNIC = $("#customerNIC").val();
			var customerName = $("#customerName").val();
			var mobile = $("#mobile").val();
			var email = $("#email").val();
			var vehicleType = $("#vehicleType").val();
			var modelType = $("#modelType").val();
			var regNumber = $("#regNumber").val();
			var AppDate = $("#AppDate").val();
			var AppTime = $("#AppTime").val();
			var Year = $("#txtYear").val();
			var OdometerRead = $("#OdometerRead").val();
			var EngineType = $("#txtEngineType").val();
			var EngineCapacity = $("#EngineCapacity").val();
			var fuelType = $("#fuelType").val();
			var userComment = $("#userComment").val();
			
			var lenMobile = mobile.toString().length;
			
			if ($('#NewRecordOption').is(':checked')) {
				IsCheckBox = '1';
			}else{
				IsCheckBox = '0';
			}	
			var dataString = 'Insert_AddButton1='+ jobNumber + '&customerNIC='+ customerNIC+ '&customerName='+ customerName 
							+ '&mobile='+ mobile+ '&email='+ email+ '&vehicleType='+ vehicleType+ '&modelType='+ modelType 
							+ '&regNumber='+ regNumber+ '&AppDate='+ AppDate+ '&AppTime='+ AppTime+ '&NewRecordOption='+ NewRecordOption
							+ '&IsCheckBox='+ IsCheckBox; 
						
			if(customerNIC==''){
				$(".textalert1").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter your NIC');
				$(".textalert1").fadeIn().delay(2000).fadeOut();
				//document.getElementById('NIC').focus(); 
			
			}else if (!validateNIC(customerNIC)) {
				$(".textalert1").fadeIn(100).html('<span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>Enter a valid NIC');
				$(".textalert1").fadeIn().delay(2000).fadeOut();
				//document.getElementById('NIC').focus(); 
			}else if(customerName==''){
				$(".textalert2").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter your full name');
				$(".textalert2").fadeIn().delay(2000).fadeOut();
				//document.getElementById('name').focus(); 
				
			}else if(mobile==''){
				$(".textalert3").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter your Phone Number');
				$(".textalert3").fadeIn().delay(2000).fadeOut();
				//document.getElementById('phone').focus(); 
				
			}else if(lenMobile != 10){
				$(".textalert3").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Invalid Mobile Number');
				$(".textalert3").fadeIn().delay(2000).fadeOut();
				//document.getElementById('phone').focus(); 
				
			}
			else if(email==''){
				$(".textalert4").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter your E-Mail');
				$(".textalert4").fadeIn().delay(2000).fadeOut();
				//document.getElementById('email').focus(); 
				
			}else if (!validateEmail(email)) {
                $(".textalert4").fadeIn(100).html('<span class="closebtn" onclick="this.parentElement.style.display=\'none\';"></span>Enter a valid E-Mail');
                $(".textalert4").fadeIn().delay(2000).fadeOut();
                //document.getElementById('email').focus();
				
			}
			else if(vehicleType ==''){
				$(".textalert5").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Select Vehicle Type');
				$(".textalert5").fadeIn().delay(2000).fadeOut();
				//document.getElementById('vehicleType').focus(); 
			}
			else if(modelType ==''){
				$(".textalert6").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Select Vehicle Model');
				$(".textalert6").fadeIn().delay(2000).fadeOut();
				//document.getElementById('vehicleModel').focus(); 
			}
			else if(regNumber==''){
				$(".textalert7").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter Vehicle Number');
				$(".textalert7").fadeIn().delay(2000).fadeOut();
				//document.getElementById('vehicleNumber').focus(); 
				
			}
			// else if(txtCheckInsert==''){
				// $(".textalert7").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Select Services You want');
				// $(".textalert7").fadeIn().delay(2000).fadeOut();
				//document.getElementById('vehicleNumber').focus(); 
				
			// }
			else if(AppDate==''){
				$(".textalert8").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter Appoinmnet Date');
				$(".textalert8").fadeIn().delay(2000).fadeOut();
				//document.getElementById('date').focus(); 
				
			}else if(AppTime==''){
				$(".textalert9").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter Appoinment Time');
				$(".textalert9").fadeIn().delay(2000).fadeOut();
				//document.getElementById('time').focus(); 
			
			}else{			
						
				$.ajax({
					type: "POST",
					url: "FormProcess.php",
					data: dataString,
					cache: false,
					success: function(html){

						$("#Insert_ServiceType").html(html);
						
						$('#customerNIC').val('');
						$('#customerName').val('');
						$('#mobile').val('');
						$('#email').val('');
						$('#vehicleType').val('');
						$('#modelType').val('');
						$('#jobNumber').val('');
						$('#regNumber').val('');
						$('#AppDate').val('');
						$('#AppTime').val('');
						$('#txtYear').val('');
						$('#OdometerRead').val('');
						$('#txtEngineType').val('');
						$('#EngineCapacity').val('');
						$('#fuelType').val('');
						$('#userComment').val('');
						$('#spareName').val('');
						$('#spareModel').val('');
						document.getElementById('NewRecordOption').checked = false;
						$('#jobNumber').prop('disabled', false);
						
						windows.location.reload();
						
					}
				});
			}
			return false;
	    });
	});
	</script>
	

	
    <script type="text/javascript">
    $(function() {
		$("#MoreDetailsButton").click(function() {
			var txtYear = $("#txtYear").val();
			var OdometerRead = $("#OdometerRead").val();
			var txtEngineType = $("#txtEngineType").val();
			var EngineCapacity = $("#EngineCapacity").val();
			var fuelType = $("#fuelType").val();
			var userComment = $("#userComment").val();
			var jobNumber = $("#jobNumber").val();
			
			var dataString = 'Insert_txtYear='+ txtYear + '&OdometerRead='+ OdometerRead+ '&txtEngineType='+ txtEngineType 
							+ '&EngineCapacity='+ EngineCapacity+ '&fuelType='+ fuelType+ '&userComment='+ userComment 
							+ '&jobNumber='+ jobNumber;
						
			if(jobNumber==''){
				$(".textalertA").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Select Job Number!');
				$(".textalertA").fadeIn().delay(2000).fadeOut();
				//document.getElementById('NIC').focus(); 
			
			}else{
				$.ajax({
					type: "POST",
					url: "FormProcess.php",
					data: dataString,
					cache: false,
					success: function(html){

						$("#Insert_OtherDetails").html(html);
						
						$('#txtYear').val('');
						$('#OdometerRead').val('');
						$('#txtEngineType').val('');
						$('#EngineCapacity').val('');
						$('#fuelType').val('');
						$('#userComment').val('');
						
					}
				});
			}
			
		
			return false;
	    });
	});
	</script>	
<script type="text/javascript">
    $(document).ready(function(){
		$("#ItemCode").keyup(function(){
			var ItemCode = $(this).val();
			var dataString = 'Tradname_key='+ ItemCode ;
			
			$.ajax({
			type: "POST",
			url: "FormSuggession.php",
			data:dataString,
			beforeSend: function(){	
				$("#ItemCodeSuggets").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
			},
			success: function(data){
				$("#suggesstions1").show();
				$("#suggesstions1").html(data);
				$("#ItemCodeSuggets").css("background","#FFF");
				
				//var StockID_T = $("#StockID_T").val();
				//document.getElementById('StockID').value=StockID_T;
			}
			});
		});
	});
	function selectname(SpareCode,SpareName,ID){
		$("#ItemCode").val(SpareCode);
		$("#ItemName").val(SpareName);
		$("#HiddenID").val(ID);
		
		$("#suggesstions1").hide();
	}
</script>

<script type="text/javascript">
    $(function() {
		$("#Add_Button_SparePart").click(function() {
			var jobNumber = $("#jobNumber").val();
			var ItemCode = $("#ItemCode").val();
			var ItemName = $("#ItemName").val();
			var HiddenID = $("#HiddenID").val();
			var QTY = $("#QTY").val();
			var Hidden_SpareItemID = $("#Hidden_SpareItemID").val();
			
			var dataString = 'Insert_SpareDetails='+ jobNumber + '&ItemCode='+ ItemCode+ '&ItemName='+ ItemName 
							+ '&HiddenID='+ HiddenID + '&QTY='+ QTY+ '&Hidden_SpareItemID='+ Hidden_SpareItemID;;
						
			if(jobNumber==''){
				$(".textalertAC").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Select Job Number!');
				$(".textalertAC").fadeIn().delay(2000).fadeOut();
				//document.getElementById('NIC').focus(); 
			
			}else{
				$.ajax({
					type: "POST",
					url: "FormProcess.php",
					data: dataString,
					cache: false,
					success: function(html){

						$("#Insert_SpareDetails").html(html);
						
						$('#ItemCode').val('');
						$('#ItemName').val('');
						$('#HiddenID').val('');
						$('#Hidden_SpareItemID').val('');
						$('#QTY').val('');
						document.getElementById('jobNumber').disabled = false;
						document.getElementById('ItemCode').disabled = false;
						document.getElementById('ItemName').disabled = false;
						
					}
				});
			}
			
		
			return false;
	    });
	});
	</script>