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
					
					document.getElementById('jobNumber').focus();
					document.getElementById('cmbTechnician').value='';
					document.getElementById('txtTechnicianID').value='';
					document.getElementById('jobNumber').value='';
				 
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
<?php

    //open connection
	require_once("../../Connection/dbconnecting.php");
    
	$ID='';
	$jobNumber='';
	$cmbTechnician='';
	
	
	if(isset($_POST["Insert_cmbTechnician"]))
	{
	    //Get variable
		$cmbTechnician=$_POST["Insert_cmbTechnician"];
		$jobNumber=$_POST["jobNumber"];
		
		if (empty($ID)) {
			//$resultA = $db_handle->runQuery("SELECT * FROM `techniciansassigned` "); //WHERE TechnicianID='$cmbTechnician'
			//if($resultA instanceof mysqli_result && $resultA->num_rows > 0){
				?>
				<script>
					//$(".alertWarning").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Duplicate Record!');
					//$(".alertWarning").fadeIn().delay(2000).fadeOut();
					//document.getElementById('txtServiceType').value='';
					//document.getElementById('txtServiceType').focus();
				</script>
				<?php
			//}else{
				$result = $db_handle->insertQuery("INSERT INTO `techniciansassigned` (`JobNumber`,`TechnicianID`) Values('$jobNumber','$cmbTechnician')");
				
				?>
				<script>
					$(".alertSave").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Save Successfully!');
					$(".alertSave").fadeIn().delay(2000).fadeOut();
					document.getElementById('txtServiceType').value='';
					document.getElementById('txtServiceType').focus();
				</script>
				<?php
			//}
			
		} else {
			$resultD = $db_handle->runQuery("SELECT * FROM `spareparts` WHERE `SpareName`='$SpareName' AND `ID`!='$ID'"); 
			if($resultD instanceof mysqli_result && $resultD->num_rows > 0){
				?>
				<script>
					$(".alertWarning").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Duplicate Record!');
					$(".alertWarning").fadeIn().delay(2000).fadeOut();
					document.getElementById('txtServiceType').value='';
					document.getElementById('txtServiceType').focus();
				</script>
				<?php
			}else{
				$resultB = $db_handle->updateQuery("Update `spareparts` Set `SpareName`='$SpareName' WHERE `ID`='$ID'");
				
				?>
				<script>
					$(".alertSave").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Update Successfully!');
					$(".alertSave").fadeIn().delay(2000).fadeOut();
					document.getElementById('txtServiceType').value='';
					document.getElementById('txtServiceType').focus();
				</script>
				<?php
			}
			
		}	

	
		?>
		
		<div class="row">
			<div class="card-body">
			
				<table class="table table-bordered" style="max-width: 600px; margin: auto;">
					
					<thead>
						<tr>
						   <th scope="col" class="center-align">Delete</th>
							<!--th scope="col" class="center-align">Edit</th-->
							<th scope="col" class="center-align">Job Number</th>
							<th scope="col" class="center-align">Technician Name</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$queryA="SELECT techniciansassigned.ID,`techniciansassigned`.`JobNumber`,`technicians`.`Name` 
						FROM `techniciansassigned` 
						INNER JOIN technicians ON techniciansassigned.TechnicianID = technicians.ID
						WHERE techniciansassigned.`Status`='0'
						ORDER BY techniciansassigned.`ID`";
					$resultA = $db_handle->runQuery($queryA); 
					$i=0;
					if(!empty($resultA)){
						foreach ($resultA as $r) {
							$ID=$r['ID'];
					
							if($i%2==0)
								$classname="evenRow";
							else
								$classname="oddRow";
							?>
							<tr id="show">
							<td style="width:20px;"><a href="#" id="<?php echo $ID; ?>" class="delete" title="Delete"><img width="20" height="20" src="../../images/delete.png"  title="Delete" /></a></td>
							<!--td style="width:20px;"><a href="#" id="<?php echo $ID; ?>" class="Update" title="Update"><img width="20" height="20" src="../../images/edit.png"  title="Update" /></a></td-->
							<td style="width:150px;"><?php echo $r['JobNumber'];?></td>
							<td><?php echo $r['Name'];?></td>
							</tr>
							<?php
						}
						
					}	?>	
					</tbody>
				</table>
			</div>
		</div>
		
<?php
	}		 
	