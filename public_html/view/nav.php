<script type="text/javascript">
<!--
	function openPopup(){
		var windowPopup = window.open('/~flucia/client/','popup','width=900,height=750,directories=no,menubar=no,status=no,location=no');
		if(windowPopup){
			windowPopup.focus();
		}
		else{
			alert("Veuillez desactiver votre anti-popup pour pouvoir jouer");
		}
	}
//-->
</script>

<div class="nav">
	<?php
		if(isset($_SESSION["username"])){
		?>
			<ul class="nav_menu">
				<li class="connection">
					<?php echo $_SESSION["username"]; ?>
				</li>
				<a href="javascript:openPopup()">
				<li class="connection">	Jouer
				</li>
		                </a>
	     
				<a href="/~flucia/log_off.php">
				<li class="connection">	Deconnexion
				</li>
		                </a>
			</ul>
		<?php
		}
		else{
		?>
			<ul class="nav_menu">
				<li>
					<ul class="connection">
						<li onclick="$('#connection_block').slideToggle(500);" onmouseover="this.style.cursor='pointer';" >Connexion</li>
						<li id="connection_block" style="display:none">
							<form method="post" action="/~flucia/log_in/index.php">
								<table class="tconnection">
									<tr>
										<td>Nom d'utilisateur<br /><input type="text" name="username" size="10"/></td>
									</tr>
									<tr>
										<td>Mot de passe<br />
											<input type="password" name="password" size="10"/><br />
											<a href="/" style="font-size:13px;">mot de passe oublie?</a>
										</td>
									</tr>
									<tr>
										<td><input type="submit" value="Se connecter"/>
									</tr>
								</table>
							</form>
						</li>
								
					</ul>
				</li>
				<a href="/~flucia/sign_up/">
				<li class="connection">	Inscription
				</li>
                                </a>
				<a href="javascript:openPopup()">
				<li class="connection">	Jouer
				</li>
                                </a>
			</ul>
		<?php
		}
		?>
</div>