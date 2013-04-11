<?php 
	function addPost($post,$pic){	
	
		$bdd = connect_db();
		$request = $bdd->prepare('INSERT INTO posts (id_owner,content,picture,creation_time) 
						VALUES (:owner, :content, :picture, :creation_time);');
		$request->execute(array(
			'owner'=>'1',
			'content'=>$post,
			'picture'=>$pic,
			'creation_time'=>date("Y-m-d H:i:s",time())));
	}