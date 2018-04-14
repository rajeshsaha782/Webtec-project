<?php
   
    function isValidPersonName($name)
	{
		$parts = explode(" ", $name);
		$isValid = false;
		 if(count($parts)>1){
            if(preg_match("/[a-zA-Z ]/",$name)){
                $isValid = true;
            }
        }
        return $isValid;
					
    }
	
	function isValidPersonNum($num){
		$parts=str_word_count($num);
		$isValid = false;
		 if($parts==1){
            if(preg_match("/^[1-9][0-9]*$/",$num)){
                $isValid = true;
            }
        }
        return $isValid;
		
    }
	
    function isValidPersonUserName($uname){
		$parts=str_word_count($uname);
		$isValid = false;
		 if($parts==1){
            if(preg_match("/[a-zA-Z ]@$/",$uname)){
                $isValid = true;
            }
        }
        return $isValid;
		
    }
	
	 function isValidEmail($email){
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }
	
	
	
	
	 function isValidPassword($pass)
	{
		$isValid = false;
		 if(preg_match("/.{2,}/",$pass)){
                $isValid = true;
            }
		return $isValid;
			
	}
	 function isValidRetypeaPassword($pass,$rpass)
	{
		$isValid = false;
		 if(strcmp($pass,$rpass)==true){
                $isValid = true;
            }
		return $isValid;
			
	}
	
	/*function isValidDOB()
	{
		$leap=0;
		$flag=0;
		$flag1=0;
		$isValid = false;
		if
		{
	
			if(empty($date))
			{
				$fflg=1;
				$flag=1;
			}
			else if(empty($month))
			{
				$fflg=1;
				$flag=1;
			}
			else if(empty($year))
			{
				$fflg=1;
				$flag=1;
			}
			
			else if($year%4 == 0)
			{
				if($year%100 == 0)
				{
					if ($year%400 == 0)
						$leap=1;
					else
						$leap=0;
				}
				else
					$leap=1;
			}
			
			if($flag!=1)
			{
				if(($leap==1)&&($month==2))
				{
					if(!(($date<=29)&&($date>=1)))
						$flag1=1;
				}
				else if(($month>=1)&&($month<=12)&&($date>=1)&&($date<=31)&&($year>=1953)&&($year<=1998))
				{
					if(($month==2)&&($date>28))
					{
						$flag1=1;
					}
					else if((($month==2)||($month==4)||($month==6)||($month==9)||($month==11))&&($date>30))
					{
						$flag1=1;
					}	
				}
				else
					$flag1=1;
			}
			if($flag1==1)
			{
					$fflg=1;
			}
		}
		else
		{
			if($flag1==1|| $fflg=1 || $leap==1 )
				{
					return $isValid; 
				}
				else
				{
					$isValid = true;
					return $isValid;
				}
		}
	}*/
	
	
?>
