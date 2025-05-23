 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 
<script type="text/javascript">
    $(document).ready(function () {
  
		$(".delete").click(function () {
			var element = $(this);
			var del_id = element.attr("id");

			if (confirm("Are you sure you want to delete this?")) {
				$.ajax({
					type: "POST",
					url: "FormDelete.php",
					data: { id: del_id }, // Use object literal for data
					success: function (html) {
					$("#displaydelete").html($(html)); // Treat response as jQuery object
					
					document.getElementById('txtServiceTypeID').value='';
					document.getElementById('txtServiceType').value='';
					document.getElementById('txtItemCode').value='';
					document.getElementById('txtItemPrice').value='';
					document.getElementById('cmbServiceType').value='';
					document.getElementById('cmbServiceType').focus();
				 
					},
				});
				$(this).parents("#show").animate({ backgroundColor:"#003"},"slow")
				.animate({ opacity:"hide"},"slow");
			}
		});
	});
</script>
<script type="text/javascript">
	
    //Update script
 	$(document).ready(function(){
		$('a[class="Update"]').click(function(){
			var Row_ID = $(this).val();
			var Row_ID = $(this).attr("id");
			
			if(Row_ID){
				$.ajax({
					type:'POST',
					url: "FormUpdate.php",
					data:'Row_ID_update='+Row_ID,
						success:function(html){
						$('#Row_ID_update').html(html);
						
						var type_ID = $("#type_ID_t").val();
						var ItemCode_t = $("#ItemCode_t").val();
						var Price_t = $("#Price_t").val();
						var ServiceTypeID_t = $("#ServiceTypeID_t").val();
						document.getElementById('cmbServiceType').focus();	 
						document.getElementById('txtServiceType').value=type_ID;
						document.getElementById('txtServiceTypeID').value=Row_ID;
						document.getElementById('txtItemCode').value=ItemCode_t;
						document.getElementById('txtItemPrice').value=Price_t;
						document.getElementById('cmbServiceType').value=ServiceTypeID_t;
						
							
						input.focus();
						input.select();
						
					}
				}); 
			}else{
				$('#link_ShowData').html('<input type="text" value="g" >');
				$('#city').html('<input type="text" value="e" >'); 
			}
		});   
	});	
 
</script>
 
 <script type="text/javascript">
    $(function() {
		$("#Add_Button").click(function() {
			var ID = $("#txtServiceTypeID").val();
			var SparePartName = $("#txtServiceType").val();
			var ItemCode = $("#txtItemCode").val(); 
			var Price = $("#txtItemPrice").val();
			var ServiceTypeID = $("#cmbServiceType").val();  
			
		
			var dataString = 'Insert_txtID='+ ID + '&ServiceType='+ SparePartName+ '&ItemCode='+ ItemCode+ '&Price='+ Price+ '&ServiceTypeID='+ ServiceTypeID; 
					
			if(ServiceTypeID==''){
				$(".textalert1").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Select the Service Type');
				$(".textalert1").fadeIn().delay(2000).fadeOut();
				document.getElementById('cmbServiceType').focus(); 
				
			}else if (SparePartName ==''){
				$(".textalert2").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter the Item Name');
				$(".textalert2").fadeIn().delay(2000).fadeOut();
				document.getElementById('cmbServiceType').focus(); 
			}else if (ItemCode ==''){
				$(".textalert3").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter the Item Name');
				$(".textalert3").fadeIn().delay(2000).fadeOut();
				document.getElementById('txtItemCode').focus(); 
			}else if (Price ==''){
				$(".textalert4").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter the Item Price');
				$(".textalert4").fadeIn().delay(2000).fadeOut();
				document.getElementById('txtItemCode').focus(); 
			}
			else{
			
				$.ajax({
					type: "POST",
					url: "FormProcess.php",
					data: dataString,
					cache: false,
					success: function(html){
						$("#Insert_ServiceType").html(html);
						document.getElementById('txtServiceTypeID').value='';
						document.getElementById('txtServiceType').value='';
						document.getElementById('txtItemCode').value='';
						document.getElementById('txtItemPrice').value='';
						document.getElementById('cmbServiceType').value='';
						document.getElementById('cmbServiceType').focus();
						
						
					}
				});
			}
			return false;
	    });
	});
	</script>
    
	

	
