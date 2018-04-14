<?php require_once "../../data/product_data_access.php"; ?>
<?php
	$Product_Code=$_GET['ProductCode'];
	
	$product=getProductByCodeFromDB($Product_Code);
	
?>
<html>
<table border="1" width="100%">
									<tr>
										<td align="center" colspan="2"><img src="../resources/<?=$product['Name']?>.jpg" height="400"/></td>
										<td>
										<h2><?=$product['Name']?></h2>
										<h3>Product Code: <?=$product['Product _Code']?></h3>
										<h3>Tk <?=$product['Price']?></h3>
										<h3>Quantity: <?=$product['Quantity']?></h3>
										</td>
									</tr>
					
											<tr>
												<td colspan="3"> <h3>Product Feature</h3></td>
											</tr>
											<tr>
												
												<td width="500" colspan="3"><p align="justify"><?=$product['Description']?></td>
											</tr>
										</table>
</html>