<?php
	require_once('../model/connection_db.php');
	require_once('../model/add_post.php');
	date_default_timezone_set('Europe/Berlin');
	
	$post = $_GET["post"];
	$post = nl2br($post);
	addPost($post,'1');
	echo '
	<div class="post">
				<table>
					<tr>
						<td rowspan="4" class="post_user_picture">	
							<img src="default.jpg" height="45" width="45"/>
						</td>
						<td class="user_name"><strong>Roknus</strong></td>
					</tr>	
					<tr>
						<td>'.$post.'</td>
					</tr>
					<tr>
						<td class="post_time">
							<span class="comments_button" onclick="ouvrirCommentaire(this);">Commenter</span>
							-
							il y a un instant
                                                        <table class="comments">
								<tr>
									<td>
										<table>
											<tr>
												<td>test</td>
											</tr>
											<tr>
												<td>test</td>
											</tr>
											<tr>
												<td>
													<textarea class="comment_post" cols="40" rows="2" style="border: 1px solid rgb(200,200,250);" placeholder="Ecrire un commentaire...">
													</textarea>
												</td>
											</tr>
										</table>
									</td>
								</tr>					
							</table>
						</td>
					</tr>

				</table>
			</div>';
	
	
