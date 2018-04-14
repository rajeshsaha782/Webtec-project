<?php session_start(); ?>
<?php require_once "../service/member_service.php"; ?>
<?php
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
<html>
	<head>
		<title>Login</title>
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
							<td align="center"><input size="40" name="search" placeholder="Search products"/><input type="submit" value="Search"/></td>

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
			<tr height="600">
<script>
	function validate(){
		
		var nameTextBox = document.getElementById("name");
		var passTextBox = document.getElementById("pass");
		
				
		var nameMsgBox = document.getElementById("namemsg");	
		var passMsgBox = document.getElementById("passmsg");	

		name = nameTextBox.value;	
		pass = passTextBox.value;
		
		
		if(name==""){
			nameMsgBox.innerHTML = "*";return false;
		}else{
			nameMsgBox.innerHTML = "";
		}
		if(pass==""){
			passMsgBox.innerHTML = "*";return false;
		}
		else{
			passMsgBox.innerHTML = "";return true;
		}
		
	}
</script>
				<td colspan="3" align="center" valign="top">
							<h2 >WELCOME, PLEASE SIGN IN!</h2><hr/>
				<form method="post" onsubmit="return validate()">
					<table width="50%" height="300" bgcolor="white">
						<tr>
						<td colspan="2" align="center">
				<?php
							 if($_SERVER['REQUEST_METHOD']=="POST")
							 {
								$members=getAllMembersFromDB();
								$email=trim($_POST['email']);
								$pass=trim($_POST['pass']);
									$v=false;
								foreach($members as $member)
								{
										if($member['Email']==$email)
										{
											if($member['Password']==$pass)
											{
												// session_start();
												// $_SESSION['easylife_email'] = $email;
												
												if($member['Status']=="Blocked")
												{
													echo "<div><font color=red>"."Login was unsuccessful.<br/>This Member is Blocked!!!"."</font></div>";
												}
												else
												{
												if($member['Type']==1)
												{
													echo "<script>				
															document.location='admin_home.php?memberID=".$member['Member_ID']."';
														 </script>";
												}
												if($member['Type']==2)
												{
													echo "<script>				
															document.location='stock_executive_home.php?memberID=".$member['Member_ID']."';
														 </script>";
												}
												if($member['Type']==3)
												{
													echo "<script>				
															document.location='order_executive_home.php?memberID=".$member['Member_ID']."';
														 </script>";
												}
												
												if($member['Type']==4)
												{
													$_SESSION['member_id']=$member['Member_ID'];
														$_SESSION['member_name']=$member['Name'];
													echo "<script>				
															document.location='home.php';
														 </script>";
												}
												}
												
											}
											else{
												echo "<div><font color=red>"."Login was unsuccessful.<br/>Wrong password!!!"."</font></div>";
											}
											$v=true;
										}
								}
								if($v==false){echo "<div><font color=red>"."Login was unsuccessful.<br/>Customer account not found!!!"."</font></div>";}
							 }
				?>
						
						
						</td>
						</tr>
						<tr>
							<td>Email: </td>
							<td><input id="name" name="email" size="50"/><span id="namemsg"></span></td>
						</tr>
						<tr>
							<td>Password: </td>
							<td><input type="password" id="pass" name="pass" size="50"/><span id="passmsg"></span></td>
						</tr>
						<tr>
							<td colspan="2" align="center" bgcolor="RoyalBlue"><input type="submit" value="Login" /></td>
						</tr>
						
						<tr>
							<td colspan="3">Not a member yet?</td>
						</tr>
						<tr>
							<td colspan="2"><a href="Registration.php">Register Now</a></td>
						</tr>
					
					</table>
				</form>
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


