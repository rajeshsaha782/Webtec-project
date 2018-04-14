<?php session_start(); ?>
<?php require_once "../service/product_serviec.php"; ?>
<?php

	// setcookie("user_qty[1]","",time() - 86400,"/");
	// setcookie("easylife_cart[1]","",time() - 86400,"/");
	// setcookie("user_qty[2]","",time() - 86400,"/");
	// setcookie("easylife_cart[2]","",time() - 86400,"/");
	// setcookie("user_qty[0]","",time() - 86400,"/");
	// setcookie("easylife_cart[0]","",time() - 86400,"/");


	if(isset($_COOKIE['easylife_cart']))
	{
		foreach($_COOKIE['easylife_cart'] as $c)
		{
			$cart[]=getProductsByFullName($c);
		}
		//var_dump($cart);
		
	}
	
	//var_dump($_COOKIE);
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
		<title>Shopping Cart</title>
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
							<td align="center" width="80%" valign="top">
							
											<table   width="100%" bgcolor="white" >
									<?php if(isset($_COOKIE['easylife_cart'])) {?>
												<tr>
													<th colspan="6" bgcolor="DodgerBlue " ><h3>In your Cart</h3></th>
												</tr>
												<tr bgcolor="Silver ">
													<th>Remove</th>
													<th>Preview</th>
													<th>Products</th>
													<th>Quantity</th>
													<th>Price</th>
													<th>Total</th>
												</tr>
											
												<?php $tolal=0; $count=0; foreach($cart as $c) {?>
												<tr height="50">
													<td align="center" width="10%"><a href="removeFromCart.php?id=<?=$count?>"><img src="resources/remove.jpg" height="20" width="20" /></a></td>
													<td align="center"><img src="resources/<?= $c['Name'] ?>.jpg" height="50"/></td>
													<td width="40%" align="center"><?= $c['Name'] ?></td>
													<td width="10%"><input value="<?=$qty[$count]?>"/></td>
													<td align="center"><?= $c['Price'] ?> Tk</td>
													<td align="center"><?= $qty[$count]*$c['Price'] ?> Tk</td>
												</tr>
												<?php $tolal=$tolal+$qty[$count]*$c['Price']; $count++; } ?>
												
												
												
												
												<?php if(count($cart)!=0) {?>
												<tr>
													<th></th>
													<th></th>
													
													<td colspan="4" align="right">
														<table   width="50%">
															<tr bgcolor="LightSkyBlue ">
												
																<td width="41%">Sub-Total: </td>
																<td ><?=$tolal?> Tk</td>
															</tr>
															<?php $_SESSION['Sub-Total']=$tolal ?>
															<tr bgcolor="LightSkyBlue">
												
																<td width="41%">Shipping: </td>
																<td>60 Tk</td>
															</tr>
															<tr bgcolor="LightSkyBlue">
														
																<td width="41%"><h2><font color="red">Total: </font></h2></td>
																<td><h2><font color="red"><?=$tolal+60?>Tk</font></h2></td>
															</tr>
															<tr>
																<td colspan="2" align="center" bgcolor="LightCoral"><a href="
																<?php if($memberID=="") { ?>
																LogIn_Cart.php <?php }?>
																<?php if($memberID!="") { ?>
																checkout.php <?php }?>
																"><h2>Confirm Order</h2></a>
																</td>
															</tr>
														</table>
															
													</td>
												</tr>
											<?php } ?>
									<?php } ?>	
										<?php if(!isset($_COOKIE['easylife_cart'])) {?>
												<tr>
													<td colspan="6">Your Shopping Cart is empty!</td>
												</tr>
										<?php } ?>
											</table>
							</td>
								
							</td>
					
						
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
