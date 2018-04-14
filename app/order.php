<?php session_start();
	require_once "../service/invoice_serviece.php";
	require_once "../service/member_service.php";
	require_once "../service/order_product-serviec.php";
	require_once "../service/product_serviec.php";
	?>
<?php
	if($_SESSION['member_name']!="")
	{
		$memberName=$_SESSION['member_name'];
		$memberID=$_SESSION['member_id'];
	}
	else
	{
		$memberID="";
		echo "<script>				
			document.location='LogIn_Cart.php';
		 </script>";
	}
	$invoiceCode=$_GET['invoiceCode'];
	
	if(isset($_COOKIE['user_qty']))
	{
		$qty=$_COOKIE['user_qty'];
		$productName=$_COOKIE['easylife_cart'];
		$noOfProduct=count($_COOKIE['user_qty']);
	}
	else
	{
		$noOfProduct=0;
	}
	$invoice=getInvoiceByCode($invoiceCode);
	$member=getMemberById($invoice['Member_ID']);
	$orders=getOrdersByInvoice($invoiceCode);
	$p=0;
	foreach($orders as $order)
	{
		$p=$p+(((int)$order['Quantity'])*((int)getProductByCode($order['Product_Code'])['Price']));
	}
	
	
?>
<html>
	<head>
		<title>Order</title>
	</head>
	<body>
		<table  width="100%" bgcolor="white">
			<tr>
				<td align="center">Trusted Online Shopping Site In Bangladesh</td>
				<td align="center"><img src="resources/contact.jpg" height="30" width="30"/>01851-851405,01759-833364(10am-10pm)</td>
				<td align="center"><a href="howToBuy.php">How To Buy</a></td>
				
			</tr>
<tr height="80">
				<td align="center" colspan="3">
					<table   width="100%" bgcolor="WhiteSmoke " height="80">
						<tr>

							<td align="center"><a href="home.php"><img src="resources/e.jpg" height="60" width="150" /></a></td>
							<form action="product_by_search.php"><td align="center"><input size="40" name="search" placeholder="Search products"/><input type="submit" value="Search"/></td></form>

							<td align="center">(<?=$noOfProduct?>)items<a href="shoppingCart.php"><img src="resources/c.jpg" height="30" width="30"/></a></td>
							<td align="center"><a href="trackProductSearch.php"><button>Track Product</button></a></td>
							<td align="center">
								<table  >
									<tr>
										<td><img src="resources/m.jpg" height="30" width="30"/></td>
										
										<?php if($memberID=="") { ?>
										<td><a href="Registration.php">Registartion</a></td>
										<?php } ?>
										<?php if($memberID!="") { ?>
										<td><a href="personalInfo.php?memberID=<?=$memberID?>"><?=$memberName?></a></td>
										<?php } ?>
										
									</tr>
									<tr align="right">
										<?php if($memberID!="") { ?>
										<td colspan="2"><a href="LogOut.php">Log Out</a></td>
										<?php } ?>
										
										<?php if($memberID=="") { ?>
										<td colspan="2"><a href="logIn.php">Log In</a></td>
										<?php } ?>
									</tr>
									
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr height="600">
				<td colspan="3" align="center">
					<table  width="100%" height="600">
						<tr>
							<th colspan="5"><hr/><h2>Order Information<h2><hr/></th>
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
								<br>Payment Status: <?=$invoice['Payment_Status']?></td>
							<td><b>SHIPPING</b>
								<br>Shipping Status: <?=$invoice['Status']?><br/></td>
							
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
												<img src=\"resources/".$product['Name'].".jpg\" height=\"40\" width=\"40\"/>
											</td>
											<td>".$product['Name']." Product Code: ".$order["Product_Code"]."</td>
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
									<td>60 tk</td>
								</tr>
								<tr height="50">
									<td></td>
									<td></td>
									<td><b>Net Total</b></td>
									<td><b><?=((int)$p+60)?> tk</b></td>
								</tr>
								<tr >
									<td colspan="4" bgcolor="red" align="center"><a href="cancelOrder.php?del=<?=$invoiceCode?>"><input type="submit" value="Cancel Order" name="cancel"></td>
								</tr>
							</table>
							</td>
						</tr>
						
					
					</table>
				</td>
			</tr>
			<tr bgcolor="WhiteSmoke ">
				<td colspan="3" align="center">
					<table>
						<tr>
							<td ><a href="https://www.facebook.com/"><img src="resources/f.jpg" height="30" width="30" /></a>
							<a href="https://www.instagram.com/"><img src="resources/i.jpg" height="30" width="30" /></a>
							<a href="https://twitter.com/"><img src="resources/t.jpg" height="30" width="30" /></a>
							<a href="https://www.youtube.com/"><img src="resources/y.jpg" height="30" width="30" /></a></td>
							
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td align="center" colspan="3">
					<table width="100%">
						<tr>
							<td align="center">
								<p><b>Information</b></p>
								<a href="aboutUs.php">About Us</a></br>
								<a href="contactUs.php">Contact Us</a>
							</td>
							<td align="center">
								<p><b>Customer Serviece</b></p>
								<a href="securityPolicy.php">Security Policy</a></br>
								<a href="shipping.php">Shipping & Replacement</a></br>
								<a href="privacyPolicy.php">Privacy Policy</a></br>
								<a href="termsOfuse.php">Terms Of Use</a>
							</td>
							<td align="center">
								<p><b>My Account</b></p>
								<a href="<?php if($memberID!="") { ?>personalInfo.php<?php } ?><?php if($memberID=="") { ?>login.php<?php } ?>">Personal Info</a></br>
								
								
								<a href="shoppingCart.php">Shopping Cart</a></br>
								<a href="<?php if($memberID!="") { ?>report.php<?php } ?><?php if($memberID=="") { ?>login.php<?php } ?>">Report</a></br>
							</td>
							<td align="center">
								<p><b>Visit Us</b></p>
								<img src="resources/l.jpg" height="20" width="20" />Dhanmondi, Dhaka-1205 </br>
								<img src="resources/mail.jpg" height="20" width="20" />admin@easylife.com </br>
								<img src="resources/mobile.jpg" height="20" width="20" />09636-102030
								
							</td>
						</tr>
						
					</table>
						<tr>
							<td align="center" colspan="3"><img src="resources/bkash.jpg" height="40" width="40" />
							<img src="resources/rocket.jpg" height="40" width="40" /></td>
						</tr>
						<tr>
							<td align="center">Powered By easylife</td>
							<td></td>
							<td align="center">Copyright &copy 2017 easylife.com. All rights reserved. 2017 </td>
						</tr>
				</td>
			</tr>
		
		</table>
	</body>

</html>
