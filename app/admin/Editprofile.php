<?php require_once "../../service/validation_service.php"; ?>
<?php require_once "../../data/member_data_access.php"; ?>
<?php
	$memberID=$_GET['memberID'];
	$member=getMemberByIDFromDB($memberID);
?>
<?php
	$name=$email="";
	$nameErr=$emailErr="";
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
		$block="Active";
		if(isset($_POST['block']))
		{
			$block="Blocked";
		}
		
		if($isValid==true){
			$member1['Member_ID']=$member['Member_ID'];
			$member1['Password']=$member['Password'];
			$member1['Name']=$name;
			$member1['Email']=$email;
			$member1['Type']=$member['Type'];
			$member1['Status']=$block;
			
			if(editMemberToDB($member1)==true){
                echo "<script>
                        document.location='a_success.php?memberID=".$member1['Member_ID']."';
                     </script>";
                die();
            }
            else{
                echo "Internal Error<hr/>";
            }
		}
	}
?>


<html>
<form method="post">
	<fieldset >
		<legend><h3>Edit Profile</h3></legend>
			<table>
				<tr>
					<td>
						<table>
							<tr>
								<td>
									<table>
										<tr>
											<td width="125">Name</td>
											<td><input name="name" type="text" value="<?=$member['Name']?>"></td>
											<td><font color="red"><?=$nameErr?></font></td>
										</tr>
									</table>
									<hr>
									<table>
										<tr>
											<td width="125">Email</td>
											<td><input name="email" type="text" value="<?=$member['Email']?>"></td>
											<td><font color="red"><?=$emailErr?></font></td>
										</tr>
									</table>
									<hr>
									<table>
										<tr>
											
											<td><input name="block" type="checkbox" <?php if($member['Status']=="Blocked")echo "checked";?>> Blocked</td>
											
										</tr>
									</table>
									
									<hr>
										<input type="submit" value="Submit"/>
			<!--						<input type="Submit" name="Submit" value="Submit">-->
								</td>
							</tr>
							</table>
								</td>
								
								</td>
								</tr>
			</table>
	</fieldset>
</form>
</html>