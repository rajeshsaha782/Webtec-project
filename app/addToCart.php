<?php

	$product=$_COOKIE['product_name'];
	$user_qty=$_GET['user_qty'];
	
	$v=true;
	// $cart=$_COOKIE['easylife_cart'];
	// $qty=$_COOKIE['user_qty'];
	
	// function check_repeat()
	// {
		// for($i=0;$i<(count($_COOKIE['easylife_cart']));$i++)
		// {
			// if($_COOKIE['easylife_cart'][$i]==$product)
			// {
				// $qty[$i]=$qty[$i]+1;
				// $v=false;
				// break;
			// }
			// else
			// {
				// $v=true;
			// }
			
		// }
		
	// }
	// check_repeat();
	if(!isset($_COOKIE['easylife_cart']))
	{
		if($v==true)
		{
		 $cookie_name = "easylife_cart[0]";
		 $cookie_value = $product;
		 setcookie($cookie_name,$cookie_value,time() + 86400,"/");
		}
		
	}
	else
	{
		if($v==true)
		{
		 $i=count($_COOKIE['easylife_cart']);
		 $cookie_name = "easylife_cart[$i]";
		 $cookie_value = $product;
		 setcookie($cookie_name,$cookie_value,time() + 86400,"/");
		}
	}
	
	
	if(!isset($_COOKIE['user_qty']))
	{
		if($v==true)
		{
		 $cookie_name = "user_qty[0]";
		 $cookie_value = $user_qty;
		 setcookie($cookie_name,$cookie_value,time() + 86400,"/");
		}
	}
	else
	{
		if($v==true)
		{
		 $i=count($_COOKIE['user_qty']);
		 $cookie_name = "user_qty[$i]";
		 $cookie_value = $user_qty;
		 setcookie($cookie_name,$cookie_value,time() + 86400,"/");
		}
	}
	
	echo "<script>				
			document.location='shoppingCart.php';
		 </script>";
?>