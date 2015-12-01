<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require $root.'/Controller/AuthAdmin.php';
require_once $root.'/connection.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administrador</title>

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
                    <a href="/View/Admin/Home.php">
                        Administrador
                    </a>
                </li>
                <li>
                    <a href="/View/Admin/Avaliar.php">Publicar Avaliações</a>
                </li>
                <li>
                    <a href="/View/Admin/Bloqueio.php">Bloquear Usuários</a>
                </li>
                <li>
                    <a href="/View/Admin/Empresa.php">Editar/Excluir Empresas</a>
                </li>
				<li>
                    <a href="/View/Admin/Requisito.php">Área de interesse</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
		<?php
			DB::connect();
			if (isset($_GET['idUsuario'])) {
				$idUsuario = $_GET['idUsuario'];
				$_SESSION['idUsuario'] = $idUsuario;
			}
			$result = mysql_query("SELECT * FROM usuarios WHERE id = '" . $_SESSION['idUsuario'] . "'");
			$row = mysql_fetch_array($result);
			$result2 = mysql_query("SELECT * FROM enderecos WHERE id = '" . $row["endereco_id"] . "'");
			$row2 = mysql_fetch_array($result2);
		?>
		<div class="container">
		  <div class="matshead">
			<h2 class="text-muted"> Bloquear Usuários</h2>
		  </div>
		  <hr class="featurette-divider">
		  <div class="container">
            <div class="row">
                <div class="form-group">
				<div class="col-md-10">
				<table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
								<th>Tipo</th>
                                <th>Usuário</th>
								<th>CPF</th>
                                <th>Email</th>
                                <th>Telefone</th>
                            </tr>
                        </thead>
                        <tbody>
						<?php
							DB::connect();
							$result = mysql_query("SELECT * FROM usuarios");
							if ($result) {
								while ($row = mysql_fetch_array($result)) {
									$idUsuario = $row['id'];
									echo "<tr>
											<td>" . $row['id'] . "</td>
											<td>" . $row['tipo'] . "</td>
											<td>" . $row['nome'] . "</td>
											<td>" . $row['cpf'] . "</td>
											<td>" . $row['email'] . "</td>
											<td>" . $row['telefone'] . "</td>																		
										  </tr>";
								}
							}
						?>
                        </tbody>
                    </table>
					<form id="data_block" action="" method="POST">
						<label class="col-sm-2 control-label">Data de Bloqueio</label>
						<div class="col-md-3">
							<input class="form-control" type="text" id="data_bloqueio" name="data_bloqueio" value="<?php echo $row["tempo_bloqueada"] ?>" >
						</div>
							
						<div class="col-sm-offset-10">
							<button type="submit" class="btn btn-success btn-lg">Bloquear</button>
						</div>
					</form>
				</div>
				</div>
            </div>
          </div>
		</div><!-- /#page-content-wrapper -->

    </div>

    <!-- jQuery validate -->
    <script src="/public/js/jquery.validate.min.js"></script>	
    <!-- masked input -->
    <script src="/public/js/jquery.maskedinput.min.js"></script>
	<script src="/public/js/validate/usuario.block.validate.js"></script>
	<script src="/public/js/validate/masks.js"></script>
	<script src="/public/js/validate/metodos.js"></script>
		
  </body>
</html>
<?php
/*
 * caso haja o preencimento dos dados e a submissão do formulário, o
 * controlador, será chamado para interpretar a ação
 */
 if ($_SERVER['REQUEST_METHOD'] == 'POST' && $row['tipo'] == "Freelancer" ){
  $root = $_SERVER['DOCUMENT_ROOT'];
  require_once $root.'/Controller/FreelancerController.php';
  $fl = new FreelancerController();
  $fl->editar();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $row['tipo'] == "Academico" ) {
  $root = $_SERVER['DOCUMENT_ROOT'];
  require_once $root.'/Controller/AcademicoController.php';
  $academico = new AcademicoController();
  $academico->editar();
}
?>