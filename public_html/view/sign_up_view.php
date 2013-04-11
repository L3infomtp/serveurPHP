<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head>
        <title>Poker en ligne | Inscription</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link rel="stylesheet" href="../style.css" />
		<script type="text/javascript" src="/~flucia/jquery-1.9.1.min.js"></script>
		
		<script>
		<!--
		
			function checkPseudo(){
				var pseudo = $('#sign_up_username').val();
				var data = { pseudo : pseudo };
				$.ajax({
					url : "/~flucia/model/check_pseudo.php",
					data : data,
					complete : function(xhr, result){
						if(result != "success") return; 
						var response = xhr.responseText;
						if(response == "ok"){
							$('#sign_up_username').css("border","solid 3px green").css("border-radius","3px");
							$('#invalid_username').html("Nom d'utilisateur disponible").css("color","green");;
						}
						else
						{
							$('#sign_up_username').css("border","solid 3px red").css("border-radius","2px");
							$('#invalid_username').html("Nom d'utilisateur indisponible").css("color","red");
						}
					}
				});
			}
		
		//-->
		</script>
		
		<script>
		<!--
			function checkPassword(){
				var password = $('.sign_up_password').val();
				var password_confirm = $('.sign_up_password_confirm').val();
				if(password.length < 3 || password != password_confirm){
					$('.sign_up_password').css("border","solid 3px red").css("border-radius","2px");
					$('.sign_up_password_confirm').css("border","solid 3px red").css("border-radius","2px");
				}
				else{
					$('.sign_up_password').css("border","").css("border-radius","");
					$('.sign_up_password_confirm').css("border","").css("border-radius","");
				}
			}
		//-->
		</script>
		
		<script>
		<!--
			function checkEmail(){
				var email = $('#sign_up_email').val();
				var email_confirm = $('#sign_up_email_confirm').val();
				if(email != email_confirm){
					$('#sign_up_email').css("border","solid 3px red").css("border-radius","2px");
					$('#sign_up_email_confirm').css("border","solid 3px red").css("border-radius","2px");
				}
				else{
					$('#sign_up_email').css("border","").css("border-radius","");
					$('#sign_up_email_confirm').css("border","").css("border-radius","");
				}
			}
		//-->
		</script>
		
    </head>
    <body>
		<?php
		require_once('../view/nav.php');
		require_once('../view/header.php');
		?>
		
		<div class="page">
			<div class="wrapper">
			<p style="text-align:center;"><img src="inscription.jpg"/></p>
			<form method="post" action=".">
				<table class="tborder">
					<tr>
						<td class="ttitle"><strong>Inscription Poker en ligne</strong></td>
					</tr>
					<tr>
						<td class="panelsurround" align="center">
							<div class="panel">			
									<p>
										Pour pouvoir jouer au Poker en ligne, vous devez d'abord vous inscrire.<br />
										Pour avoir acces a notre service nous avons besoin de votre nom d'utilisateur, votre adresse email ainsi que d'autres petits details.
									</p>

									<strong>Nom d'utilisateur : ( 32 caracteres maximum )</strong><br />
									<div>	
										<table>
											<tr>
												<td><input id="sign_up_username" type="text" name="username" size="50" maxlength="32" value="" onblur="javascript:checkPseudo()" required/></td>
												<td id="invalid_username"></td>
											</tr>
										</table>
									</div>
									<fieldset>
									<legend>Mot de passe</legend>
										<table class="sign_up_table">
										<tr>
											<td colspan="2">Entrez votre mot de passe.<br />
											Notez que la taille de votre mot de passe doit etre de 3 caracteres minimum et 32 caracteres maximum.</td>
										</tr>
										<tr>
											<td>
												<strong>Mot de passe :</strong><br />
												<input class="sign_up_password" type="password" name="password" size="25" maxlength="32" value="" />
											</td>
											<td>
												<strong>Confirmation mot de passe :</strong><br />	
												<input class="sign_up_password_confirm" type="password" name="passwordconfirm" size="25" maxlength="32" value="" onblur="javascript:checkPassword()"/>
											</td>
											</tr>
										</table>
									</fieldset>

										<fieldset>
										<legend>Adresse email</legend>
											<table class="sign_up_table">
											<tr>
												<td colspan="2">Entrez une adresse email valide.</td>
											</tr>
											<tr>
												<td>
													<strong>Adresse email :</strong><br />
													<input id="sign_up_email" type="email" name="email" size="25" maxlength="50" value=""/>
												</td>
												<td>
													<strong>Confirmation email :</strong><br />
													<input id="sign_up_email_confirm" type="email" name="emailconfirm" size="25" maxlength="50" value="" onblur="javascript:checkEmail()" />
												</td>
											</tr>
						
											</table>
										</fieldset>
							</div>
						</td>
					</tr>
				</table>
				<table class="tborder">
					<tr>
						<td class="ttitle"><strong>Informations personnelles</strong></td>
					</tr>
					<tr>
						<td class="panelsurround" align="center">
							<div class="panel">	
								<fieldset>
								<legend>Date de naissance(Obligatoire)</legend>
									<table class="sign_up_table">
									<tr>
										<td colspan="3">Entrez votre date de naissance.<br />
										Notez qu'il vous faut avoir au minimum 13ans pour vous inscrire.</td>
									</tr>
									<tr>
										<td>
											<strong>Jour :</strong><br />
											<select name="day">
												<option></option>
												<?php for($i=1;$i<=31;$i++){
													echo "<option value=\"{$i}\">{$i}</option>";
												}?>
											</select>
										</td>
										<td>
											<strong>Mois :</strong><br />
											<select name="month">
												<option></option>
												<?php $months = array('Janvier','Fevrier','Mars','Avril','Mai','Juin','Juillet','Aout','Septembre','Octobre','Novembre','Decembre');
													$i = 0;
													foreach($months as $month){
														$i = $i+1;
														echo "<option value=\"{$i}\">{$month}</option>";
													}	
												?>
											</select>
										</td>
										<td>
											<strong>Annee :</strong><br />
											<select name="year">
												<option></option>
												<?php for($i=date("Y");$i>=1900;$i--){
													echo "<option value=\"{$i}\">{$i}</option>";
												}?>
											</select>
										</td>
									</tr>
									</table>
								</fieldset>
								<fieldset>
								<legend>Informations supplementaires</legend>
									<table class="sign_up_table">
										<tr>
											<td colspan=2><h4>Sexe</h4></td>
										</tr>
										<tr>
											<td>Homme<input type="radio" name="gender" value="Homme" checked="checked"/></td>
											<td>Femme<input type="radio" name="gender" value="Femme"/></td>								
										</tr>
										<tr>
											<td colspan=2><h4>Coordonnees personnelles ( Facultatives )</h4></td>
										</tr>
										<tr>
											<td>Nom :</td>
											<td><input type="text" name="lastname" size="30" maxlength="50" value=""/></td>
										</tr>
										<tr>
											<td>Prenom :</td>
											<td><input type="text" size="30" maxlength="50" name="firstname" value=""/></td>
										</tr>
										<tr>
											<td>Adresse :</td>
											<td><input type="text" size="30" maxlength="50" name="address" value=""/></td>
										</tr>
										<tr>
											<td>Complement d'adresse :</td>
											<td><input type="text" size="30" maxlength="50" name="address2" value=""/></td>
										</tr>
										<tr>
											<td>Ville :</td>
											<td><input type="text" size="30" maxlength="50" name="city" value=""/></td>
										</tr>
										<tr>
											<td>Code postal :</td>
											<td><input type="text" size="10" maxlength="5" name="zipcode" value=""/></td>
										</tr>
										<tr>
											<td>Pays :</td>
											<td><select name="country">
												<option value="France" selected="selected">France </option>

												<option value="Afghanistan">Afghanistan </option>
												<option value="Afrique_Centrale">Afrique_Centrale </option>
												<option value="Afrique_du_sud">Afrique_du_Sud </option>
												<option value="Albanie">Albanie </option>
												<option value="Algerie">Algerie </option>
												<option value="Allemagne">Allemagne </option>
												<option value="Andorre">Andorre </option>
												<option value="Angola">Angola </option>
												<option value="Anguilla">Anguilla </option>
												<option value="Arabie_Saoudite">Arabie_Saoudite </option>
												<option value="Argentine">Argentine </option>
												<option value="Armenie">Armenie </option>
												<option value="Australie">Australie </option>
												<option value="Autriche">Autriche </option>
												<option value="Azerbaidjan">Azerbaidjan </option>

												<option value="Bahamas">Bahamas </option>
												<option value="Bangladesh">Bangladesh </option>
												<option value="Barbade">Barbade </option>
												<option value="Bahrein">Bahrein </option>
												<option value="Belgique">Belgique </option>
												<option value="Belize">Belize </option>
												<option value="Benin">Benin </option>
												<option value="Bermudes">Bermudes </option>
												<option value="Bielorussie">Bielorussie </option>
												<option value="Bolivie">Bolivie </option>
												<option value="Botswana">Botswana </option>
												<option value="Bhoutan">Bhoutan </option>
												<option value="Boznie_Herzegovine">Boznie_Herzegovine </option>
												<option value="Bresil">Bresil </option>
												<option value="Brunei">Brunei </option>
												<option value="Bulgarie">Bulgarie </option>
												<option value="Burkina_Faso">Burkina_Faso </option>
												<option value="Burundi">Burundi </option>

												<option value="Caiman">Caiman </option>
												<option value="Cambodge">Cambodge </option>
												<option value="Cameroun">Cameroun </option>
												<option value="Canada">Canada </option>
												<option value="Canaries">Canaries </option>
												<option value="Cap_vert">Cap_Vert </option>
												<option value="Chili">Chili </option>
												<option value="Chine">Chine </option>
												<option value="Chypre">Chypre </option>
												<option value="Colombie">Colombie </option>
												<option value="Comores">Colombie </option>
												<option value="Congo">Congo </option>
												<option value="Congo_democratique">Congo_democratique </option>
												<option value="Cook">Cook </option>
												<option value="Coree_du_Nord">Coree_du_Nord </option>
												<option value="Coree_du_Sud">Coree_du_Sud </option>
												<option value="Costa_Rica">Costa_Rica </option>
												<option value="Cote_d_Ivoire">Côte_d_Ivoire </option>
												<option value="Croatie">Croatie </option>
												<option value="Cuba">Cuba </option>

												<option value="Danemark">Danemark </option>
												<option value="Djibouti">Djibouti </option>
												<option value="Dominique">Dominique </option>

												<option value="Egypte">Egypte </option>
												<option value="Emirats_Arabes_Unis">Emirats_Arabes_Unis </option>
												<option value="Equateur">Equateur </option>
												<option value="Erythree">Erythree </option>
												<option value="Espagne">Espagne </option>
												<option value="Estonie">Estonie </option>
												<option value="Etats_Unis">Etats_Unis </option>
												<option value="Ethiopie">Ethiopie </option>

												<option value="Falkland">Falkland </option>
												<option value="Feroe">Feroe </option>
												<option value="Fidji">Fidji </option>
												<option value="Finlande">Finlande </option>
												<option value="France">France </option>

												<option value="Gabon">Gabon </option>
												<option value="Gambie">Gambie </option>
												<option value="Georgie">Georgie </option>
												<option value="Ghana">Ghana </option>
												<option value="Gibraltar">Gibraltar </option>
												<option value="Grece">Grece </option>
												<option value="Grenade">Grenade </option>
												<option value="Groenland">Groenland </option>
												<option value="Guadeloupe">Guadeloupe </option>
												<option value="Guam">Guam </option>
												<option value="Guatemala">Guatemala</option>
												<option value="Guernesey">Guernesey </option>
												<option value="Guinee">Guinee </option>
												<option value="Guinee_Bissau">Guinee_Bissau </option>
												<option value="Guinee equatoriale">Guinee_Equatoriale </option>
												<option value="Guyana">Guyana </option>
												<option value="Guyane_Francaise ">Guyane_Francaise </option>

												<option value="Haiti">Haiti </option>
												<option value="Hawaii">Hawaii </option>
												<option value="Honduras">Honduras </option>
												<option value="Hong_Kong">Hong_Kong </option>
												<option value="Hongrie">Hongrie </option>

												<option value="Inde">Inde </option>
												<option value="Indonesie">Indonesie </option>
												<option value="Iran">Iran </option>
												<option value="Iraq">Iraq </option>
												<option value="Irlande">Irlande </option>
												<option value="Islande">Islande </option>
												<option value="Israel">Israel </option>
												<option value="Italie">italie </option>

												<option value="Jamaique">Jamaique </option>
												<option value="Jan Mayen">Jan Mayen </option>
												<option value="Japon">Japon </option>
												<option value="Jersey">Jersey </option>
												<option value="Jordanie">Jordanie </option>

												<option value="Kazakhstan">Kazakhstan </option>
												<option value="Kenya">Kenya </option>
												<option value="Kirghizstan">Kirghizistan </option>
												<option value="Kiribati">Kiribati </option>
												<option value="Koweit">Koweit </option>

												<option value="Laos">Laos </option>
												<option value="Lesotho">Lesotho </option>
												<option value="Lettonie">Lettonie </option>
												<option value="Liban">Liban </option>
												<option value="Liberia">Liberia </option>
												<option value="Liechtenstein">Liechtenstein </option>
												<option value="Lituanie">Lituanie </option>
												<option value="Luxembourg">Luxembourg </option>
												<option value="Lybie">Lybie </option>

												<option value="Macao">Macao </option>
												<option value="Macedoine">Macedoine </option>
												<option value="Madagascar">Madagascar </option>
												<option value="Madere">Madere </option>
												<option value="Malaisie">Malaisie </option>
												<option value="Malawi">Malawi </option>
												<option value="Maldives">Maldives </option>
												<option value="Mali">Mali </option>
												<option value="Malte">Malte </option>
												<option value="Man">Man </option>
												<option value="Mariannes du Nord">Mariannes du Nord </option>
												<option value="Maroc">Maroc </option>
												<option value="Marshall">Marshall </option>
												<option value="Martinique">Martinique </option>
												<option value="Maurice">Maurice </option>
												<option value="Mauritanie">Mauritanie </option>
												<option value="Mayotte">Mayotte </option>
												<option value="Mexique">Mexique </option>
												<option value="Micronesie">Micronesie </option>
												<option value="Midway">Midway </option>
												<option value="Moldavie">Moldavie </option>
												<option value="Monaco">Monaco </option>
												<option value="Mongolie">Mongolie </option>
												<option value="Montserrat">Montserrat </option>
												<option value="Mozambique">Mozambique </option>

												<option value="Namibie">Namibie </option>
												<option value="Nauru">Nauru </option>
												<option value="Nepal">Nepal </option>
												<option value="Nicaragua">Nicaragua </option>
												<option value="Niger">Niger </option>
												<option value="Nigeria">Nigeria </option>
												<option value="Niue">Niue </option>
												<option value="Norfolk">Norfolk </option>
												<option value="Norvege">Norvege </option>
												<option value="Nouvelle_Caledonie">Nouvelle_Caledonie </option>
												<option value="Nouvelle_Zelande">Nouvelle_Zelande </option>

												<option value="Oman">Oman </option>
												<option value="Ouganda">Ouganda </option>
												<option value="Ouzbekistan">Ouzbekistan </option>

												<option value="Pakistan">Pakistan </option>
												<option value="Palau">Palau </option>
												<option value="Palestine">Palestine </option>
												<option value="Panama">Panama </option>
												<option value="Papouasie_Nouvelle_Guinee">Papouasie_Nouvelle_Guinee </option>
												<option value="Paraguay">Paraguay </option>
												<option value="Pays_Bas">Pays_Bas </option>
												<option value="Perou">Perou </option>
												<option value="Philippines">Philippines </option>
												<option value="Pologne">Pologne </option>
												<option value="Polynesie">Polynesie </option>
												<option value="Porto_Rico">Porto_Rico </option>
												<option value="Portugal">Portugal </option>

												<option value="Qatar">Qatar </option>

												<option value="Republique_Dominicaine">Republique_Dominicaine </option>
												<option value="Republique_Tcheque">Republique_Tcheque </option>
												<option value="Reunion">Reunion </option>
												<option value="Roumanie">Roumanie </option>
												<option value="Royaume_Uni">Royaume_Uni </option>
												<option value="Russie">Russie </option>
												<option value="Rwanda">Rwanda </option>

												<option value="Sahara Occidental">Sahara Occidental </option>
												<option value="Sainte_Lucie">Sainte_Lucie </option>
												<option value="Saint_Marin">Saint_Marin </option>
												<option value="Salomon">Salomon </option>
												<option value="Salvador">Salvador </option>
												<option value="Samoa_Occidentales">Samoa_Occidentales</option>
												<option value="Samoa_Americaine">Samoa_Americaine </option>
												<option value="Sao_Tome_et_Principe">Sao_Tome_et_Principe </option>
												<option value="Senegal">Senegal </option>
												<option value="Seychelles">Seychelles </option>
												<option value="Sierra Leone">Sierra Leone </option>
												<option value="Singapour">Singapour </option>
												<option value="Slovaquie">Slovaquie </option>
												<option value="Slovenie">Slovenie</option>
												<option value="Somalie">Somalie </option>
												<option value="Soudan">Soudan </option>
												<option value="Sri_Lanka">Sri_Lanka </option>
												<option value="Suede">Suede </option>
												<option value="Suisse">Suisse </option>
												<option value="Surinam">Surinam </option>
												<option value="Swaziland">Swaziland </option>
												<option value="Syrie">Syrie </option>

												<option value="Tadjikistan">Tadjikistan </option>
												<option value="Taiwan">Taiwan </option>
												<option value="Tonga">Tonga </option>
												<option value="Tanzanie">Tanzanie </option>
												<option value="Tchad">Tchad </option>
												<option value="Thailande">Thailande </option>
												<option value="Tibet">Tibet </option>
												<option value="Timor_Oriental">Timor_Oriental </option>
												<option value="Togo">Togo </option>
												<option value="Trinite_et_Tobago">Trinite_et_Tobago </option>
												<option value="Tristan da cunha">Tristan de cuncha </option>
												<option value="Tunisie">Tunisie </option>
												<option value="Turkmenistan">Turmenistan </option>
												<option value="Turquie">Turquie </option>

												<option value="Ukraine">Ukraine </option>
												<option value="Uruguay">Uruguay </option>

												<option value="Vanuatu">Vanuatu </option>
												<option value="Vatican">Vatican </option>
												<option value="Venezuela">Venezuela </option>
												<option value="Vierges_Americaines">Vierges_Americaines </option>
												<option value="Vierges_Britanniques">Vierges_Britanniques </option>
												<option value="Vietnam">Vietnam </option>

												<option value="Wake">Wake </option>
												<option value="Wallis et Futuma">Wallis et Futuma </option>

												<option value="Yemen">Yemen </option>
												<option value="Yougoslavie">Yougoslavie </option>

												<option value="Zambie">Zambie </option>
												<option value="Zimbabwe">Zimbabwe </option>

												</select>
											</td>
										</tr>
									</table>
								</fieldset>
							</div>
							<table>
								<tr>
									<td><input type="submit" value="Envoyer" /></td>
									<td><input type="reset" value="Reset" /></td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</form>
			</div>
		</div>

		
		<?php
		require_once('../view/footer.php'); 
		?>
	</body>
</html>