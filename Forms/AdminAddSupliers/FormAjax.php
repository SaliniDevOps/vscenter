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
					
					document.getElementById('Company').focus();
					document.getElementById('Company').value='';
					document.getElementById('SupplierName').value='';
					document.getElementById('Mobile').value='';
					document.getElementById('Email').value='';
					document.getElementById('HiddenID').value='';
				 
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
						
						var ID_T = $("#ID_T").val();
						var Company_T = $("#Company_T").val();
						var Company_T = $("#Company_T").val();
						var SupplierName_T = $("#SupplierName_T").val();
						var Mobile_T = $("#Mobile_T").val();
						var Email_T = $("#Email_T").val();
							 
						document.getElementById('Company').focus();
						document.getElementById('Company').value=Company_T;
						document.getElementById('SupplierName').value=SupplierName_T;
						document.getElementById('Mobile').value=Mobile_T;
						document.getElementById('Email').value=Email_T;
						document.getElementById('HiddenID').value=ID_T;
						
							
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
 
	function validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }
 
    $(function() {
		$("#Add_Button").click(function() {
			var Company = $("#Company").val();
			var SupplierName = $("#SupplierName").val();
			var Mobile = $("#Mobile").val();
			var Email = $("#Email").val();
			var HiddenID = $("#HiddenID").val();
			
			var lenMobile = Mobile.toString().length;
		
			var dataString = 'Insert_HiddenID='+ HiddenID + '&Email='+ Email+ '&Mobile='+ Mobile+ '&SupplierName='+ SupplierName+ '&Company='+ Company; 
							
			if(Company==''){
				$(".textalert1").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Select the Company');
				$(".textalert1").fadeIn().delay(2000).fadeOut();
				document.getElementById('Company').focus(); 
				
			}else if(SupplierName==''){
				$(".textalert2").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter the Supplier Name');
				$(".textalert2").fadeIn().delay(2000).fadeOut();
				document.getElementById('SupplierName').focus(); 
			
			}else if(Mobile==''){
				$(".textalert3").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter the Mobile Number');
				$(".textalert3").fadeIn().delay(2000).fadeOut();
				document.getElementById('Mobile').focus(); 
			}else if(lenMobile!=10){
				$(".textalert3").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Invalid Mobile Number');
				$(".textalert3").fadeIn().delay(2000).fadeOut();
				document.getElementById('Mobile').focus(); 
			}
			else if(Email==''){
				$(".textalert4").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter the Supplier E-Mail');
				$(".textalert4").fadeIn().delay(2000).fadeOut();
				document.getElementById('Email').focus(); 
			
			}else if (!validateEmail(Email)) {
                $(".textalert4").fadeIn(100).html('<span class="closebtn" onclick="this.parentElement.style.display=\'none\';"></span>Enter a valid E-Mail');
                $(".textalert4").fadeIn().delay(2000).fadeOut();
                document.getElementById('Email').focus();
			
			}else{
			
				$.ajax({
					type: "POST",
					url: "FormProcess.php",
					data: dataString,
					cache: false,
					success: function(html){

						$("#Insert_ServiceType").html(html);
						document.getElementById('Company').focus();
						document.getElementById('Company').value='';
						document.getElementById('SupplierName').value='';
						document.getElementById('Mobile').value='';
						document.getElementById('Email').value='';
						document.getElementById('HiddenID').value='';
						
					}
				});
			}
			return false;
	    });
	});
	</script>
    
	

	
