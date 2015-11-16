<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require $root.'/Controller/Auth.php'; 
require_once $root.'/connection.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Freelancer</title>

	<!-- Favicon -->
	<link rel="shortcut icon" href="/public/img/favicon-suitcase.ico" type="image/x-icon">
	<!-- Bootstrap Core CSS -->
	<link href="/public/css/bootstrap.min.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="/public/css/simple-sidebar.css" rel="stylesheet">
	<!-- Custom Fonts -->
	<link href="/public/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

</head>
  
  <body>
    <!-- Navigation -->
    <?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    require $root.'/View/Templates/DefaultNav.php'; ?>


    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="/View/Freelancer/Home.php">
                        Freelancer
                    </a>
                </li>
                <li>
                    <a href="/View/Freelancer/Conta.php">Conta</a>
                </li>
                <li>
                    <a href="#">Vaga</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
		<?php
			DB::connect();
			$result = mysql_query("SELECT * FROM usuarios WHERE id = '" . $_SESSION['id'] . "'");
			$row = mysql_fetch_array($result);
			$result2 = mysql_query("SELECT * FROM enderecos WHERE id = '" . $row["endereco_id"] . "'");
			$row2 = mysql_fetch_array($result2);
		?>
		<div class="container">
		  <div class="matshead">
			<h2 class="text-muted">Conta Freelancer</h2>
		  </div>
		  <hr class="featurette-divider">
		  <div class="row">
			<div class="col-xs-12 col-md-8">
			  <form class="form-horizontal" action="" method="POST">
				<div class="form-group">
				<label class="col-sm-2 control-label">Nome</label>
				<div class="col-md-8">
				  <input class="form-control" type="text" name="nome" placeholder="Ex. João da Silva" value="<?php echo $row["nome"] ?>">
				</div>
				</div>
				<div class="form-group">
				<label class="col-sm-2 control-label">Email</label>
				<div class="col-md-8">
				  <input class="form-control" type="email" name="email" placeholder="Ex. joao@mail.com" value="<?php echo $row["email"] ?>">
				</div>
				</div>            
				<div class="form-group">
				<label class="col-sm-2 control-label">Confirmação de Email</label>
				<div class="col-md-8">
				  <input class="form-control" type="email" name="confirmacao_email" placeholder="Ex. joao@mail.com">
				</div>
				</div>
				<div class="form-group">
				<label class="col-sm-2 control-label">Nome de Usuário</label>
				<div class="col-md-8">
				  <input class="form-control" type="text" name="username" placeholder="Ex. jsilva" value="<?php echo $row["username"] ?>">
				</div>
				</div>
				<div class="form-group">
				<label class="col-sm-2 control-label">Senha</label>
				<div class="col-md-8">
				  <input class="form-control" type="password" name="senha" placeholder="Min. 8 Caracteres">
				</div>
				</div>
				<div class="form-group">
				<label class="col-sm-2 control-label">Confirmação de Senha</label>
				<div class="col-md-8">
				  <input class="form-control" type="password" name="confirmacao_senha" placeholder="Min. 8 Caracteres">
				</div>
				</div>
				<div class="form-group">
				<label class="col-sm-2 control-label">Data de Nascimento</label>
				<div class="col-md-3">
				  <input class="form-control" type="date" name="data_nascimento" placeholder="Ex. 01/01/1999" value="<?php echo $row["data_nascimento"] ?>">
				</div>
				<label class="col-sm-2 control-label">Número de Telefone</label>
				<div class="col-md-3">
				  <input class="form-control" type="tel" name="telefone" placeholder="Ex. 5599887766" value="<?php echo $row["telefone"] ?>">
				</div>
				</div>
				<div class="form-group">
				<label class="col-sm-2 control-label">RG</label>
				<div class="col-md-3">
				  <input class="form-control" type="text" name="rg" placeholder="Ex. 6677788899" value="<?php echo $row["rg"] ?>">
				</div>
				<label class="col-sm-2 control-label">CPF</label>
				<div class="col-md-3">
				  <input class="form-control" type="text" name="cpf" placeholder="Ex. 999.888.777-66" value="<?php echo $row["cpf"] ?>">
				</div>
				</div>
				<div class="form-group">
				<label class="col-sm-2 control-label">CEP</label>
				<div class="col-md-4">
				  <input class="form-control" type="text" name="cep" placeholder="Ex. 01000-099" value="<?php echo $row2["cep"] ?>">
				</div>
				</div>
				<div class="form-group">
				<label class="col-sm-2 control-label">Rua</label>
				<div class="col-md-8">
				  <input class="form-control" type="text" name="rua" placeholder="Ex. R. São Paulo" value="<?php echo $row2["rua"] ?>">
				</div>
				</div>
				<div class="form-group">
				<label class="col-sm-2 control-label">Bairro</label>
				<div class="col-md-8">
				  <input class="form-control" type="text" name="bairro" placeholder="Ex. Jardim São Paulo" value="<?php echo $row2["bairro"] ?>">
				</div>
				</div>
				<div class="form-group">
				<label class="col-sm-2 control-label">Estado</label>
				<div class="col-md-2">
				  <input class="form-control" type="text" name="estado" name="estado" value="<?php echo $row2["estado"] ?>">
				</div>
				<label class="col-sm-2 control-label">Cidade</label>
				<div class="col-md-4">
				  <input class="form-control" type="text" name="cidade" name="cidade" value="<?php echo $row2["cidade"] ?>">
				</div>
				</div>
				<div class="form-group">
				<label class="col-sm-2 control-label">Lattes</label>
				<div class="col-md-8">
				  <input class="form-control" type="text" name="lattes" placeholder="Ex. " value="<?php echo $row["lattes"] ?>">
				</div>
				</div>
				<div class="form-group">
				<label class="col-sm-2 control-label">Linkedin</label>
				<div class="col-md-8">
				  <input class="form-control" type="text" name="linkedin" placeholder="Ex. " value="<?php echo $row["linkedin"] ?>">
				</div>
				</div>
				<div class="form-group">
				  <div class="col-sm-offset-8 col-sm-12">
					<button type="submit" class="btn btn-primary btn-lg">Editar</button>
				  </div>
				</div>
			  </form>
			</div>
		  </div>
		</div>
        <!-- /#page-content-wrapper -->

    </div>

  </body>
</html>
<?php
/*
 * caso haja o preencimento dos dados e a submissão do formulário, o
 * controlador, será chamado para interpretar a ação
 */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $root = $_SERVER['DOCUMENT_ROOT'];
  require_once $root.'/Controller/FreelancerController.php';

  $freelancer = new FreelancerController();
  $freelancer->editar();
}
?>