<?php
	if(isset($_COOKIE['user_qty']))
	{
		$noOfCookie=count($_COOKIE['user_qty']);
		$id=$_GET['id'];
		$i=$id;
		while($i<$noOfCookie)
		{
			setcookie("easylife_cart[$i]",$_COOKIE['easylife_cart'][$i+1],time() + 86400,"/");
			setcookie("user_qty[$i]",$_COOKIE['user_qty'][$i+1],time() + 86400,"/");
			$i++;
		}
			
			setcookie("easylife_cart[$noOfCookie]","",time() - 86400,"/");
			setcookie("user_qty[$noOfCookie]","",time() - 86400,"/");
	}
	
		echo "<script>				
		document.location='shoppingCart.php';
	 </script>";

	
?>