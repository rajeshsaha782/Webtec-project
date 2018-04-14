<?php require_once "data_access.php"; ?>
<?php
	function addOrderToDB($order)
	{
        $sql = "INSERT INTO order_product (Order_Code, Product_Code, Quantity, Invoice_Code) VALUES ('$order[Order_Code]','$order[Product_Code]','$order[Quantity]','$order[Invoice_Code]')";
        $result = executeSQL($sql);
        return $result;
    }
	
	function editOrderToDB($order)
	{
        $sql = "UPDATE order_product SET Product_Code='$order[Product_Code]',Quantity='$order[Quantity]',Invoice_Code='$order[Invoice_Code]' WHERE Order_Code='$order[Order_Code]'";
        $result = executeSQL($sql);
        return $result;
    }
	
	function deleteOrderFromDB($order)
	{
        $sql = "DELETE FROM order_product WHERE Order_Code='$order[Order_Code]'";
        $result = executeSQL($sql);
        return $result;
    }
	
	function getAllOrdersFromDB()
	{
        $sql = "SELECT * FROM order_product";        
        $result = executeSQL($sql);
        
        $orders = array();
        for($i=0; $row=mysqli_fetch_assoc($result); ++$i){
            $orders[$i] = $row;
        }
        
        return $orders;
    }
	
	function getOrderByCodeFromDB($Order_Code)
	{
        $sql = "SELECT * FROM order_product WHERE Order_Code=$Order_Code";        
        $result = executeSQL($sql);
        
        $order = mysqli_fetch_assoc($result);
        
        return $order;
    }
	
	function getOrderByProductFromDB($Product_Code)
	{
        $sql = "SELECT * FROM order_product WHERE `Product_Code`='$Product_Code'";        
        $result = executeSQL($sql);
        
        $order = mysqli_fetch_assoc($result);
        
        return $order;
    }

	
	function getOrdersByInvoiceFromDB($Invoice_Code)
	{
        $sql = "SELECT * FROM order_product WHERE Invoice_Code=$Invoice_Code";        
        $result = executeSQL($sql);
        
        $orders = array();
        for($i=0; $row=mysqli_fetch_assoc($result); ++$i){
            $orders[$i] = $row;
        }
        
        return $orders;
    }