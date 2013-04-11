<?php
	function print_news(){
		$db = connect_db();
		$request = $db->query('SELECT * FROM news;');
		while($data = $request->fetch()){
			echo
			'<table class="tborder">
				<tr>
					<td class="ttitle"><strong>'.$data["title"].'</strong><span style="text-align:right;position:relative;left:500px;">'.$data["author"].' '.date("h:i d/m/y", strtotime($data["creation_date"])).'</span></td>
				</tr>
				<tr>
					<td class="panelsurround" align="center">
						<div class="panel">	
							'.$data["content"].'
						</div>
					</td>
				</tr>
			</table>';	
		}
	}