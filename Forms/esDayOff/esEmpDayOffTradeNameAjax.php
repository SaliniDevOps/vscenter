

<script type="text/javascript">
    //==============Customer Name Load==========================
   	$(document).ready(function(){
		$("#cmbEmployeeName").keyup(function(){
			var Tradname = $(this).val();
			var dataString = 'Tradname_key='+ Tradname ;
			
			$.ajax({
				type: "POST",
				url: "Forms/esDayOff/esEmpDayOffTradenameProcess.php",
				data:dataString,
				beforeSend: function(){	
					$("#CustomerName").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
				},
				success: function(data){
					$("#suggesstions1").show();
					$("#suggesstions1").html(data);
					$("#CustomerName").css("background","#FFF");
					
				}
			});
		});
	});
	function selectname(selected_value){
		$("#cmbEmployeeName").val(selected_value);
		$("#suggesstions1").hide();
	}
</script>