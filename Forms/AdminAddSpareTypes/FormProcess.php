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
<?php

    //open connection
	require_once("../../Connection/dbconnecting.php");
    
	$ID='';
	$SpareName='';
	$ServiceTypeID='';
	$ItemCode='';
	$Price='';
	
	
	if(isset($_POST["Insert_txtID"]))
	{
	    //Get variable
		$ID=$_POST["Insert_txtID"];
		$SpareName=$_POST["ServiceType"];
		$ServiceTypeID=$_POST["ServiceTypeID"];
		$ItemCode=$_POST["ItemCode"];
		$Price=$_POST["Price"];
		
		if (empty($ID)) {
			$resultA = $db_handle->runQuery("SELECT * FROM `spareparts` WHERE `SpareName`='$SpareName'"); 
			if($resultA instanceof mysqli_result && $resultA->num_rows > 0){
				?>
				<script>
					$(".alertWarning").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Duplicate Record!');
					$(".alertWarning").fadeIn().delay(2000).fadeOut();
					document.getElementById('txtServiceType').value='';
					document.getElementById('txtServiceType').focus();
				</script>
				<?php
			}else{
				$result = $db_handle->insertQuery("INSERT INTO `spareparts` (`ServiceTypeID`,`SpareName`,`ItemCode`,`Price`) 
				Values('$ServiceTypeID','$SpareName','$ItemCode','$Price')");
				
				
				
				?>
				<script>
					$(".alertSave").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Save Successfully!');
					$(".alertSave").fadeIn().delay(2000).fadeOut();
					document.getElementById('txtServiceType').value='';
					document.getElementById('txtServiceType').focus();
				</script>
				<?php
			}
			
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
				$resultB = $db_handle->updateQuery("Update `spareparts` Set `SpareName`='$SpareName',`ServiceTypeID`='$ServiceTypeID',
				`ItemCode`= '$ItemCode',`Price`='$Price'
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
				
				<table class="table table-bordered" style="max-width: 1200px; margin: auto;">
					<!--table class="table table-bordered" style="max-width: 500px; margin-right: auto;"-->
					<thead>
						<tr>
							<th  class="center-align" style="background-color: #204060; color: white; width:5px;">Delete</th>
							<th  class="center-align" style="background-color: #204060; color: white; width:5px;">Edit</th>
							<th  class="center-align" style="background-color: #204060; color: white; width:210px;">Service Type</th>
							<th  class="center-align" style="background-color: #204060; color: white; width:180px;">Item Name</th>
							<th  class="center-align" style="background-color: #204060; color: white; width:100px;">Item Code</th>
							<th  class="center-align" style="background-color: #204060; color: white; width:100px;">Item Price</th>
						</tr>
					</thead>
					<tbody>
					<?php
				
					$queryA="SELECT spareparts.*, `servicetype`.`ServiceType`
					FROM `spareparts` 
					INNER JOIN servicetype ON servicetype.ID = spareparts.ServiceTypeID
					ORDER BY spareparts.`ID`";
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
							<td><?php echo $r['ServiceType'];?></td>
							<td><?php echo $r['SpareName'];?></td>
							<td><?php echo $r['ItemCode'];?></td>
							<td style="text-align:right"><?php echo number_format($r['Price'],2);?></td>
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
	