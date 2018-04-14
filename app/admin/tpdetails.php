<?php 
 	$admin="admin";
 	require_once "../../service/product_serviec.php"; 
?>
<?php

	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		if($_REQUEST['search']=="name")
		{
			$products=getProductsByName($_REQUEST['name']);
		}
		if($_REQUEST['search']=="pcode")
		{
			$product=getProductByCode($_REQUEST['name']);
			$products=array($product);
		}
		
	}
	else
		{
			$products=getAllProducts();
		}
?>
<html>
	<form method="post">
	<table >
			<tr >
				<td width="40%">
					<p>Search by:<p>
					<select name="search">
						<option value="name">Name</option>
						<option value="pcode">Product Code</option>
					</select>
					
				</td>
				<td>
					<input type="text" name="name"/><input type="submit" value="Search Product"/>
				</td>
			</tr>
		</table>
</form>	
		<br>
		<br>
	<fieldset >
							<legend><h3>Products</h3></legend>
								<table border=1 width=100%>
									<tr>
										<th>Product Code</th>
										<th>Product Name</th>
										<th>Total Sells</th>
										<th>Price</th>
										<th>Last Purchase</th>
										<th>Remaining Quantity</th>
									</tr>
							<?php
		
									foreach($products as $product)
									
									
							echo	"<tr>
										<td>".$product['Product _Code']."</td>
										<td>".$product['Name']."</td>
										<td>".$product['Total_Sells']."</td>
										<td>".$product['Price']."</td>
										<td>".$product['Last_Sold']."</td>
										<td>".$product['Quantity']."</td>
										<td><a href=\"pdetails.php?ProductCode=".$product['Product _Code']."\">View</td>
										<td><a href=\"pedit.php?productCode=".$product['Product _Code']."\">edit</td>
										<td><a href=\"deleteproduct.php?productCode=".$product['Product _Code']."\">delete</td>
									</tr>";
							?>
									
								</table>
					</fieldset>
	
	<br>
</html>
