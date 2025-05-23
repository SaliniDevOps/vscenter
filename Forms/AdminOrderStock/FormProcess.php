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
					
					document.getElementById('txtServiceType').focus();
					document.getElementById('txtServiceTypeID').value='';
					document.getElementById('txtServiceType').value='';
				 
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
	$SpareName='';
	$Company='';
	$SupplierNameID='';
	$Mobile='';
	$Email='';
	
	
	if(isset($_POST["Insert_suppliers"]))
	{
	    $SupplierNameID=$_POST["Insert_suppliers"];
		
		$queryA="SELECT * FROM `suppliers` WHERE ID='$SupplierNameID'";
		$resultA = $db_handle->runQuery($queryA); 
		if(!empty($resultA)){
			foreach ($resultA as $r) {
				$Company=$r['Company'];
				$SupplierName=$r['SupplierName'];
				$Mobile=$r['Mobile'];
				$Email=$r['Email'];
				
			}
		}	
		
		?>
			
		<input type="text" hidden  id="Company_t" name="Company_t" value="<?php echo $Company;?>"   />
		<input type="text" hidden  id="Mobile_t" name="Mobile_t" value="<?php echo $Mobile;?>"   />
		<input type="text" hidden  id="Email_t" name="Email_t" value="<?php echo $Email;?>"   />
		<?php
		
		/* if (empty($ID)) {
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
				$result = $db_handle->insertQuery("INSERT INTO `spareparts` (`SpareName`) Values('$SpareName')");
				
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
			
		}	 */

	
		?>
		
		
<?php
	}

	$SpareTableID='';
	$OrderQTY='';
	$NewPrice='';
	if(isset($_POST["InsrtOrderItemsTemporary"]))
	{
	    $ItemIDHidden=$_POST["InsrtOrderItemsTemporary"];
	    $OrderQTY=$_POST["OrderQTY"];
	    $NewPrice=$_POST["NewPrice"];
	    $OrderID=$_POST["OrderID"];
	   
			$resultA = $db_handle->runQuery("SELECT * FROM `itemwiseorder` WHERE OrderID='$OrderID' AND ItemID='$ItemIDHidden' AND Status='0'"); 
			if($resultA instanceof mysqli_result && $resultA->num_rows > 0){
				?>
				<script>
				alert("Duplicate Record!")
					//$(".alertWarning").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Duplicate Record!');
					//$(".alertWarning").fadeIn().delay(2000).fadeOut();
					//document.getElementById('txtServiceType').value='';
					//document.getElementById('txtServiceType').focus();
				</script>
				<?php
			}else{
			   $result = $db_handle->insertQuery("INSERT INTO `itemwiseorder` (`OrderID`,`ItemID`,`QTY`,`NewPrice`) 
			   Values('$OrderID','$ItemIDHidden','$OrderQTY','$NewPrice')");
			}
	   
	   ?>
	   <table>
			<thead>
				<tr>
					<th>Delete</th>
					<th>Item Code</th>
					<th>Item Name</th>
					<th>Order QTY</th>
					<th>New Unit Price</th>
				</tr>
			</thead>
			<tbody>
				<?php
				
				$queryA="SELECT itemwiseorder.*,`spareparts`.`SpareName`,`spareparts`.`ItemCode` 
					FROM `itemwiseorder` 
					INNER JOIN  spareparts ON itemwiseorder.ItemID = spareparts.ID
					WHERE  itemwiseorder.OrderID = '$OrderID' AND itemwiseorder.Status=0";
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
							<td style="width:20px;"><a href="#" id="<?php echo $ID; ?>" class="delete" title="Delete"><img width="20" height="20" src="../../images/delete2.png"  title="Delete" /></a></td>
							<td><?php echo $r['ItemCode'];?></td>
							<td><?php echo $r['SpareName'];?></td>
							<td><?php echo $r['QTY'];?></td>
							<td><?php echo $r['NewPrice'];?></td>
							
						</tr>
						<?php
					}
					
				}	?>	
			</tbody>
		</table>
	   <?php 
	
	}
	
	
	
	$OrderID='';
	$ItemID='';
	$QTY='';
	$NewPrice='';
	$suppliers='';
	$Date='';
	
	if(isset($_POST["SaveOrderDe"]))
	{
	    $OrderID=$_POST["SaveOrderDe"];
	    $Date=$_POST["Date"];
	    $suppliers=$_POST["suppliers"];
		
		$queryA="SELECT * FROM `itemwiseorder` ORDER BY `itemwiseorder`.`OrderID` ASC";
		$resultA = $db_handle->runQuery($queryA); 
		if(!empty($resultA)){
			foreach ($resultA as $r) {
				$ItemID=$r['ItemID'];
				$QTY	=$r['QTY'];
				$NewPrice	=$r['NewPrice'];
				
				$resultB = $db_handle->updateQuery("Update `stock` Set `AvalQTY`=AvalQTY+ '$QTY' WHERE `SpareID`='$ItemID'");
				$resultF = $db_handle->updateQuery("Update `spareparts` Set `Price`='$NewPrice' WHERE `ID`='$ItemID'");
				
				
				
			}
			
		}
		
		$resultG = $db_handle->insertQuery("INSERT INTO `orderitems` (`SuplierID`,`Date`) VALUES ('$suppliers','$Date')");
		$resultT = $db_handle->updateQuery("Update `itemwiseorder` Set `Status`='1' WHERE `OrderID`='$OrderID'");
		
		
		
	}