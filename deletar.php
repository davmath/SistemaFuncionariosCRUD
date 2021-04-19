<?php  
if(empty($_GET['id_funcionario'])) 
{ 
	header('location:index.php?msg=invalidid');
} 
else 
{
	$id_funcionario = $_GET['id_funcionario'];
	// incluir arquivo com a função para deletar o funcionário:
	include_once 'DAO.php';
	deletar_funcionario($id_funcionario);
	// chamar função para deletar funcionário:
}
?>