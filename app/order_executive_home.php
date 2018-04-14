<?php require_once "../data/member_data_access.php"; ?>
<?php require_once "../data/report_data_access.php"; ?>
<?php
	if(isset($_GET['memberID']))
	{
		$memberID=$_GET['memberID'];
		$memberName=getMemberByIDFromDB($memberID)['Name'];
		updateLastActiveToDB($memberID);	
		$reports=getAllReportsFromDB();	
	}
	else
	{
		echo "<script>				
				document.location='logIn.php';
				</script>";
	}
	
	
	if($noOfReports=count($reports)>0)
	{
		$noOfReports=count($reports);
	}
	else
	{
		$noOfReports=0;
	}

	
?>

<html>
	<head>
		<title>Admin Home</title>
	</head>
	<body>
		<table width="100%" >
			<tr>
				<td align="center" colspan="3">
					<table  width="100%" bgcolor="Gainsboro " >
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td align="left"><a href="order_executive_home.php?memberID=<?=$memberID?>"><img src="resources/e.jpg" height="60" width="150" /></a></td>
							
							<td >
								<table  width="100%">
									<tr>
										<td align="center">(<?=$noOfReports?>)Reports<a href="admin/treports.php" target="contentFrame"><img src="resources/report.png" height="30" width="30"/></a></td>
										<td align="right">
											<table >
												<tr>
													<td><img src="resources/m.jpg" height="30" width="30"/></td>
													<?php if($memberID!="") { ?>
													<td><a href="admin/uedetails.php?memberID=<?=$memberID?>" target="contentFrame"><?=$memberName?></a></td>
													<?php } ?>
												</tr>
												<tr align="right">
													<td align="right" colspan="2"><font color="LightSeaGreen">Order Executive</font></td>
												</tr>
												<tr align="right">
													<td colspan="2"><a href="home.php">Log Out</a></td>
												</tr>
												
											</table>
										</td>
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
								<table bgcolor="SkyBlue" height="550" width="100%" valign="top">
									<tr height="10" >
										<td align="left">
											<hr/><b>Account</b><hr/>
										</td>
									</tr>
									<tr height="10" >
										<td align="center">
											<a href="admin/dashboard_order.php?memberID=<?=$memberID?>" target="contentFrame">Dashboard</a>
										</td>
									</tr>
									<tr height="10" >
										<td align="center">
											<a href="admin/Editprofile.php?memberID=<?=$memberID?>" target="contentFrame" >Edit profile</a>
										</td>
									</tr>
									<tr height="10" >
										<td align="center">
											<a href="admin/uedetails.php?memberID=<?=$memberID?>" target="contentFrame" >View profile</a>
										</td>
									</tr>
									<tr height="10" >
										<td align="center">
											<a href="admin/changepass.php?memberID=<?=$memberID?>" target="contentFrame" >Change password</a>
										</td>
									</tr>
									
									<tr height="10" >
										<td align="left">
											<hr/><b>View</b><hr/>
										</td>
									</tr>
								
									<tr height="10" >
										<td align="center">
											<a href="admin/tinvoice.php" target="contentFrame" >View Invoices</a>
										</td>
									</tr>
									<tr height="10" >
										<td align="center">
											<a href="admin/orderdetails.php" target="contentFrame" >View Orders</a>
										</td>
									</tr>
									<tr height="10" >
										<td align="center">
											<a href="DataBase/DataBase.html" target="contentFrame" >Database</a>
										</td>
									</tr>
								</table>
								
							</td>
							<td align="center" width="80%" valign="top">
								<table  width="100%">
							
									<tr>
										<td width="800" valign="top">
											<iframe name="contentFrame" frameborder="0" width="100%" height="790" src="admin/dashboard_order.php?memberID=<?=$memberID?>"></iframe>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						
					</table>
				</td>
			</tr>
			<tr bgcolor="gray">
				<td colspan="3" align="center">
					<table >
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
							<td align="center">Powered By easylife</td>
							<td></td>
							<td align="right">Copyright &copy 2017 easylife.com. All rights reserved. 2017 </td>
						</tr>
					</table>
				</td>
			</tr>
		
		</table>
	</body>

</html>


<html>
	<head>
		<title>Admin Home</title>
	</head>
	<body>
		<table width="100%" >
			<tr>
				<td align="center" colspan="3">
					<table  width="100%" bgcolor="Gainsboro " >
						<tr>
							<td><a href="home.php"><img src="resources/e.jpg" height="60" width="120" /></a></td>
							<td >
								<table  width="100%">
									<tr>
										<td align="center">(3)reports<a href="admin/treports.php" target="contentFrame"><img src="resources/report.png" height="30" width="30"/></a></td>
										<td align="right">
											<table >
												<tr rowspan="2">
													<td><img src="resources/m.jpg" height="30" width="30"/></td>
													<td><a href="Registration.php">Registartion</a></td>
												</tr>
												<tr>
													<td><a href="home.php">Log Out</a></td>
													<td><a href="logIn.php">Log In</a></td>
												</tr>
												
											</table>
										</td>
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
								<table bgcolor="SkyBlue" height="500" width="100%" valign="top">
									<tr height="10" >
										<td align="center">
											<a href="admin/dashboard_order.php" target="contentFrame">Dashboard</a>
										</td>
									</tr>
									<tr height="10" >
										<td align="center">
											<a href="admin/Editprofile.php" target="contentFrame" >Edit profile</a>
										</td>
									</tr>
									<tr height="10" >
										<td align="center">
											<a href="admin/uedetails.php" target="contentFrame" >View profile</a>
										</td>
									</tr>
									<tr height="10" >
										<td align="center">
											<a href="admin/changepass.php" target="contentFrame" >Change password</a>
										</td>
									</tr>
									<tr height="10" >
										<td align="center">
											<a href="admin/tpdetails.php" target="contentFrame" >View Product</a>
										</td>
									</tr>
									<tr height="10" >
										<td align="center">
											<a href="admin/tinvoice.php" target="contentFrame" >View Invoices</a>
										</td>
									</tr>
									<tr height="10" >
										<td align="center">
											<a href="admin/orderdetails.php" target="contentFrame" >View Orders</a>
										</td>
									</tr>
								</table>
								
							</td>
							<td align="center" width="80%" valign="top">
								<table  width="100%">
							
									<tr>
										<td width="800" valign="top">
											<iframe name="contentFrame" frameborder="0" width="100%" height="790" src="admin/dashboard_order.php"></iframe>
										</td>
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
								<a href="personalInfo.php">Personal Info</a></br>
								
								
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
