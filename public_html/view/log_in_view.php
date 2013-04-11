<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head>
        <title>Poker en ligne</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link rel="stylesheet" href="/~flucia/style.css" />
		
    </head>
    <body>
	
		<?php
		include_once('../view/nav.php');
		include_once('../view/header.php');
		?>
		
		<div class="page">
			<div class="wrapper">
				<p style="text-align:center;"><img src="connexion.jpg"/></p>
				<table class="tborder">
				
					<?php			
					if(isset($_SESSION["username"])){
						echo '
							<tr>
								<td class="ttitle"><strong>Connexion reussi</strong></td>
							</tr>
							<tr>
								<td class="panelsurround" align="center">
									<div class="panel">	
										<p>Vous etes connecte !</p>
									</div>
								</td>
							</tr>
							';
					}
					else{
						echo '
							<tr>
								<td class="ttitle"><strong>Connexion</strong></td>
							</tr>
							<tr>
								<td class="panelsurround" align="center">
									<div class="panel">	
									<form method="post" action=".">
										<table style="margin:50px;">
											<tr>
												<td><strong>Nom d\'utilisateur : </strong></td>
												<td><input type="text" name="username" /></td>
												<td>mot de passe oublie?</td>
											</tr>
											<tr>
												<td><strong>Mot de passe : </strong></td>
												<td><input type="password" name="password" /></td>
												<td><input type="submit" value="Se connecter" /></td>
											</tr>
										</table>
									</form>
									</div>
								</td>
							</tr>
							';
					}
					?>
		
				</table>
			</div>
		</div>
		
		
		<?php
		include_once('../view/footer.php'); 
		?>
		
	</body>
</html>