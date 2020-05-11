<!DOCTYPE html>
<html>
<head>
	<title>Constancias</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="css/navbar.css">
	<link rel="stylesheet" href="css/fixed_modal.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap"
    rel="stylesheet"/>
</head>
<body>
	<?php
		session_start();
		if(!isset($_SESSION['id_user'])){
			include_once 'templates/login.html';
		}else{
			include_once 'templates/dashboard.html';
		}
		include_once 'modals/addNewUser.html';
	?>
    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/login.js"></script>
    <script src="js/theme.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>