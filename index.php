<?php include_once 'lock.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<title>Funcionários System - Home</title>
</head>
<body class="container-fluid">

	<h1>Funcionários System - Home</h1>

	<h3>Bem-vindo(a), <?php echo $_SESSION['username'];?>!</h3>

	<p><?php include_once 'menu.php'; ?></p>

	<?php 
	include_once 'func.php';

	verificar_msg();
	exibir_funcionarios();


	?>
	

</body>
</html>