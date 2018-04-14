<?php 
 	if(empty($admin))
 	{
 		require_once "../data/order_product_data_access.php";
		require_once "../data/member_data_access.php";
		require_once "../data/invoice_data_access.php";
 	}
 	else
 	{
 		require_once "../../data/order_product_data_access.php";
		require_once "../../data/member_data_access.php";
		require_once "../../data/invoice_data_access.php";
		
 	}
?>
<?php
    function addOrder($order){
        return addOrderToDB($order);
    }
    
    function deleteOrder($order){
        return deleteOrderFromDB($order);
    }
    
    function getAllOrders(){
        return getAllOrdersFromDB();
    }
    
    function getOrderByCode($Order_Code){
        return getOrderByCodeFromDB($Order_Code);
   }
    
    function getOrderByProduct($Product_Code){
        return getOrderByProductFromDB($Product_Code);
    }
    
    function getOrdersByInvoice($Invoice_Code){
        return getOrdersByInvoiceFromDB($Invoice_Code);
    }
	
	function getOrdersByMemberEmail($email){
		$member=getMemberByEmailFromDB($email);
		$invoice=getInvoiceByMemberFromDB($member['Member_ID']);
		return getOrdersByInvoiceFromDB($invoice['Invoice_Code']);
		
	}
  

?>