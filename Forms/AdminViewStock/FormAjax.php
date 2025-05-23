 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 

 
 <script type="text/javascript">
    $(function() {
		$("#Serach_Button").click(function() {
			var ItemName = $("#ItemName").val();
			var StockID = $("#StockID").val();
			
			var dataString = 'Insert_ItemName='+ ItemName + '&StockID='+ StockID; 
					
			
				// $(".textalert1").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Select the service type');
				// $(".textalert1").fadeIn().delay(2000).fadeOut();
				// document.getElementById('ItemName').focus(); 
				
			
			
				$.ajax({
					type: "POST",
					url: "FormProcess.php",
					data: dataString,
					cache: false,
					success: function(html){

						$("#LoadData").html(html);
						document.getElementById('ItemName').focus();
						document.getElementById('ItemName').value='';
						
						
					}
				});
			
			return false;
	    });
	});
	</script>
    
<script type="text/javascript">
    $(document).ready(function(){
		$("#ItemName").keyup(function(){
			var Tradname = $(this).val();
			var dataString = 'Tradname_key='+ Tradname ;
			
			$.ajax({
			type: "POST",
			url: "FormSuggession.php",
			data:dataString,
			beforeSend: function(){	
				$("#CustomerName").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
			},
			success: function(data){
				$("#suggesstions1").show();
				$("#suggesstions1").html(data);
				$("#CustomerName").css("background","#FFF");
				
				var StockID_T = $("#StockID_T").val();
				document.getElementById('StockID').value=StockID_T;
			}
			});
		});
	});
	function selectname(selected_value){
		$("#ItemName").val(selected_value);
		$("#suggesstions1").hide();
	}
</script>

	
