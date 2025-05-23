 <script type="text/javascript">
	
    //Update script
 	$(document).ready(function(){
		$('a[class="Update"]').click(function(){
			var Row_ID = $(this).val();
			var Row_ID = $(this).attr("id");
			
			if(Row_ID){
				$.ajax({
					type:'POST',
					url: "Forms/esDayOff/esEmpDayOffUpdate.php",
					data:'Row_ID_update='+Row_ID,
						success:function(html){
						$('#Row_ID_update').html(html);
						
						var RowID_t = $("#RowID_t").val();
						var cmbEmployeeName_t = $("#cmbEmployeeName_t").val();
						var txtCode_t = $("#txtCode_t").val();
						var txtDate_t = $("#txtDate_t").val();
					
								 
						document.getElementById('DayOffId').value=RowID_t;
						document.getElementById('cmbEmployeeName').value=cmbEmployeeName_t;
						document.getElementById('cmbEmployeeName').disabled=true;
						document.getElementById('txtCode').disabled=true;
						document.getElementById('txtCode').value=txtCode_t;
						document.getElementById('txtDate').value=txtDate_t;
						
							
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
//insert Data

    $(function() {
		$(".Add_button").click(function() {
			var ID = $("#DayOffId").val();
			var cmbEmployeeName = $("#txtCode").val();
			var txtDate= $("#txtDate").val();
			var txtCode = $("#txtCode").val();
		
			var dataString = 'Insert_DayOff='+ cmbEmployeeName + '&txtDate='+ txtDate 
								+ '&txtCode='+ txtCode
								+ '&ID='+ ID;
			
				if(cmbEmployeeName==''){
					//alert("Please Enter EmpType");
					$(".cmbEmployeeName").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Select Employee Name');
					$(".cmbEmployeeName").fadeIn().delay(2000).fadeOut();
					document.getElementById('cmbEmployeeName').focus();
					
				}
				if(cmbEmployeeName!='' && txtDate==''){
					//alert("Please Enter EmpType");
					$(".txtDate").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter No Pay Days');
					$(".txtDate").fadeIn().delay(2000).fadeOut();
					document.getElementById('txtDays').focus();
				}
				if(cmbEmployeeName!='' && txtDate!=''&& txtCode==''){
					//alert("Please Enter EmpType");
					$(".txtCode").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter Employee Code');
					$(".txtCode").fadeIn().delay(2000).fadeOut();
					document.getElementById('txtCode').focus();
				}
			
			else
			{
			
				$("#flash").show();
				$("#flash").fadeIn(400).html('<img src="ajax-loader.gif" align="absmiddle">&nbsp;<span class="loading">Loading Comment...</span>');

				$.ajax({
						type: "POST",
						url: "Forms/esDayOff/esEmpDayOffProcess.php",
						data: dataString,
						cache: false,
						success: function(html){

							$("#Insert_NoPay").html(html);
							document.getElementById('txtCode').focus();
							doccument.getElementById('txtCode').disabled=false; 
							doccument.getElementById('cmbEmployeeName').disabled=false; 
							document.getElementById('cmbEmployeeName').value='';
							document.getElementById('txtDays').value='';
							document.getElementById('txtCode').value='';
							document.getElementById('NoPayID').value='';

							$("#flash").hide();
						}
					});
			}
			return false;
	    });
	});
	 </script>
    <script>
	$(document).ready(function(){
		$("#cmbEmployeeName").change(function() {
			var CboName = $("#cmbEmployeeName").val();
			var dataString = 'EmplyeeNameloadcmb='+ CboName;

			if(CboName=='')
			{
			}
			else
			{
				$.ajax({
					type: "POST",
					url: "Forms/esDayOff/esEmpDayOffProcess.php",
					data: dataString,
					cache: false,
					success: function(html){  
						$("#EmplyeeNameloadcmb").html(html);
						document.getElementById('cmbEmployeeName').focus();
						$("#flash").hide();
					}
				});
			}
			return false;
		});
	});
</script>
		
	
<script type="text/javascript">
	//Delete icon script
	$(function() {
		$(".delete").click(function(){
			var element = $(this);
			var del_id = element.attr("id");
			var info = 'id=' + del_id;
			
			if(confirm("Are you sure you want to delete this?"))
			{
				$.ajax({
				type: "POST",
				url: "Forms/esDayOff/esEmpDayOffDelete.php",
				data: info,
					success: function(html){
						$("#displaydelete").html(html);
							
							document.getElementById('txtCode').focus();
							document.getElementById('cmbEmployeeName').value='';
							document.getElementById('txtDate').value='<?php echo $today; ?>';
							document.getElementById('txtCode').value='';
							document.getElementById('DayOffId').value='';
							document.getElementById('cmbEmployeeName').disabled=false;
							document.getElementById('txtCode').disabled=false;	
					}
				});
			  $(this).parents("#show").animate({ backgroundColor: "#003" }, "slow")
			  .animate({ opacity: "hide" }, "slow");
			}
			return false;
		});
	});
</script>
	
<script type="text/javascript">
	$(document).ready(function(){
		$("#Show_button").click(function() {
		
			var element = $(this);
			var Added_Employee= "AddMethode";		
			var EmployeeCode = $("#txtCode").val();
			var EmployeeName = $("#cmbEmployeeName").val();
			
			var dataString = 'Added_Employee='+ Added_Employee +'&EmployeeCode=' + EmployeeCode +
							'&EmployeeName=' + EmployeeName ;	

			if(EmployeeCode ==''){
					$(".txtCode").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter Employee Code');
					$(".txtCode").fadeIn().delay(2000).fadeOut();
					document.getElementById('txtCode').focus();
			} else  {
				$("#flash").show();
				$("#flash").fadeIn(400).html('<img src="ajax-loader.gif"align="absmiddle">&nbsp;<span class="loading">Loading Comment...</span>');
				
				$.ajax({
					
					type: "POST",
					url: "Forms/esDayOff/esEmpDayOffProcess.php",
					data: dataString,
					cache: false,
					success: function(html){
						
						$("#Added_Employee").html(html);
							var TEmployeeName = $("#TEmployeeName").val();	
							document.getElementById('cmbEmployeeName').value=TEmployeeName;
							document.getElementById('txtCode').focus();
						
						$("#flash").hide();
					}
				});
			}
			return false;
		});
	});
</script>	