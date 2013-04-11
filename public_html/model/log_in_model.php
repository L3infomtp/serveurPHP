<?php
	function get_password($username){
		$db = connect_db();
		$request = $db->prepare('SELECT password FROM infoclients WHERE username = :username;');
		$request->execute(array('username' => $username));
		$pass = $request->fetch();
		return $pass["password"];
	}

	function is_user($username,$password){
		$db = connect_db();
		$request = $db->prepare('SELECT username,password FROM infoclients WHERE username = :username AND password = :password;');
		$request->execute(array(
			'username' => $username,
			'password' => $password
			));
			
		if($request->rowCount() == 0){
			return false;
		}
		return true;
	}
	
	function activate_session($username){
		$db = connect_db();
		$request = $db->prepare('SELECT * FROM infoclients WHERE username = :username;');
		$request->execute(array(
			'username' => $username
			));
		$info = $request->fetch();
		
		$_SESSION["username"] = $info["username"];
		$_SESSION["email"] = $info["email"];
		$_SESSION["dob"] = $info["dob"];
		$_SESSION["gender"] = $info["gender"];
		$_SESSION["lname"] = $info["lname"];
		$_SESSION["fname"] = $info["fname"];
		$_SESSION["address"] = $info["address"];
		$_SESSION["city"] = $info["city"];
		$_SESSION["zipcode"] = $info["zipcode"];
		$_SESSION["country"] = $info["country"];
		$_SESSION["money"] = $info["money"];
	}

