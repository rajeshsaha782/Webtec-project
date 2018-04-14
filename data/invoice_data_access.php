<?php require_once "data_access.php"; ?>
<?php
	function addInvoiceToDB($invoice)
	{
        $sql = "INSERT INTO invoice (Invoice_Code, Member_ID, Phone, Payment_Method, Shipping_Address, Billing_Address) VALUES ('$invoice[Invoice_Code]','$invoice[Member_ID]','$invoice[Phone]','$invoice[Payment_Method]','$invoice[Shipping_Address]','$invoice[Billing_Address]')";
        $result = executeSQL($sql);
        return $result;
    }
	
	function editInvoiceToDB($invoice)
	{
        $sql = "UPDATE invoice SET Member_ID='$invoice[Member_ID]',Date='$invoice[Date]',Status='$invoice[Status]',Payment_Status='$invoice[Payment_Status]',Payment_Method='$invoice[Payment_Method]',Shipping_Address='$invoice[Shipping_Address]',Billing_Address='$invoice[Billing_Address]' WHERE Invoice_Code='$invoice[Invoice_Code]'";
        $result = executeSQL($sql);
        return $result;
    }
	
	function deleteInvoiceFromDB($invoice)
	{
        $sql = "DELETE FROM invoice WHERE Invoice_Code='$invoice[Invoice_Code]'";
        $result = executeSQL($sql);
        return $result;
    }
	function deleteInvoiceByCodeFromDB($invoice_code)
	{
        $sql = "DELETE FROM invoice WHERE Invoice_Code='$invoice_code";
        $result = executeSQL($sql);
        return $result;
    }
	
	function getAllInvoicesFromDB()
	{
        $sql = "SELECT * FROM invoice";        
        $result = executeSQL($sql);
        
        $invoices = array();
        for($i=0; $row=mysqli_fetch_assoc($result); ++$i){
            $invoices[$i] = $row;
        }
        
        return $invoices;
    }
	
	function getInvoiceByCodeFromDB($invoiceCode)
	{
        $sql = "SELECT * FROM `invoice` WHERE Invoice_Code='$invoiceCode'";        
        $result = executeSQL($sql);
		
		$invoice = mysqli_fetch_assoc($result);
		
		return $invoice;
	}
	
	function getInvoiceByMemberFromDB($Member_ID)
	{
        $sql = "SELECT * FROM invoice WHERE Member_ID='$Member_ID'";        
        $result = executeSQL($sql);
		
		$invoice = mysqli_fetch_assoc($result);
		
		return $invoice;
	}
	
	function getInvoicesByDateFromDB($Date)
	{
        $sql = "SELECT * FROM invoice WHERE Date=$Date";        
        $result = executeSQL($sql);
        
        $invoices = array();
        for($i=0; $row=mysqli_fetch_assoc($result); ++$i){
            $invoices[$i] = $row;
        }
        
        return $invoices;
    }
	
	function getInvoicesByStatusFromDB($Status)
	{
        $sql = "SELECT * FROM invoice WHERE Status='$Status'";        
        $result = executeSQL($sql);
        
        $invoices = array();
        for($i=0; $row=mysqli_fetch_assoc($result); ++$i){
            $invoices[$i] = $row;
        }
        
        return $invoices;
    }
	
	function getInvoicesByPaymentFromDB($Payment_Status)
	{
        $sql = "SELECT * FROM invoice WHERE Payment_Status='$Payment_Status'";        
        $result = executeSQL($sql);
        
        $invoices = array();
        for($i=0; $row=mysqli_fetch_assoc($result); ++$i){
            $invoices[$i] = $row;
        }
        
        return $invoices;
    }
?>
	
	