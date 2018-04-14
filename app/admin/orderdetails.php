<?php 
 	$admin="admin";
 	require_once "../../service/order_product-serviec.php"; 
 	require_once "../../service/invoice_serviece.php";
	require_once "../../service/product_serviec.php";
	$orders=getAllOrders();
	if($_SERVER['REQUEST_METHOD']=="POST")
		{
			if($_POST['searchby']=="0")
			{
				$order=getOrderByCode($_POST['p']);
				$orders=array($order);
				if(empty($order))
					$orders=array();
			}
			else if($_POST['searchby']=="1")
			{
				$orders=getOrdersByInvoice($_POST['p']);
			}
		}
?>

<html>
	<table >
			<tr >
			<form method="post">
				<td width="40%">
					<p>Search by:<p><select name="searchby">
						<option value="0">Order Code</option>
						<option value="1">Invoice Code</option>
					</select>
					
				</td>
				<td>
					<input name="p" type="text"/><input type="submit" value="Search Order"/>
				</td>
				</form>
			</tr>
		</table>
		<br>
		<br>
<fieldset >
							<legend><h3>Orders</h3></legend>
								<table border=1 width=100%>
									<tr>
										<th>Order Code</th>
										<th>Product Code</th>
										<th>Invoice</th>
										<th>Order Placed</th>
										<th>Product</th>
										<th>Order Status</th>
										<th>Payment Status</th>
									</tr>
									<?php
									foreach($orders as $order)
									{
										$invoice=getInvoiceByCode($order['Invoice_Code']);
										$product=getProductByCode($order['Product_Code']);
										echo
									"<tr>
										<td>".$order['Order_Code']."</td>
										<td><a href=\"pview.php?ProductCode=".$order['Product_Code']."\">".$order['Product_Code']."</a></td>
										<td><a href=\"viewinvoice.php?invoiceCode=".$order['Invoice_Code']."\">".$order['Invoice_Code']."</a></td>
										<td>".explode(" ",$invoice['Date'])[0]."</td>
										<td>".$product['Name']."</td>
										<td>".$invoice['Status']."</td>
										<td>".$invoice['Payment_Status']."</td>
									</tr>";
									}
									?>
								</table>
					</fieldset>
					
					
</html>