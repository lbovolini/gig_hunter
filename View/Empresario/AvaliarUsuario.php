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
                <li>
                    <a href="/View/Empresario/AvaliacaoRecebida.php">Avaliações Recebidas</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
		<div class="container">
		  <div class="matshead">
			<h2 class="text-muted">Avaliar Usuario</h2>
		  </div>
		  <hr class="featurette-divider">
		  <div class="row">
			<div class="col-xs-12 col-md-8">
			  <form class="form-horizontal" id="register-form" action="" method="POST">
			  <?php
				DB::connect();
				if (isset($_GET['id_usuario'])) {
					$id_usuario = $_GET['id_usuario'];
				}

				$result = mysql_query("SELECT nome, email, username, telefone, tipo FROM usuarios WHERE id = '{$id_usuario}';");

				$row = mysql_fetch_array($result);
				?>

				<div class="form-group">
				  <label class="col-sm-2 control-label">Nome</label>
				  <div class="col-md-8">
					<input disabled="disabled" class="form-control" type="text" id="nome" name="nome" cols=8 rows=3 value="<?php echo $row['nome'] ?>"></input>
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Email</label>
				  <div class="col-md-8">
					<input disabled="disabled" class="form-control" type="text" id="email" name="email" cols=8 rows=3 value="<?php echo $row['email'] ?>"></input>
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Username</label>
				  <div class="col-md-8">
					<input disabled="disabled" class="form-control" type="text" id="username" name="username" cols=8 rows=3 value="<?php echo $row['username'] ?>"></input>
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Tipo</label>
				  <div class="col-md-8">
					<input disabled="disabled" class="form-control" type="text" id="tipo" name="tipo" cols=8 rows=3 value="<?php echo $row['tipo'] ?>"></input>
				  </div>
				</div>

				<div class="form-group">
				  <label class="col-sm-2 control-label">Nota</label>
				  <div class="col-md-8">
					<select class="form-control" name="nota" id="nota">

						<?php
						  	$i = 1;
						  	while ($i <= 10) {
						  		echo "<option value='{$i}'>$i</option>";
								$i++;
							}
						?>
					</select>
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Comentario</label>
				  <div class="col-md-8">
					<textarea class="form-control" type="text" id="comentario" name="comentario" cols=8 rows=3 placeholder="Ex. "></textarea>
				  </div>
				</div>

				<div class="form-group">
				  <label class="col-sm-2 control-label">Empresa Avaliadora</label>
				  <div class="col-md-8">
					<select class="form-control" id="empresa" name="empresa" >
						<?php
							DB::connect();
							$result = mysql_query("SELECT id, nome FROM empresas WHERE empresario_id = '{$_SESSION['id']}';");

							if ($result) {
								while ($row = mysql_fetch_array($result)) {
									$id = $row['id'];
									$nome = $row['nome'];
									echo "<option value='{$id}'>$nome</option>";
								}
							}
						?>				
					</select>
				  </div>
				</div>

				<div class="form-group">
				  <div class="col-sm-offset-8 col-sm-12">
					<button type="submit" class="btn btn-success btn-lg">Avaliar</button>
				  </div>
				</div>
			  </form>
			</div>
		  </div>
		</div>
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
  require_once $root.'/Controller/AvaliacaoController.php';

  $avaliacao = new AvaliacaoController();
  $avaliacao->criar();
  
    echo "<script> location.href='Avaliar.php'; </script>";
}
?>