<?php
	$invoiceCode=$_GET['invoiceCode'];
	
	if(isset($_COOKIE['user_qty']))
	{
		$qty=$_COOKIE['user_qty'];
	}
	foreach($qty as $id)
	{
		unset($_COOKIE['user_qty[$id]']);
		unset($_COOKIE['easylife_cart[$id]']);
		// setcookie("user_qty[$id]","",time() - 86400,"/");
		// setcookie("easylife_cart[$id]","",time() - 86400,"/");
	}
	// var_dump($_COOKIE);
	echo "<script>				
						document.location='order.php?invoiceCode=".$invoiceCode."';
					 </script>";
                die();
					
					
?>