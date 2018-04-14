<?php require_once "../../service/validation_service.php"; ?>
<?php require_once "../../data/member_data_access.php"; ?>
<?php
	$memberID=$_GET['memberID'];
	$member=getMemberByIDFromDB($memberID);
?>
<?php
	$cpass=$npass=$rpass="";
	$cpassErr=$npassErr=$rpassErr="";
	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		$cpass=$_POST['cpass'];
		$npass=$_POST['npass'];
		$rpass=$_POST['rpass'];
		
		
		$isValid = true;
       
		if(empty($cpass)){
            $isValid = false;
            $cpassErr = "*";
        }
		
		else if($cpass!=$member['Password']){
            $isValid = false;
            $cpassErr = "Wrong Password";
        }
		
		if(empty($npass)){
            $isValid = false;
            $npassErr = "*";
        }
		
		else if(isValidPassword($npass)==false){
            $isValid = false;
            $npassErr = "Minimum length 2";
        }
		
		if(empty($rpass)){
            $isValid = false;
            $rpassErr = "*";
        }
		
		else if($npass!=$rpass)
		{
			$isValid = false;
            $rpassErr = "Doesn't Match";
		}
		
		if($isValid==true){
			$member1['Member_ID']=$member['Member_ID'];
			$member1['Password']=$npass;
			$member1['Name']=$member['Name'];
			$member1['Email']=$member['Email'];
			$member1['Type']=$member['Type'];
			$member1['Status']=$member['Status'];
			
			if(editMemberToDB($member1)==true){
                echo "<script>
                        document.location='successonly.php';
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
    <legend><b>CHANGE PASSWORD</b></legend>
    <br/>
        <table width="100%">
            <tr>
                <td width="150"></td>
                <td width="10"></td>
                <td width="150"></td>
                <td></td>
            </tr>
            <tr>
                <td><font size="3">Current Password</font></td>
				<td>:</td>
                <td><input name="cpass" type="password" /></td>
                <td><font color="red"><?=$cpassErr?></font></td>
            </tr>
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td><font size="3">New Password</font></td>
				<td>:</td>
                <td><input name="npass" type="password" /></td>
                <td><font color="red"><?=$npassErr?></font></td>
            </tr>
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td><font size="3">Retype New Password</font></td>
				<td>:</td>
                <td><input name="rpass" type="password" /></td>
                <td><font color="red"><?=$rpassErr?></font></td>
            </tr>
        </table>
        <hr />
		<input type="submit" value="Submit"/>
  <!--      <a href="successonly.php?a=uedit"><button>Submit</button></a>--> 

</fieldset>
</form>