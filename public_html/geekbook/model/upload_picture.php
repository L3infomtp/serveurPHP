<?php
	function checkAvailableName(){
		$bdd = connect_db();
		$request = $bdd->query('SELECT MAX(id) AS max FROM pictures;');
		$data = $request->fetch();
		return $data['max']+1;
	}
	
	function addPicture($owner,$name,$type,$title){
		$bdd = connect_db();
		$request = $bdd->prepare('INSERT INTO pictures (id_owner,name,type,title) VALUES (:owner, :name, :type, :title);');
		$request->execute(array(
			'owner'=>$owner,
			'name'=>$name,
			'type'=>$type,
			'title'=>$title
		));
	}