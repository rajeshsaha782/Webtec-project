<?php session_start(); ?>
<?php require_once "../service/validation_service.php"; ?>
<?php require_once "../service/member_service.php"; ?>
<?php require_once "../service/order_product-serviec.php"; ?>
<?php
		
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
	
<?php
	$icode=$email="";
	$emailErr=$icodeErr="";
    if($_SERVER['REQUEST_METHOD']=="POST")
	{
		$email=trim($_POST['email']);
		$icode=trim($_POST['icode']);
		
		$isValid = true;
        if(empty($email)){
            $isValid = false;
            $emaileErr = "Inser a email";
        }
		else if(isValidEmail($email)==false){
            $isValid = false;
            $emailErr = "Invalid email format";
        }
		else if(isUniqueMemberEmail($email))
		{
			$isValid = false;
            $emailErr = "Email Not found";
		}
		
		if(empty($icode)){
            $isValid = false;
            $icodeErr = "Insert a Invoice code";
        }
		elseif(getInvoiceByCodeFromDB($icode)!=true)
		{
			$isValid = false;
            $emailErr = "Order Not found!!!";
		}
       
		if($isValid==true){
			echo"done";
                echo "<script>
                        document.location='trackProduct.php?icode=".$icode."';
                     </script>";
                die();
            }
            // else{
                // echo "Internal Error<hr/>";
            // }
			
			
		}
		
    
?>

<form method="post">
	<html>
		<head>
			<title>User Report</title>
		</head>
		<body>
			<table   width="100%" bgcolor="Gainsboro" >
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
						<table width="100%" height="400">
							<tr>
								
								<td align="center" width="80%">
									
											<table  width="600">
												<tr>
													<td>Email Id</td>
													<td><input type="text" name="email" value="<?=$email?>"/></td>
													<td><font color="red"><?=$emailErr?></font></td>
												</tr>
												<tr>
													<td>Order Code</td>
													<td><input type="text" name="icode" value="<?=$icode?>"/></td>
													<td><font color="red"><?=$icodeErr?></font></td>
												</tr>
												<tr>
													<td></td>
													<td><input type="submit" Value="Track"/></td>
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
</form>