<?php require_once "../../service/validation_service.php"; ?>
<?php 
 	$admin="admin";
 	require_once "../../service/member_service.php"; 
?>
<?php
	$name=$email=$password=$cpassword=$gender=$dob="";
	$nameErr=$emailErr=$passErr=$cpassErr=$typeErr=$gErr="";
?>

<?php
    if($_SERVER['REQUEST_METHOD']=="POST")
	{
		$name=trim($_POST['name']);
        $email=trim($_POST['email']);
		$password=$_POST['password'];
		$cpassword=$_POST['cpassword'];
		
		$isValid = true;
        if(empty($email)){
            $isValid = false;
            $emailErr = "*";
        }
        else if(isValidEmail($email)==false){
            $isValid = false;
            $emailErr = "Invalid email format";
        }
		
		else if(!(isUniqueMemberEmail($email)))
 		{
 			$isValid = false;
             $emailErr = "Email already in use";
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
		
		if (isset($_POST['Blocked']))
		{
			$Status="Blocked";
		}
		else
		{
			$Status="Active";
		}
		
		if (!(isset($_POST['gender'])))
		{
			$gErr="Must select one";
		}
		
		if (isset($_POST['Type']))
		{
			$Type=$_POST['Type'];
		}
		else
		{
			$isValid = false;
			$typeErr = "Must select one";
		}
		
		if($isValid==true){
			
			$members=getAllMembers();
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
			$member['Type']=$Type;
			$member['Status']=$Status;
			var_dump($member);
			if(addMemberToDB($member)==true){
                echo "<script>
                        document.location='a_success.php?memberID=".$member['Member_ID']."';
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
	<fieldset>
		<legend><b>Add Member</b></legend>
			<br/>
			<table>
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
				<tr>
					<td>Type</td>
					<td>:</td>
					<td>   
						<input name="Type" type="radio" value="1">Admin
						<input name="Type" type="radio" value="2">Stock Executive
						<br/><input name="Type" type="radio" value="3">Order Executive
						<input name="Type" type="radio" value="4">User
					</td>
					<td><font color="red"><?=$typeErr?></font></td>
				</tr>	
				<tr><td colspan="4"><hr/></td></tr>
				<tr>
					<td><input name="Blocked" type="checkbox"> Blocked</td>
		
					<td></td>
				</tr>
			</table>
			</td>
			<td>
			
									</td>
									</tr>
									</table>
			<hr/>
			<!--<a href="successmember.php?a=uedit"><button>Add</button></a> -->
			<input type="submit" value="Add"/>
			<input type="reset">
	</fieldset>
</form>

