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
			<h2 class="text-muted">Empresa</h2>
		  </div>
		  <hr class="featurette-divider">
		  <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Empresa</th>
								<th>CNPJ</th>
                                <th>Email</th>
                                <th>Telefone</th>
                            </tr>
                        </thead>
                        <tbody>
						<?php
							DB::connect();
							$result = mysql_query("SELECT * FROM empresas WHERE empresario_id = '" . $_SESSION['id'] . "'");
							if ($result) {
								while ($row = mysql_fetch_array($result)) {
									$idEmpresa = $row['id'];
									echo "<tr>
											<td>" . $row['id'] . "</td>
											<td>" . $row['nome'] . "</td>
											<td>" . $row['cnpj'] . "</td>
											<td>" . $row['email'] . "</td>
											<td>" . $row['telefone'] . "</td>
											<td>
												<a href='/View/Empresario/EditarEmpresa.php?idEmpresa=$idEmpresa' title='Editar Empresa'><u>Editar</u></a>&nbsp&nbsp&nbsp&nbsp
											    <a href='/View/Empresario/EditarEmpresa.php?idEmpresa=$idEmpresa' title='Excluir Empresa'><u>Excluir</u></a>
											</td>										
										  </tr>";
								}
							}
						?>
                        </tbody>
                    </table>
				<input type="button" class="btn btn-primary pull-center" value="Cadastrar Nova" onclick="javascript: location.href='/View/Empresario/CadastrarEmpresa.php';" />
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