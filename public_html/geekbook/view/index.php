<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head>
        <title>Reseau Social</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link rel="stylesheet" type="text/css" href="style.css" />
		<link rel="stylesheet" href="/~flucia/geekbook/jquery-ui-1.10.2.custom/development-bundle/themes/flick/jquery.ui.all.css" />
	
		<script type="text/javascript" src="/~flucia/jquery-1.9.1.min.js"></script>
		<script src="/~flucia/geekbook/jquery-ui-1.10.2.custom/development-bundle/ui/jquery.ui.core.js"></script>
		<script src="/~flucia/geekbook/jquery-ui-1.10.2.custom/development-bundle/ui/jquery.ui.widget.js"></script>
		<script src="/~flucia/geekbook/jquery-ui-1.10.2.custom/development-bundle/ui/jquery.ui.mouse.js"></script>
		<script src="/~flucia/geekbook/jquery-ui-1.10.2.custom/development-bundle/ui/jquery.ui.tabs.js"></script>
		
		<script type="text/javascript">
		<!--
		
		function print_comments(){
			
		}
		
		function nl2br (str, is_xhtml) {
		  // http://kevin.vanzonneveld.net
		  // +   original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
		  // +   improved by: Philip Peterson
		  // +   improved by: Onno Marsman
		  // +   improved by: Atli ��r
		  // +   bugfixed by: Onno Marsman
		  // +      input by: Brett Zamir (http://brett-zamir.me)
		  // +   bugfixed by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
		  // +   improved by: Brett Zamir (http://brett-zamir.me)
		  // +   improved by: Maximusya
		  // *     example 1: nl2br('Kevin\nvan\nZonneveld');
		  // *     returns 1: 'Kevin<br />\nvan<br />\nZonneveld'
		  // *     example 2: nl2br("\nOne\nTwo\n\nThree\n", false);
		  // *     returns 2: '<br>\nOne<br>\nTwo<br>\n<br>\nThree<br>\n'
		  // *     example 3: nl2br("\nOne\nTwo\n\nThree\n", true);
		  // *     returns 3: '<br />\nOne<br />\nTwo<br />\n<br />\nThree<br />\n'
		  var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br ' + '/>' : '<br>'; // Adjust comment to avoid issue on phpjs.org display

		  return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
		}

		
		
		function nouvellePublication(){
			var publication = $("#publication").val();
			if(publication != ""){
			  var data = { post : publication };
			  $.ajax({
			    url : "/~flucia/geekbook/ajax/nouvelle_publication.php",
				data : data,
				complete : function(xhr, result){
				if(result != "success") return; 
				var response = xhr.responseText;
				$("#publication").val("");
				$('<div></div>').html(response).hide().prependTo("#mes_publications").slideDown(1000);
			      }
			    });
			}
		}	
		
		function ouvrirCommentaire(obj){
			$(obj).next(".comments").toggle();
		}
		
		//-->
		</script>

		
    </head>
    <body>
		<script>
		<!--
		
			$(document).ready(function(){
				$("#tabs").tabs();
				$("#publication").val("");
				$(".comment_post").val("");
				$(".comment_post").bind('keydown',function(event){
					if(event.keyCode == 13){
						var commentaire = $(this).val();
						var id_post = $(this).parents("div").attr('id');
						if(commentaire != ""){
						  var data = { comment : commentaire, id_post : id_post};
							$.ajax({
								url: "/~flucia/geekbook/ajax/nouveau_commentaire.php",
								data : data,
								complete : function(xhr, result){
									if(result != "success") return; 
									var response = xhr.responseText;
									$(".comment_post").val("");
									$("<tr></tr>").html(response).hide().insertBefore("#comment_input").slideDown(1000);
									
							    }
							  });
						}
					}
				});
				
			});				
		
		//-->
		</script>
		
		<?php
			require_once('view/nav.php');
		?>
		
		<div id="page">
			<table id="wrapper">
				<tr>
					<td id="info_perso">photo</td>
					<td rowspan="3" id="mur"> 
						<div id="post_box">
						   <div id="tabs">
								<ul>
									<li><a href="#tab1"><strong>Status</strong></a></li>
									<li><a href="#tab2"><strong>Photo</strong></a></li>	
									<li><a href="#tab3"><strong>Lieu</strong></a></li>
									<li><a href="#tab4"><strong>Evènement</strong></a></li>
								</ul>
								<div id="tab1">
									<table id="post_border" >
										<tr>
											<td>
												<textarea id="publication" cols="65" rows="4" maxlength="255" placeholder="Exprimez-vous">

												</textarea>
											</td>
										</tr>
										<tr>
											<td id="submit_post">
												<input type="button" value="Publier" onclick="javascript:nouvellePublication()"/>
											</td>
										</tr>
									</table>
								</div>
								<div id="tab2">
									<table id="post_border">
										<tr>
											<td>
												<form enctype="multipart/form-data" method="post" action="controller/upload_picture.php" id="picture_post" >
													<input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
		                                                                                        <input class="picture_description" name="picture_title_input" type="text" size="65" value="Titre" onfocus="javascript:if(this.value=='Titre')this.value='';" onblur="javascript:if(this.value=='')this.value='Titre';" />
		                                                                                        <textarea class="picture_description" name="picture_description" cols="65" rows="2" maxlength="255" placeholder="Description"></textarea>
													<input id="img_input_title" name="uploaded_picture" type="file" size="40"/> (2Mo max.)
												</form>
											</td>
										</tr>
										<tr>
											<td id="submit_post">
												<input type="button" value="Publier" onclick="javascript:$('#picture_post').submit()"/>
											</td>
										</tr>
									</table>
								</div>
								<div id="tab3">onglet 3</div>
								<div id="tab4">onglet 4</div>
							</div>
						</div>

						<div id="mes_publications">
							<?php
								print_posts();
							?>
						</div>
					
					</td>
				</tr>

				<tr>
					<td id="amis">amis</td>
				</tr>

				<tr>
					<td></td>
				</tr>
			</table>

		</div>

		<?php
			require_once('view/chat_nav.php'); 
		?>
		
	</body>
</html>