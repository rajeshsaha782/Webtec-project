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
							<td align="left"><a href="admin_home.php?memberID=<?=$memberID?>"><img src="resources/e.jpg" height="60" width="150" /></a></td>
							
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
													<td align="right" colspan="2"><font color="LightSeaGreen">Admin</font></td>
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
											<a href="admin/dashboard.php?memberID=<?=$memberID?>" target="contentFrame">Dashboard</a>
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
											<hr/><b>Registar</b><hr/>
										</td>
									</tr>
									<tr height="10" >
										<td align="center">
											<a href="admin/add_member.php" target="contentFrame" >Add Member</a>
										</td>
									</tr>
									<tr height="10" >
										<td align="center">
											<a href="admin/add_product.php" target="contentFrame" >Add Product</a>
										</td>
									</tr>
									<tr height="10" >
										<td align="left">
											<hr/><b>View</b><hr/>
										</td>
									</tr>
									<tr height="10" >
										<td align="center">
											<a href="admin/tadmindetails.php?memberID=<?=$memberID?>" target="contentFrame" >View Admins</a>
										</td>
									</tr>
									<tr height="10" >
										<td align="center">
											<a href="admin/tstockexecutive.php?memberID=<?=$memberID?>" target="contentFrame" >View Stock Executives</a>
										</td>
									</tr>
									<tr height="10" >
										<td align="center">
											<a href="admin/torderexecutive.php?memberID=<?=$memberID?>" target="contentFrame" >View Order Executives</a>
										</td>
									</tr>
									<tr height="10" >
										<td align="center">
											<a href="admin/tpdetails.php" target="contentFrame" >View Product</a>
										</td>
									</tr>
									<tr height="10" >
										<td align="center">
											<a href="admin/tudetails.php" target="contentFrame" >View Users</a>
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
											<a href="admin/stock.php" target="contentFrame" >View Stock</a>
										</td>
									</tr>
									<tr height="10" >
										<td align="left">
											<hr/><b>Slider</b><hr/>
										</td>
									</tr>
									<tr height="10" >
										<td align="center">
											<a href="admin/slider.php" target="contentFrame" >Update Slider</a>
										</td>
									</tr>
									<tr height="10" >
										<td align="center">
											<a href="admin/advertisement.php?memberID=<?=$memberID?>" target="contentFrame" >Advertisement</a>
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
											<iframe name="contentFrame" frameborder="0" width="100%" height="790" src="admin/dashboard.php?memberID=<?=$memberID?>"></iframe>
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
