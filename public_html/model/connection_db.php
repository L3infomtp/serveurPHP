<?php
	function connect_db(){
	
		try
		{
			$db = new PDO('mysql:host=venus;dbname=flucia','flucia', 'flucia');
		}
		catch (Exception $e)
		{
				die('Erreur : ' . $e->getMessage());
		}
		
		return $db;
	}