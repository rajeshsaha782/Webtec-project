<?php require_once "../../service/validation_service.php"; ?>
<?php 
	$admin="admin";
	require_once "../../service/product_serviec.php"; 
?>
<?php
	$productCode=$_GET['productCode'];
	$product=getProductByCode($productCode);
?>
<?php
	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		if($_POST['button']=="No")
		{
            echo "<script>
                    document.location='tpdetails.php';
                 </script>";
            die();
        }
		else if($_POST['button']=="Yes")
			{
               if(deleteProduct($product)==true)
				{
					echo "<script>
							document.location='successonly.php?';
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
	<iframe frameborder="0" width="100%" height="580" src="pview.php?ProductCode=<?=$productCode?>"></iframe>
	<input type="submit" name="button" value="Yes"/>
	<input type="submit" name="button" value="No"/>
</form>
</html>
	