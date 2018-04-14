<?php 
	$admin="admin";
	require_once "../../service/product_serviec.php"; 
?>
<?php
	$productCode=$_GET['productCode'];
	$product=getProductByCode($productCode);
?>
<?php
	$productName=$product['Name'];
	$product_picErr="";
?>


<?php
if($_SERVER['REQUEST_METHOD']=="POST")
{
	$uploadOk = 1;
		if($_FILES["propic"]["tmp_name"]=="" )
		{
			$isValid = false;
			$product_picErr="Image is required.";
			$uploadOk = 0;
		}
		
		if($uploadOk == 1)
		{
			$target_dir = "../resources/$productName.jpg";
			move_uploaded_file($_FILES["propic"]["tmp_name"],$target_dir);
				
                echo "<script>
                        document.location='successproduct.php?ProductCode=".$productCode."';
                     </script>";
                 die();
		}
		
		
}
?>





<html>
<form method="post" enctype="multipart/form-data">
	<fieldset >
		<legend><h3>Change Product Image</h3></legend>
			<table>	
				<tr><td><img align="top" src="../resources/<?=$productName?>.jpg" width="167"/></td></tr>
				<tr>
					<td>
						<input type="file" name="propic" accept="image/*"/><br/>
						<font color="red"><?=$product_picErr?></font>
					</td>
				</tr>
					<tr>
					<input type="submit" value="Change" name="submit"/>
					</tr>
			</table>
	</fieldset>
	<br>
	
</form>
</html>
