<?php 
session_start();
require_once("../../model/log_in_model.php");
require_once("../../model/connection_db.php");
/*=======================================================================
 Nom : index.php                Auteur : Lucia Florent
 Date creation : 21/02/2013     Derniere mise a jour : 21/02/2013
 Projet : Poker en ligne L3 S6
 ------------------------------------------------------------------------
 Specification:
 Ce fichier contient ...
 ======================================================================*/ 

$LOCAL_MACHINE = 'h13';
$LOCAL_MACHINE_PORT = 12349;

$socket_public = socket_create(AF_INET,SOCK_STREAM,SOL_TCP);
if(socket_connect($socket_public,$LOCAL_MACHINE,$LOCAL_MACHINE_PORT) == false){
	break;
}
if(isset($_SESSION["username"])){
  
	$username = $_SESSION["username"];
	$password = get_password($username);
}
else{
	$username = $_GET["username"];
	$password = sha1($_GET["password"]);
}

socket_write($socket_public,$username."&".$password."&");
$res = socket_read($socket_public,2047);
if($res != 'connection_denied' AND !(isset($_SESSION["username"]))){
	activate_session($username);
 }
if($res != 'connection_denied'){
	$mess = strtok($res,'&');
	$tables = "";
	while($mess != ""){
	  echo $mess;
	  $tables .= '<tr><td>';
	  $nom_table = strtok('&');
	  $tables .= $nom_table.'</td>';
	  $num_port = strtok('&');
	  $tables .= '
             <td>'.strtok('&').' / ';
	  $nb_j_max = strtok('&');
	  $tables .= $nb_j_max.'</td>
             <td>'.number_format(strtok('&'),2,'.',' ').'</td>
             <td><input type="button" value="Rejoindre" onclick="javascript:rejoindreTable('.$num_port.','.$nb_j_max.",'".$nom_table."')\"/></td>
          </tr>
         ";
	  $mess = strtok('&');
	}	
	$_SESSION["tables"] = $tables;
	$_SESSION["server_hostname"] = $LOCAL_MACHINE;
	echo 'connection_accepted';
	
}
 else{
   echo $res;
   socket_close($socket_public);
 }
