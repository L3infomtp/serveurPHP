<?php
	session_start();
	
	if(isset($_POST["username"]) AND $_POST["username"] != "" AND
		isset($_POST["password"]) AND $_POST["password"] != ""
	){	
		require_once("../model/connection_db.php");
		require_once("../model/log_in_model.php");
	
		$username = htmlspecialchars($_POST["username"]);
		$password = htmlspecialchars($_POST["password"]);
		$password = sha1($password);
		
		if(is_user($username,$password)){
			activate_session($username);
			include_once("../view/log_in_view.php");
		}
		else{
			include_once("../view/log_in_view.php");
			echo '<script>alert("Vos identifiants sont incorrect.");</script>';
		}
	}
	else{
		include_once("../view/log_in_view.php");
	}