<?php require_once "data_access.php"; ?>
<?php
	function addProductToDB($product)
	{
       // var_dump($product);
	   // INSERT INTO `product`(`Product _Code`, `Name`, `Quantity`, `Price`, `Catagory`, `Brand`, `Size`, `Description`) VALUES (5,"Shirt",100,123,"Winter Collection","Easy","L","Normal Tshirt")
		$sql = "INSERT INTO `product` (`Product _Code`, `Name`, `Quantity`, `Price`, `Catagory`, `Brand`, `Size`, `Description`) VALUES ('$product[Product_Code]', '$product[Name]', '$product[Quantity]', '$product[Price]','$product[Catagory]', '$product[Brand]', '$product[Size]', '$product[Description]')";
        $result = executeSQL($sql);
        return $result;
    }
	
	function editProductToDb($product){
        $sql = "UPDATE product SET Last_Sold='$product[Last_Sold]',Name='$product[Name]',Quantity='$product[Quantity]',Total_Sells='$product[Total_Sells]',Price='$product[Price]',Catagory='$product[Catagory]',Brand='$product[Brand]',Size='$product[Size]',Description='$product[Description]' WHERE `Product _Code`='$product[Product_Code]'";
        $result = executeSQL($sql);
        return $result;
    }
	
	function deleteProductFromDB($product)
	{
		$p=$product['Product _Code'];
		$sql = "DELETE FROM product WHERE `Product _Code`='$p'";        
        $result = executeSQL($sql);
        return $result;
	}
	
	function getAllProductsFromDB(){
        $sql = "SELECT * FROM product";        
        $result = executeSQL($sql);
        
        $products = array();
        for($i=0; $row=mysqli_fetch_assoc($result); ++$i){
            $products[$i] = $row;
        }
        
        return $products;
    }
	
	function getAllProductsQuantityDescFromDB(){
        $sql = "SELECT * FROM product order by Quantity DESC";        
        $result = executeSQL($sql);
        
        $products = array();
        for($i=0; $row=mysqli_fetch_assoc($result); ++$i){
            $products[$i] = $row;
        }
        
        return $products;
    }
	
	function getLastProductCodeFromDB()
	{
        $sql = "SELECT MAX(`Product _Code`) FROM `product`";        
        $result = executeSQL($sql);
        //var_dump($result);
        $product = mysqli_fetch_assoc($result);
        var_dump($product);
        return $product;
    }
	
	function getProductByCodeFromDB($Product_code){
        $sql = "SELECT * FROM product WHERE `Product _Code`='$Product_code'";        
        $result = executeSQL($sql);
        
        $product = mysqli_fetch_assoc($result);
        
        return $product;
    }
	
	function getProductCodeByNameFromDB($Product){
        $sql = "SELECT `Product _Code` as `p` FROM product WHERE `Name`='$Product'";        
        $result = executeSQL($sql);
        
        $product = mysqli_fetch_assoc($result);
        
        return $product;
    }
	
	function getProductsByNameFromDB($Name){
        $sql = "SELECT * FROM product WHERE Name LIKE '%$Name%'";
        $result = executeSQL($sql);
        
        $products = array();
        for($i=0; $row = mysqli_fetch_assoc($result); ++$i){
            $products[$i] = $row;
        }
        
        return $products;
    }
	function getProductsByFullNameFromDB($Name){
        $sql = "SELECT * FROM product WHERE Name='$Name'";
        $result = executeSQL($sql);
        
        // $products = array();
        // for($i=0; $row = mysqli_fetch_assoc($result); ++$i){
            // $products[$i] = $row;
        // }
        
        return mysqli_fetch_assoc($result);
    }
	
	function getProductsByPriceFromDB($Price){
        $sql = "SELECT * FROM product WHERE Price='$Price'";
        $result = executeSQL($sql);
        
        $products = array();
        for($i=0; $row = mysqli_fetch_assoc($result); ++$i){
            $products[$i] = $row;
        }
        
        return $products;
    }
	
	function getProductsByCatagoryFromDB($Catagory){
        $sql = "SELECT * FROM product WHERE Catagory='$Catagory'";
        $result = executeSQL($sql);
        
        $products = array();
        for($i=0; $row = mysqli_fetch_assoc($result); $i++){
            $products[$i] = $row;
        }
        
        return $products;
    }
	
	function getProductsByBrandFromDB($Brand){
        $sql = "SELECT * FROM product WHERE Brand='$Brand'";
        $result = executeSQL($sql);
        
        $products = array();
        for($i=0; $row = mysqli_fetch_assoc($result); $i++){
            $products[$i] = $row;
        }
        
        return $products;
    }
?>