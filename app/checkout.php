<?php session_start(); ?>
<?php require_once "../service/invoice_serviece.php";
	require_once "../service/product_serviec.php";
	require_once "../service/member_service.php";
	require_once "../service/order_product-serviec.php";?>

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
	
	if(isset($_COOKIE['user_qty']))
	{
		$qty=$_COOKIE['user_qty'];
		$productNames=$_COOKIE['easylife_cart'];
		$noOfProduct=count($_COOKIE['user_qty']);
		
		
	}
	else
	{
		echo "<script>				
			document.location='home.php';
		 </script>";
	}
?>
<?php
	$name=$address=$phone="";
	$name_err=$address_err=$phone_err="";
?>
<?php
    if($_SERVER['REQUEST_METHOD']=="POST")
	{
		$name=$_POST['name'];
        $address=$_POST['address'];
		$phone=$_POST['phone'];
		$payMethod=$_POST['payMethod'];
		$cc=true;
		$v=true;
		if(empty($name))
		{
			$name_err="*Name is required";
			$v=false;
		}
		if(empty($address))
		{
			$address_err="*Address is required.";
			$v=false;
		}
		
		if(empty($phone))
		{
			$phone_err="*Phone is required.";
			$v=false;
		}
		
		if($v==true)
		{
			$invoices=getAllInvoices();
			$id=0;
			foreach($invoices as $p)
			{
				if($id<((int)$p['Invoice_Code']))
				{
					$id=(int)$p['Invoice_Code'];
				}
			}
			$invoice['Invoice_Code']=$id+1;
			$invoice['Member_ID']=$memberID;
			$invoice['Phone']=$phone;
			$invoice['Payment_Method']=$payMethod;
			$invoice['Shipping_Address']=$address;
			$invoice['Billing_Address']=$address;
			$orders=getAllOrders();
			$code="Product _Code";
			$q=0;
			$oid=0;
			foreach($orders as $p)
				{
					if($oid<((int)$p['Order_Code']))
					{
						$oid=(int)$p['Order_Code'];
					}
				}
			 if(addInvoice($invoice)==true){
				 foreach($productNames as $productName)
				 {
					
					//var_dump($product);
					
					
					$order['Order_Code']=(++$oid);
					$order['Product_Code']=getProductCodeByName($productName)['p'];
					$order['Quantity']=$qty[$q];
					$order['Invoice_Code']=$id+1;
					//var_dump($order);
					$product=getProductsByName($productName);
					$product[0]['Product_Code']=$product[0]['Product _Code'];
					$product[0]['Quantity']=(int)$product[0]['Quantity']-(int)$qty[$q];
					//var_dump($product);
					//var_dump($product['Quantity']);
					editProduct($product[0]);
					
					$q++;
					if(addOrder($order)==false)
					{
						$cc=false;
						break;
					}
				
				}
				
				
				if($cc==true)
				{
					unset($_COOKIE['user_qty']);
					unset($_COOKIE['easylife_cart']);
					
					updataTotalPurchase($memberID,$_SESSION['Sub-Total']+60);
					
                echo "<script>				
						document.location='cartEmpty.php?invoiceCode=".($id+1)."';
					 </script>";
                die();
				 }
            }
            else{
                echo "Internal Error<hr/>";
            }
		}
			
		
		
    }
	
?>
	<head>
		<title>Checkout</title>
	</head>
	<body>
		<table   width="100%" bgcolor="white" >
			<tr height="20">
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
							<td align="center"><a href="trackProductSearch.php"><button>Track Product</button></td>
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
			<tr>
				<td colspan="3" align="center">
					<table width="100%">
						<tr>
							<td width="20%" valign="top">
								<table height="400" width="100%" valign="top" bgcolor="LightCoral">
								<tr height="50">
									<td><h2>CATEGORIES</h2><hr/></td>
								</tr>
									<tr>
										<td height="50">
											<select onchange="location = this.value;" >
												<option value="home.php">Winter Collection</option>
												<option value="product_by_category.php?catagory=Gents Winter Collection">Gents Winter Collection</option>
												<option value="product_by_category.php?catagory=Ladies Winter Collection">Ladies Winter Collection</option>
												<option value="product_by_category.php?catagory=Kids Winter Collection">Kids Winter Collection</option>
											</select>
										</td>
									</tr>
									<tr>
										<td height="50">
											<select onchange="location = this.value;">
												<option value="product_by_category.php?catagory=Womens Clothing">Womens Clothing</option>
												<option value="product_by_category.php?catagory=Hijab And Dupatta">Hijab And Dupatta</option>
												<option value="product_by_category.php?catagory=Saree">Saree</option>
												<option value="product_by_category.php?catagory=Three Piece">Three Piece</option>
											</select>
										</td>
									</tr>
									<tr>
										<td height="50">
											<select onchange="location = this.value;">
												<option value="product_by_category.php?catagory=Mens Clothing">Mens Clothing</option>
												<option value="product_by_category.php?catagory=Shirt">Shirt</option>
												<option value="product_by_category.php?catagory=Panjabi">Panjabi</option>
												<option value="product_by_category.php?catagory=Pant">Pant</option>
											</select>
										</td>
									</tr>
									<tr>
										<td height="50">
											<select onchange="location = this.value;">
												<option value="product_by_category.php?catagory=T-Shirt">T-Shirt</option>
												<option value="product_by_category.php?catagory=T-Shirt">T-Shirt</option>
												<option value="product_by_category.php?catagory=Trouser">Trouser</option>
												<option value="product_by_category.php?catagory=Cap">Cap</option>
											</select>
										</td>
									</tr>
									<tr>
										<td height="50">
											<select onchange="location = this.value;">
												<option value="product_by_category.php?catagory=Accessories">Accessories</option>
												<option value="product_by_category.php?catagory=Ear Rings">Ear Rings</option>
												<option value="product_by_category.php?catagory=Money Bag">Money Bag</option>
												<option value="product_by_category.php?catagory=Watch">Watch</option>
												<option value="product_by_category.php?catagory=Necklace">Necklace</option>
												<option value="product_by_category.php?catagory=Sunglass">Sunglass</option>
												<option value="product_by_category.php?catagory=Bag">Bag</option>
											</select>
										</td>
									</tr>
									<tr>
										<td height="50">
											<select onchange="location = this.value;">
												<option value="product_by_category.php?catagory=Footwear">Footwear</option>
												<option value="product_by_category.php?catagory=Mens Footwear">Mens Footwear</option>
												<option value="product_by_category.php?catagory=Womens Footwear">Womens Footwear</option>
												<option value="product_by_category.php?catagory=Kids Footwear">Kids Footwear</option>
											</select>
										</td>
									</tr>
									<tr>
										<td height="50">
											<select onchange="location = this.value;">
												<option value="product_by_brand.php?brand=Brand">Brand</option>
												<option value="product_by_brand.php?brand=Easy" >Easy</option>
												<option value="product_by_brand.php?brand=Eacstasy">Eacstasy</option>
												<option value="product_by_brand.php?brand=Aarong">Aarong</option>
												<option value="product_by_brand.php?brand=Yellow">Yellow</option>
											</select>
										</td>
									</tr>
								</table>
								
							</td>
							<td align="center"  width="60%" valign="top" >
								<fieldset>
								<form method="post">
								
								<legend><b>Enter SHIPPING ADDRESS</b></legend>
									<table  height="300" width="100%" bgcolor="WhiteSmoke">
										<tr>
											<td>Name :</td>
											<td colspan="2"><input size="48" name="name" value="<?=$name?>"/><span id="namemsg"></span><font color="red"><?=$name_err?></font></td>
										</tr>
										<tr>
											<td>Address :</td>
											<td><textarea name="address" rows="10" cols="50" value="<?=$address?>"></textarea><span id="addressmsg"><font color="red"><?=$address_err?></font></span></td>
											
										</tr>
										
											
										<tr>
											<td>Phone:</td>
											<td colspan="2"><input size="48" name="phone" value="<?=$phone?>"/><span id="phonemsg"><font color="red"><?=$phone_err?></font></span></td>
										</tr>
										
									</table>
								</fieldset>
									</br>
									
								<fieldset bgcolor="white">
								<legend><b>Choose Payment Method</b></legend>	
									
									<table  width="100%" bgcolor="WhiteSmoke">
										<tr>
											<td width="20%"><img src="resources/COD.jpg" height="40" width="100" /></td>
											<td><input name="payMethod" type="radio" checked="checked" value="Cash On Delivery" /><b>Cash On Delivery (COD)</b></td>
										</tr>
										<tr>
											<td width="20%"><img src="resources/bkash.jpg" height="40" width="100" /></td>
											<td><input name="payMethod" type="radio" value="bkash"/><b>bkash</b></td>
										</tr>
										<tr>
											<td width="20%"><img src="resources/rocket.jpg" height="40" width="100" /></td>
											<td><input name="payMethod" type="radio" value="rocket"/><b>rocket</b></td>
										</tr>
										<tr>
											<td width="20%"><img src="resources/credit card.jpg" height="40" width="100" /></td>
											<td><input name="payMethod" type="radio" value="Online Payment"/><b>Online Payment (Debit or Credit Card)</b></td>
										</tr>
										<tr height="50">
											<td align="center" bgcolor="YellowGreen " colspan="2"><input type="submit" value="CONFIRM"/></td></form>
										</tr>
									</table>
									</fieldset>
							</td>
							<td valign="top">
							<br/>
								<table width="80%" bgcolor="WhiteSmoke">
									<tr>
						
										<td width="41%">Sub-Total: </td>
										<td ><?=$_SESSION['Sub-Total'] ?> Tk</td>
									</tr>
									<tr>
						
										<td width="41%">Shipping: </td>
										<td>60 Tk</td>
									</tr>
									<tr><td colspan="2"><hr/></td></tr>
									<tr>
								
										<td width="41%"><font color="red"><h2>Total: </h2></td>
										<td><font color="red"><h2><?=$_SESSION['Sub-Total']+60 ?> Tk</h2></td>
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