<?php  
// IMPORTANTE: ESTE ARQUIVO NÃO DEVE CONTER SAÍDA DE DADOS.
// SE FOR NECESSÁRIO REALIZAR SAIDA DE DADOS, ENTÃO A FUNÇÃO DEVERÁ RETORNAR O 
// VALOR A SER EXIBIDO NA TELA

// incluir arquivo de conexão com o BD
include_once 'conn.php';

// função que irá TENTAR inserir um funcionário da tabela 'funcionarios_tb' do BD
function inserir_funcionario($funcionario) // parâmetro recebido é um array associativo
{
	global $conn; // torna o acesso a variável $conn (origem: conn.php) global

	// formatando parâmetro 'values' do sql 'INSERT'
	$values = "('" .$funcionario['nome'] ."', " .
			   "'" .$funcionario['cargo'] ."', " .
			   "'" .$funcionario['email']    ."') ";


	// Montagem do sql para tentar realizar um insert na tabela 'funcionarios_tb' com os valores
	// armazenados no array associativo 'funcionario' que estão formatados na variável '$values'
	$sql = "INSERT INTO funcionarios_tb (nome, cargo, email) VALUES $values";

	// executa comando sql
	$result = mysqli_query($conn, $sql);

	// se o comando foi bem sucedido, a função abaixo retornará um valor maior do que zero
	if (mysqli_affected_rows($conn) > 0)
	{
		// neste caso, redirecionamos o usuário para a página 'index.php' juntamente com
		// o parâmetro 'msg' com o valor 'cadok'
		header('location:index.php?msg=cadok');
	}
	else
	{
		// senão, redirecionamos o usuário para a página 'index.php' juntamente com
		// o parâmetro 'msg' com o valor 'caderro'
		header('location:index.php?msg=caderro');

	}

}

// função para exibir todos os funcionários
function select_funcionarios()
{

	global $conn; // torna o acesso a variável $conn (origem: conn.php) global
	
	// cria select para pegar todos os dados de todos os registros
	$sql = "SELECT * FROM funcionarios_tb"; 

	// executa comando sql
	$result = mysqli_query($conn, $sql);

	// se comando foi executad com sucesso (há dados para retornar e exibir na tela)
	if (mysqli_affected_rows($conn) > 0)
	{

		// cria variável que irá formatar o retorno de dados
		$info = '';

		$info .= '<table class="table table-hover table-sm">';
		$info .= 	'<tr>';
		$info .= 		'<th>Cadastro #</th>';
		$info .= 		'<th>Nome do Funcionário</th>';
		$info .= 		'<th>Cargo</th>';
		$info .= 		'<th>Email</th>';
		$info .= 	'</tr>';

		// enquanto houver linhas na tebela retornada pelo select
		while ($funcionario = mysqli_fetch_assoc($result)) 
		{ // transforme cada linha em um array associativo
			
			$info .= '<tr>'; // concatena abertura de linha da tabela
			foreach ($funcionario as $key => $value) 
			{ // foreach para percorrer array associativo com os dados da linha atual
				
				// se o indice do array associativo fo 'id_funcionario'
				if ($key == 'id_funcionario') 
				{ 
					$id_funcionario = $value;
				}
				// concatena nome do indice do array ($key) com valor dele ($value)
				$info .= "<td>". $value . "</td>";
			}// fim do foreach

			$info .= '<td>';
			$info .= 	'<a href="editar.php?id_funcionario='.$id_funcionario.'" class="btn btn-warning">Editar</a>  ';
			$info .= 	'<a href="deletar.php?id_funcionario='.$id_funcionario.'" class="btn btn-danger" onclick="return confirm(\'Tem certeza que deseja excluir este funcionário?\')">Deletar</a>' ;
			$info .= '</td>';



			$info .= '</tr>'; // concatena fechamento de linha da tabela
		}// fim do while
		$info .= '</table>';

		return $info; // retorna os dados formatados

	}
	else // senão (o select não retornou nada)
	{
		return '<h3>Não há funcionários cadastrados</h3>'; // retorna mensagem de 'erro'
	}

}


// função par acadastrar novo usuário na tabela users
function cadastrar_user($user)
{

	global $conn;

	$values = "('" .$user['username'] ."', " .
			   "'" .$user['password'] ."', " .
			   "'" .$user['email']    ."') ";

	$sql = "INSERT INTO usuarios_tb (username, password, email) VALUES $values";

	$result = mysqli_query($conn, $sql);

	if(mysqli_affected_rows($conn) > 0)
	{
		header('location:login.php?msg=newuser');
	}
	else
	{
		header('location:login.php?msg=usererro');
	}

}

// função para excluir funcionário
function deletar_funcionario($id_funcionario)
{
	global $conn;

	$sql = "DELETE FROM funcionarios_tb WHERE id_funcionario = $id_funcionario";

	$result = mysqli_query($conn, $sql);

	if(mysqli_affected_rows($conn) > 0)
	{
		header('location:index.php?msg=delok');
	}
	else
	{
		header('location:index.php?msg=delerro');
	}

}

function buscar_funcionario($id_funcionario)
{
	global $conn;

	$sql = "SELECT * FROM funcionarios_tb WHERE id_funcionario = $id_funcionario";

	$result = mysqli_query($conn, $sql);

	if(mysqli_affected_rows($conn) > 0)
	{
		$funcionario = mysqli_fetch_assoc($result);
	}
	else
	{
		$funcionario = '';
	}

	return $funcionario;
}

function editar_funcionario($edt)
{

	global $conn;

	$values = "nome = '" 	. $edt['nome'] 	. "', " .
			  "cargo = '" 	. $edt['cargo'] . "', " .
			  "email = '"	. $edt['email'] . "'  " ;

	$sql = "UPDATE funcionarios_tb SET $values WHERE id_funcionario = " . $edt['id_funcionario'];

	$result = mysqli_query($conn, $sql);

	if(mysqli_affected_rows($conn) > 0)
	{
		header('location:index.php?msg=edtok');
	}
	else
	{
		header('location:index.php?msg=edterro');
	}

}

?>