<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Major League Mining</title>
<link rel="stylesheet" type="text/css" href="<?php echo URL::to_asset("css/style.css"); ?>" />
<link rel="shortcut icon" href="{{ URL::to_asset("images/static/favicon.ico") }}" />
</head>
<body>
	<div id="actionbox">
	<a href="/"><img src="<?php echo URL::to_asset("images/static/logo.png") ?>" /></a>
			<hr>
			<h1>403: Access Forbidden</h1>
			<hr>
			<p>
				If you think you do have access, please <?php echo HTML::link('/login', 'login'); ?> (you will be redirected here)
				<br>
				If you have no clue how you got here, go back to the <?php echo HTML::link('/', 'home page'); ?>
			</p>
            <br>
	</div>
</body>
</html>