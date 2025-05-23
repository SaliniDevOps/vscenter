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
<?php

    //open connection
	require_once("../../Connection/dbconnecting.php");
    
	$ID='';
	$SpareName='';
	
	
	if(isset($_POST["Insert_Technicians"]))
	{
	    //Get variable
		$NIC=$_POST["Insert_Technicians"];
		$Name=$_POST["Name"];
		$Address=$_POST["Address"];
		$Mobile=$_POST["Mobile"];
		$Mail=$_POST["Mail"];
		$HiddenID=$_POST["HiddenID"];
		
		if (empty($HiddenID)) {
			$resultA = $db_handle->runQuery("SELECT * FROM `technicians` WHERE `NIC`='$NIC'"); 
			if($resultA instanceof mysqli_result && $resultA->num_rows > 0){
				?>
				<script>
					$(".alertWarning").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Duplicates Record!');
					$(".alertWarning").fadeIn().delay(2000).fadeOut();
					//document.getElementById('txtServiceType').value='';
					//document.getElementById('txtServiceType').focus();
				</script>
				<?php
			}else{
				$result = $db_handle->insertQuery("INSERT INTO `technicians` (`NIC`,`Name`,`Address`,`Mobile1`,`Email`) 
				Values('$NIC','$Name','$Address','$Mobile','$Mail')");
				
				?>
				<script>
					$(".alertSave").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Save Successfully!');
					$(".alertSave").fadeIn().delay(2000).fadeOut();
					//document.getElementById('txtServiceType').value='';
					//document.getElementById('txtServiceType').focus();
				</script>
				<?php
			}
			
		} else {
			/*
			$resultD = $db_handle->runQuery("SELECT * FROM `technicians` WHERE `NIC`='$NIC' AND `ID`!='$HiddenID'"); 
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
				*/
				$resultB = $db_handle->updateQuery("Update `technicians` Set `NIC`='$NIC',`Name`='$Name',`Address`='$Address',
				`Mobile1`='$Mobile',`Email`='$Mail' WHERE `ID`='$HiddenID'");
				
				?>
				<script>
					$(".alertSave").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Update Successfully!');
					$(".alertSave").fadeIn().delay(2000).fadeOut();
					// document.getElementById('txtServiceType').value='';
					// document.getElementById('txtServiceType').focus();
				</script>
				<?php
			//}
			
		}	

	
		?>
		<div class="row">
			<div class="card-body">
				
				<table class="table table-bordered" style="max-width: 1200px; margin: auto;">
				<!--table class="table table-bordered" style="max-width: 500px; margin-right: auto;"-->
				<thead>
					<tr>
						<th scope="col" class="center-align" style="background-color: #204060; color: white;">Delete</th>
						<th scope="col" class="center-align" style="background-color: #204060; color: white;">Edit</th>
						<th scope="col" class="center-align" style="background-color: #204060; color: white;">NIC</th>
						<th scope="col" class="center-align" style="background-color: #204060; color: white;">Name</th>
						<th scope="col" class="center-align" style="background-color: #204060; color: white;">Address</th>
						<th scope="col" class="center-align" style="background-color: #204060; color: white;">Mobile</th>
						<th scope="col" class="center-align" style="background-color: #204060; color: white;">E-Mail</th>
					</tr>
				</thead>
				<tbody>
				<?php
			
				$queryA="SELECT * FROM `technicians` ORDER BY `ID`";
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
						<td style="width:120px;"><?php echo $r['NIC'];?></td>
						<td style="width:250px;"><?php echo $r['Name'];?></td>
						<td style="width:250px;"><?php echo $r['Address'];?></td>
						<td style="width:100px;"><?php echo $r['Mobile1'];?></td>
						<td style="width:200px;"><?php echo $r['Email'];?></td>
						</tr >
						<?php
					}
					
				}	?>	
				</tbody>
			</table>
			</div>
		</div>
		
<?php
	}		 
	
	
	
	
	if(isset($_POST["Insert_UserName"]))
	{
	    //Get variable
		$UserName=$_POST["Insert_UserName"];
		$Password=$_POST["Password"];
		$accountID=$_POST["accountID"];
		
		
		$resultB = $db_handle->updateQuery("Update `technicians` Set `Username`='$UserName',`Password`='$Password' WHERE `ID`='$accountID'");
		
		$resultH = $db_handle->runQuery("SELECT Username,Password FROM `technicians` WHERE `ID`='$accountID'"); 
		if($resultH instanceof mysqli_result && $resultH->num_rows > 0){
		$i=0;
			if(!empty($resultH)){
				foreach ($resultH as $r) {
					$Username_t=$r['Username'];
					$Password=$r['Password'];
				}
			}
		}

	?>
	<input type="hidden" id="Username_t" value="<?php echo $Password;?>"/>
	<input type="hidden" id="Passworde_t" value="<?php echo $Password;?>"/>
	<?php 
		
	}	