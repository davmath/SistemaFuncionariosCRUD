<?php session_start(); // iniciar sessão
if(empty($_SESSION)) // se não há variável de sessão registrada
{
	header('location:login.php'); // redirecinar para pag de login
}
?>
