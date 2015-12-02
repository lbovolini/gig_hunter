<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require $root.'/Controller/AuthEmpresario.php';
require_once $root.'/connection.php'; ?>

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
                    <a href="/View/Empresario/OferecerVaga.php">Oferecer Vaga</a>
                </li>
                <li>
                    <a href="/View/Empresario/ConfirmarVaga.php">Confirmar Vaga</a>
                </li>
                <li>
                    <a href="/View/Empresario/Avaliar.php">Avaliar Usuário</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
		<div class="container">
		  <div class="matshead">
			<h2 class="text-muted">Cadastrar Vaga</h2>
		  </div>
		  <hr class="featurette-divider">
		  <div class="row">
			<div class="col-xs-12 col-md-8">
			  <form class="form-horizontal" id="register-form" action="" method="POST">
				<div class="form-group">
				  <label class="col-sm-2 control-label">Descrição</label>
				  <div class="col-md-8">
					<textarea class="form-control" type="text" id="descricao" name="descricao" cols=8 rows=3 placeholder="Ex. "></textarea>
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Cargo</label>
				  <div class="col-md-8">
					<input class="form-control" type="text" id="cargo" name="cargo" placeholder="Ex. ">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Usuário Alvo</label>
				  <div class="col-md-4">
					<select class="form-control" name="usuario_alvo">
						<option value=Academico>Acadêmico</option>
						<option value=Freelancer>Freelancer</option>
						<option value=Ambos>Ambos</option>
					</select>				  
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Requisitos</label>
				  <div class="col-md-3">
					<?php
						DB::connect();
						$result5 = mysql_query("SELECT * FROM requisitos");
						while ($row5 = mysql_fetch_array($result5)) {
							echo $row5['nome'] ?>
								<select class="form-control" name="selectArray[ ]">
									<option value=Não>Não</option>
									<option value=Sim>Sim</option>
								</select><br/>		
							<?php 
						}
					?>			  
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
    <!-- Lista de cidades e estados -->
    <script src="/public/js/cidades-estados-v0.2.js"></script>
  </body>
</html>
<?php
/*
 * caso haja o preencimento dos dados e a submissão do formulário, o
 * controlador, será chamado para interpretar a ação
 */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $root = $_SERVER['DOCUMENT_ROOT'];
  require_once $root.'/Controller/VagaController.php';

  $vaga = new VagaController();
  $vaga->criar();
}
?>