<?php 
	$admin="admin";
	require_once "../../service/report_serviec.php"; 
	require_once "../../service/member_service.php"; 
?>
<?php
	$reportCode=$_GET['reportCode'];
	$report=getReportByCode($reportCode);
	$member=getMemberById($report['Member_ID']);
	$report['Status']="1";
	editReport($report);
	
?>

<html>
	<table>
		<tr >
			<td width="20%">Report ID :</td>
			<td><?=$report['Report_Code']?></td>
		</tr>
		<tr>
			<td>Report Title :</td>
			<td><?=$report['Report_Title']?></td>
		</tr>
		<tr>
			<td>Reported By :</td>
			<td><a href="uview.php?memberID=<?=$report['Member_ID']?>"><?=$member['Name']?></a></td>
		</tr>
		<tr>
			<td>Report Time :</td>
			<td><?=$report['Date']?></td>
		</tr>
		<tr height="150">
			<td >
				Report Desctiption :
			</td>
			<td><?=$report['Description']?></td>
		</tr>
	</table>
	<a href="treports.php"><button>Back</button></a>
</html>
		