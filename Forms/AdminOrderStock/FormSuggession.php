<script>
   //load heder1 & load details to table when click FirstName
    $(document).ready(function(){
	    $('a[class="TradeName_link"]').click(function(){
		    var SparePartID = $(this).attr("id");
			SpareNameOri
			
			var dataString = 'SparePartID='+ SparePartID;
			
			$.ajax({
				type: "POST",
				url: "FormSuggession.php",
				data: dataString,
				cache: false,
				success: function(html){
					$("#HiddenIDLoad").html(html);
					
					document.getElementById('StockID').value=SparePartID;
					
				}
			}); 
			
			return false;
		});
	});
</script>


<?php   
    //connection DB
	require_once("../../Connection/dbconnecting.php");
		
	//load Trade name 
	if(!empty($_POST["Tradname_key"])) 
		{
		if(($_POST["Tradname_key"])!=" "){
			$Tradname_key=$_POST["Tradname_key"];
			
			$result1 = $db_handle->runQuery("Select `spareparts`.`SpareName`,`spareparts`.`ItemCode`,`stock`.`AvalQTY`
											from `stock` 
											INNER JOIN  spareparts ON stock.SpareID = spareparts.ID
			Where `spareparts`.`ItemCode` LIKE '$Tradname_key%' LIMIT 10");	
			
			
			
			?>
			<ul>
				<?php
					if(!empty($result1)){
						foreach ($result1 as $rowDep1) {
							
							$SpareName=$rowDep1["ItemCode"];	
							$ID=$rowDep1["ID"];	
							$SpareNameOri=$rowDep1["SpareName"];	
							?>
							<a href="#" class="TradeName_link" id="<?php echo $ID;?>"><li onClick="selectname('<?php echo $SpareName;?>','<?php echo $SpareNameOri;?>','<?php echo $ID;?>');"><?php echo $SpareName;?></li></a>
							<?php
						}
					}
					else{
							?>
							<a href="#" class="TradeName_link" id="<?php echo $ID;?>"><li onClick="selectname('<?php echo $SpareName;?>','<?php echo $SpareNameOri;?>','<?php echo $ID;?>');">Not Match</li></a>
							<?php
						}
				?>
			</ul>
			<?php  
			
		}else{
			$Tradname_key=$_POST["Tradname_key"];
			$result1 = $db_handle->runQuery("Select `spareparts`.`SpareName`,`spareparts`.`ItemCode`,`stock`.`AvalQTY`,`spareparts`.`ID`
											from `stock` 
											INNER JOIN  spareparts ON stock.SpareID = spareparts.ID
												ORDER BY `spareparts`.`SpareName` desc LIMIT 10");	
			
			
			?>
			<ul>
				<?php
					if(!empty($result1)){
						foreach ($result1 as $rowDep1) {
							$ID=$rowDep1["ID"];
							$SpareName=$rowDep1["ItemCode"];	
							$SpareNameOri=$rowDep1["SpareName"];	
							?>
							<a href="#" class="TradeName_link" id="<?php echo $ID;?>"><li onClick="selectname('<?php echo $SpareName;?>','<?php echo $SpareNameOri;?>','<?php echo $ID;?>');"><?php echo $SpareName;?></li></a>
							<?php
						}
					}else{
							?>
							<a href="#" class="TradeName_link" id="<?php echo $ID;?>"><li onClick="selectname('<?php echo $SpareName;?>','<?php echo $SpareNameOri;?>','<?php echo $ID;?>');">Not Match</li></a>
							<?php
						}
				?>
			</ul>
			<?php   
		}
		
	}
	?>
	