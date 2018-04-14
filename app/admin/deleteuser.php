<?php require_once "../../service/validation_service.php"; ?>
<?php 
 	$admin="admin";
 	require_once "../../service/member_service.php"; 
?>
<?php
	$memberID=$_GET['memberID'];
?>
<?php
	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		if($_POST['button']=="No")
		{
            echo "<script>
                    document.location='tudetails.php';
                 </script>";
            die();
        }
		else if($_POST['button']=="Yes")
			{
               if(deleteMember($memberID)==true)
				{
					echo "<script>
							document.location='success2.php';
						 </script>";
					die();
				}
				 else
				{
					echo "Internal Error<hr/>";
				}
            }
		
       
	}
?>
<html>
<form method="post">
	<h3>Are you sure you want to delete this user?<h3>
	<iframe frameborder="0" width="100%" height="380" src="uview.php?memberID=<?=$memberID?>"></iframe>
	<input type="submit" name="button" value="Yes"/>
	<input type="submit" name="button" value="No"/>
</form>
</html>
	