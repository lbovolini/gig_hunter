<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require $root.'/Controller/AuthAcademico.php';
require_once $root.'/connection.php'; 
require_once $root.'/Model/Freelancer.php';
require_once $root.'/Model/Vaga.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Acadêmico</title>

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
                    <a href="/View/Academico/Home.php">
                        Acadêmico
                    </a>
                </li>
                <li>
                    <a href="/View/Academico/Conta.php">Conta</a>
                </li>
                <li>
                    <a href="/View/Academico/Vaga.php">Vaga</a>
                </li>
                <li>
                    <a href="/View/Academico/Avaliar.php">Avaliar</a>
                </li>
                <li>
                    <a href="/View/Academico/AvaliacaoRecebida.php">Avaliações Recebidas</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <div class="container">
		  <div class="matshead">
            <h1 class="text-muted">Acadêmico</h1>
          </div>
		  <hr class="featurette-divider">
		  <div class="row">
                <div class="col-md-10">
					<h4>Acadêmico! É permitido que você edite seus dados pessoais, suas áreas de interesse, candidate-se e aplique-se às vagas.</h4><br/>
					<div class="matshead">
						<h2 class="text-muted">Requisitos<?php echo str_repeat("&nbsp;", 10); ?><input type="button" class="btn btn-primary pull-center" value="Editar Requisitos" onclick="javascript: location.href='/View/Academico/Requisito.php';" /></h2>
					</div>
					<hr class="featurette-divider">
					<div class="col-md-8">
					<?php 
					    DB::connect();
						$result = mysql_query("SELECT * FROM requisitos r, usuario_requisitos ur WHERE r.id = ur.requisito_id AND ur.usuario_id = '" . $_SESSION['id'] . "'");
						while ($row = mysql_fetch_array($result))
							echo "<p>" . $row['nome'] . "</p>";
					?>
					</div>
				</div>
		  </div><br/>
          <div class="matshead">
            <h2 class="text-muted">Vagas Oferecidas</h2>
          </div>
          <hr class="featurette-divider">
          <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Descricao</th>
                                <th>Cargo</th>
                                <th>Usuário Alvo</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
							$result = mysql_query("SELECT * FROM oferecidas WHERE usuario_id = '" . $_SESSION['id'] . "'");
							if ($result) {
								$i=1;
								while ($row = mysql_fetch_array($result)) {
									$idVaga = $row['vaga_id'];
									$busca = "SELECT 1 FROM candidatos WHERE usuario_id = '" . $_SESSION['id'] . "' AND vaga_id = '" . $row['vaga_id'] . "'";
									$resultado = mysql_query($busca);
									if(mysql_fetch_array($resultado) == 0) {
										$result2 = mysql_query("SELECT * FROM vagas WHERE id = '" . $row['vaga_id'] . "'");
										$row2 = mysql_fetch_array($result2);
										echo "<tr>
												<td>" . $i++ . "</td>
												<td>" . $row2['descricao'] . "</a></td>
												<td>" . $row2['cargo'] . "</td>
												<td>" . $row2['usuario_alvo'] . "</td>
												<td>" . $row2['status'] . "</td>
												<td>
													<a href='/View/Academico/AplicarVaga.php?idVaga=$idVaga' title='Aplicar-se à Vaga'><u>Aplicar-se à Vaga</u></a>
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
          <div class="matshead">
            <h2 class="text-muted">Vagas Recomendadas No Estado</h2>
          </div>
          <hr class="featurette-divider">
          <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Descricao</th>
                                <th>Cargo</th>
                                <th>Empresa</th>
                                <th>Cidade/Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            DB::connect();

                            $estado = Freelancer::getEstado($_SESSION['id']);

                            if($_SESSION['tipo'] == 'Freelancer')
                                $usuario = 'Academico';
                            else
                                $usuario = 'Freelancer';

                            $vagas = Vaga::getVagasRecomendadas($estado, $usuario, $_SESSION['id']);

                            if ($vagas) {
                                $i = 1;
                                while ($row = mysql_fetch_array($vagas)) {
                                    $idVaga = $row['vaga_id'];
                                    echo "<tr>
                                            <td>" . $i++ . "</td>
                                            <td>" . $row['descricao'] . "</td>
                                            <td>" . $row['cargo'] . "</td>
                                            <td>" . $row['nome'] . "</td>
                                            <td>" . $row['cidade'] . "/" . $row['estado'] . "</td>                                 
                                            <td>
                                                <a href='/View/Academico/AplicarVaga.php?idVaga=$idVaga' title='Aplicar-se à Vaga'><u>Aplicar-se à Vaga</u></a>
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


          <div class="matshead">
            <h2 class="text-muted">Outras Vagas Recomendadas</h2>
          </div>
          <hr class="featurette-divider">
          <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Descricao</th>
                                <th>Cargo</th>
                                <th>Empresa</th>
                                <th>Cidade</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            DB::connect();

                            $estado = Freelancer::getEstado($_SESSION['id']);

                            if($_SESSION['tipo'] == 'Freelancer')
                                $usuario = 'Academico';
                            else
                                $usuario = 'Freelancer';

                            $vagas = Vaga::getOutrasVagasRecomendadas($estado, $usuario, $_SESSION['id']);

                            if ($vagas) {
                                $i = 1;
                                while ($row = mysql_fetch_array($vagas)) {
                                    $idVaga = $row['vaga_id'];
                                    echo "<tr>
                                            <td>" . $i++ . "</td>
                                            <td>" . $row['descricao'] . "</td>
                                            <td>" . $row['cargo'] . "</td>
                                            <td>" . $row['nome'] . "</td>
                                            <td>" . $row['cidade'] . "</td>
                                            <td>" . $row['estado'] . "</td>                                    
                                            <td>
                                                <a href='/View/Academico/AplicarVaga.php?idVaga=$idVaga' title='Aplicar-se à Vaga'><u>Aplicar-se à Vaga</u></a>
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

  </body>
</html>