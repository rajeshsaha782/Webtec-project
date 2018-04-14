<?php
$memberID=$_GET['memberID'];
?>
<form method="post" enctype="multipart/form-data">
<html>
	<table width="100%" >
		<tr>
			<th>
				<table>
					<tr>
						<th>
							<img align="top" src="../resources/adv/slider1.JPG" width="167"/>
						</th>
					</tr>
					<tr>
						<th>
							<input type="file" name="slider1" accept="image/*"/>
						</th>
					</tr>
				</table>
			</th>
			<th>
				<table>
					<tr>
						<th>
							<img align="top" src="../resources/adv/slider2.JPG" width="167"/>
						</th>
					</tr>
					<tr>
						<th>
							<input type="file" name="slider2" accept="image/*"/>
						</th>
					</tr>
				</table>
			</th>
			<th>
				<table>
					<tr>
						<th>
							<img align="top" src="../resources/adv/slider3.JPG" width="167"/>
						</th>
					</tr>
					<tr>
						<th>
							<input type="file" name="slider3" accept="image/*"/>
						</th>
					</tr>
				</table>
			</th>
		</tr>
		<tr height="100">
			<th colspan="3"><input type="submit" value="Update Slider"/></th>
		</tr>
	</table>
</html>
</form>
<?php
if($_SERVER['REQUEST_METHOD']=="POST")
{
	
	if($_FILES["slider1"]["tmp_name"]!="")
	{
		$target_dir = "../resources/adv/slider1.jpg";
		move_uploaded_file($_FILES["slider1"]["tmp_name"],$target_dir);
	}

	if($_FILES["slider2"]["tmp_name"]!="")
	{
		$target_dir = "../resources/adv/slider2.jpg";
		move_uploaded_file($_FILES["slider2"]["tmp_name"],$target_dir);
	}
				
            
	if($_FILES["slider3"]["tmp_name"]!="")
	{
		$target_dir = "../resources/adv/slider3.jpg";
		move_uploaded_file($_FILES["slider3"]["tmp_name"],$target_dir);
	}		
					
	 echo "Successfull.It will take time to change the Images";

}
?>
