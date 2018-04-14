<?php session_start(); 
if(isset($_COOKIE['user_qty']))
	{
		$qty=$_COOKIE['user_qty'];
		$noOfProduct=count($_COOKIE['user_qty']);
	}
	else
	{
		$noOfProduct=0;
	}


	if(isset($_SESSION['member_name']))
	{
		$memberName=$_SESSION['member_name'];
		$memberID=$_SESSION['member_id'];
	}
	else
	{
		$memberID="";
	}
?>
<html>
	<head>
		<title>Shipping & Repalcement</title>
	</head>
	<body>
		<table  width="100%" bgcolor="Gainsboro" >
			<tr>
				<td align="center">Trusted Online Shopping Site In Bangladesh</td>
				<td align="center"><img src="resources/contact.jpg" height="30" width="30"/>01851-851405,01759-833364(10am-10pm)</td>
				<td align="center"><a href="howToBuy.php">How To Buy</a></td>
				
			</tr>
		<tr>
				<td align="center" colspan="3">
					<table  width="100%" bgcolor="WhiteSmoke" height="80" >
						<tr>
							<td align="center"><a href="home.php"><img src="resources/e.jpg" height="60" width="150" /></a></td>
							<form action="product_by_search.php"><td align="center"><input size="40" name="search" placeholder="Search products"/><input type="submit" value="Search"/></td></form>
							<td align="center">(<?=$noOfProduct?>)items<a href="shoppingCart.php"><img src="resources/c.jpg" height="30" width="30"/></a></td>
							<td align="center"><a href="trackProductSearch.php"><button>Track Product</button></td>
							<td align="center">
								<table >
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
			<tr>
				<td colspan="3" align="center">
					<table>
						<tr>
							
							<td width="800">
								
								<h3>Delivery Policy</h3>
								<hr/>
								
								<p align="justify">
									

								<b>easylife.com</b> opens the doorway for everybody to shop over the Internet. Our dedicated easylife quality assurance team works round the clock "personally to make sure the right packages reach on time. Our services are at your doorsteps with the lowest delivery charge. We process all deliveries through reputed courier service as well as our in house delivery team. We deliver products all over the Bangladesh. If there is any modification in delivery charge for a particular item, it will be mentioned in product details.

								Order confirmation and delivery completion are subject to product availability. Delivery time may differ from one item to another. It can differ from standard delivery to beyond that.
								</p>
								
								<p align="justify">
									

								<b>Standard Delivery:</b> If your delivery address is within Dhaka city, products will be delivered by within 2 business days. If it is outside Dhaka then it will take 3-4 business days. If you order after 6 PM, it will be considered as an order of next business day.
								Our Business Day: Saturday to Thursday except public holidays.
								</p>
								
								<p align="justify">
									

								<b>Exceptional Delivery:</b> There are some exceptional items that we import from outside Bangladesh. These items can take 10 or more days to reach you. However, you will receive your order within the time specified.

								You can make your purchases on easylife and get delivery from anywhere in the world. Delivery charge varies according to customers' country. In case of paid order, easylife.com cannot be held liable if customer does not receive it within 2 months.
								</p>
								<h3>Replacement Guarantee</h3>
								<hr/>
								
								<p align="justify">
									

								We provide great customer experience each time you shop with your PriyoShop. If you are not satisfied with your purchase, we ensure ‘Replacement Guarantee’. We will replace your purchased product if the product has any defect by its manufacturer or if the product is not the same one you ordered.

								All you need to do is give us a call or drop an email at admin@priyoshop.com within a period of 03 days from the date of delivery. However, please return the product with the tags intact and in their original packaging, in an unwashed and undamaged condition. Replacement for products is subject to inspection and checking by PriyoShop team. Replacement cannot be possible if the product is burnt, damaged by short circuit, or broken by customer.
																</p>
								
								


								
								
							</td>
						</tr>
						
					</table>
				</td>
			</tr>
			<tr bgcolor="WhiteSmoke ">
				<td colspan="3" align="center"  bgcolor="WhiteSmoke ">
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
