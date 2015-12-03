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
			<h2 class="text-muted">Confirmar Vaga
			</h2>
		  </div>
		  <hr class="featurette-divider">
		  <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Usuário</th>
								<th>E-mail</th>
                                <th>Data de Nascimento</th>
								<th>Cidade/Estado</th>
                            </tr>
                        </thead>
                        <tbody>
						<?php
							DB::connect();
							if (isset($_GET['idVaga'])) {
								$idVaga = $_GET['idVaga'];
								$_SESSION['idVaga'] = $idVaga;
							}
							$result = mysql_query("SELECT * FROM usuarios u, candidatos c WHERE c.usuario_id = u.id AND c.vaga_id = '" . $idVaga . "'");
							if ($result) {
								$i=1;
								while ($row = mysql_fetch_array($result)) {
									$idUsuario = $row['id'];
									$result2 = mysql_query("SELECT * FROM enderecos WHERE id = '" . $row["endereco_id"] . "'");
									$row2 = mysql_fetch_array($result2);
									echo "<tr>
											<td>" . $i++ . "</td>
											<td><a href='/View/Empresario/Usuario.php?idUsuario=$idUsuario'>" . $row['nome'] . "</td>
											<td>" . $row['email'] . "</td>
											<td>" . $row['data_nascimento'] . "</td>
											<td>" . $row2['cidade'] . "/" . $row2['estado'] ."</td>
											<td>
												<a href='/Model/ConfirmarVaga.php?idVaga=$idVaga&idUsuario=$idUsuario' title='Confirmar Vaga'><u>Confirmar Vaga</u></a>
											</td>										
										  </tr>";
								}
							}
					?>
                        </tbody>
                    </table>
				</div>
            </div>
          </div>
		</div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- Lista de cidades e estados -->
    <script src="/public/js/cidades-estados-v0.2.js"></script>
  </body>
</html>