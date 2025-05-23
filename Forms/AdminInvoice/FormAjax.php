 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 


 
 <script type="text/javascript">
    $(function() {
		$("#ShowButton").click(function() {
			var jobNumber = $("#jobNumber").val();
			
			
		
			var dataString = 'Load_Details='+ jobNumber; 
						
			// if(ServiceType==''){
				// $(".textalert1").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter the Service Type');
				// $(".textalert1").fadeIn().delay(2000).fadeOut();
				// document.getElementById('txtServiceTypeID').focus(); 
				
			// }else{
			
				$.ajax({
					type: "POST",
					url: "FormProcess.php",
					data: dataString,
					cache: false,
					success: function(html){

						$("#LoadTextBoxes").html(html);
						
						var Name_t = $("#Name_t").val();
						var Mobile1_t = $("#Mobile1_t").val();
						var Email_t = $("#Email_t").val();
						var VehicleType_t = $("#VehicleType_t").val();
						var VehicleRegNo_t = $("#VehicleRegNo_t").val();
						
						document.getElementById('customerName').value=Name_t;
						document.getElementById('mobile').value=Mobile1_t;
						document.getElementById('email').value=Email_t;
						document.getElementById('vehicleTypetxt').value=VehicleType_t;
						document.getElementById('vehicleNumber').value=VehicleRegNo_t;
						// document.getElementById('txtServiceType').focus();
						// document.getElementById('txtServiceTypeID').value='';
						// document.getElementById('txtServiceType').value='';
						
						
					}
				});
			// }
			return false;
	    });
	});
	</script>
    
	
<script type="text/javascript">
    $(function() {
		$("#printInvoice").click(function() {
			var jobNumber = $("#jobNumber").val();
			var totalPrice = $("#totalPrice").val();
			var txtSubTotal = $("#txtSubTotal").val();
			var cmbPaymentMethod = $("#cmbPaymentMethod").val();
			var txtNote = $("#txtNote").val();
			var txtBalance = $("#txtBalance").val();
			var txtAdditionalCharges = $("#txtAdditionalCharges").val();
			var PaidAmount = $("#PaidAmount").val();
			var invoiceNumber = $("#invoiceNumber").val();
			
			
		
			var dataString = 'Load_SaveInvoice='+ jobNumber + '&totalPrice='+ totalPrice+ '&txtSubTotal='+ txtSubTotal 
			+ '&cmbPaymentMethod='+ cmbPaymentMethod+ '&txtNote='+ txtNote+ '&txtBalance='+ txtBalance 
			+ '&txtAdditionalCharges='+ txtAdditionalCharges+ '&PaidAmount='+ PaidAmount; 
						
			
			
				$.ajax({
					type: "POST",
					url: "FormProcess.php",
					data: dataString,
					cache: false,
					success: function(html){

						$("#SaveInvoiceDetails").html(html);
						
						
						 var reportWindow = window.open("InvoiceReport.php?jobNumber=" + jobNumber +
                                               "&totalPrice=" + totalPrice +
                                               "&txtSubTotal=" + txtSubTotal +
                                               "&cmbPaymentMethod=" + cmbPaymentMethod +
                                               "&txtNote=" + txtNote +
                                               "&txtBalance=" + txtBalance +
                                               "&txtAdditionalCharges=" + txtAdditionalCharges +
                                               "&PaidAmount=" + PaidAmount +
                                               "&invoiceNumber=" + invoiceNumber,
                                               "InvoiceReport");

							var timer = setInterval(function() {
								if (reportWindow.closed) {
									clearInterval(timer);
									location.reload(); // Refresh the parent page when the report window is closed
								}
							}, 1000);
						// window.location = "InvoiceReport.php?jobNumber=" + jobNumber +
										  // "&totalPrice=" + totalPrice +
										  // "&txtSubTotal=" + txtSubTotal +
										  // "&cmbPaymentMethod=" + cmbPaymentMethod +
										  // "&txtNote=" + txtNote +
										  // "&txtBalance=" + txtBalance +
										  // "&txtAdditionalCharges=" + txtAdditionalCharges +
										  // "&PaidAmount=" + PaidAmount +
										  // "&invoiceNumber=" + invoiceNumber;
										 // "&customerID=" + customerID;
						
					}
				});
			// }
			return false;
	    });
	});
	</script>
    
	
