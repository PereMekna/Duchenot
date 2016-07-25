<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Chillboard - Taverne de Duchenot</title>

    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="./style-admin.css" rel="stylesheet">
</head>
<body>
	<?php include('navbar.php'); ?>
	<?php if (!isset($_SESSION["login"]) && (!isset($_GET['a']) || !(isset($_GET['a']) && $_GET['a'] == 'register'))) {
			include('login.php');
		 }
		if (isset($_GET['a']) && $_GET['a'] == 'register') {
			include('register.php');
		}
		if (isset($_SESSION['login']) && ((isset($_GET['a']) && $_GET['a'] == 'dashboard') || !isset($_GET['a']))) {
			include('dashboard.php');
		}
		if (isset($_SESSION['login']) && (isset($_GET['a']) && $_GET['a'] == 'info')) {
			include('information.php');
		}
		if (isset($_SESSION['login']) && (isset($_GET['a']) && $_GET['a'] == 'prog')) {
			include('prog.php');
		}
		if (isset($_SESSION['login']) && (isset($_GET['a']) && $_GET['a'] == 'logout')) {
			session_destroy();
			header('Location: index.php');
		}
			?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

	<!-- Plugin JavaScript -->
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
	<script type="text/javascript">
		$(document).on('click', '#img_show', function () {
			$('#img_area').html('<img style="height: 150px;"src="'+$('#img_url').val()+'" />');
		});
	</script>
</body>
</html>