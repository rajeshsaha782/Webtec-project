<?php 
 	if(empty($admin))
 	{
 		require_once "../data/report_data_access.php";
 	}
 	else
 	{
 		require_once "../../data/report_data_access.php";
 	}
?>
<?php
    
    function addReport($report){
        return addReportToDB($report);
    }
    
    function deleteReport($report){
        return deleteReportFromDB($report);
    }
	
	function editReport($report){
		return editReportToDB($report);
	}
    
    function getAllReports(){
        return getAllReportsFromDB();
    }
    
    function getReportByCode($Report_Code){
        return getReportByCodeFromDB($Report_Code);
    }
    
    function getReportByTitle($Report_Title){
        return getReportByTitleFromDB($Report_Title);
    }
    
    function getReportsByMember($Member_ID){
        return getReportsByMemberFromDB($Member_ID);
    }
	 function getReportsByStatus($Status){
        return getReportsByStatusFromDB($Status);
    }
	 function getReportsByDate($Date){
        return getReportsByDateFromDB($Date);
    }
  

?>