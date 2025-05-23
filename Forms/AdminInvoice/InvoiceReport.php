

<?php 
require_once("../../Connection/dbconnecting.php");

$todayDate=date("Y-m-d");
	date_default_timezone_set("Asia/Colombo");
	$todayTime=date("h:i:sa");

?>

<html>
	<head>
	<title>Report</title>
	
	</head>
	<script>
	window.print();
	</script>
	<style>
body {
    font-family: 'Arial', sans-serif;
    line-height: 1.6;
    padding: 20px;
}

.invoice-box {
    max-width: 800px;
    margin: auto;
    padding: 30px;
    border: 1px solid #eee;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
    font-size: 16px;
    color: #555;
}

.invoice-box h1 {
    font-size: 24px;
    margin-bottom: 20px;
}

.invoice-box table {
    width: 100%;
    line-height: inherit;
    text-align: left;
}

.invoice-box table td {
    padding: 5px;
    vertical-align: top;
}

.invoice-box table tr td:nth-child(2) {
    text-align: right;
}

.invoice-box table tr.top table td {
    padding-bottom: 20px;
}

.invoice-box table tr.top table td.title h2 {
    margin: 0;
    font-size: 36px;
    color: #333;
}

.invoice-box table tr.information table td {
    padding-bottom: 40px;
}

.invoice-box table tr.heading td {
    background: #eee;
    border-bottom: 1px solid #ddd;
    font-weight: bold;
}

.invoice-box table tr.details td {
    padding-bottom: 20px;
}

.invoice-box table tr.item td {
    border-bottom: 1px solid #eee;
}

.invoice-box table tr.item.last td {
    border-bottom: none;
}

.invoice-box table tr.total td:nth-child(2) {
    border-top: 2px solid #eee;
    font-weight: bold;
}

.ComName {
    font-size: 1.5em;
    color: black;
    text-shadow: 1px 3px 0 #d4a32e;
    margin: 0;
    line-height: 1.2em;
	font-weight:bold;
	font-family: 'Orbitron', sans-serif;
}
</style>

	<body>
	<?php   
		
		if(isSet($_GET['jobNumber'])){$jobNumber=$_GET['jobNumber'];}
		if(isSet($_GET['totalPrice'])){$totalPrice=$_GET['totalPrice'];}
		if(isSet($_GET['txtSubTotal'])){$txtSubTotal=$_GET['txtSubTotal'];}
		if(isSet($_GET['cmbPaymentMethod'])){$cmbPaymentMethod=$_GET['cmbPaymentMethod'];}
		if(isSet($_GET['txtNote'])){$txtNote=$_GET['txtNote'];}
		if(isSet($_GET['txtBalance'])){$txtBalance=$_GET['txtBalance'];}
		if(isSet($_GET['txtAdditionalCharges'])){$txtAdditionalCharges=$_GET['txtAdditionalCharges'];}
		if(isSet($_GET['PaidAmount'])){$PaidAmount=$_GET['PaidAmount'];}
		if(isSet($_GET['invoiceNumber'])){$invoiceNumber=$_GET['invoiceNumber'];}
		
		
		$Name='';
		$Mobile1='';
		$VehicleRegNo='';
		
		$resultG = $db_handle->runQuery("SELECT * FROM `customerappoinments` WHERE AppoinmentID='$jobNumber'"); 
		if(!empty($resultG)){
			foreach ($resultG as $r) {
				$Name = $r['Name'];
				$Mobile1 = $r['Mobile1'];
				$VehicleRegNo = $r['VehicleRegNo'];
			}
		}	
		
	?>
 <!--<table width="640"  border="0" align="center">-->
        <div class="invoice-box">
        <h1>Invoice</h1>
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <div class="ComName">AutoHub Service Center</div>
                            </td>
                            <td>
                                Invoice #: <?php echo $invoiceNumber;  ?><br>
                                Created: <?php echo $todayDate;  ?><br>
                                Time: <?php echo $todayTime; ?> <br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Customer Name : <?php echo $Name;  ?><br>
								Mobile : <?php echo $Mobile1;  ?><br>
								Vehicle Number :  <?php echo $VehicleRegNo;  ?><br>
                            </td>
                            <td>
                                AutoHub Cervice Center<br>
                                AutoHub@gmail.com<br>
                                (123) 456-7890
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    All Services
                </td>
                <td>
                    Check #
                </td>
            </tr>
            
           <?php
		   $grandTotalPrice=0;
			$queryF="SELECT appoinmentservicetype.ServiceTypeID ,servicetype.ServiceType ,servicetype.Price 
					FROM `appoinmentservicetype` 
					INNER JOIN servicetype ON servicetype.ID = appoinmentservicetype.ServiceTypeID
					WHERE appoinmentservicetype.AppoinmentID='$jobNumber'";
			$resultF = $db_handle->runQuery($queryF); 
			$i=0;
			$totalServicePrice = 0;
			if(!empty($resultF)){
				foreach ($resultF as $r) {
					$totalServicePrice += $r['Price'];
					
			
					
					?>
					<tr class="details">
						<td><?php echo $r['ServiceType'];?></td>
						<td><?php echo ' '. number_format ($r['Price'],2);?></td>
					</tr>
					<?php
					$i++;
				}	
				
			}	?>	
            
            <tr class="heading">
                <td>
                   Spare Items
                </td>
                <td>
                    Price
                </td>
            </tr>
			<?php 
            $queryF = "SELECT spareparts.SpareName, `spareparts`.`Price`, usedspareitems.QTY
									   FROM `usedspareitems`
									   INNER JOIN spareparts ON usedspareitems.SpareItemID = spareparts.ID
									   WHERE usedspareitems.AppoinmentID='$jobNumber'";
			$resultF = $db_handle->runQuery($queryF);
			$i = 0;
			$totalSparePrice = 0;
			if (!empty($resultF)) {
				foreach ($resultF as $r) {
					$totalSparePrice += $r['Price'];
					$classname = ($i % 2 == 0) ? "evenRow" : "oddRow";
					?>
					<tr class="item">
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
			$queryI = "SELECT * FROM `invoice` WHERE JobNumber='$jobNumber'";
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
            
            
            <br>
			<tr class="heading">
                <td>
                   Addtional Charges
                </td>
                <td>
				<?php 
                   echo number_format($AdditionalCharges,2); ?>
				  
                </td>
            </tr>
			<tr>
                <td>
                 
                </td>
                <td>
				
				  
                </td>
            </tr>
            <tr class="total">
                <td></td>
                <td>
                   Total Amount: <?php echo number_format($SubTotal,2); ?>
                </td>
				
				
            </tr>
			
			<tr class="total">
                <td></td>
                <td>
                   Paid Amount: <?php echo number_format($PaidAmount,2); ?>
                </td>
				
				
            </tr>
			<tr class="total">
                <td></td>
                <td>
                   Balance Amount: <?php echo number_format($BalanceAmount,2); ?>
                </td>
				
				
            </tr>
        </table>
    </div>
</body>
</html>