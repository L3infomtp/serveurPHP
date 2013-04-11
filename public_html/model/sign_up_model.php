<?php
	
	function insert_new_client($username,$password,$email,$year,$month,$day,$gender,$firstname,$lastname,$address,$address2,$city,$country,$zipcode){
		$db = connect_db();
		$request = $db->prepare('INSERT INTO infoclients (Username ,Password ,Email ,DOB ,Gender ,LName ,FName ,Address ,City ,Zipcode ,Country) 
					VALUES(:username,:password,:email,:dob,:gender,:lname,:fname,:address,:city,:zipcode,:country)');
		$signup = $request->execute(array(
			'username'=>$username,
			'password'=>$password,			
			'email'=>$email,
			'dob'=>$year.'-'.$month.'-'.$day,
			'gender'=>$gender,
			'lname'=>$lastname,
			'fname'=>$firstname,
			'address'=>$address.$address2,
			'city'=>$city,
			'zipcode'=>$zipcode,
			'country'=>$country));
		return $signup;
	}