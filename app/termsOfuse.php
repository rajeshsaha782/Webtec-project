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
		<title>Terms Of Use</title>
	</head>
	<body>
		<table  width="100%" bgcolor="Gainsboro">
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
							
							<td width="800" height="400">			
								<p align="justify">
									

								


								The domain name www.easylife.com is owned by easylife.com Limited, whose registered office is at 39 North Road, Vuter Goli, Near Kalabagan Thana, Dhanmondi, Dhaka 1205. Your use of this e-commerce portal and services and tools are governed by the following terms and conditions (Terms of Use) as applicable to the website. When you visit the website, you are subject to the policies that are applicable here.

								For the purpose of these Terms of Use, wherever the context so requires ‘You’ or ‘User’ or ‘Visitor’ will mean any natural or legal "person who has agreed to become a member of the site by signing up. easylife allows user to surf the website or making purchases without registering on the website. The term “we”, “us”, “our” will mean easylife.com.

								When you use easylife.com, we collect and store your "personal information which is provided by you from time to time. Our primary goal in doing so is to provide you a safe, efficient, and customized experience. This allows us to provide services and features that most likely meet your needs. If you choose to buy on the website, we collect information about your buying behavior.

								If you choose to mail us or leave feedback, we will collect that information you provide to us. We retain this information as necessary to resolve disputes, provide customer support and troubleshoot problems as permitted by law.In our efforts to continually improve our product and service offerings, we collect and analyze demographic and profile data about our users’ activity on our website.Our website may link to other websites too. These links are provided for your convenience to provide further information. easylife.com is not responsible for the practices, term of use or the content of those linked websites.

								This website contains materials which are owned by us. These materials include, but are not limited to, the design, look, appearance, data, and graphics. Reproduction is prohibited other than in accordance with the copyright law. Unauthorized use of this site may give rise to a claim for damages. Products at this e-commerce portalare sold by respective sellers. All materials on this site are protected by copyrights, trademarks, and other intellectual property rights. Material on website is solely for "personal and non-commercial use of users. Without the prior written consent of the owner, modification or use of the materials on any other website is violation of the law, and is prohibited.

								We reserve the right to change, modify, add or remove portions of these Terms of Use at any time without any prior written notice. If we decide to change the terms of use, we will post those changes on this page so that you are always aware of what information we collect and how we use it.

								</p>
								
								
								
								


								
								
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
							<td align="center">Copyright &copy 2017 easylife.com. All rights reserved. 2017 </td>
						</tr>
				</td>
			</tr>
		
		</table>
	</body>

</html>
