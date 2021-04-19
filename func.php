<?php  

// incluir arquivo de funções de manipulação no BD
include_once 'DAO.php';

// função para verificar se form de cadastro está em branco:
function verificar_cad()
{
	// se algum campo estiver em branco:
	if(empty($_POST['nome']) || empty($_POST['cargo']) || empty($_POST['email']))
	{
		// mostra na tela, msg de erro:
		echo '<h3 class="alert alert-warning">Por favor, preencha todos os campos</h3>';
	}
	else // senão
	{
		
		// armazena em um array associativo os valores recebidos via post
		$funcionario['nome']  = $_POST['nome'];
		$funcionario['cargo']= $_POST['cargo'];
		$funcionario['email'] = $_POST['email'];

		// chamamos a função que irá TENTAR incluir a seríe na tabela 'funcionarios_tb' do BD:
		// o parâmetro enviado é o array associativo criado:
		inserir_funcionario($funcionario);
	}
}

// função para verificar se form de cadastro de usuário está em branco:
function verificar_cad_user()
{
	// se algum campo estiver em branco:
	if(empty($_POST['username']) || 
	   empty($_POST['password']) || 
	   empty($_POST['email']))
	{
		// mostra na tela, msg de erro:
		echo '<h3 class="alert alert-warning">Por favor, preencha todos os campos</h3>';
	}
	else
	{
		$user['username'] = $_POST['username'];
		$user['password'] = $_POST['password'];
		$user['email']	  = $_POST['email'];

		//chamar função da DAO responsavel por cadastra um novo usuário
		cadastrar_user($user);

	}
}


// função para exibir funcionarios ou mensagem de erro caso nao haja cadastros:
function exibir_funcionarios()
{
	echo select_funcionarios();
}


function verificar_msg()
{

	if(!empty($_GET['msg']))
	{
		$msg = $_GET['msg'];

		switch ($msg) 
		{
			case 'cadok':
				$texto = "Funcionário cadastrado com sucesso!";
				$classe = "alert alert-success";
				break;

			case 'caderro':
				$texto = "Erro ao cadastrar funcionário. Por favor, tente novamente.";
				$classe = "alert alert-danger";
				break;

			case 'newuser':
				$texto = "Usuário cadastrado com sucesso!";
				$classe = "alert alert-success";
				break;

			case 'usererro':
				$texto = "Erro ao cadastrar usuário. Por favor, tente novamente.";
				$classe = "alert alert-danger";
				break;

			case 'delok':
				$texto = "Funcionário excluído com com sucesso!";
				$classe = "alert alert-success";
				break;

			case 'delerro':
				$texto = "Erro ao excluir funcionário. Por favor, tente novamente.";
				$classe = "alert alert-danger";
				break;

			case 'edtok':
				$texto = "Funcionário editado com com sucesso!";
				$classe = "alert alert-success";
				break;

			case 'edterro':
				$texto = "Erro ao editar funcionário. Por favor, tente novamente.";
				$classe = "alert alert-danger";
				break;
			
			case 'errobusca':
				$texto = "ATENÇÃO: não foi possível encontrar funcionário especificado. <br> 
				Por favor, tente novamente.";
				$classe = "alert alert-warning";
				break;

			case 'invalidid':
				$texto = "ATENÇÃO: não foi possível carregar funcionário com id informado. <br> 
				Por favor, tente novamente.";
				$classe = "alert alert-warning";
				break;

			case 'empty':
				$texto = "ATENÇÃO: Preencha todos os dados do form de login.";
				$classe = "alert alert-warning";
				break;

			case 'invalid':
				$texto = "ATENÇÃO: Username ou Password inválidos. Tente novamente!";
				$classe = "alert alert-danger";
				break;

			default:
				$texto = '';
				$classe = '';
				break;
		}// fim switch


		echo '<h3 class="'.$classe.'">'.$texto.'</h3>';


	}

}

?>