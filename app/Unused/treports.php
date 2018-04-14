<?php 
	$admin="admin";
	require_once "../../service/report_serviec.php"; 
	require_once "../../service/member_service.php"; 
?>
<?php
	$reports=getAllReports();
	$cy=(int)date("Y");
	$cm=(int)date("m");
	$cd=(int)date("d");

?>

<html>
	<table >
		<tr >
			<td width="40%">
				<p>Search by:<p><select>
					<option>ID</option>
					<option>Title</option>
					<option>User ID</option>
					<option>Status</option>
				</select>
				
			</td>
			<td>
				<input type="text"/><input type="submit" value="Search Report"/>
			</td>
		</tr>
	</table>
	<br>
	<br>
	<fieldset>
		<legend>All Reports</legend>
		
	
			<table border=1 width=100%>
				<tr>
					<th>Report ID</th>
					<th>Report Title</th>
					<th>Reported By</th>
					<th>Report Time</th>
					<th>Status</th>
				</tr>

				<?php
					foreach ($reports as $report)
					{	
						$code=$report['Report_Code'];
						$title=$report['Report_Title'];
						$status=$report['Status'];
						$des=$report['Description'];
						$s="";
						$member=getMemberById($report['Member_ID']);
						if($status=="0")
						{
							$s="Not Seen";
						}
						else
						{
							$s="Seen";
						}
						
						$y=(int)explode("-",explode(" ",$report['Date'])[0])[0];
						$m=(int)explode("-",explode(" ",$report['Date'])[0])[1];
						$d=(int)explode("-",explode(" ",$report['Date'])[0])[2];
						
						if($cy==$y)
						{
							if($cm==$m)
							{
								if(($cd==$d)||($cd<$d))
								{
									$log="Today";
								}
								else
								{
									$log=($cd-$d)." day(s) ago";
								}
							}
							else
							{
								$log=($cm-$m)." month(s) ago";
							}
						}
						else
						{
							$log=($cy-$y)." year(s) ago";
						}
					
		echo		"<tr>
					<td>".$code."</td>
					<td>".$title."</td>
					<td><a href=\"uview.php?memberID=".$report['Member_ID']."\">".$member['Name']."</a></td>
					<td>".$log."</td>
					<td>".$s."</td>
					<td><a href=\"reportview.php?reportCode=".$code."\">view</a></td>
					<td><a href=\"deletereport.php?reportCode=".$code."\">delete</a></td>
				</tr>";
					}
				?>
				
				
			</table>
	</fieldset>
	<br>
</html>
