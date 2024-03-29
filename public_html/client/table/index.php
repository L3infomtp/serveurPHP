<?php
    session_start(); 
        
    if(isset($_GET["num_port"]) AND isset($_GET["nb_j_max"]) AND isset($_GET["nom_table"])){
      $nb_j_max = $_GET["nb_j_max"];
      $num_port = $_GET["num_port"];
      $nom_table = $_GET["nom_table"];
    }

    function player_block($place,$nb_j_max){
      echo '<td><div id="player'.$place.'" style="vertical-align:center;">
      <div id="select_seat" onclick="javascript:choixPlace('.$place.')"><strong>Choisissez votre place</strong></div>
      </div></td>';   
    }
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
	<head>
        	<title>Poker en ligne</title>
        	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link rel="stylesheet" href="/~flucia/style.css" />
		<link rel="stylesheet" href="/~flucia/jquery-ui-1.10.2.custom/development-bundle/themes/ui-darkness/jquery.ui.all.css" />
	
		<script type="text/javascript" src="/~flucia/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="/~flucia/jquery-ui-1.10.2.custom/development-bundle/ui/jquery.ui.core.js"></script>
		<script type="text/javascript" src="/~flucia/jquery-ui-1.10.2.custom/development-bundle/ui/jquery.ui.widget.js"></script>
		<script type="text/javascript" src="/~flucia/jquery-ui-1.10.2.custom/development-bundle/ui/jquery.ui.mouse.js"></script>
        	<script type="text/javascript" src="/~flucia/jquery-ui-1.10.2.custom/development-bundle/ui/jquery.ui.slider.js"></script>
        	<script type="text/javascript">
        	
	  // Info du joueur
var carte1 = "def.png";
var carte2 = "def.png";
var ma_place = -1;

// Info de la table
var pot = 0.0;
var dealer = -1;
var placePB = -1;
var placeGB = -1;
var mise_min = 0.0;
var mise_suivre = 0.0;
var suivant = -1;
var board = 1;
var time = 20;
var interval;
var nb_joueurs = 0;
var nb_j_max = <?php echo $nb_j_max; ?>;

var joueurs = new Array();

var i;
for(i=0;i<10;i++){
	joueurs[i] = new Array("",0.0,0.0,"");
}

function fermetureClient(){
	$.ajax({
		url : "/~flucia/client/connection/fermeture_client.php",
		complete : function(xhr, result){
			if(result != "success") return;
			var response = xhr.responseText;
		}
	});
}

function connexionClient(){
	var data = {num_port : <?php echo $num_port; ?>};
	$.ajax({
		url : "/~flucia/client/connection/connection_table.php",
		data : data,
		complete : function(xhr,result){
			if(result != "success") return;
			var response = xhr.responseText;
		}
	});
}
             
function choixPlace(place){
	$('.select').empty();
	$('<input type="number" id="valeur_cave"></div>').appendTo('.select');
	$('<input type="button" value="Envoyer" onclick="javascript:ajaxChoixPlace('+place+')" />').appendTo('.select');
	$('<div id="cave"></div>').prependTo('.select').slider({
		min : mise_min,
		max : <?php echo $_SESSION["money"]; ?>,
		value : mise_min,
		step : 0.01,
		slide : function (event){
			$("#valeur_cave").html($(this).slider("value"));
		},
		stop : function (event){
			$("#valeur_cave").val($(this).slider("value"));
		}
	});
}
                     
function ajaxChoixPlace(place){
	var cave = $("#valeur_cave").val();
	var data = { place : place, cave : cave };
	$.ajax({
		url : "/~flucia/client/table/choix_place.php",
		data : data,
		complete : function(xhr, result){
			if(result != "success") return; 
			var response = xhr.responseText;
			ma_place = place;
			var i;
			for(i=0;i<10;i++){
				if($('#player'+i).html() == '<strong>Choisissez votre place.</strong>'){
					$('#player'+i).html('');
				}
			}
		}
	});		       
}	
	
function refresh(){
	$.ajax({
		url : "/~flucia/client/table/actualiser_joueurs.php",
		complete : function(xhr,result){
			if(result != "success") return; 
			var response = xhr.responseText;
			if(res != 'RAS'){ //Si il y a eu quelquechose de nouveau
				var res = response.split('&'); // Decoupe response selon les '&' et retourne le resultat dans un tableau res
				var i = 0; //Variable qui va nous servir de compteur dans le tableau res
				while(res[i]){ //Boucle pour extraire les requetes 
					if(res[i] == 'InfoT'){
						pot = parseFloat(res[i+1]);
						$('.pot').html(pot);
						dealer = parseInt(res[i+2]);
						placePB = parseInt(res[i+3]);
						placeGB = parseInt(res[i+4]);
						mise_min = parseFloat(res[i+5]);
						suivant = parseInt(res[i+6]);
					   
						i = i+7; // On deplace le curseur pour la boucle qui suit							    
					} 
					while(res[i] == 'NewJo'){
						place = res[i+1];
						joueurs[place][0] = res[i+2];
						joueurs[place][1] = parseFloat(res[i+3]); //Jetons
						joueurs[place][2] = parseFloat(res[i+4]); //Mise
						joueurs[place][3] = res[i+5];
						
						ajout_message_systeme(joueurs[place][0]+" vient de s'asseoir à la place n°"+place+".");

						if(joueurs[place][3] == 't'){
							joueurs[place][2] = 'COUCHER';
						}
						$('#player'+place).html('<table><tr><td id="player_status_bar"><span id="player_status"></span></td><td id="timer_box"><span id="timer"></span></td></tr><tr><td colspan="2"><strong><span id="pseudo">'+joueurs[place][0]+' : </span></strong><span id="jetons">'+joueurs[place][1]+'</span><img src="icone_money.png" heigth="12" width="12"/></td></tr><tr><td colspan="2"><span id="mise">'+joueurs[place][2]+'</span></td></tr></table>');
					   
						if( dealer == place){
							$('<img src="couronne.png" height="20" width="35" />').appendTo('#player'+dealer+' #player_status');
						}
						if( placePB == place){
							$('<img src="pb.png" height="20" width="30" />').appendTo('#player'+placePB+' #player_status');	    
						}
						if( placeGB == place){
							$('<img src="gb.png" height="20" width="30" />').appendTo('#player'+placeGB+' #player_status');
						}
						if( joueurs[place][0] == <?php echo '"'.$_SESSION["username"].'"'; ?> ){
							$('.select').empty();
							$('.select').html('<table><tr><td><input type="button" value="Parole" onclick="javascript:miser(0)"/></td><td><input type="button" value="Suivre" onclick="javascript:miser(1)"/></td><td><input type="button" value="Relancer" onclick="javascript:miser(2)"/></td><td><input type="button" value="Coucher" onclick="javascript:miser(-1)"/></td></tr><tr><td><a href="../menu_principal">Quitter la table</a></td></tr></table><div id="relance_div" style="display:none"><div id="slider"></div><div id="valeur_relance"></div></div>');
						}
						var j;
						nb_joueurs = nb_joueurs +1;
						if(place == ma_place || nb_joueurs >= nb_j_max){
						  for(j=0;j<10;j++){
						    if( joueurs[j][0] == "" ){
						      $("#player"+j).empty();
						    }
						  }
						}
						i= i+6;
					}
					if(res[i] == "Miser"){
				   	
						clearInterval(interval);
						$("#player"+suivant+" #timer").html("");
						time = 20;
					   
						var place = parseInt(res[i+1]);
						var mise = parseFloat(res[i+2]);							  
						suivant = parseInt(res[i+3]);						

						if(mise == 0){
						  ajout_message_systeme(joueurs[place][0]+" a dit parole.");
							$('#player'+place+' #mise').html('PAROLE');							      
						}
						else if(mise == -1){
						  ajout_message_systeme(joueurs[place][0]+" s'est couché.");
							$('#player'+place+' #mise').html('COUCHER');							      
						}
						else{
							joueurs[place][2] = Math.round((joueurs[place][2]+mise)*100)/100;
							joueurs[place][1] = Math.round((joueurs[place][1]-mise)*100)/100;

							if(joueurs[place][2] == mise_suivre){							  
							  ajout_message_systeme(joueurs[place][0]+" a suivi.");
							}
							else{							  
							  ajout_message_systeme(joueurs[place][0]+" a relancé de "+(joueurs[place][2]-mise_suivre)+".");
							}

							$('#player'+place+' #mise').html(joueurs[place][2]);
							$('#player'+place+' #jetons').html(joueurs[place][1]);
							pot = Math.round((pot + mise)*100)/100;
							$('.pot').html(pot);
							mise_suivre = joueurs[place][2];
						}   							    
						$("#player"+suivant+" #timer").html(time);
						interval = setInterval(function(interval){
							$("#player"+suivant+" #timer").html(time-1);
							time= time-1;
							if(time == 0){
								clearInterval(interval);
								$("#player"+suivant+" #timer").html("");
								time = 21;
							}
						},1000);
					   
						i = i+4;
					}
					if(res[i] == "Deale"){
						clearInterval(interval);
						$("#player"+suivant+" #timer").html("");
						time = 20;
					  	 
						$('#player'+dealer+' #player_status').html('');
						$('#player'+placeGB+' #player_status').html('');
						$('#player'+placePB+' #player_status').html('');
						dealer = res[i+1];
						placePB = res[i+2];
						placeGB = res[i+3];
						suivant = res[i+4];

						ajout_message_systeme("Let's go pour le poker :) !");
					   
						$('<img src="couronne.png" height="20" width="35" />').appendTo('#player'+dealer+' #player_status');
						$('<img src="pb.png" height="20" width="30" />').appendTo('#player'+placePB+' #player_status');				    
						$('<img src="gb.png" height="20" width="30" />').appendTo('#player'+placeGB+' #player_status');
						var j;
						for(j=0;j<10;j++){
							joueurs[j][2] = 0;							      
							$('#player'+j+' #mise').html(joueurs[j][2]);
						}
					   
						joueurs[placeGB][2] = mise_min;
						joueurs[placeGB][1] = (joueurs[placeGB][1] - mise_min);
						joueurs[placePB][2] = (mise_min/2.0);
						joueurs[placePB][1] = (joueurs[placePB][1] - mise_min/2.0);
						$('#player'+placePB+' #mise').html(joueurs[placePB][2]);
						$('#player'+placePB+' #jetons').html(joueurs[placePB][1]);
						$('#player'+placeGB+' #mise').html(joueurs[placeGB][2]);
						$('#player'+placeGB+' #jetons').html(joueurs[placeGB][1]);
								   
						$('#board1').attr('src','cards/def.png');
						$('#board2').attr('src','cards/def.png');
						$('#board3').attr('src','cards/def.png');
						$('#board4').attr('src','cards/def.png');
						$('#board5').attr('src','cards/def.png');
						board = 1;
									   
						pot = mise_min + (mise_min/2);
						$('.pot').html(pot);
					   
						mise_suivre = joueurs[placeGB][2];
					   
						$("#player"+placePB+" #timer").html(time);
						interval = setInterval(function(interval){
							$("#player"+placePB+" #timer").html(time-1);
							time= time-1;
							if(time == 0){
							  if(ma_place == suivant){
							    miser(0);							    
							  }
								clearInterval(interval);
								$("#player"+placePB+" #timer").html("");
								time = 21;
							}
						},1000);
				   
						i = i+5;							    
					}
					if(res[i] == "Carte"){
						//Si le joueur se reconnecte on recupere sa place
						if(ma_place == -1){
							ma_place = res[i+1];
							var j;
							//Si il re?oit ses cartes alors il est joueur et on d?sacive la possibilit? de s'assoir
							for(j=0;j<10;j++){
								if($('#player'+j).html() == '<strong>Choisissez votre place.</strong>'){
									$('#player'+j).html('');
								}
							}
						}
						carte1 = res[i+2];
						$("#carte1").attr('src','cards/'+carte1+'.png');
						carte2 = res[i+3];
						$("#carte2").attr('src','cards/'+carte2+'.png');
						i = i+4;
					}
					if(res[i] == "Milie"){								  
						clearInterval(interval);
						$("#player"+suivant+" #timer").html("");
						time = 20;				   
									  
						$('#board'+board).attr('src','cards/'+res[i+1]+'.png');
						board = board+1;
						suivant = res[i+2];
					   
						$("#player"+suivant+" #timer").html(time);
						interval = setInterval(function(interval){
							$("#player"+suivant+" #timer").html(time-1);
							time= time-1;
							if(time == 0){
								clearInterval(interval);
								$("#player"+suivant+" #timer").html("");
								time = 21;
							}
						},1000);
						i = i+2;
					}
					if(res[i] == "Gagna"){
						var place_gagnant = res[i+1];
						var new_jetons = parseFloat(res[i+2]);
									  
						ajout_message_systeme(joueurs[place_gagnant][0]+" a gagné "+(new_jetons - joueurs[place_gagnant][1])+".");

						joueurs[place_gagnant][1] = new_jetons;
						$('#player'+place_gagnant+' #jetons').html(joueurs[place_gagnant][1]);
						i = i+3;
					}
					if(res[i] == "Perdu"){
						var place_perdant = res[i+1];
						var new_jetons = parseFloat(res[i+2]);

						ajout_message_systeme(joueurs[place_perdant][0]+" a gagné "+(new_jetons - joueurs[place_perdant][1])+".");
	
						joueurs[place_perdant][1] = new_jetons;
						$('#player'+place_perdant+' #jetons').html(joueurs[place_perdant][1]);
						i = i+3;						  
					}
					if(res[i] == "JQuit"){
						var joueur_quit = res[i+1];
						
						ajout_message_systeme(joueurs[joueur_quit][0]+" est devenu spectateur.");

						$('#player'+joueur_quit).empty();
						joueurs[joueur_quit][0] = "";
						joueurs[joueur_quit][1] = 0.0;
						joueurs[joueur_quit][2] = 0.0;
						joueurs[joueur_quit][3] = "";
						if(ma_place == -1){	
						  var j;
						  for(j=0;j<10;j++){
						    if($("#player"+j).html() == ""){
						      $("#player"+j).html('<div id="select_seat" onclick="javascript:choixPlace('+j+')"><strong>Choisissez votre place</strong></div>');
						    }
						  }
						}
						else if(joueur_quit == ma_place ){
						  var j;
						  ma_place = -1;
						  for(j=0;j<10;j++){
						    if(joueurs[j][0] == ""){
						      $("#player"+j).html('<div id="select_seat" onclick="javascript:choixPlace('+j+')"><strong>Choisissez votre place</strong></div>');
						    }
						  }
						}						

						i = i+2;
					}
					else{
						i = i+1;
					}
				}
			}	
		}
	});
}

function miser(mise){
	$("#relance_div").slideUp();
	if(mise == 0){
		ajax_mise(mise);
	}
	else if(mise == 1){
		ajax_mise(Math.round((mise_suivre - joueurs[ma_place][2])*100)/100);
	}
	else if(mise == 2){
		var min;
		if((mise_suivre - joueurs[ma_place][2]) > mise_min){
			min = (mise_suivre - joueurs[ma_place][2]);
		}
		else{
			min = mise_min;
		}
		if($("#relance_div").css('display') == "none"){
			$('#valeur_relance').html(min);
			$("#slider").slider({
				min : min,
				max : joueurs[ma_place][1],
				value : min,
				step : 0.01,
				slide : function (event){
					$("#valeur_relance").html($(this).slider("value"));
				},
				stop : function (event){
					$("#valeur_relance").html($(this).slider("value"));
				}
			});
			$("#relance_div").slideDown();
		}
		else{
			ajax_mise($("#slider").slider("value"));
		}
	}
	else if(mise == -1){
		ajax_mise(mise);
	}
}

function ajax_mise(mise){
	mise = mise;
	var data = { miser : mise};
	$.ajax({
		url : "/~flucia/client/table/miser.php",
		data : data,
		complete : function(xhr,result){
			if(result != "success") return; 
			var response = xhr.responseText;
		}
	});
}

function ajout_message_systeme(message){
  $('<span class="message_systeme"><strong>[Systeme]</strong></span><span class="message_chat_systeme"> : '+message+'<br/></span>').appendTo('#chat_box');
  var scroll = $("#chat_box").scrollTop();
  $("#chat_box").scrollTop(scroll +20);
}

        	</script>

	</head>
	<body onload="connexionClient()" onunload="fermetureClient();">

		<script type="text/javascript">
		<!--
			$(document).ready(function(){					   
				setInterval(function(){
					refresh();
				},300);
			});
		//-->
		</script>

		<div id="table_page">
			<div>
				<table>
					<tr>
						<td colspan="3">
							<table class="table">
								<tr>
									<td></td>
									<?php
										for($i=0;$i<4;$i++){
										  player_block($i,$nb_j_max);
										}
									?>
									<td></td>
								</tr>
								<tr>
									   
									<?php player_block(9,$nb_j_max);?>
									
									<td><div class="pot_div"><span><?php echo $nom_table; ?><br/>Pot</span><br/><span class="pot"></span></div></td>
									<td colspan="3" class="board">
										<table id="board">
											<tr>												   
												<td>
													<img src="cards/carte.png" height="90" width="60"/>
												</td>
												<td>
													<img id="board1" src="cards/def.png" height="90" width="60"/>
												</td>
												<td>
													<img id="board2" src="cards/def.png" height="90" width="60"/>
												</td>
												<td>
													<img id="board3" src="cards/def.png" height="90" width="60"/>
												</td>
												<td>
													<img id="board4" src="cards/def.png" height="90" width="60"/>
												</td>
												<td>
													<img id="board5" src="cards/def.png" height="90" width="60"/>
												</td>
											</tr>
										</table>
									</td>
									
									<?php player_block(4,$nb_j_max); ?>
									
								</tr>	
								<tr>	
									<td></td>
									<?php
										for($i=8;$i>4;$i--){
											player_block($i,$nb_j_max);
										}
									?>	
									<td></td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td>
							<div class="chat">
                                                            <div id="chat_box"></div>
							    <input type="text" size="36" />
							</div>
						</td>
						<td>
							<div class="cards">
								<div id="cards_box">
									<img id="carte1" src="cards/def.png" height="130" width="90"/>
								</div>
								<div style="display:inline-block">
									<img id="carte2" src="cards/def.png" height="130" width="90"/>
								</div>
							</div>
						</td>
						<td>
							<div class="select">
										   
							</div>				
						</td>			
					</tr>						
				</table>		
			</div>		
		</div>
	</body>
</html>
