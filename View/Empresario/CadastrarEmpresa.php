<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require $root.'/Controller/Auth.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Empresario</title>

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
                    <a href="/View/Empresario/Home.php">
                        Empresário
                    </a>
                </li>
                <li>
                    <a href="/View/Empresario/Conta.php">Conta</a>
                </li>
                <li>
                    <a href="/View/Empresario/Empresa.php">Empresa</a>
                </li>
                <li>
                    <a href="/View/Empresario/Vaga.php">Vaga</a>
                </li>
                <li>
                    <a href="#">Oferecer Vaga</a>
                </li>
                <li>
                    <a href="#">Confirmar Vaga</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
		<div class="container">
		  <div class="matshead">
			<h2 class="text-muted">Cadastrar Empresa</h2>
		  </div>
		  <hr class="featurette-divider">
		  <div class="row">
			<div class="col-xs-12 col-md-8">
			  <form class="form-horizontal" id="register-form" action="" method="POST">
				<div class="form-group">
				  <label class="col-sm-2 control-label">Nome</label>
				  <div class="col-md-8">
					<input class="form-control" type="text" id="nome" name="nome" placeholder="Ex. Xpto Sistemas">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Razão Social</label>
				  <div class="col-md-8">
					<input class="form-control" type="text" id="razao_social" name="razao_social" placeholder="Ex. Xpto Desenvolvimento de Software LTDA">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Email</label>
				  <div class="col-md-8">
					<input class="form-control" type="email" id="email" name="email" placeholder="Ex. xpto@mail.com">
				  </div>
				</div>            
				<div class="form-group">
				  <label class="col-sm-2 control-label">CNPJ</label>
				  <div class="col-md-3">
					<input class="form-control" type="text" id="cnpj" name="cnpj" placeholder="Ex. 27.868.536/0001-80">
				  </div>
				  <label class="col-sm-2 control-label">Número de Telefone</label>
					<div class="col-md-3">
					  <input class="form-control" type="tel" id="telefone" name="telefone" placeholder="Ex. (55) 9988-7766">
					</div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">CEP</label>
				  <div class="col-md-4">
					<input class="form-control" type="text" id="cep" name="cep" placeholder="Ex. 01000-099">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Rua</label>
				  <div class="col-md-8">
					<input class="form-control" type="text" id="rua" name="rua" placeholder="Ex. R. São Paulo">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Bairro</label>
				  <div class="col-md-8">
					<input class="form-control" type="text" id="bairro" name="bairro" placeholder="Ex. Jardim São Paulo">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Estado</label>
				  <div class="col-md-3">
					<select type="text" class="form-control" id="estado" name="estado"></select>
				  </div>
				  <label class="col-sm-2 control-label">Cidade</label>
				  <div class="col-md-3">
					<select type="text" class="form-control" id="cidade" name="cidade" ></select>
				  </div>
				</div>
				<div class="form-group">
				  <div class="col-sm-offset-8 col-sm-12">
					<button type="submit" class="btn btn-success btn-lg">Cadastrar</button>
				  </div>
				</div>
			  </form>
			</div>
		  </div>
		</div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- Footer, jQuery, Bootstrap -->
    <?php
    $root = $_SERVER['DOCUMENT_ROOT']; 
    require $root.'/View/Templates/Footer.php'; ?>
    <!-- Lista de cidades e estados -->
    <script src="/public/js/cidades-estados-v0.2.js"></script>
    <!-- jQuery validate -->
    <script src="/public/js/jquery.validate.min.js"></script>
    <!-- Valida cadastro -->
    <script src="/public/js/validate/empresa.validate.js"></script>
    <!-- masked input -->
    <script src="/public/js/jquery.maskedinput.min.js"></script>
  </body>
</html>
<?php
/*
 * caso haja o preencimento dos dados e a submissão do formulário, o
 * controlador, será chamado para interpretar a ação
 */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $root = $_SERVER['DOCUMENT_ROOT'];
  require_once $root.'/Controller/EmpresaController.php';

  $empresa = new EmpresaController();
  $empresa->criar();
}
?>