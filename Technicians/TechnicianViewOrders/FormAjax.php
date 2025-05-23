<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('.more-details-link').on('click', function(e) {
        e.preventDefault();
        
        var appointmentId = $(this).data('id');
        
        // Send AJAX request to fetch details
        $.ajax({
            url: 'FormProcess.php', // The PHP script to handle the request
            method: 'POST',
            data: { id: appointmentId },
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
$(document).ready(function(){
    $('a.confirm-link').click(function(event){
        event.preventDefault(); // Prevent the default action of the link

        var appointmentID = $(this).data('id');
        
       if(confirm("Are you sure you want to Complete this?")){
			$.ajax({
				url: 'FormProcess.php', // The URL to your form processing script
				type: 'POST',
				data: { UpdateConfirm: appointmentID },
				success: function(response) {
					// Show the server response in the div with id="response"
					$("#response").html(response);
					// Optionally, you can reload the page
					 window.location.reload();
				},
				error: function(xhr, status, error) {
					console.error('AJAX Error: ' + status + error);
				}
			});
		}
    });
});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#searchButton").click(function() {
		
			var fromDate = $("#fromDate").val();	
			var toDate = $("#toDate").val();	
			
			var dataString = 'SearchData='+ fromDate +'&toDate=' + toDate;
			
			$.ajax({
				type: "POST",
				url: "FormProcess.php",
				data: dataString,
				cache: false,
				success: function(html){
					$("#SerchBt").html(html);
						
					
				}
			});
			return false;
		});
	});
</script>	
