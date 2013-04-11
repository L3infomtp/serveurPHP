<?php
	require_once('connection_db.php');
	require_once('print_comments.php');
	require_once('controller/temps_post.php');
	
	function print_posts(){
		$db = connect_db();
		$request = $db->query('SELECT *,posts.id AS postID FROM posts,pictures WHERE posts.picture = pictures.id  ORDER BY creation_time DESC LIMIT 0,10;');
		while($data = $request->fetch()){
			echo
			'<div id="'.$data["postID"].'" class="post">
				<table>
					<tr>
						<td rowspan="4" class="post_user_picture">	
							<img src="default.jpg" height="45" width="45"/>
						</td>
						<td class="user_name"><strong>Roknus</strong></td>
					</tr>	
					<tr>
						<td>'.$data["content"].'</td>
					</tr>
					<tr>';
					
					if($data["picture"] != '1'){
						echo '
						<td>
                                                    <table>
                                                         <tr>
							      <td><img class="post_picture" src="img/'.$data["picture"].'.'.$data["type"].'" />
                                                         </tr>
                                                         <tr class="picture_title">
							      <td>- '.$data["title"].' -</td>
                                                         </tr> 
                                                    </table>
						</td>';
					}
					
					echo '
					</tr>
					<tr>
						<td class="post_time">
							<span class="comments_button" onclick="ouvrirCommentaire(this);">Commenter</span>
							-
							il y a '.tempsPost(time()-strtotime($data["creation_time"])).'
							<table class="comments">'.print_comments($data["postID"]).'
								<tr id="comment_input">
                                                                 	<td><img src="default.jpg" height="30" width="30"/></td>
									<td>
									<textarea class="comment_post" cols="40" rows="2" style="border: 1px solid rgb(200,200,250);" placeholder="Ecrire un commentaire...">
									</textarea>
									</td>
								</tr>
							</table>
						</td>
					</tr>

				</table>
			</div>';	
		}
	}
	
