
<script>
    function Newevent() {
		document.getElementById('DayOffId').value='';
		document.getElementById('cmbEmployeeName').disabled=false;
		document.getElementById('txtCode').disabled=false;
		document.getElementById('txtCode').value='';
		document.getElementById('cmbEmployeeName').value='';
		document.getElementById('txtDate').value='<?php echo $today; ?>';
		document.getElementById('txtCode').focus();
	}
</script>

<script>
	function IsNumberKey(evt) {
		var CharCode = (evt.which)? evt.which:event.keyCode
		if (CharCode>31 &&(CharCode<48 || CharCode>57))
		return false ;
		return true ;
	}	
</script>
<script>
	$(document).click(function(e){
		$("#suggesstions1").hide();
	});		
</script>
<?php 
require_once("Connection/dbcontroller.php");
$db_handle = new DBController();

$today=date("Y-m-d");
?>
<?php 
	include('Forms/esDayOff/esEmpDayOffAjax.php');
	include('Forms/esDayOff/esEmpDayOffTradeNameAjax.php');
?>
<link rel="stylesheet" href="Forms/esDayOff/escss.css" type="text/css"  />

	
<div id="site_content">	
	<div id="content">
        <div class="content_item">
			<h3><img width="30" height="30" src="images/large-gears-animation.gif"  />Day Off</h3>
			<!----alert msg------->
			<div class="alertWarning1" id="warningAlert" style="display:none"></div>
			<div class="alertA"  style="display:none">
				<span class="closebtn" onclick="this.parentElement.style.display='none';"> &times; </span>
				<strong>Duplicate Record.</strong>
			</div>
			<div class="alertC"  style="display:none">
				<span class="closebtn" onclick="this.parentElement.style.display='none';"> &times; </span>
				<strong>Updated Successfully</strong>
			</div>
			<div class="alertB"  style="display:none">
				<span class="closebtn" onclick="this.parentElement.style.display='none';"> &times; </span>
				<strong>Save Successfully</strong>
			</div>
			<!---- alert msg------->
			<div class="alertWarning1" id="warningAlert" style="display:none"></div>				
			<div id="row_1">
					<form id="form1" name="form1" method="post" autocomplete="off" action="">
						<div id="Row_ID_update"></div>
							<li class="ES_10"> 
								<ul class="form-style-6">
									<input type="text" hidden id="DayOffId" name="DayOffId" value="" class="field-divided20"  />
								
									<li>
										<label>Employee Code&nbsp; </label>
										<input type="text" onkeypress="return IsNumberKey(event)"  autofocus id="txtCode" name="txtCode" value="" class="field-divided2" placeholder="Employee Code "maxlength="3"/>
										<input  type="submit"  value="Show " class="field-divided_55" id="Show_button" name="btnShow" class="Show_button"/>	
										<div class="txtCode"  id="AlertCSS_1_5" style="display:none"></div>
									</li>
									<li>
										<label>Employee Name&nbsp; </label>
										<input type="text"  id="cmbEmployeeName"   name="cmbEmployeeName" value="" class="field-divided_55895" placeholder="Employee Name "/>
										<div class="cmbEmployeeName"  id="AlertCSS_1_5" style="display:none"></div>
										<div class="suggestionsBox1" style="display: none;"  id="suggesstions1" ></div>
									</li>
								</ul>
							</li>
						
							<li class="ES_10"> 
								<ul class="form-style-6">
									<li>
										<label>Date<font color="#FF0000"></font>&nbsp;</label>
										<input type="Date" class="field-divided5"  tabindex='0' value="<?php echo $today; ?>" id="txtDate"  />
										<div class="txtDays"  id="AlertCSS_1_5" style="display:none"></div>
									</li>
									<li class="ES_11_1"> 
										<ul class="form-style-6">
											<li>
												<div class="alertSave" id="Save_AlertBtn" style="display:none"></div>
												<div class="alertDuplicate" id="warningDuplicate_AlertBtn" style="display:none"></div>
												<div class="alertUpdate" id="warningUpdate_AlertBtn" style="display:none"></div>
											</li>
											<li>
												<input type="button" onClick="Newevent()" value="New"/> 
												<input  type="submit" value="Add" name="btnAdd"  class="Add_button"/>
											</li>
										</ul>
									</li>
								</ul>
							</li>
					
											
			
					<div id="row_1"></div>					
					<div id="displaydelete"></div><!-----rocode delete call function--->
						<div id="second_row">
							<div id="tablebackgroundES_4">
								<div id="Added_Employee">
									
										<div id="Insert_NoPay">
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
																<th><div>Date&nbsp;&nbsp;</div></th>
															</tr>
															</thead>
															<tbody>
																<?php
																	$i=0;
																	if(!empty($result2)){
																		foreach ($result2 as $r) {
																			$ID=$r['ID'];
																	
																			if($i%2==0)
																				$classname="evenRow";
																			else
																				$classname="oddRow";
																		?>
																			<tr  id="show" class="<?php if(isset($classname)) echo $classname;?>">
																				<td style="width:20px;"><a href="#" id="<?php echo $ID; ?>" class="delete" title="Delete"><img width="20" height="20" src="images/delete1.png"  title="Delete" /></a></td>
																				<td style="width:20px;"><a href="#" id="<?php echo $ID; ?>" class="Update" title="Update"><img width="20" height="20" src="images/edite.png"  title="Update" /></a></td>
																				<td><?php echo $r['EmployeeID'];  ?></td>
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
									
								</div>
							</div>
						</div>
				</form>
			</div>
		</div> 
	</div> 	
</div> 	
	
 	
