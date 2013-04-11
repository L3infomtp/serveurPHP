<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head>
        <title>Poker en ligne</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link rel="stylesheet" href="/~flucia/style.css" />
		<script type="text/javascript" src="/~flucia/jquery-1.9.1.min.js"></script>
		
    </head>
    <body>
		<?php
		require_once('view/nav.php');
		require_once('view/header.php');
		?>
		
		<div class="page">
			<div class="wrapper">
				<p style="text-align:center;"><img src="/news.jpg"/></p>
				<?php print_news(); ?>
			</div>
		</div>
		
		<?php
		   require_once('view/footer.php'); 
		?>
		
	</body>		
</html>