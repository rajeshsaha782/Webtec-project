<?php session_start(); ?>
<?php require_once "../service/product_serviec.php"; ?>
<?php
	$product_name=$_GET['product_name'];
	$product=getProductsByName($product_name);	
	if(!isset($_COOKIE['product_name']))
	{
		 $cookie_name = "product_name";
		 $cookie_value = $product[0]['Name'];
		 setcookie($cookie_name,$cookie_value,time() + 3600,"/");
	}
	else
	{
		 $cookie_name = "product_name";
		 $cookie_value = $product[0]['Name'];
		 setcookie($cookie_name,$cookie_value,time() + 3600,"/");
	}
	if(isset($_COOKIE['user_qty']))
	{

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
<?php
	$suggetions=getProductsByCatagory($product[0]['Catagory']);
	$month=date("m");
	$products1=getAllProducts();
	$newArrival=array();
	foreach($products1 as $p)
	{
		$dop=explode("-",explode(" ",$p['Date'])[0])[1];
		if($month==$dop){
			$newArrival[]=$p;
		}
	}
	//var_dump($newArrival);
	//var_dump($suggetions);
?>

<html>
	<head>
		<title>Details</title>
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
								<table height="400" width="100%" valign="top" bgcolor="LightCoral    ">
								<tr height="50">
									<td><h2>CATEGORIES</h2><hr/></td>
								</tr>
									<tr>
										<td height="50">
											<select onchange="location = this.value;" 
												<option value="home.php">Winter Collection</option>
												<option value="men.php">Gents Winter Collection</option>
												<option value="women.php">Ladies Winter Collection</option>
												<option value="kid.php">Kids Winter Collection</option>
											</select>
										</td>
									</tr>
									<tr>
										<td height="50">
											<select onchange="location = this.value;">
												<option value="home.php">Womens Clothing</option>
												<option value="women.php">Hijab And Dupatta</option>
												<option value="women.php">Saree</option>
												<option value="women.php">Three Piece</option>
											</select>
										</td>
									</tr>
									<tr>
										<td height="50">
											<select onchange="location = this.value;">
												<option value="home.php">Mens Clothing</option>
												<option value="men.php">Shirt</option>
												<option value="men.php">Panjabi</option>
												<option value="men.php">Pant</option>
											</select>
										</td>
									</tr>
									<tr>
										<td height="50">
											<select onchange="location = this.value;">
												<option value="home.php">Kids Clothing</option>
												<option value="kid.php">T-Shirt</option>
												<option value="kid.php">Trouser</option>
												<option value="kid.php">Cap</option>
											</select>
										</td>
									</tr>
									<tr>
										<td height="50">
											<select onchange="location = this.value;">
												<option value="home.php">Accessories</option>
												<option value="accessories.php">Ear Rings</option>
												<option value="accessories.php">Money Bag</option>
												<option value="accessories.php">Watch</option>
												<option value="accessories.php">Necklace</option>
												<option value="accessories.php">Sunglass</option>
												<option value="accessories.php">Bag</option>
											</select>
										</td>
									</tr>
									<tr>
										<td height="50">
											<select onchange="location = this.value;">
												<option value="home.php">Footwear</option>
												<option value="footWear.php">Mens Footwear</option>
												<option value="footWear.php">Womens Footwear</option>
												<option value="footWear.php">Kids Footwear</option>
											</select>
										</td>
									</tr>
									<tr>
										<td height="50">
											<select onchange="location = this.value;">
												<option value="home.php">Brand</option>
												<option value="brand.php">Eacstasy</option>
												<option value="brand.php">Aarong</option>
												<option value="brand.php">Yellow</option>
											</select>
										</td>
									</tr>
								</table>
								
							</td>
							<td align="center" width="80%">
								<form action="addToCart.php?product_name=<?=$product[0]['Name']?>">
								<table  width="1000" bgcolor="white">
									<tr>
										<td align="center" colspan="2"><img src="resources/<?=$product[0]['Name']?>.jpg" height="400"/></td>
										<td>
										<h2><?=$product[0]['Name']?></h2>
										
										<h3>Product Code: <?=$product[0]['Product _Code']?></h3>
										<p>Review : 
											<select id="review" onchange="review()">
											<option value=""></option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											</select>
									<script>
										function review()
										{
											 var x = document.getElementById("review");
											 alert("hello");
										}
									</script>
										</p>
										<h3>Tk <?=$product[0]['Price']?></h3>
										<p>Size : <input type="radio" name="size">XL</input><input type="radio" name="size"/>L</input><input type="radio" name="size"/>M</input><input type="radio" name="size"/>S</input></p>
										<p>Quantity: <input id="qty" name="user_qty" value="1"/></p>
									
										
									<script>
										function check_quantity()
										{
											var db_qty= <?php echo $product[0]['Quantity']; ?>;
											var user_qty=document.getElementById("qty");
											
											if(db_qty<user_qty.value)
											{
												alert('The maximum quantity allowed for purchase is '+ db_qty);
											
												return false;
											}
											if(user_qty.value<0)
											{
												alert('Quantity should be positive');
												return false;
											}
											
											
										}
										
										
									</script>
									
										<table bgcolor="YellowGreen "><tr height="30" width="50%"><td align="center"><input type="submit" value="Buy Now" onclick="return check_quantity();" /></td></tr></table>
								</form>	
										
										</td>
									</tr>
					
											<tr>
												<td colspan="3"> <h3>Product Feature</h3></td>
											</tr>
											<tr>
												
												<td width="500" colspan="3"><p align="justify"><?=$product[0]['Description']?></td>
											</tr>
						
											<tr bgcolor="#cccccc">
												<td colspan="3"><h3>Related Products</h3></td>
											</tr>
											<tr>
											<?php if(count($suggetions)>4) {?>
													<?php $count=0; foreach($suggetions as $s) { ?>
													
														<?php if($s['Name']!=$product_name) {?>
															<?php if($count<3) {?>
															<td align="center" ><a href="details.php?product_name=<?=$s['Name']?>"><img src="resources/<?=$s['Name']?>.jpg" height="200"/></a><br/>Tk 390</td>
															<?php }?>
														<?php $count++;
															if($count==3){break;}
														}?>
													<?php }?>
												<?php }?>
												
												
												
											</tr>
											
											<tr bgcolor="#cccccc">
												<td colspan="3"><h3>New Arrival</h3></td>
											</tr>
											<tr>
											<?php if(count($newArrival)>4) {?>
													<?php $count=0; foreach($newArrival as $s) { ?>
													
														<?php if($s['Name']!=$product_name) {?>
															<?php if($count<3) {?>
															<td align="center" ><a href="details.php?product_name=<?=$s['Name']?>"><img src="resources/<?=$s['Name']?>.jpg" height="200"/></a><br/>Tk 390</td>
															<?php }?>
														<?php $count++;
															if($count==3){break;}
														}?>
													<?php }?>
												<?php }?>
												
												
												
											</tr>
											
										</table>	
									<table/>	
							</td>
									</tr>
								</table>						
							</td>
						</tr>
					</table>
				</td>
			</tr>
						
		
			<tr bgcolor="WhiteSmoke ">
				<td colspan="3" align="center" >
					<table >
						<tr >
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
