<?php session_start(); ?>
<?php require_once "../service/validation_service.php"; ?>
<?php require_once "../data/member_data_access.php"; ?>
<?php
	$name=$email=$password=$cpassword="";
	$nameErr=$emailErr=$passErr=$cpassErr=$typeErr=$gErr="";
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
    if($_SERVER['REQUEST_METHOD']=="POST")
	{
		$name=trim($_POST['name']);
        $email=trim($_POST['email']);
		$password=trim($_POST['password']);
		$cpassword=trim($_POST['cpassword']);
		
		$isValid = true;
        if(empty($email)){
            $isValid = false;
            $emailErr = "*";
        }
        else if(isValidEmail($email)==false){
            $isValid = false;
            $emailErr = "Invalid email format";
        }
		
		if(empty($name)){
            $isValid = false;
            $nameErr = "*";
        }
        else if(isValidPersonName($name)==false){
            $isValid = false;
            $nameErr = "At least two words required, Only letters and white space allowed";
        }
		
		
		
		if(empty($password)){
            $isValid = false;
            $passErr = "*";
        }
		
		else if(isValidPassword($password)==false){
            $isValid = false;
            $passErr = "Minimum length 2";
        }
		
		if(empty($cpassword)){
            $isValid = false;
            $cpassErr = "*";
        }
		
		else if($password!=$cpassword){
            $isValid = false;
            $cpassErr = "Password doesn't match";
        }
		
		
		if($isValid==true){
			$members=getAllMembersFromDB();
			$id=0;
			foreach($members as $m)
			{
				if($id<((int)$m['Member_ID']))
				{
					$id=(int)$m['Member_ID'];
				}
			}
			$member['Member_ID']=$id+1;
			$member['Password']=$password;
			$member['Name']=$name;
			$member['Email']=$email;
			$member['Type']=4;
			$member['Status']='Active';
			
			if(addMemberToDB($member)==true){
				echo"done";
                echo "<script>
                        document.location='personalInfo.php?memberID=".$member['Member_ID']."';
                     </script>";
                die();
            }
            else{
                echo "Internal Error<hr/>";
            }
		
		}
		
    }
	
	if(isset($_COOKIE['user_qty']))
	{
		$noOfProduct=count($_COOKIE['user_qty']);
	}
	else
	{
		$noOfProduct=0;
	}
?>


<form method="post">
<html>
	<head>
		<title>Registration</title>
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
			<tr height="600">
				<td colspan="3" align="center" valign="top">
					<h2>REGISTER</h2><hr/>
					<table bgcolor="white">
					<tr>
					<td>
					<table width="100%" >
					<tr>
						<td width="130"></td>
						<td width="10"></td>
						<td width="230"></td>
						<td></td>
					</tr>
					<tr>
						<td>Name</td>
						<td>:</td>
						<td><input name="name" type="text"  value="<?=$name?>"></td>
						<td><font color="red"><?=$nameErr?></font></td>
					</tr>		
					<tr><td colspan="4"><hr/></td></tr>
					<tr>
						<td>Email</td>
						<td>:</td>
						<td>
							<input name="email" type="text"  value="<?=$email?>"/>
							<abbr title="hint: sample@example.com"><b>i</b></abbr>
						</td>
						<td><font color="red"><?=$emailErr?></font></td>
					</tr>	
					<tr><td colspan="4"><hr/></td></tr>
					<tr>
						<td>Password</td>
						<td>:</td>
						<td><input name="password" type="password" value="<?=$password?>" /></td>
						<td><font color="red"><?=$passErr?></font></td>
					</tr>		
					<tr><td colspan="4"><hr/></td></tr>
					<tr>
						<td>Confirm Password</td>
						<td>:</td>
						<td><input name="cpassword" type="password" value="<?=$cpassword?>"/></td>
						<td><font color="red"><?=$cpassErr?></font></td>
					</tr>		
					<tr><td colspan="4"><hr/></td></tr>
					<tr bgcolor="YellowGreen" height="50"><td colspan="4" align="center"><input type="submit" value="Register"></td></tr>
					
					</table>
					</td>
					<td>
			
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
</form>