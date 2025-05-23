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
					
					document.getElementById('txtServiceType').focus();
					document.getElementById('txtServiceTypeID').value='';
					document.getElementById('txtServiceType').value='';
				 
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
							 
						document.getElementById('txtServiceType').value=type_ID;
						document.getElementById('txtServiceTypeID').value=Row_ID;
						
							
						//const input=document.getElementById('txtDays');
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
		$("#Show_Button").click(function() {
			var suppliers = $("#suppliers").val();
			
			var dataString = 'Insert_suppliers='+ suppliers;
							
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

						$("#Load_SupplierDetails").html(html);
						
						var Company_t = $("#Company_t").val();
						var Mobile_t = $("#Mobile_t").val();
						var Email_t = $("#Email_t").val();
							 
						document.getElementById('Company').value=Company_t;
						document.getElementById('Mobile').value=Mobile_t;
						document.getElementById('Email').value=Email_t;
						// document.getElementById('txtServiceType').focus();
						// document.getElementById('txtServiceTypeID').value='';
						// document.getElementById('txtServiceType').value='';
						
					}
				});
			//}
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
    $(function() {
		$("#Add_Button").click(function() {
			var ItemIDHidden = $("#HiddenID").val();
			var OrderQTY = $("#OrderQTY").val();
			var NewPrice = $("#NewPrice").val();
			var OrderID = $("#OrderID").val();
			
			
			var dataString = 'InsrtOrderItemsTemporary='+ ItemIDHidden + '&OrderQTY='+ OrderQTY+ '&NewPrice='+ NewPrice+ '&OrderID='+ OrderID;
					
			
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
					document.getElementById('ItemCode').focus();
					document.getElementById('HiddenID').value='';
					document.getElementById('OrderQTY').value='';
					document.getElementById('NewPrice').value='';
					document.getElementById('ItemCode').value='';
					document.getElementById('ItemName').value='';
					
					
					
					
					
				}
			});
			
			return false;
	    });
	});
	</script>
	
	<script type="text/javascript">
    $(function() {
		$("#Save_Button").click(function() {
			var OrderID = $("#OrderID").val();
			var suppliers = $("#suppliers").val();
			var Date = $("#Date").val();
			//var OrderQTY = $("#OrderQTY").val();
			//var NewPrice = $("#NewPrice").val();
			//var OrderID = $("#OrderID").val();
			
			
			var dataString = 'SaveOrderDe='+ OrderID + '&suppliers='+ suppliers+ '&Date='+ Date ;
			//var dataString = 'InsrtOrderItemsTemporary='+ ItemIDHidden + '&OrderQTY='+ OrderQTY+ '&NewPrice='+ NewPrice+ '&OrderID='+ OrderID;
			
			$.ajax({
				type: "POST",
				url: "FormProcess.php",
				data: dataString,
				cache: false,
				success: function(html){

					$("#SaveData").html(html);
					
					alert("Save Items Successfully!")
					
					window.location.reload();
					
					
					
				}
			});
			
			return false;
	    });
	});
	</script>