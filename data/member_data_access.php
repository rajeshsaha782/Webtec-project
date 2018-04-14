<?php require_once "data_access.php"; ?>
<?php
	function addMemberToDB($member)
	{
        $sql = "INSERT INTO member(Member_ID, Password, Name, Email, Type, Status) VALUES ('$member[Member_ID]', '$member[Password]', '$member[Name]', '$member[Email]', '$member[Type]', '$member[Status]')";
        $result = executeSQL($sql);
        return $result;
    }

	function editMemberToDB($member)
	{
        $sql = "UPDATE member SET Password='$member[Password]',Name='$member[Name]',Email='$member[Email]',Type='$member[Type]',Status='$member[Status]' WHERE Member_ID='$member[Member_ID]'";
        $result = executeSQL($sql);
        return $result;
    }
	
	function changeMemberPasswordToDB($pass,$id)
	{
        $sql = "UPDATE member SET Password='$pass' WHERE Member_ID='$id'";
        $result = executeSQL($sql);
        return $result;
    }
	
	function updateLastActiveToDB($id)
	{
		
		$sql = "UPDATE member SET Last_Logged_in=CURRENT_TIMESTAMP WHERE Member_ID='$id'";
       
        $result = executeSQL($sql);
        return $result;
    }
	
	function updataTotalPurchaseToDB($id,$purchase)
	{
		$purchase=getMemberByIDFromDB($id)['Total_Purchase']+$purchase;
         $sql = "UPDATE member SET Total_Purchase='$purchase' WHERE Member_ID='$id'";
        $result = executeSQL($sql);
        return $result;
    }
	
	function deleteMemberFromDB($memberID)
	{
        $sql = "DELETE FROM member WHERE Member_ID='$memberID'";
        $result = executeSQL($sql);
        return $result;
    }
	
	function getAllMembersFromDB()
	{
        $sql = "SELECT * FROM member";        
        $result = executeSQL($sql);
        
        $members = array();
        for($i=0; $row=mysqli_fetch_assoc($result); ++$i){
            $members[$i] = $row;
        }
       // var_dump($members);
        return $members;
    }
	
	function getAllAdminsFromDB()
	{
        $sql = "SELECT * FROM member WHERE Type=1";        
        $result = executeSQL($sql);
        
        $members = array();
        for($i=0; $row=mysqli_fetch_assoc($result); ++$i){
            $members[$i] = $row;
        }
       // var_dump($members);
        return $members;
    }
	
	function getAllExsFromDB($t)
	{
        $sql = "SELECT * FROM member WHERE Type=".$t."";        
        $result = executeSQL($sql);
        
        $members = array();
        for($i=0; $row=mysqli_fetch_assoc($result); ++$i){
            $members[$i] = $row;
        }
       // var_dump($members);
        return $members;
    }
	
	function getAllAdminsByAciveDSCFromDB()
	{
		$sql = "SELECT * FROM member WHERE Type=1 ORDER BY `Last_Logged_in` DESC";        
        $result = executeSQL($sql);
        
        $members = array();
        for($i=0; $row=mysqli_fetch_assoc($result); ++$i){
            $members[$i] = $row;
        }
       // var_dump($members);
        return $members;
	}
	
	function getAllUsersByAciveDSCFromDB()
	{
		$sql = "SELECT * FROM member WHERE Type=4 ORDER BY `Last_Logged_in` DESC";        
        $result = executeSQL($sql);
        
        $members = array();
        for($i=0; $row=mysqli_fetch_assoc($result); ++$i){
            $members[$i] = $row;
        }
       // var_dump($members);
        return $members;
	}
	
	function getAllDescFromDB(){
        $sql = "SELECT * FROM member order by Last_Logged_in DESC";        
        $result = executeSQL($sql);
        
        $products = array();
        for($i=0; $row=mysqli_fetch_assoc($result); ++$i){
            $products[$i] = $row;
        }
        
        return $products;
    }
	
	function getAllUsersFromDB()
	{
        $sql = "SELECT * FROM member WHERE Type=4";        
        $result = executeSQL($sql);
        
        $members = array();
        for($i=0; $row=mysqli_fetch_assoc($result); ++$i){
            $members[$i] = $row;
        }
       // var_dump($members);
        return $members;
    }
	
	function getLastMemberIDFromDB()
	{
        $sql = "SELECT MAX(Member_ID) FROM member";        
        $result = executeSQL($sql);
        
        $member = mysqli_fetch_assoc($result);
        
        return $member;
    }
	
	function getMemberByIDFromDB($Member_ID)
	{
        $sql = "SELECT * FROM member WHERE Member_ID=$Member_ID";        
        $result = executeSQL($sql);
        
        $member = mysqli_fetch_assoc($result);
        
        return $member;
    }
	
	function getAdminByIDFromDB($Member_ID)
	{
        $sql = "SELECT * FROM member WHERE Member_ID=$Member_ID and Type=1";        
        $result = executeSQL($sql);
        
        $member = mysqli_fetch_assoc($result);
        
        return $member;
    }
	
	function getExecutiveByIDFromDB($Member_ID,$t)
	{
        $sql = "SELECT * FROM member WHERE Member_ID=$Member_ID and Type=".$t."";        
        $result = executeSQL($sql);
        
        $member = mysqli_fetch_assoc($result);
        
        return $member;
    }
	
	function getUserByIDFromDB($Member_ID)
	{
        $sql = "SELECT * FROM member WHERE Member_ID=$Member_ID and Type=4";        
        $result = executeSQL($sql);
        
        $member = mysqli_fetch_assoc($result);
        
        return $member;
    }
	
	
	
	function getMemberByUserNameFromDB($User_Name)
	{
        $sql = "SELECT * FROM member WHERE User_Name=$User_Name";        
        $result = executeSQL($sql);
        
        $member = mysqli_fetch_assoc($result);
        
        return $member;
    }

	function getMembersByNameFromDB($Name)
	{
        $sql = "SELECT * FROM member WHERE `Name` LIKE '%$Name%'";
        $result = executeSQL($sql);
        
        $members = array();
        for($i=0; $row = mysqli_fetch_assoc($result); ++$i){
            $products[$i] = $row;
        }
        
        return $members;
    }
	
	function getMemberByEmailFromDB($Email)
	{
        $sql = "SELECT * FROM member WHERE Email='".$Email."'";        
        $result = executeSQL($sql);
        
        $member = mysqli_fetch_assoc($result);
        
        return $member;
    }
	
	function getAdminByEmailFromDB($Email)
	{
        $sql = "SELECT * FROM member WHERE Email='".$Email."' and Type=1";        
        $result = executeSQL($sql);
        
        $member = mysqli_fetch_assoc($result);
        
        return $member;
    }
	
	function getExecuiveByEmailFromDB($Email,$t)
	{
        $sql = "SELECT * FROM member WHERE Email='".$Email."' and Type=".$t."";        
        $result = executeSQL($sql);
        
        $member = mysqli_fetch_assoc($result);
        
        return $member;
    }
	
	function getUserByEmailFromDB($Email)
	{
        $sql = "SELECT * FROM member WHERE Email='".$Email."' and Type=4";        
        $result = executeSQL($sql);
        
        $member = mysqli_fetch_assoc($result);
        
        return $member;
    }
	
	// function getMembersByTypeFromDB($Type)
	// {
        // $sql = "SELECT * FROM member WHERE Type=$Type";
        // $result = executeSQL($sql);
        
        // $members = array();
        // for($i=0; $row = mysqli_fetch_assoc($result); ++$i){
            // $products[$i] = $row;
        // }
        
        // return $members;
    // }
	
	function getMembersByTypeFromDB($Status)
	{
        $sql = "SELECT * FROM member WHERE Status=$Status";
        $result = executeSQL($sql);
        
        $members = array();
        for($i=0; $row = mysqli_fetch_assoc($result); ++$i){
            $products[$i] = $row;
        }
        
        return $members;
    }
?>
	
	