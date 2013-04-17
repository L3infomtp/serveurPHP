<?php 
session_start();

/*=======================================================================
 Nom : index.php                Auteur : Lucia Florent
 Date creation : 21/02/2013     Derniere mise a jour : 21/02/2013
 Projet : Poker en ligne L3 S6
 ------------------------------------------------------------------------
 Specification:
 Ce fichier contient ...
 =======================================================================*/ 

$LOCAL_MACHINE_IP = 'm7';
$LOCAL_MACHINE_PORT = 12349;

$socket_public = socket_create(AF_INET,SOCK_STREAM,SOL_TCP);
if(socket_connect($socket_public,$LOCAL_MACHINE_IP,$LOCAL_MACHINE_PORT) == false){
  break;
 }
$mise = $_GET["miser"];
socket_write($socket_public,$_SESSION["username"].'&miser&'.$mise.'&');
socket_close($socket_public);