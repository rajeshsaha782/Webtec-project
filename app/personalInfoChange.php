<?php session_start(); ?>
<?php require_once "../service/validation_service.php"; ?>
<?php require_once "../data/member_data_access.php"; ?>
<?php
	
	$memberId=$_GET['memberID'];
	$member=getMemberByIdFromDB($memberId);
	$memberName=$member['Name'];
	
	if(isset($_COOKIE['user_qty']))
	{
		$noOfProduct=count($_COOKIE['user_qty']);
	}
	else
	{
		$noOfProduct=0;
	}
	?>
<?php
	$name=$email="";
	
?>
<?php
	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		$name=trim($_POST['name']);
        $email=trim($_POST['email']);
		
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
		
		if($isValid==true){
			$member1['Member_ID']=$member['Member_ID'];
			$member1['Password']=$member['Password'];
			$member1['Name']=$name;
			$member1['Email']=$email;
			$member1['Type']=$member['Type'];
			$member1['Status']=$member['Status'];
			
			if(editMemberToDB($member1)==true){
                echo "<script>
                        document.location='personalInfo.php?memberID=".$member1['Member_ID']."';
                     </script>";
                die();
            }
            else{
                echo "Internal Error<hr/>";
            }
		}
	}
?>
<form method="post">
<html>
	<head>
		<title>Personal Information</title>
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
							<td align="center"><a href="home.php"><img src="resources/e.jpg" height="60" width="120" /></a></td>
							<form action="product_by_search.php"><td align="center"><input size="40" name="search" placeholder="Search products"/><input type="submit" value="Search"/></td></form>
							<td align="center">(<?=$noOfProduct?>)items<a href="shoppingCart.php"><img src="resources/c.jpg" height="30" width="30"/></a></td>
							<td align="center"><a href="trackProductSearch.php"><button>Track Product</button></td>
							<td align="center">
								<table >
									<tr>
										<td><img src="resources/m.jpg" height="30" width="30"/></td>
										
										<?php if($memberId=="") { ?>
										<td><a href="Registration.php">Registartion</a></td>
										<?php } ?>
										<?php if($memberId!="") { ?>
										<td><a href="personalInfo.php"><?=$memberName?></a></td>
										<?php } ?>
										
									</tr>
									<tr align="right">
										<?php if($memberId!="") { ?>
										<td colspan="2"><a href="LogOut.php">Log Out</a></td>
										<?php } ?>
										
										<?php if($memberId=="") { ?>
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
				<fieldset>
					<legend><b>Edit Profile</b></legend>
					
					<table  width="80%" height="500">
						<tr>
							<td><b>Name</b></td>
							<td colspan="2"> <input name="name" value="<?=$member['Name']?>"/></td>
						</tr>
						<tr>
							<td ><b>Email </b></td>
							<td colspan="2"><input name="email" value="<?=$member['Email']?>"/></td>
						</tr>
						
						<tr>
							<td ><input type="submit" value="Save" ></td>
							
							<td colspan="2"><a href="personalInfo.php?memberID=<?=$member['Member_ID']?>"><button>Back</button></a></td>
						</tr>
					
					</table>
					</fieldset>
				</td>
			</tr>
			<tr>
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
								<a href="<?php if($memberId!="") { ?>personalInfo.php<?php } ?><?php if($memberId=="") { ?>login.php<?php } ?>">Personal Info</a></br>
								<a href="<?php if($memberId!="") { ?>report.php<?php } ?><?php if($memberId=="") { ?>login.php<?php } ?>">Report</a></br>
							
								<a href="shoppingCart.php">Shopping Cart</a></br> <a href="report.php">Report</a></br>
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
