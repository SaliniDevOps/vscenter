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
					
					document.getElementById('NIC').focus();
					document.getElementById('Name').value='';
					document.getElementById('Address').value='';
					document.getElementById('Mobile').value='';
					document.getElementById('Mail').value='';
					document.getElementById('HiddenID').value='';
					document.getElementById('NIC').value='';
				 
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
					
						var NIC_t = $("#NIC_t").val();
						var Name_t = $("#Name_t").val();
						var Address_t = $("#Address_t").val();
						var Mobile1_t = $("#Mobile1_t").val();
						var Email_t = $("#Email_t").val();
						var ID_t = $("#ID_t").val();
							 
						document.getElementById('NIC').value=NIC_t;
						document.getElementById('Name').value=Name_t;
						document.getElementById('Address').value=Address_t;
						document.getElementById('Mobile').value=Mobile1_t;
						document.getElementById('Mail').value=Email_t;
						document.getElementById('HiddenID').value=ID_t;
						
							
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
 
	function validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }
	
	function validateNIC(nic) {
		var regex = /^[0-9]{9}[vV]$/;
		return regex.test(nic);
	}
 
 
    $(function() {
		$("#Add_Button").click(function() {
			var NIC = $("#NIC").val();
			var Name = $("#Name").val();
			var Address = $("#Address").val();
			var Mobile = $("#Mobile").val();
			var Mail = $("#Mail").val();
			var HiddenID = $("#HiddenID").val();
			
			var lenMobile = Mobile.toString().length;
		
			var dataString = 'Insert_Technicians='+ NIC + '&Name='+ Name+ '&Address='+ Address+ '&Mobile='+ Mobile+ '&Mail='+ Mail+ '&HiddenID='+ HiddenID; 
							
			if(NIC==''){
				$(".textalert1").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter your NIC');
				$(".textalert1").fadeIn().delay(2000).fadeOut();
				document.getElementById('NIC').focus(); 
				
			}else if (!validateNIC(NIC)) {
				$(".textalert1").fadeIn(100).html('<span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>Enter a valid NIC');
				$(".textalert1").fadeIn().delay(2000).fadeOut();
				document.getElementById('NIC').focus(); 
				
			}else if(Name==''){
				$(".textalert2").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter your full name');
				$(".textalert2").fadeIn().delay(2000).fadeOut();
				document.getElementById('Name').focus(); 
				
			}else if(Address==''){
				$(".textalert3").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter your full name');
				$(".textalert3").fadeIn().delay(2000).fadeOut();
				document.getElementById('Address').focus(); 
				
			}else if(Mobile==''){
				$(".textalert4").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter your Phone Number');
				$(".textalert4").fadeIn().delay(2000).fadeOut();
				document.getElementById('Mobile').focus(); 
				
			}else if(lenMobile != 10){
				$(".textalert4").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Invalid Mobile Number');
				$(".textalert4").fadeIn().delay(2000).fadeOut();
				document.getElementById('Mobile').focus(); 
				
			}else if(Mail==''){
				$(".textalert5").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter your E-Mail');
				$(".textalert5").fadeIn().delay(2000).fadeOut();
				document.getElementById('Mail').focus(); 
				
			}else if (!validateEmail(Mail)) {
                $(".textalert5").fadeIn(100).html('<span class="closebtn" onclick="this.parentElement.style.display=\'none\';"></span>Enter a valid E-Mail');
                $(".textalert5").fadeIn().delay(2000).fadeOut();
                document.getElementById('Mail').focus();
		
			}else{
			
				$.ajax({
					type: "POST",
					url: "FormProcess.php",
					data: dataString,
					cache: false,
					success: function(html){

						$("#Insert_ServiceType").html(html);
						
						document.getElementById('NIC').focus();
						document.getElementById('Name').value='';
						document.getElementById('Address').value='';
						document.getElementById('Mobile').value='';
						document.getElementById('Mail').value='';
						document.getElementById('HiddenID').value='';
						document.getElementById('NIC').value='';
						
					}
				});
			}
			return false;
	    });
	});
	</script>
    
	
