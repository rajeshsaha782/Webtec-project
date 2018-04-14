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
	$name=$price=$size=$Quantity=$Product_Feature=$brand=$catagory="";
	$nameErr=$sizeErr=$brandErr=$CategoryErr=$QuantityErr=$priceErr="";
?>
<?php
	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		$name=$_POST['name'];
		$price=$_POST['price'];
		//$size=$_POST['size'];
		$Quantity=$_POST['Quantity'];
		$Product_Feature=$_POST['Product_Feature'];
		//$brand=$_POST['brand'];
		//$catagory=$_POST['catagory'];
		
		$isValid=true;
		
		if(empty($name)){
            $isValid = false;
            $nameErr = "*";
        }
		// else if(!(isUniqueProductName($name)))
		// {
			// $isValid = false;
            // $nameErr = "Product Already Exist";
		// }
		
		// if(empty($size)){
            // $isValid = false;
            // $sizeErr = "*";
        // }
		
		// if(empty($brand)){
            // $isValid = false;
            // $brandErr = "*";
        // }
		
		// if(empty($catagory)){
            // $isValid = false;
            // $CategoryErr= "*";
        // }
		
		if(empty($Quantity)){
            $isValid = false;
            $QuantityErr = "*";
        }
		// else if(isValidPersonNum($Quantity)==false)
		// {
			// $isValid = false;
            // $QuantityErr = "Invalid Quantity";
		// }
		
		if(empty($price)){
            $isValid = false;
            $priceErr = "*";
        }
		
		// else if(isValidPersonNum($price)==false)
		// {
			// $isValid = false;
            // $priceErr = "Invalid price";
		// }
		
		if($isValid==true)
		{
			$product['Product_Code']=$product['Product _Code'];
			$product['Name']=$name;
			$product['Quantity']=(int)$Quantity;
			$product['Price']=(int)$price;
			$product['Description']=$Product_Feature;
			//var_dump($product);
			if(editProduct($product)==true){
                echo "<script>
                        document.location='successproduct.php?ProductCode=".$product['Product _Code']."';
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
											<td><label><?=$product['Name']?></label></td>
										</tr>
									</table>
									<hr>
									<table>
										<tr>
											<td width="125">Price</td>
											<td><input name="price" type="text" value="<?=$product['Price']?>"> Tk</td>
										</tr>
									</table>
									<hr>
									<table>
										<tr>
											<td width="125">Quantity</td>
											<td><input name="Quantity" type="text" value="<?=$product['Quantity']?>"></td>
										</tr>
									</table>
									<hr>
									<table>
										<tr>
											<td width="125">Product Feature</td>
											<td><input name="Product_Feature" size="50" type="text" value="<?=$product['Description']?>"></td>
										</tr>
									</table>
									
									<hr>
										<a href="p_success.php?a=uedit"><button>Submit</button></a>
			<!--						<input type="Submit" name="Submit" value="Submit">
								</td>
							</tr>
							</table>
								</td>
								<td>
								<table>
									<tr><td><img align="top" src="../resources/<?=$product['Name']?>.jpg" width="167"/></td></tr>
									<tr><td><a href="product_pic_change.php?productCode=<?=$productCode?>">Change picture</a></td></tr>
								</table>
								</td>
								</tr>
			</table>
	</fieldset>
	<br>
	
</form>
</html>