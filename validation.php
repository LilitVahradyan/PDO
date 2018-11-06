<?php 
	$name=$email=$phone = "";
	
	function dataValidation(){
		if(empty($_POST['name'])){
			$nameErr="Name is required!";
		}else{
			$name= test_input($_POST['name']);
			
			if(!preg_match("/^[a-zA-Z ]*$/",$name)){
			$nameErr = "Only letters and white space allowed!";
			}
		}

		if(empty($_POST['email'])){
			$emailErr="Email is required"
		}else{
			$email = test_input($_POST['email']);

			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$emailErr = "Invalid email!";
			}
		}
        
        if(empty($_POST['phone'])){
        	$phoneErr="Phone is requred!";
        }else{
        	$phone = test_input($_POST['phone']);

        	if(!preg_match('/^\+?([0-9]{1,4})\)?[-. ]?([0-9]{10})$/', $phone){
        		$phoneErr = "Enter a valid phone number!";
        	}else{

        	}
        }

	}
?>