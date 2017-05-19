<?php
	date_default_timezone_set (Europe/Amsterdam);

	// if not specific ip then normal webpage otherwise admin page for myself

	header('Location: ./pages/login.php');
	exit;
?>