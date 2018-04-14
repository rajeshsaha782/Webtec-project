<?php require_once "../service/validation_service.php"; ?>
<?php require_once "../service/order_product-serviec.php"; ?>
<?php require_once "../service/invoice_serviece.php"; ?>

<?php
	$icode=$_GET['del'];
	$invoice=getInvoiceByCodeFromDB($icode);
	$orders=getOrdersByInvoice($icode);
	foreach($orders as $order)
	{
		deleteOrder($order);
	}
	deleteInvoice($invoice);
	echo "<script>				
			document.location='../index.php';
		 </script>";
	

	
?>