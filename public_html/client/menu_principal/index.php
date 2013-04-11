<?php session_start(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    	<head>
	      	  <title>Poker en ligne</title>
      		  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link rel="stylesheet" href="/~flucia/style.css" />
		<link rel="stylesheet" href="/~flucia/jquery-ui-1.10.2.custom/development-bundle/themes/ui-darkness/jquery.ui.all.css" />
	
		<script type="text/javascript" src="/~flucia/jquery-1.9.1.min.js"></script>
		<script src="/~flucia/jquery-ui-1.10.2.custom/development-bundle/ui/jquery.ui.core.js"></script>
		<script src="/~flucia/jquery-ui-1.10.2.custom/development-bundle/ui/jquery.ui.widget.js"></script>
		<script src="/~flucia/jquery-ui-1.10.2.custom/development-bundle/ui/jquery.ui.mouse.js"></script>
		<script src="/~flucia/jquery-ui-1.10.2.custom/development-bundle/ui/jquery.ui.slider.js"></script>

		<script type="text/javascript">
		<!--
                        function rejoindreTable(num_port,nb_j_max){
                             $(location).attr('href',"/~flucia/client/table/index.php?num_port="+num_port+"&nb_j_max="+nb_j_max);	    
			}
		//-->
		</script>
	</head>
    	<body>
		<script type="text/javascript">
		<!--
			$(document).ready(function(){
				var tr = $("#tables_list").find("tr");
				$(tr).each(function(index){
					if(index % 2 == 0){
						$(tr).eq(index).css("background-color","rgb(30,35,35)");
					}
				});
			});
		//-->
		</script>
        	<div class="page">
			<div class="wrapper">
				<div id="menu_principal">
		                        <div style="float:right;margin-top:25px;margin-right:25px;"><input type="button" value="Rafraichir" /></div>
					<ul id="menu_bar">
						<li class="menu_pseudo"><?php echo $_SESSION["username"] ?></li>
						<li><?php echo $_SESSION["money"] ?><Li>
					</ul>
					<div id="tables_list">
						<table>
							<tr>
								<th>Nom Table</th>
								<th>Nombre de joueurs</th>
								<th>Nombre de joueurs maximum</th>
								<th>Mise minimum</th>
								<th></th>
							</tr>
							<?php echo $_SESSION["tables"]; ?>
						</table>
					</div>
				</div>
			</div>
        	</div>
    	</body>
</html>