<?php
	session_start();
    
	date_default_timezone_set('Europe/Berlin');
	require_once("model/connection_db.php");
	require_once("model/print_news.php");
	require_once("view/index.php");