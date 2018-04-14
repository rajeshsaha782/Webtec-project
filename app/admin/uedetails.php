<?php
	$memberID=$_GET['memberID'];
?>
<html>
	<iframe frameborder="0" width="100%" height="430" src="uview.php?memberID=<?=$memberID?>"></iframe>
	<a href="Editprofile.php?memberID=<?=$memberID?>"><button>Edit</button></a>
</html>