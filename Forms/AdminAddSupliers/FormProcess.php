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
<?php

    //open connection
	require_once("../../Connection/dbconnecting.php");
    
	$ID='';
	$Company='';
	$SupplierName='';
	$Mobile='';
	$Email='';
	
	
	if(isset($_POST["Insert_HiddenID"]))
	{
	    //Get variable
		$ID=$_POST["Insert_HiddenID"];
		$Company=$_POST["Company"];
		$SupplierName=$_POST["SupplierName"];
		$Mobile=$_POST["Mobile"];
		$Email=$_POST["Email"];
		
		if (empty($ID)) {
			
			$resultA = $db_handle->runQuery("SELECT * FROM `suppliers` WHERE `SupplierName`='$SupplierName'"); 
			if($resultA instanceof mysqli_result && $resultA->num_rows > 0){
				?>
				<script>
					$(".alertWarning").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Duplicate Record!');
					$(".alertWarning").fadeIn().delay(2000).fadeOut();
					document.getElementById('Company').focus();
					document.getElementById('Company').value='';
					document.getElementById('SupplierName').value='';
					document.getElementById('Mobile').value='';
					document.getElementById('Email').value='';
					document.getElementById('HiddenID').value='';
				</script>
				<?php
			}else{
				$result = $db_handle->insertQuery("INSERT INTO `suppliers` (`Company`,`SupplierName`,`Mobile`,`Email`) 
				Values('$Company','$SupplierName','$Mobile','$Email')");
				
				?>
				<script>
					$(".alertSave").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Save Successfully!');
					$(".alertSave").fadeIn().delay(2000).fadeOut();
					document.getElementById('Company').focus();
					document.getElementById('Company').value='';
					document.getElementById('SupplierName').value='';
					document.getElementById('Mobile').value='';
					document.getElementById('Email').value='';
					document.getElementById('HiddenID').value='';
				</script>
				<?php
			}
			
		} else {
			$resultD = $db_handle->runQuery("SELECT * FROM `suppliers` WHERE `SupplierName`='$SupplierName' AND `ID`!='$ID'"); 
			if($resultD instanceof mysqli_result && $resultD->num_rows > 0){
				?>
				<script>
					$(".alertWarning").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Duplicate Record!');
					$(".alertWarning").fadeIn().delay(2000).fadeOut();
					//document.getElementById('txtServiceType').value='';
					//document.getElementById('txtServiceType').focus();
				</script>
				<?php
			}else{
				$resultB = $db_handle->updateQuery("Update `suppliers` Set `Company`='$Company',`SupplierName`='$SupplierName',`Mobile`='$Mobile' ,`Email`='$Email' 
				WHERE `ID`='$ID'");
				
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
				
				<table class="table table-bordered" style="max-width: 1050px; margin: auto;">
					<thead>
						<tr>
							<th scope="col" class="center-align" style="background-color: #204060; color: white;">Delete</th>
							<th scope="col" class="center-align" style="background-color: #204060; color: white;">Edit</th>
							<th scope="col" class="center-align" style="background-color: #204060; color: white;">Comapany</th>
							<th scope="col" class="center-align" style="background-color: #204060; color: white;">Supplier Name</th>
							<th scope="col" class="center-align" style="background-color: #204060; color: white;">Mobile</th>
							<th scope="col" class="center-align" style="background-color: #204060; color: white;">E-Mail</th>
						</tr>
					</thead>
					<tbody>
					<?php
				
					$queryA="SELECT * FROM `suppliers` ORDER BY `ID`";
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
							<td style="width:20px;"><a href="#" id="<?php echo $ID; ?>" class="Update" title="Update"><img width="20" height="20" src="../../images/edit.png"  title="Update" /></a></td>
							<td><?php echo $r['Company'];?></td>
							<td><?php echo $r['SupplierName'];?></td>
							<td><?php echo $r['Mobile'];?></td>
							<td><?php echo $r['Email'];?></td>
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
	