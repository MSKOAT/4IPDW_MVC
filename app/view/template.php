<?php

function html_head($menu_a=[])
{
    $debug = true;
	ob_start();
	?>
	<html lang="fr">
	<head>
		<title>Press MVC</title>
        <link rel="stylesheet" href="bootstrap.css" />  <!-- lib externe -->
        <link rel="stylesheet" href="asset/css/main.css" /> <!-- lib interne / perso -->
	</head>
	<body>
    <h1>
        Site Test en MVC
    </h1>
	<?php
    echo html_menu($menu_a);

	if($debug)
	{
        var_dump($_COOKIE);
		// var_dump($_SESSION);
        var_dump($_GET);
        //        var_dump($_POST);
	}
	return ob_get_clean();
}

function html_foot()
{
	ob_start();
	?>
        <hr />
	</body>
	</html>
	<?php
	return ob_get_clean();
}

