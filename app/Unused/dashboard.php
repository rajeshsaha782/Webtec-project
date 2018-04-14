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
					<legend>Total User</legend>
					<h2><?=count($users)?></h2><br><a href="tudetails.php">Details
				</fieldset>
				</td>
				
				<td width="33%" align="center">
				<fieldset>
					<legend>Total Admin</legend>
					<h2><?=count($admins)?></h2><br><a href="tadmindetails.php?memberID=<?=$memberID?>">Details
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
				<td align="center" width="33%">
				<fieldset>
					<legend>Total Active Users Last Month</legend>
					<h2><?=$activeUser?></h2><br><a href="tudetails.php">Details
				</fieldset>
				</td>
				
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
				<fieldset>
					<legend>Top 5 User</legend>
					<table>
					<tr>
						<td>
						<ul>
						<?php
						$aa=0;
						foreach($activeUsers as $activeUser)
						{
							echo "
							<li><a href=\"uview.php?memberID=".$activeUser['Member_ID']."\">".$activeUser['Name']."</a></li>";
							$aa++;
							if($aa>=5)
								break;
						}
						?>
						</td>
							
					</tr>
					</table>
				</fieldset>
				</td>
				<td align="center" width="33%">
				<fieldset>
					<legend>Most selling products</legend>
					<table>
					<tr><td>
						<ul>
							<li><a href="pview.php">Kakashi T-Shirt</a></li>
							<li><a href="pview.php">Polo T-Shirt</a></li>
							<li><a href="pview.php">Full sleeve T-Shirt</a></li>
							<li><a href="pview.php">Kakashi T-Shirt</a></li>
							<li><a href="pview.php">Easy T-Shirt</a></li>
						</ul>
						</td></tr>
					</table>
				</fieldset>
				</td>
				<td align="center" width="33%">
				<fieldset>
					<legend>5 star rating products</legend>
					<table>
					<tr><td>
						<ul>
							<li><a href="pview.php">Kakashi T-Shirt</a></li>
							<li><a href="pview.php">Polo T-Shirt</a></li>
							<li><a href="pview.php">Full sleeve T-Shirt</a></li>
							<li><a href="pview.php">Kakashi T-Shirt</a></li>
							<li><a href="pview.php">Easy T-Shirt</a></li>
						</ul>
						</td></tr>
					</table>
				</fieldset>
				</td>
			</tr>
			
		</table>
		<table  width="100%">
			<tr>
				<tr>
				<td align="center" width="33%">
				<fieldset>
					<legend>Total Visits</legend>
					<h2>200000</h2><br><br>
				</fieldset>
				</td>
				
				<td width="33%" align="center">
				<fieldset>
					<legend>Reports</legend>
					<h2><?=count($reports)?></h2><br><a href="treports.php">Details
				</fieldset>
				</td>
			</tr>
		</table>
	</body>
</html>