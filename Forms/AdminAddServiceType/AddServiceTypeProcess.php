<script type="text/javascript">
    $(document).ready(function () {
  
		$(".delete").click(function () {
			var element = $(this);
			var del_id = element.attr("id");

			if (confirm("Are you sure you want to delete this?")) {
				$.ajax({
					type: "POST",
					url: "AddServiceTypeDelete.php",
					data: { id: del_id }, // Use object literal for data
					success: function (html) {
					$("#displaydelete").html($(html)); // Treat response as jQuery object
					
					document.getElementById('txtServiceType').focus();
					document.getElementById('txtServiceTypeID').value='';
					document.getElementById('txtServiceType').value='';
					document.getElementById('txtPrice').value='';
				 
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
					url: "AddServiceTypeUpdate.php",
					data:'Row_ID_update='+Row_ID,
						success:function(html){
						$('#Row_ID_update').html(html);
						
						var type_ID = $("#type_ID_t").val();
						var Price_T = $("#Price_T").val();
							 
						document.getElementById('txtServiceType').value=type_ID;
						document.getElementById('txtServiceTypeID').value=Row_ID;
						document.getElementById('txtPrice').value=Price_T;
						document.getElementById('txtServiceType').focus();
							
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
	$ServiceType='';
	
	
	if(isset($_POST["Insert_txtID"]))
	{
	    //Get variable
		$ID=$_POST["Insert_txtID"];
		$ServiceType=$_POST["ServiceType"];
		$Price=$_POST["Price"];
		
		if (empty($ID)) {
			$resultA = $db_handle->runQuery("SELECT * FROM `servicetype` WHERE `servicetype`='$ServiceType'"); 
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
				$result = $db_handle->insertQuery("INSERT INTO `servicetype` (`ServiceType`,`Price`) Values('$ServiceType','$Price')");
				
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
			$resultD = $db_handle->runQuery("SELECT * FROM `servicetype` WHERE `servicetype`='$ServiceType' AND `ID`!='$ID'"); 
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
				$resultB = $db_handle->updateQuery("Update `servicetype` Set `ServiceType`='$ServiceType', `Price`='$Price' WHERE `ID`='$ID'");
				
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
																<th scope="col" class="center-align" style="background-color: #204060; color: white;">Delete</th>
																<th scope="col" class="center-align" style="background-color: #204060; color: white;">Edit</th>
																<th scope="col" class="center-align" style="background-color: #204060; color: white;">Service Type Name</th>
																<th scope="col" class="center-align" style="background-color: #204060; color: white;">Price</th>
															</tr>
					</thead>
					<tbody>
					<?php
					$queryA="SELECT * FROM `servicetype` ORDER BY `ID`";
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
								<td style="text-align: right;"><?php echo number_format($r['Price'],2);?></td>
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
	if(isset($_POST['EmplyeeNameloadcmb'])){
		$RowDateID=$_POST['EmplyeeNameloadcmb'];
		?>
		<input type="text"  id="empcodehidden" value="<?php echo $RowDateID;?>">
		<?php

	}
	
		$EmployeeID1='';
		$EmployeeName='';
		if(isSet($_POST['Added_Employee'])){	
		if(isSet($_POST['Added_Employee'])){$Added_Employee=$_POST['Added_Employee'];}
		if(isSet($_POST['EmployeeCode'])){$EmployeeCode=$_POST['EmployeeCode'];}
		// if(isSet($_POST['EmployeeName'])){$EmployeeName=$_POST['EmployeeName'];}
		
	    $query="SELECT `employee`.`EmployeeCode`,`employee`.`FirstName`,`employee`.`LastName` 
					From employee 
					where employee.EmployeeCode='$EmployeeCode'";
		$result = $db_handle->runQuery($query);
		
		if(!empty($result)) {
			foreach ($result as $rowDep1) {
				$EmployeeID1=$rowDep1["EmployeeCode"];
				$EmployeeName=$rowDep1["FirstName"];
				}
		}else {
			?>
			<script>
			$(".txtCode").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Invalid employee Code...');
			$(".txtCode").fadeIn().delay(2000).fadeOut();
			document.getElementById('txtCode').value='';
			document.getElementById('txtCode').focus();
			</script>
			<?php
			
		}
		
		echo ' <input type="text" id="TEmployeeName" hidden value="'.$EmployeeName.'" class="field-divided23">';		
		echo ' <input type="text" id="TEmployeeID" hidden value="'.$EmployeeID1.'" class="field-divided23">';
		
		?>
		<div id="Insert_NoPay">
			<div class="esGroundItemUL">
			<?php 
											
				$query2="SELECT rowdayoff.*, Employee.FirstName 
						FROM (rowdayoff INNER JOIN Employee ON
						rowdayoff.EmployeeID = Employee.EmployeeCode) 
						WHERE rowdayoff.EmployeeID = '$EmployeeCode'
						Order By rowdayoff.ID";
           				
			    $result2 = $db_handle->runQuery($query2); 
			?>
				<section class="positioned">
					<div class="container">
						<table>
							<thead>
								<tr class="header">
									<th style="width:25px;"><div>Delete</div></th>
									<th style="width:25px;"><div>Edit</div></th>
									<th><div>Employee &nbsp;Code&nbsp;</div></th>
									<th><div>Employee&nbsp; Name&nbsp;</div></th>
									<th><div>Date&nbsp;</div></th>
								</tr>
							</thead>
								<tbody>
									<?php
									$i=0;
									if(!empty($result2)){
										foreach ($result2 as $r) {
											
											$EmployeeCode=$r['EmployeeID'];
											$FirstName=$r['FirstName'];
											$RowDate=$r['RowDate'];
											$id1=$r['ID'];
																
											if($i%2==0)
											$classname="evenRow";
											else
											$classname="oddRow";
											?>
											<tr  id="show" class="<?php if(isset($classname)) echo $classname;?>">
												<td style="width:2px;"><a href="#" id="<?php echo $id1; ?>" class="delete" title="Delete"><img width="20" height="20" src="images/delete1.png"  title="Delete" /></a></td>
												<td style="width:2px;"><a href="#" id="<?php echo $id1; ?>" class="Update" title="Update"><img width="20" height="20" src="images/edite.png"  title="Update" /></a></td>
												<td><?php echo $r['EmployeeID'];?></td>
												<td ><?php echo $r['FirstName'];?></td>
												<td><?php echo $r['RowDate']; ?></td>
											</tr>
											<?php
										}
									}
								?>																	
								</tbody>
						</table>
					</div>
				</section>
			</div>
		</div>

<?php
}
?>