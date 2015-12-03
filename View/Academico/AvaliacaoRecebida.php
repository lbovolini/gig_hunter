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
            <h2 class="text-muted">Avaliações Recebidas</h2>
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
                                <th>Email</th>
                                <th>Telefone</th>
                                <th>Nota</th>
                                <th>Comentario</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            DB::connect();

                            $avalicaoes = Freelancer::getAvaliacaoRecebidas($_SESSION['id']);

                            if ($avalicaoes) {
                                $i = 1;
                                while ($row = mysql_fetch_array($avalicaoes)) {
                                    echo "<tr>
                                            <td>" . $i++ . "</td>
                                            <td>" . $row['nome_empresa'] . "</td>
                                            <td>" . $row['email_empresa'] . "</td>
                                            <td>" . $row['telefone_empresa'] . "</td>
                                            <td>" . $row['nota'] . "</td>
                                            <td>" . $row['comentario'] . "</td>
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