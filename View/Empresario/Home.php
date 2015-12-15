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
            <h1 class="text-muted">Empresário</h1>
          </div>
		  <hr class="featurette-divider">
		  <div class="row">
                <div class="col-md-10">
					<h4>Empresário! É permitido que você edite seus dados pessoais, cadastre e edite suas empresas e vagas, ofereça vagas diretamente, confirme o preenchimento da vaga e avalie os usuários.</h4>
				</div>
		  </div><br/>
		  <div class="matshead">
            <h2 class="text-muted">Acadêmicos e Freelancers Recomendados</h2>
          </div>
          <hr class="featurette-divider">
          <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Telefone</th>
                                <th>Tipo</th>
                                <th>Cidade/Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            DB::connect();
							$teste = mysql_query("SELECT * FROM enderecos end, empresarios emp WHERE end.id = emp.endereco_id");
							$rows = mysql_fetch_array($teste);
							$result = mysql_query("SELECT * FROM usuarios LIMIT 10");
							if ($result) {
								$i=1;
								while ($row = mysql_fetch_array($result)) {
									$result2 = mysql_query("SELECT * FROM enderecos WHERE id = '" . $row['endereco_id'] . "'");
									$row2 = mysql_fetch_array($result2);
									if ($rows['estado'] == $row2['estado']) {
										$idUsuario = $row['id'];
										$alvoVaga = $row['tipo'];
										echo "<tr>
											<td>" . $i++ . "</td>
											<td><a href='/View/Empresario/Usuario.php?idUsuario=$idUsuario'>" . $row['nome'] . "</td>
											<td>" . $row['telefone'] . "</td>
											<td>" . $row['tipo'] . "</td>
											<td>" . $row2['cidade'] . '/' . $row2['estado'] ."</td>
											<td>
												<a href='/View/Empresario/OferecerUsuarioVaga.php?idUsuario=$idUsuario&alvoVaga=$alvoVaga' title='Oferecer Vaga'><u>Oferecer Vaga</u></a>
											</td>													
											  </tr>";
									}
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

  </body>
</html>