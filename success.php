<?php

	session_start();
	
	if (!isset($_SESSION['udanarejestracja']))
	{
		header('Location: index.php');
		exit();
	}
	else
	{
		unset($_SESSION['udanarejestracja']);
	}
	
	//Usuwanie zmiennych pamiętających wartości wpisane do formularza
	if (isset($_SESSION['fr_nick'])) unset($_SESSION['fr_nick']);
	if (isset($_SESSION['fr_surname'])) unset($_SESSION['fr_surname']);
	if (isset($_SESSION['fr_phone'])) unset($_SESSION['fr_phone']);
	if (isset($_SESSION['fr_adress'])) unset($_SESSION['fr_adress']);
	if (isset($_SESSION['fr_home'])) unset($_SESSION['fr_home']);
	if (isset($_SESSION['fr_apartments'])) unset($_SESSION['fr_apartments']);
	if (isset($_SESSION['fr_email'])) unset($_SESSION['fr_email']);
	if (isset($_SESSION['fr_haslo1'])) unset($_SESSION['fr_haslo1']);
	if (isset($_SESSION['fr_haslo2'])) unset($_SESSION['fr_haslo2']);
	if (isset($_SESSION['fr_regulamin'])) unset($_SESSION['fr_regulamin']);
	
	//Usuwanie błędów rejestracji
	if (isset($_SESSION['e_nick'])) unset($_SESSION['e_nick']);
	if (isset($_SESSION['e_surname'])) unset($_SESSION['e_surname']);
	if (isset($_SESSION['e_phone'])) unset($_SESSION['e_phone']);
	if (isset($_SESSION['e_adress'])) unset($_SESSION['e_adress']);
	if (isset($_SESSION['e_home'])) unset($_SESSION['e_home']);
	if (isset($_SESSION['e_apartments'])) unset($_SESSION['e_apartments']);
	if (isset($_SESSION['e_email'])) unset($_SESSION['e_email']);
	if (isset($_SESSION['e_haslo'])) unset($_SESSION['e_haslo']);
	if (isset($_SESSION['e_regulamin'])) unset($_SESSION['e_regulamin']);
	if (isset($_SESSION['e_bot'])) unset($_SESSION['e_bot']);
	
?>

<!DOCTYPE HTML>
<html lang="pl_PL">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bistro AGH dziękujemy za rejestrację</title>

     <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
   	<link href="https://fonts.googleapis.com/css?family=Passion+One" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet" type="text/css">
   	<link href="style.css" rel="stylesheet">
 <!-- Linki do ikonek social-media -->
   <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet"/>
   <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"/>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">

 body {
   background: url("food.png");
   font-family: 'Oxygen', sans-serif;

    }
    h1.title { 
	font-size: 50px;
	font-family: 'Passion One', cursive; 
	font-weight: 400; 
}

    </style>
</head>

<body>

	<div class="row text-center">
		<div class="col-sm-6 col-sm-offset-3">
			<div class="panel-heading">
	               <div class="panel-title text-center">
	               <span class="glyphicon glyphicon-cutlery" aria-hidden="true" style="font-size: 45px;">
	               		<h1 class="title">Bistro AGH</h1>

	               		</span>
	               		</div>
	               		</div>


			<div class="alert alert-success" role="alert">SUKCES !!! Rejestracja przebiegła pomyślnie. Dziękujemy za rejestrację w serwisie! Teraz możesz już zalogować się na swoje
  					<a href="index.php" class="alert-link"> <b> konto. </b></a>
				
				</div>
	<br /><br />
	
	<a href="index.php" class="btn btn-info" role="button"><b>Powrót do STRONY GŁÓWNEJ</b></a>
	<br /><br />
	
	</div>
</div>



	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>