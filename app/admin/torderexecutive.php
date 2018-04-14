<?php require_once "../../service/validation_service.php"; ?>
<?php 
 	$admin="admin";
 	require_once "../../service/member_service.php"; 
?>
<?php
	$memberID=$_GET['memberID'];
	
	// $g="e@gmail.com";
	// var_dump(getMembersByEmail($g));
	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		if($_POST['searchby']=="0")
		{
			$member=getExecutiveByID($_POST['p'],3);
			$members=array($member);
			if(empty($member))
				$members=array();
		}
		// else if($_POST['searchby']=="1")
		// {
			// $members=getMembersByName($_POST['p']);
		// }
		else if($_POST['searchby']=="2")
		{
			$member=getExecuiveByEmail($_POST['p'],3);
			
			$members=array($member);
			if(empty($member))
				$members=array();
		}
		
	}
	else
	{
		$members=getAllExs(3);
	}
	
?>
<html>
	<table >
		<tr ><form method="post">
			<td width="40%">
				<p>Search by:<p><select name="searchby">
					<option value="0"  selected>ID</option>
			
					<option value="2">Email</option>
				</select>
				
			</td>
			<td>
				<input name="p" type="text"/><input type="submit" value="Search"/>
			</td>
			</form>
		</tr>
	</table>
	<br>
	<br>
	<fieldset>
		<legend>Order Executives</legend>
			<table border=1 width=100%>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Email</th>
					<th>Last Active</th>
				</tr>
				<?php
					
					$cy=(int)date("Y");
					$cm=(int)date("m");
					$cd=(int)date("d");
					foreach($members as $member)
					{
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
						
						echo	"<tr>
									<td>".$member['Member_ID']."</td>
									<td>".$member['Name']."</td>
									<td>".$member['Email']."</td>
									<td>".$log."</td>
									<td><a href=\"Editprofile.php?memberID=".$member['Member_ID']."\">edit</a></td>";
						if($member['Member_ID']!=$memberID)
							{
								echo	"<td><a href=\"deleteadmin.php?memberID=".$member['Member_ID']."&id=".$memberID."\">delete</a></td></tr>";
							}
					}
					?>
			</table>
	</fieldset>
	<br>
</html>
