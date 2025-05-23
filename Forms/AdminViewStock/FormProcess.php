
<?php

    //open connection
	require_once("../../Connection/dbconnecting.php");
    
	$ID='';
	$SpareName='';
	
	
	if(isset($_POST["Insert_ItemName"]))
	{
	    //Get variable
		$ItemName=$_POST["Insert_ItemName"];
		$SparePArtID=$_POST["StockID"];
		
		
		

	
		?>
		<table>
			<thead>
				<tr>
					<th>Item Code</th>
					<th>Item Name</th>
					<th>Unit Price</th>
					<th>Available Qty</th>
				</tr>
			</thead>
			<tbody>
				<?php
					
				$queryA="Select `spareparts`.`SpareName`,`spareparts`.`ItemCode`,`spareparts`.`Price`,`spareparts`.`ID`,`stock`.`AvalQTY`
				from `stock` 
				INNER JOIN  spareparts ON stock.SpareID = spareparts.ID
				WHERE spareparts.ID='$SparePArtID'";
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
						<td><?php echo $r['ItemCode'];?></td>
						<td><?php echo $r['SpareName'];?></td>
						<td><?php echo $r['Price'];?></td>
						<td><?php echo $r['AvalQTY'];?></td>
						</tr>
						<?php
					}
					
				}	?>	
			</tbody>
			</table>
		
<?php
	}		 
	