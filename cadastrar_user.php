<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<title>Funcionários System - Cadastro de Usuário</title>
</head>
<body class="container-fluid">

	<h1>Funcionários System - Novo Usuário</h1>

	<h4>Já possi cadastro? Clique <a href="login.php">aqui</a> para logar</h4>

	<?php  
	if(isset($_POST['cadastrar']))
	{
		include_once 'func.php';
		verificar_cad_user();
	}

	?>
	
	<p><h3>Novo Usuário:</h3></p>

	<form action="cadastrar_user.php" method="post">
		<p>
			<label>Username:</label><br>
			<input type="text" name="username" maxlength="100">
		</p>
		<p>
			<label>Password:</label><br>
			<input type="text" name="password" maxlength="50">
		</p>
		<p>
			<label>E-mail:</label><br>
			<input type="email" name="email" maxlength="50">
		</p>

		<button type="submit" name="cadastrar" class="btn btn-info">Cadastrar</button>
	</form>
	

</body>
</html>