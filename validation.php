<?php 
	
	function dataValidation($data){
		$error = [];

		if(empty($data['name'])){
			$error['name'] =  "Name cant't be empty!";
            return  $error;
		}
			
	   if(!preg_match("/^[a-zA-Z ]*$/",$data['name'])){
			$error['onlyletters'] =  "Only letters and white space allowed!";
            return  $error;
		}
	
		if(empty($data['email'])){
			$error['email'] = "Email is required";
			return  $error;
		}

	    if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
			$error['filedemail'] = "Invalid email!";
			return  $error;
		}
		
        if(empty($data['phone'])){
        	$error['phone'] = "Phone is required!";
        	return  $error;
        }

       if(!preg_match('/^\+?([0-9]{1,4})\)?[-. ]?([0-9]{10})$/', $data['phone'])){
        	$error['phonenum'] =  "Enter a valid phone number!";
        	return  $error;
       } 
    
    	return true;
    } 
?>