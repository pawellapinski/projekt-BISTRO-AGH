<?php

	session_start();
	
	if ((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
	{
		header('Location: index.php');
		exit();
	}

	require_once "connect.php";

	$connection = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if ($connection->connect_errno!=0)
	{
		echo "Error: ".$connection->connect_errno;
	}
	else
	{
		$login = $_POST['login'];
		$haslo = $_POST['haslo'];
		
		$login = htmlentities($login, ENT_QUOTES, "UTF-8");
	
		if ($rezult = @$connection->query(
		sprintf("SELECT * FROM uzytkownicy WHERE user='%s'",
		mysqli_real_escape_string($connection,$login))))
		{
			$ilu_uzytkownikow = $rezult->num_rows;
			if($ilu_uzytkownikow>0)
			{
				$line = $rezult->fetch_assoc();
				
				if (password_verify($haslo, $line['pass']))
				{
					$_SESSION['zalogowany'] = true;
					$_SESSION['user'] = $line['user'];
					$_SESSION['id'] = $line['id'];
					
					
					
					unset($_SESSION['blad']);
					$rezult->free_result();
					header('Location: shop.php');
				}
				else 
				{
					$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
					header('Location: index.php');
				}
				
			} else {
				
				$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
				header('Location: index.php');
				
			}
			
		}
		
		$connection->close();
	}
	
?>