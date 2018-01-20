<?php

	session_start();

	if (isset($_POST['email']))
	{
		//Udana walidacja? Załóżmy, że tak!
		$wszystko_OK=true;

		//Sprawdź poprawność nickname'a
		$nick = $_POST['nick'];

		//Sprawdzenie długości nicka
		if ((strlen($nick)<3) || (strlen($nick)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_nick']="Nick musi posiadać od 3 do 20 znaków!";
		}

		if (ctype_alnum($nick)==false)
		{
			$wszystko_OK=false;
			$_SESSION['e_nick']="Nick może składać się tylko z liter i cyfr (bez polskich znaków)";
		}
		//Sprawdzenie poprawności imienia i nazwiska

		$surname = $_POST['surname'];

		if (!preg_match("/^[\pL \'-]*$/u",$surname))

		{
			$wszystko_OK=false;
			$_SESSION['e_surname']="Nazwisko zawiera niedozwolone znaki!";

		}

		if (empty($_POST["surname"]))
		{
			$wszystko_OK=false;
			$_SESSION['e_surname']="Uzupełnij imię i nazwisko!";

		}

		//Sprawdzenie poprawności numeru telefonu

		$phone = $_POST['phone'];

		if (!is_numeric($phone))
		{
			$wszystko_OK=false;
			$_SESSION['e_phone']="Nieprawidłowy numer!";

		}

		//Sprawdzenie poprawności adresu

		$adress = $_POST['adress'];

		if (!preg_match("/^[0-9\pL _.-]*$/u",$adress))
		{
			$wszystko_OK=false;
			$_SESSION['e_adress']="Nieprawidłowy adres!";

		}

		if (empty($_POST["adress"]))
		{
			$wszystko_OK=false;
			$_SESSION['e_adress']="Uzupełnij adres!";

		}

		//Sprawdzenie poprawności numeru domu

		$home = $_POST['home'];

		if (!is_numeric($home))
		{
			$wszystko_OK=false;
			$_SESSION['e_home']="Niepoprawny numer!";

		}

		//Sprawdzenie poprawności numeru mieszkania
		
		$apartments = $_POST['apartments'];

		if (!is_numeric($apartments))
		{
			$wszystko_OK=false;
			$_SESSION['e_apartments']="Niepoprawny numer!";

		}

		// Sprawdź poprawność adresu email
		$email = $_POST['email'];
		$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);

		if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
		{
			$wszystko_OK=false;
			$_SESSION['e_email']="Podaj poprawny adres e-mail!";
		}

		//Sprawdź poprawność hasła
		$haslo1 = $_POST['haslo1'];
		$haslo2 = $_POST['haslo2'];

		if ((strlen($haslo1)<8) || (strlen($haslo1)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_haslo']="Hasło musi posiadać od 8 do 20 znaków!";
		}

		if ($haslo1!=$haslo2)
		{
			$wszystko_OK=false;
			$_SESSION['e_haslo']="Podane hasła nie są identyczne!";
		}

		$haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);

		//Czy zaakceptowano regulamin?
		if (!isset($_POST['regulamin']))
		{
			$wszystko_OK=false;
			$_SESSION['e_regulamin']="Potwierdź akceptację regulaminu!";
		}

		//Sprawdzanie BOTaw
		$sekret = "6Lcz2hoUAAAAAJW0qnH39-DDcoNUs52jexjaRoSX";

		$sprawdz = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$sekret.'&response='.$_POST['g-recaptcha-response']);

		$odpowiedz = json_decode($sprawdz);

		if ($odpowiedz->success==false)
		{
			$wszystko_OK=false;
			$_SESSION['e_bot']="Potwierdź, że nie jesteś botem!";
		}

		//Zapamiętaj wprowadzone dane
		$_SESSION['fr_nick'] = $nick;
		$_SESSION['fr_surname'] = $surname;
		$_SESSION['fr_email'] = $email;
		$_SESSION['fr_haslo1'] = $haslo1;
		$_SESSION['fr_haslo2'] = $haslo2;
		if (isset($_POST['regulamin'])) $_SESSION['fr_regulamin'] = true;

		require_once "connect.php";
		mysqli_report(MYSQLI_REPORT_STRICT);

		try
		{
			$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
			if ($polaczenie->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{
				//Czy email już istnieje?
				$rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE email='$email'");

				if (!$rezultat) throw new Exception($polaczenie->error);

				$ile_takich_maili = $rezultat->num_rows;
				if($ile_takich_maili>0)
				{
					$wszystko_OK=false;
					$_SESSION['e_email']="Istnieje już konto przypisane do tego adresu e-mail!";
				}

				//Czy nick jest już zarezerwowany?
				$rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE user='$nick'");

				if (!$rezultat) throw new Exception($polaczenie->error);

				$ile_takich_nickow = $rezultat->num_rows;
				if($ile_takich_nickow>0)
				{
					$wszystko_OK=false;
					$_SESSION['e_nick']="Istnieje już gracz o takim nicku! Wybierz inny.";
				}

				if ($wszystko_OK==true)
				{
					//jeśli wszystkie testy zaliczone, dodajemy klienta do bazy

					if ($polaczenie->query("INSERT INTO uzytkownicy VALUES (NULL, '$nick', '$haslo_hash', '$email', '$surname', '$phone','$adress', '$home','$apartments')"))
					{
						$_SESSION['udanarejestracja']=true;
						header('Location: success.php');
					}
					else
					{
						throw new Exception($polaczenie->error);
					}

				}

				$polaczenie->close();
			}

		}
		catch(Exception $e)
		{
			echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
			echo '<br />Informacja developerska: '.$e;
		}

	}


?>

<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bistro AGH - załóż darmowe konto!</title>


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Passion+One" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet" type="text/css">
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<!-- Ikonki bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    

    <style type="text/css">

body, html{
    height: 100%;
 	background-repeat: no-repeat;
 	background: url("food.png");
 	font-family: 'Oxygen', sans-serif;
}

.main{
 	margin-top: 70px;
}

h1.title { 
	font-size: 50px;
	font-family: 'Passion One', cursive; 
	font-weight: 400; 
}

hr{
	width: 10%;
	color: #fff;
}

.form-group{
	margin-bottom: 15px;
}

label{
	margin-bottom: 15px;
}

input,
input::-webkit-input-placeholder {
    font-size: 11px;
    padding-top: 3px;
}

.main-login{
 	background-color: #fff;
    /* shadows and rounded borders */
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;
    border-radius: 2px;
    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);

}

.main-center{
 	margin-top: 30px;
 	margin: 0 auto;
 	max-width: 330px;
    padding: 40px 40px;

}

.login-button{
	margin-top: 5px;
}

.login-register{
	font-size: 11px;
	text-align: center;
}
.error
		{
			color:red;
			margin-top: 10px;
			margin-bottom: 10px;
		}

    </style>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        window.alert = function(){};
        var defaultCSS = document.getElementById('bootstrap-css');
        function changeCSS(css){
            if(css) $('head > link').filter(':first').replaceWith('<link rel="stylesheet" href="'+ css +'" type="text/css" />'); 
            else $('head > link').filter(':first').replaceWith(defaultCSS); 
        }
        $( document ).ready(function() {
          var iframe_height = parseInt($('html').height()); 
          window.parent.postMessage( iframe_height, 'https://bootsnipp.com');
        });
    </script>
</head>
<body style="">

		<div class="container">
			<div class="row main">
				<div class="panel-heading">
	               <div class="panel-title text-center">
	               <span class="glyphicon glyphicon-cutlery" aria-hidden="true" style="font-size: 45px;">
	               		<h1 class="title">Bistro AGH</h1>
	               		</span><p>Formularz Rejestracyjny<p>
	               		<hr>
	               	</div>
	            </div> 
				<div class="main-login main-center">
					<form class="form-horizontal" method="post" action="#">
						
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Twój Nick:</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
	<input type="text" class="form-control" name="nick"  id="nick" placeholder="Wpisz swój nick" value="<?php
			if (isset($_SESSION['fr_nick']))
			{
				echo $_SESSION['fr_nick'];
				unset($_SESSION['fr_nick']);
			}
		?>">
		</div>
	
		<?php
			if (isset($_SESSION['e_nick']))
			{
				echo '<div class="error">'.$_SESSION['e_nick'].'</div>';
				unset($_SESSION['e_nick']);
			}
				?>

		
							</div>
						</div>

						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Imię i Nazwisko:</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
			<input type="text" class="form-control" name="surname" id="surname" placeholder="Podaj Imię i Nazwisko" value="<?php
			if (isset($_SESSION['fr_surname']))
			{
				echo $_SESSION['fr_surname'];
				unset($_SESSION['fr_surname']);
			}
		?>">
								</div>
			<?php
			if (isset($_SESSION['e_surname']))
			{
				echo '<div class="error">'.$_SESSION['e_surname'].'</div>';
				unset($_SESSION['e_surname']);
			}
				?>


							</div>
						</div>

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Numer Telefonu:</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i></span>
		<input type="text" class="form-control" name="phone" id="phone" placeholder="Podaj numer telefonu" value="<?php
			if (isset($_SESSION['fr_phone']))
			{
				echo $_SESSION['fr_phone'];
				unset($_SESSION['fr_phone']);
			}
		?>">
								</div>
			<?php
			if (isset($_SESSION['e_phone']))
			{
				echo '<div class="error">'.$_SESSION['e_phone'].'</div>';
				unset($_SESSION['e_phone']);
			}
		?>
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Adres (ulica lub osiedle):</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-home" aria-hidden="true"></i></span>
	<input type="text" class="form-control" name="adress" id="adress" placeholder="Podaj swój adres" value="<?php
			if (isset($_SESSION['fr_adress']))
			{
				echo $_SESSION['fr_adress'];
				unset($_SESSION['fr_adress']);
			}
		?>" >
								</div>
			<?php
			if (isset($_SESSION['e_adress']))
			{
				echo '<div class="error">'.$_SESSION['e_adress'].'</div>';
				unset($_SESSION['e_adress']);
			}
		?>
							</div>
						</div>

						<div class="form-group">
							<label for="number" class="cols-sm-2 control-label">Numer domu:</label>
							<div class="cols-sm-10">
								<div class="input-group">
				                 <span class="input-group-addon"><i class="glyphicon glyphicon-home" aria-hidden="true"></i></span>
		<input type="text" class="form-control" name="home" id="home" placeholder="Podaj numer domu" value="<?php
			if (isset($_SESSION['fr_home']))
			{
				echo $_SESSION['fr_home'];
				unset($_SESSION['fr_home']);
			}
		?>" >
								</div>

			<?php
			if (isset($_SESSION['e_home']))
			{
				echo '<div class="error">'.$_SESSION['e_home'].'</div>';
				unset($_SESSION['e_home']);
			}
		?>
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Numer mieszkania:</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-home" aria-hidden="true"></i></span>
		<input type="" class="form-control" name="apartments" id="apartments" placeholder="Podaj numer mieszkania" value="<?php
			if (isset($_SESSION['fr_apartments']))
			{
				echo $_SESSION['fr_apartments'];
				unset($_SESSION['fr_apartments']);
			}
		?>">
								</div>
		<?php
			if (isset($_SESSION['e_apartments']))
			{
				echo '<div class="error">'.$_SESSION['e_apartments'].'</div>';
				unset($_SESSION['e_apartments']);
			}
		?>
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">E-mail :</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
	<input type="text" class="form-control" name="email" id="email" placeholder="Podaj swój E-mail" value="<?php
			if (isset($_SESSION['fr_email']))
			{
				echo $_SESSION['fr_email'];
				unset($_SESSION['fr_email']);
			}
		?>">
								</div>

	<?php
			if (isset($_SESSION['e_email']))
			{
				echo '<div class="error">'.$_SESSION['e_email'].'</div>';
				unset($_SESSION['e_email']);
			}
		?>
							</div>
						</div>

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Twoje hasło:</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
	<input type="password" class="form-control" name="haslo1" id="haslo1" placeholder="Wpisz swoje hasło" value="<?php
			if (isset($_SESSION['fr_haslo1']))
			{
				echo $_SESSION['fr_haslo1'];
				unset($_SESSION['fr_haslo1']);
			}
		?>">
								</div>
<?php
			if (isset($_SESSION['e_haslo']))
			{
				echo '<div class="error">'.$_SESSION['e_haslo'].'</div>';
				unset($_SESSION['e_haslo']);
			}
		?>
				</div>
						</div>

						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Powtórz hasło:</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
		<input type="password" class="form-control" name="haslo2" id="haslo2" placeholder="Powtórz swoje hasło" value="<?php
			if (isset($_SESSION['fr_haslo2']))
			{
				echo $_SESSION['fr_haslo2'];
				unset($_SESSION['fr_haslo2']);
			}
		?>">
								</div>
		
							</div>
						</div>
						<label>
			<input type="checkbox" name="regulamin" <?php
			if (isset($_SESSION['fr_regulamin']))
			{
				echo "checked";
				unset($_SESSION['fr_regulamin']);
			}
				?>/> Akceptuję regulamin
		</label>
		<?php
			if (isset($_SESSION['e_regulamin']))
			{
				echo '<div class="error">'.$_SESSION['e_regulamin'].'</div>';
				unset($_SESSION['e_regulamin']);
			}
		?>

		<div class="g-recaptcha" data-theme="light" data-sitekey="6Lcz2hoUAAAAANeXt02MlO1sXKy3fVVgSHc2-2uq" style="transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>

		<?php
			if (isset($_SESSION['e_bot']))
			{
				echo '<div class="error">'.$_SESSION['e_bot'].'</div>';
				unset($_SESSION['e_bot']);
			}
		?>
						<div class="form-group ">
							<button type="submit" class="btn btn-primary btn-lg btn-block login-button" value="Zarejestruj się">Rejestracja</button>
						</div>
						<div class="login-register">
				            <a href="index.php">Powrót do strony głównej</a>
				         </div>
					</form>
				</div>
			</div>
		</div>

		<script type="text/javascript" src="assets/js/bootstrap.js"></script>
	

	<script type="text/javascript">
	
	</script>


</body>
</html>