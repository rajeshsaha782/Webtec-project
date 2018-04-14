<?php 
 	$admin="admin";
 	require_once "../../service/invoice_serviece.php";
	require_once "../../service/member_service.php";
	require_once "../../service/order_product-serviec.php";
	require_once "../../service/product_serviec.php";
	$page="delete";
	if(empty($_GET['page']))
	{
		$abc=explode("/",$_SERVER['SCRIPT_FILENAME']);
		//var_dump($abc);
		$page=(explode(".",(explode("/",$_SERVER['SCRIPT_FILENAME'])[count($abc)-1]))[0]);
		//var_dump($_SERVER['SCRIPT_FILENAME']);
	}
	$invoiceCode=$_GET['invoiceCode'];
	$invoice=getInvoiceByCode($invoiceCode);
	$member=getMemberById($invoice['Member_ID']);
	$orders=getOrdersByInvoice($invoiceCode);
	$p=0;
	foreach($orders as $order)
	{
		$p=$p+(((int)$order['Quantity'])*((int)getProductByCode($order['Product_Code'])['Price']));
	}
	
	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		if($_POST['button']=="Paid")
		{
            $invoice['Payment_Status']="Paid";
        }
		else if($_POST['button']=="Delivered")
		{
			 $invoice['Status']="Delivered";
		}
		editInvoice($invoice);
		
       
	}
	
?>

<html>
<form method="post">
	<table  width="100%" height="600">
						<tr>
							<th colspan="5"><h2>Order Information<h2></th>
						<tr>
						<tr>
							<td><b>ORDER #<?=$invoiceCode?></b><br>Order Date: <?=explode(" ",$invoice['Date'])[0]?><br>Order Status: <?=$invoice['Status']?><br>Order Total: Tk <?=$p?></td>
							<td></td>
						</tr>
						<tr>
							<td><hr/><b>BILLING ADDRESS</b>
								<br><?=$member['Name']?>
								<br>Email: <?=$member['Email']?>
								<br>Phone: 01912311234
								<br><?=$invoice['Billing_Address']?></td>
							<td><hr/><b>SHIPPING ADDRESS</b>
								<br><?=$member['Name']?>
								<br>Email: <?=$member['Email']?>
								<br>Phone: <?=$invoice['Phone']?>
								<br><?=$invoice['Shipping_Address']?></td>
							
						</tr>
						<tr>
							<td><b>PAYMENT</b>
								<br>Payment Method: <?=$invoice['Payment_Method']?>
								<br>Payment Status: <?=$invoice['Payment_Status']?> <?php if(($invoice['Payment_Status']=="Not Paid")&&($page=="viewinvoice")){?><input name="button" type="submit" value="Paid"/><?php }?></td>
							<td><b>SHIPPING</b>
								<br>Shipping Status: <?=$invoice['Status']?> <?php if(($invoice['Status']=="Pending")&&($page=="viewinvoice")){?><input name="button" type="submit" value="Delivered"/><?php }?></td>
							
						</tr>
						<tr >
							<td colspan="2" >
							<table width="100%">
								<tr>
									<td></td>
									<td><b>Price</b></td>
									<td><b>Quantity</b></td>
									<td><b>Total</b></td>
								</tr>
								<?php
								foreach($orders as $order)
								{
									$product=getProductByCode($order["Product_Code"]);
									echo
								"<tr >
									<td width=\"800\">
										<table >
										<tr>
											<td width=\"50\">
												<img src=\"../resources/".$product['Name'].".jpg\" height=\"40\" width=\"40\"/>
											</td>
											<td><a href=\"pview.php?ProductCode=".$order["Product_Code"]."\">\"".$product['Name']."\"</a> Product Code: ".$order["Product_Code"]."</td>
										</tr>
										</table>
									</td>
									<td>".$product['Price']." Tk</td>
									<td>".$order['Quantity']."</td>
									<td>".(((int)$order['Quantity'])*((int)$product['Price']))." Tk</td>
								</tr>";
								}
								?>
								
								<tr height="50">
									<td></td>
									<td></td>
									<td>Shipping bill</td>
									<td>40 tk</td>
								</tr>
								<tr height="50">
									<td></td>
									<td></td>
									<td><b>Net Total</b></td>
									<td><b><?=((int)$p+40)?> tk</b></td>
								</tr>
							</table>
							</td>
						</tr>
						
					
					</table>
					</form>
</html>