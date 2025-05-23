<?php 
//open connection
	require_once("../../../../Connection/dbconnecting.php");
	include('CustomerDetailsAJAX.php');
	
	$todayDate=date("Y-m-d");
	date_default_timezone_set("Asia/Colombo");
	$todayTime=date("h:i:sa");
	
	$invoiceNumber_='';
	$jobNumber_='';
	$Time='';
	$Date='';
	
	if(isset($_POST["jobNumber"]))
	{
	    //Get variable
		$jobNumber_=$_POST["jobNumber"];
		$invoiceNumber_=$_POST["invoiceNumber"];
		
		
		$queryF="SELECT * FROM `invoice`  WHERE InvoiceID='$invoiceNumber_'";
        $resultF = $db_handle->runQuery($queryF); 
		if(!empty($resultF)){
			foreach ($resultF as $r) {
				$Date = $r['Date'];
				$Time = $r['Time'];
			}
		}	
		
		?>
		<table cellpadding="0" cellspacing="0">
					
                    <p style="color:black; font-weight:bold;">
                    Invoice #: <span ><?php echo $invoiceNumber_; ?></span><br>
                    Created: <span ><?php echo $Date; ?></span><br>
                    Time: <span ><?php echo $Time; ?></span><br>
					</p>              
                    <br>   
					<div id="Display_POPUP" ></div>
                    <tr class="heading fontcolor">
                        <td>All Services</td>
                        <td>Check #</td>
                    </tr>

                    <?php
                    $grandTotalPrice=0;
                    $queryF="SELECT appoinmentservicetype.ServiceTypeID ,servicetype.ServiceType ,servicetype.Price 
                            FROM `appoinmentservicetype` 
                            INNER JOIN servicetype ON servicetype.ID = appoinmentservicetype.ServiceTypeID
                            WHERE appoinmentservicetype.AppoinmentID='$jobNumber_'";
                    $resultF = $db_handle->runQuery($queryF); 
                    $i=0;
                    $totalServicePrice = 0;
                    if(!empty($resultF)){
                        foreach ($resultF as $r) {
                            $totalServicePrice += $r['Price'];
                            ?>
                            <tr class="details fontcolor">
                                <td><?php echo $r['ServiceType'];?></td>
                                <td><?php echo ' '. number_format ($r['Price'],2);?></td>
                            </tr>
                            <?php
                            $i++;
                        }   
                    }   
                    ?> 

                    <tr class="heading fontcolor">
                        <td>Spare Items</td>
                        <td>Price</td>
                    </tr>
                    <?php 
                    $queryF = "SELECT spareparts.SpareName, `spareparts`.`Price`, usedspareitems.QTY
                                       FROM `usedspareitems`
                                       INNER JOIN spareparts ON usedspareitems.SpareItemID = spareparts.ID
                                       WHERE usedspareitems.AppoinmentID='$jobNumber_'";
                    $resultF = $db_handle->runQuery($queryF);
                    $i = 0;
                    $totalSparePrice = 0;
                    if (!empty($resultF)) {
                        foreach ($resultF as $r) {
                            $totalSparePrice += $r['Price'];
                            $classname = ($i % 2 == 0) ? "evenRow" : "oddRow";
                            ?>
                            <tr class="item fontcolor">
                                <td><?php echo $r['SpareName']; ?></td>
                                <td><?php echo ' '. number_format ($r['Price'] * $r['QTY'],2);?></td>
                            </tr>
                            <?php
                            $i++;
                        }
                    }

                    // Calculate the grand total price
                    $grandTotalPrice = $totalServicePrice + $totalSparePrice;

                    $SubTotal=0;
                    $AdditionalCharges=0;
                    $PaidAmount=0;
                    $BalanceAmount=0;
                    $queryI = "SELECT * FROM `invoice` WHERE JobNumber='$jobNumber_'";
                    $resultI = $db_handle->runQuery($queryI);
                    if (!empty($resultI)) {
                        foreach ($resultI as $r) {
                            $SubTotal = $r['SubTotal'];
                            $AdditionalCharges = $r['AdditionalCharges'];
                            $PaidAmount = $r['PaidAmount'];
                            $BalanceAmount = $r['BalanceAmount'];
                        }
                    }   
                    ?>

                    <tr class="heading fontcolor">
                        <td>Addtional Charges</td>
                        <td><?php echo number_format($AdditionalCharges,2); ?></td>
                    </tr>
                    
                    <tr class="total fontcolor">
                        <td></td>
                        <td>Total Amount: <?php echo number_format($SubTotal,2); ?></td>
                    </tr>

                    <tr class="total fontcolor">
                        <td></td>
                        <td>Paid Amount: <?php echo number_format($PaidAmount,2); ?></td>
                    </tr>
                    <tr class="total fontcolor">
                        <td></td>
                        <td>Balance Amount: <?php echo number_format($BalanceAmount,2); ?></td>
                    </tr>
                </table>
		<?php 
		
	}	