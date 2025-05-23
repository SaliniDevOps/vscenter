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
						
						const input=document.getElementById('txtDate');
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
							document.getElementById('txtDate').value='<?php $today; ?>';
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
<?php

    //open connection
    require_once("../../Connection/dbcontroller.php");
    $db_handle = new DBController();
	$ID='';
	$cmbEmployeeName='';
	$txtCode='';
	$txtDate='';
	
	$today=date("Y-m-d");

	//Add Button Even
	if(isset($_POST["Insert_DayOff"]))
	{
	    //Get variable
		$cmbEmployeeName=$_POST["Insert_DayOff"];
		$txtDate=$_POST["txtDate"];
		$txtCode=$_POST["txtCode"];
        $ID=$_POST["ID"];
		
		//check insert or update 
			
			$comments = $db_handle->runQuery("SELECT * FROM `rowdayoff` 
										  WHERE `EmployeeID`='$txtCode' AND `RowDate`= '$txtDate' AND `ID`!='$ID'"  );
			if(!empty($comments))
			{
				?>
				<script>
				$(".alertDuplicate").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Duplicate Record.');
				$(".alertDuplicate").fadeIn().delay(2000).fadeOut();
				document.getElementById('txtCode').value='';
				document.getElementById('cmbEmployeeName').value='';
				document.getElementById('txtDate').value='<?php echo $today; ?>';
				document.getElementById('txtCode').focus();
				</script>
					
				<?php
			}else{
				
				$comments = $db_handle->runQuery("SELECT * FROM `rowdayoff` WHERE `ID`='$ID'");
				if(!empty($comments)){
					
					$query = "Update `rowdayoff` Set `EmployeeID`='$txtCode',`RowDate`= '$txtDate' WHERE `ID`='$ID'";
						$result = $db_handle->updateQuery($query);
					
								?>
								<script>
									$(".alertUpdate").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Update Successfully');
									$(".alertUpdate").fadeIn().delay(2000).fadeOut(); 
									document.getElementById('cmbEmployeeName').disabled=false;
									document.getElementById('txtCode').disabled=false;
									document.getElementById('txtCode').value='';
									document.getElementById('cmbEmployeeName').value='';
									document.getElementById('txtDate').value='<?php echo $today; ?>';
									document.getElementById('txtCode').focus();
								</script>
								<?php
				}else{
					
					$query = "INSERT INTO `rowdayoff` (`EmployeeID`,`RowDate`,`Auser`,`Terminal`,`Muser`) 
								 Values('$txtCode','$txtDate','','','')";
					$result = $db_handle->insertQuery($query);
					
					?>
						<script>
							$(".alertSave").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Save Successfully');
							$(".alertSave").fadeIn().delay(2000).fadeOut(); 
							document.getElementById('cmbEmployeeName').value='';
							document.getElementById('txtDate').value='<?php echo $today; ?>';
							document.getElementById('txtCode').value='';
							document.getElementById('txtCode').focus();
						</script>
					<?php
				}	
			}	
	
	
		?>
		<div class="esGroundItemUL">
			<?php 
					
				 $query2="SELECT rowdayoff.*, Employee.FirstName 
						FROM (rowdayoff INNER JOIN Employee ON
           				rowdayoff.EmployeeID = Employee. EmployeeCode) 
						Order By rowdayoff.ID ";
						
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