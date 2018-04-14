<?php 
 	if(empty($admin))
 	{
 		require_once "../data/member_data_access.php";
 	}
 	else
 	{
 		require_once "../../data/member_data_access.php";
 	}
?>
<?php
    function addMember($member){
        return addMemberToDB($member);
    }
	
	function getAllUsersByAciveDSC()
	{
		return getAllUsersByAciveDSCFromDB();
	}
    
    function editMember($member){
        return editMemberToDB($member);
    }
    
    function deleteMember($memberId){
        return deleteMemberFromDB($memberId);
    }
    
    function getAllMembers(){
        return getAllMembersFromDB();
    }
	
	function getAllAdmins(){
		return getAllAdminsFromDB();
	}
	
	function getAllAdminsByAciveDSC(){
		return getAllAdminsByAciveDSCFromDB();
	}
	
	function getAllUsers(){
		return getAllUsersFromDB();
	}
	
	function getAllExs($t)
	{
		return getAllExsFromDB($t);
	}
	
    function updataTotalPurchase($id,$purchase)
	{
		return updataTotalPurchaseToDB($id,$purchase);
	}
	
	
    function getMemberById($memberId){
        return getMemberByIdFromDB($memberId);
    }
	
	function getAdminById($memberId){
        return getAdminByIdFromDB($memberId);
    }
	
	function getExecutiveByID($Member_ID,$t)
	{
		return getExecutiveByIDFromDB($Member_ID,$t);
	}
	
	function getUserById($memberId){
        return getUserByIdFromDB($memberId);
    }
    
    function getMembersByName($memberName){
        return getMembersByNameFromDB($memberName);
    }
	
	function getExecuiveByEmail($Email,$t)
	{
		return getExecuiveByEmailFromDB($Email,$t);
	}
    
    function getMembersByEmail($memberEmail){
        return getMemberByEmailFromDB($memberEmail);
    }
	
	function getAdminByEmail($memberEmail){
        return getAdminByEmailFromDB($memberEmail);
    }
	
	function getUserByEmail($memberEmail){
        return getUserByEmailFromDB($memberEmail);
    }
    
    function getMembersByNameOrEmail($key){
        return getMembersByNameOrEmailFromDB($key);
    }
    
    function isUniqueMemberEmail($memberEmail){
        $members  = getAllMembers();
        $isUnique = true;
        foreach($members as $member){
            if($member['Email']==$memberEmail){
                $isUnique = false;
                break;
            }
        }
        return $isUnique;
    }
	 function changePassword($memberId){
        $members  = getAllMembers();
        $isChange = true;
        foreach($members as $member){
            if($member['pas']==$memberEmail){
                $isUnique = false;
                break;
            }
        }
        return $isUnique;
	 }
    
    function isUniqueMemberEmailForUpdate($memberId, $memberEmail){
        $members  = getAllMembers();
        $isUnique = true;
        foreach($members as $member){
            if($member['id']!=$memberId && $member['email']==$memberEmail){
                $isUnique = false;
                break;
            }
        }
        return $isUnique;
    }
    
    function isValidMember($memberId){
        $members = getAllMembers();
        $isValid = false;
        foreach($members as $member){
            if($member['id']==$memberId){
                $isValid = true;
                break;
            }
        }
        return $isValid;
    }
?>