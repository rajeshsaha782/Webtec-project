<?php require_once "data_access.php"; ?>
<?php
	function addReportToDB($report)
	{
        $sql = "INSERT INTO report (Report_Code, Report_Title,  Member_ID, Description) VALUES ('$report[Report_Code]','$report[Report_Title]','$report[Member_ID]','$report[Description]')";
        $result = executeSQL($sql);
        return $result;
    }
	
	function editReportToDB($report)
	{
        $sql = "UPDATE report SET Report_Title='$report[Report_Title]',Member_ID='$report[Member_ID]',Date='$report[Date]',Status='$report[Status]',Description='$report[Description]' WHERE Report_Code='$report[Report_Code]'";
        $result = executeSQL($sql);
        return $result;
    }
	
	function deleteReportFromDB($report)
	{
        $sql = "DELETE FROM report WHERE Report_Code='$report[Report_Code]'";
        $result = executeSQL($sql);
        return $result;
    }
	
	function getAllReportsFromDB()
	{
        $sql = "SELECT * FROM report";        
        $result = executeSQL($sql);
        
        $reports = array();
        for($i=0; $row=mysqli_fetch_assoc($result); ++$i){
            $reports[$i] = $row;
        }
        
        return $reports;
    }
	
	function getReportByCodeFromDB($Report_Code)
	{
        $sql = "SELECT * FROM report WHERE Report_Code=$Report_Code";        
        $result = executeSQL($sql);
        
        $report = mysqli_fetch_assoc($result);
        
        return $report;
    }
	
	function getReportsByTitleFromDB($Report_Title)
	{
        $sql = "SELECT * FROM report WHERE Report_Title=$Report_Title";
        $result = executeSQL($sql);
        
        $reports = array();
        for($i=0; $row = mysqli_fetch_assoc($result); ++$i){
            $reports[$i] = $row;
        }
        
        return $reports;
    }
	
	function getReportsByMemberFromDB($Member_ID)
	{
        $sql = "SELECT * FROM report WHERE Member_ID=$Member_ID";
        $result = executeSQL($sql);
        
        $reports = array();
        for($i=0; $row = mysqli_fetch_assoc($result); ++$i){
            $reports[$i] = $row;
        }
        
        return $reports;
    }
	
	function getReportsByStatusFromDB($Status)
	{
        $sql = "SELECT * FROM report WHERE Status=$Status";
        $result = executeSQL($sql);
        
        $reports = array();
        for($i=0; $row = mysqli_fetch_assoc($result); ++$i){
            $reports[$i] = $row;
        }
        
        return $reports;
    }
	
	function getReportsByDateFromDB($Date)
	{
        $sql = "SELECT * FROM report WHERE Date=$Date";
        $result = executeSQL($sql);
        
        $reports = array();
        for($i=0; $row = mysqli_fetch_assoc($result); ++$i){
            $reports[$i] = $row;
        }
        
        return $reports;
    }
	function getLastReportCodeFromDB()
	{
        $sql = "SELECT MAX(Report_Code) FROM report";        
        $result = executeSQL($sql);
        
        $report = mysqli_fetch_assoc($result);
        
        return $report;
    }
?>
	
	