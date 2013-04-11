<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head>
	<title>Poker en ligne</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link rel="stylesheet" href="/~flucia/style.css" />
	<script type="text/javascript" src="/~flucia/jquery-1.9.1.min.js"></script>
      
	<script type="text/javascript">
	<!--
	
	function logIn(){
		if($("#monform")){
			var username = $('#log_in_username').val();
			var password = $('#log_in_password').val();
			var data = { username : username, password : password };
		}
		else{
			var data = {};
		}
		$.ajax({
			url : "/~flucia/client/connection/connection.php",
			data : data,
			complete : function(xhr,result){
				if(result != "success") return; 
				var response = xhr.responseText;
				if(response != "connection_denied"){
					$(location).attr('href',"/~flucia/client/menu_principal/index.php");
				}
				else{
					$("#log_in_error").html("Identifiants incorrect");
				}				
			}				
		});
		
	}
	
	//-->
	</script>
		
	</head>
	<body>
	<div class="page">   
		<?php
			if(isset($_SESSION["username"])){?>
				<script type="text/javascript">
				<!--
					logIn();
				//-->
				</script>
					<div>
						<table class="loading">
							<tr>
								<td>Chargement ...</td>
							</tr>
							<tr>
								<td><img src="/~flucia/client/loading.gif" /></td>
							</tr>
						</table>
					</div>
				</div>
			</body>
		</htmL>

		<?php
		}
			else{?>
				<div class="wrapper">
					<div style="text-align:center;"><img src="/~flucia/log_in/connexion.jpg"/></div>
					<table class="tborder">
						<tr>
							<td class="ttitle"><strong>Connexion</strong></td>
						</tr>
						<tr>
							<td class="panelsurround" align="center">
								<div class="panel">
									<form name="monform" action="javascript:logIn()">
										<table>
											<tr>
												<td>Nom d'utilisateur : </td>
												<td><input id="log_in_username" type="text" name="username" /></td>
												<td><strong><span id="log_in_error"></span> </strong></td>
											</tr>
											<tr>
												<td style="text-align:right">Mot de passe : </td>
												<td><input id="log_in_password" type="password" name="password" /></td>
												<td><input type="submit" value="Se connecter" /></td>
											</tr>
										</table>
									</form>
								</div>
							</td>
						</tr>
					</table>
				</div>
			</body>
		</htmL>
<?php
 }