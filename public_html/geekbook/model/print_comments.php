<?php
	require_once('connection_db.php');
	
	function print_comments($post_id){
		$db = connect_db();
		$request = $db->query('SELECT * FROM comments  WHERE id_post='.$post_id.' ORDER BY creation_time DESC;');
		$mess = "";
		while($data = $request->fetch()){
		  $mess .='
	          <tr>
	             <td><img src="default.jpg" height="30" width="30" /></td>
	             <td>'.$data["content"].'</td>
                  </tr>';
		}
		return $mess;
	}
