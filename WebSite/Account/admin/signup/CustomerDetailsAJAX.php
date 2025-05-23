<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
	$('.download-link').on('click', function(event) {
	  event.preventDefault(); // Prevent the default link behavior

	  // Get the data attributes
	  var jobNumber = $(this).data('jobnumber');
	  var invoiceNumber = $(this).data('invoicenumber');
		var dataString = 'jobNumber='+ jobNumber + '&invoiceNumber='+ invoiceNumber
	  // Send the data to PHP using AJAX
	  $.ajax({
		type: "POST",
		url: "CustomerDetailsPOPUP.php",
		data: dataString,
		cache: false,
		success: function(html){
			$("#Display_POPUP").html(html);
			
			
			
		}
	});
	  
	  
	  
	});
  });
</script>