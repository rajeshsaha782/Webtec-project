<?php
	session_start();
	$_SESSION['member_id']="";
		$_SESSION['member_name']="";
		echo "<script>	
			document.location='home.php';
			</script>";
?>