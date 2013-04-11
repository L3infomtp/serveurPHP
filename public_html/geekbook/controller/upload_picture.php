<?php
	session_start();
	
	date_default_timezone_set('Europe/Berlin');
	require_once('../model/connection_db.php');
	require_once('../model/upload_picture.php');
	require_once('../model/add_post.php');
	
	
if( isset($_POST['picture_title_input']) AND ($_POST['picture_title_input'] != "") ) // si formulaire soumis
{
    $content_dir = '../img/'; // dossier où sera déplacé le fichier

    $tmp_file = $_FILES['uploaded_picture']['tmp_name'];

    if( !is_uploaded_file($tmp_file) )
    {
	header('Location:/~flucia/geekbook/');
    }

    // on vérifie maintenant l'extension
    $type_file = $_FILES['uploaded_picture']['type'];

    if( !strstr($type_file, 'jpg') && !strstr($type_file, 'jpeg') && !strstr($type_file, 'bmp') && !strstr($type_file, 'gif') && !strstr($type_file, 'png'))
    {
	header('Location:/~flucia/geekbook/');
    }

    // on copie le fichier dans le dossier de destination
	$type = strtok($_FILES['uploaded_picture']['type'],'/');
	$type = strtok('/');
    $name_file = checkAvailableName();

    if( !move_uploaded_file($tmp_file, $content_dir . $name_file.'.'.$type) )
    {
	header('Location:/~flucia/geekbook/');
    }
	
	addPicture('1',$_FILES['uploaded_picture']['name'],$type,$_POST['picture_title_input']);
	addPost($_POST['picture_description'],$name_file);	
	header('Location:/~flucia/geekbook/');
}
else{
	header('Location:/~flucia/geekbook/');
}