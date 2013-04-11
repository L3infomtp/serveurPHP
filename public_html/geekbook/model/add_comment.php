<?php
function addComment($id_post,$comment){
  $bdd = connect_db();
  $request = $bdd->prepare('INSERT INTO comments (id_post,id_poster,content,creation_time) VALUES (:post, :poster, :content, :creation_time);');
  $request->execute(array(
			  'post'=>$id_post,
			  'poster'=>'1',
			  'content'=>$comment,
			  'creation_time'=>date("Y-m-d H:i:s", time())
			  ));
}