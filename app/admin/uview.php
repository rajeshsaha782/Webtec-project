<?php require_once "../../data/member_data_access.php"; ?>
<?php
	
	$Member_ID=$_GET['memberID'];
	
	$member=getMemberByIDFromDB($Member_ID);
	$Type="";
	
	$cy=(int)date("Y");
	$cm=(int)date("m");
	$cd=(int)date("d");
	$y=(int)explode("-",$member['Last_Logged_in'])[0];
	$m=(int)explode("-",$member['Last_Logged_in'])[1];
	$d=(int)explode("-",$member['Last_Logged_in'])[2];
	
	if($cy==$y)
	{
		if($cm==$m)
		{
			if(($cd==$d)||($cd<$d))
			{
				$log="Today";
			}
			else
			{
				$log=($cd-$d)." day(s) ago";
			}
		}
		else
		{
			$log=($cm-$m)." month(s) ago";
		}
	}
	else
	{
		$log=($cy-$y)." year(s) ago";
	}
	
	
	
	
	if($member['Type']=="1")
	{
		$Type="Admin";
	}
	else if($member['Type']=="2")
	{
		$Type="Stock Executive";
	}
	else if($member['Type']=="3")
	{
		$Type="Order Executive";
	}
	else if($member['Type']=="4")
	{
		$Type="User";
	}
	
	
	
?>

<html>
	<fieldset >
							<legend><h3>Profile</h3></legend>
							<table>
								<tr>
								<td>
								<table>
								<tr>
									<td>
										<table>
											<tr>
												<td width="125">Name</td>
												<td><?=$member['Name']?></td>
											</tr>
										</table>
										<hr>
										<table>
											<tr>
												<td width="125">Email</td>
												<td><?=$member['Email']?></td>
											</tr>
										</table>
										<hr>
										<table>
											<tr>
												<td width="125">Status</td>
												<td><?=$member['Status']?></td>
											</tr>
										</table>
										<hr>
										<table>
											<tr>
												<td width="125">Type</td>
												<td><?=$Type?></td>
											</tr>
										</table>
										<hr>
										<table>
											<tr>
												<td width="125">Member Since</td>
												<td><?=explode(" ",$member['Member_Since'])[0]?></td>
											</tr>
										</table>
										<hr>
										<table>
											<tr>
												<td width="125">Last Logged in</td>
												<td><?=$log?></td>
											</tr>
										</table>
										<hr>
									</td>
								</tr>
								</table>
								</td>
								<td>
								<table>
									<tr><td><img align="bottom" src="../resources/Image1.JPG" width="167"/></td></tr>
									<tr><td></td></tr>
								</table>
								</td>
								</tr>
							</table>
							
							
							
					</fieldset>
</html>