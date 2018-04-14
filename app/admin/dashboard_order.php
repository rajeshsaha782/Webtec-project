<?php 
 	$admin="admin";
	require_once "../../service/member_service.php";
	require_once "../../service/order_product-serviec.php"; 
 	require_once "../../service/invoice_serviece.php";
	require_once "../../service/product_serviec.php";
	require_once "../../service/report_serviec.php";
	$activeUsers=getAllUsersByAciveDSC();
	$memberID=$_GET['memberID'];
	$reports=getAllReports();
	$admins=getAllAdmins();
	$users=getAllUsers();
	$products=getAllProducts();
	$orders=getAllOrders();
	$invoices=getAllInvoices();
	$activeUser=0;
	$monthlyOrders=0;
	$cm=(int)date("m")-1;
	
	foreach($users as $user)
	{
		if(((int)explode("-",explode(" ",$user['Last_Logged_in'])[0])[1])>$cm)
			$activeUser++;
	}
	
	
	foreach($orders as $order)
	{
		foreach($invoices as $invoice)
		{
			if($order['Invoice_Code']==$invoice['Invoice_Code'])
			{
				if(explode("-",explode(" ",$invoice['Date'])[0])[1]>$cm)
					$monthlyOrders++;
			}
		}
	}
	
?>
<html>
		<table  width=100%>			
			<tr>
				<td align="center" width="33%">
				<fieldset>
					<legend>Reports</legend>
					<h2><?=count($reports)?></h2><br><a href="treports.php">Details
				</fieldset>
				</td>
				<td width="33%" align="center">
				<fieldset>
					<legend>Total Product</legend>
					<h2><?=count($products)?></h2><br><a href="tpdetails.php">Details
				</fieldset>
				</td>
			</tr>
			
			<tr>
				
				<td width="33%" align="center">
				<fieldset>
					<legend>Total Orders</legend>
					<h2><?=count($invoices)?></h2><br><a href="orderdetails.php">Details
				</fieldset>
				</td>
				<td width="33%" align="center">
				<fieldset>
					<legend>Sold Product Last Month</legend>
					<h2><?=$monthlyOrders?></h2><br><a href="tpdetails.php">Details
				</fieldset>
				</td>
			</tr>
			
			<tr>
				<td align="center" width="33%">
				
				</td>
				
			</tr>
			
		</table>
		
	</body>
</html>

