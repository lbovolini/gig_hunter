<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require $root.'/Controller/AuthAcademico.php';
require_once $root.'/connection.php'; ?>

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
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
		<?php
			DB::connect();
			if (isset($_GET['idVaga'])) {
				$idVaga = $_GET['idVaga'];
				$_SESSION['idVaga'] = $idVaga;
			}
			$result = mysql_query("SELECT * FROM vagas WHERE id = '" . $_SESSION['idVaga'] . "'");
			$row = mysql_fetch_array($result);
			$result2 = mysql_query("SELECT * FROM empresas WHERE id = '" . $row['empresa_id'] . "'");
			$row2 = mysql_fetch_array($result2);
		?>
    <div class="container">
      <div class="matshead">
        <h2 class="text-muted">Vaga</h2>
      </div>
      <hr class="featurette-divider">
      <div class="row">
        <div class="col-xs-12 col-md-8">
          <form class="form-horizontal" id="register-form" action="" method="POST">
            <div class="form-group">
              <label class="col-sm-2 control-label">Descrição:</label>
              <div class="col-md-8">
                <?php echo $row["descricao"] ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Cargo:</label>
              <div class="col-md-8">
                <?php echo $row["cargo"] ?>
              </div>
            </div>            
            <div class="form-group">
              <label class="col-sm-2 control-label">Usuário Alvo:</label>
              <div class="col-md-8">
                <?php 
					if ($row["usuario_alvo"] == 'Ambos') 
						echo 'Acadêmico e Freelancer';
					else 
						echo $row["usuario_alvo"];?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Status:</label>
              <div class="col-md-8">
                <?php echo $row["status"] ?>
              </div>
            </div>
			<div class="form-group">
              <label class="col-sm-2 control-label">Empresa:</label>
              <div class="col-md-8">
                <?php echo $row2["nome"] ?>
              </div>
            </div>
			<div class="form-group">
              <label class="col-sm-2 control-label">Razão Social:</label>
              <div class="col-md-8">
                <?php echo $row2["razao_social"] ?>
              </div>
            </div>
			<div class="form-group">
              <label class="col-sm-2 control-label">CNPJ:</label>
              <div class="col-md-8">
                <?php echo $row2["cnpj"] ?>
              </div>
            </div>
			<div class="form-group">
              <label class="col-sm-2 control-label">Email:</label>
              <div class="col-md-8">
                <?php echo $row2["email"] ?>
              </div>
            </div>
			<div class="form-group">
              <label class="col-sm-2 control-label">Telefone:</label>
              <div class="col-md-8">
                <?php echo $row2["telefone"] ?>
              </div>
            </div>
			<div class="container">
                <div class="col-md-3">
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button><?php echo "<a href='/Model/CandidatarVaga.php?idVaga=$idVaga' title='Confirmar'><u>Candidatar-se à Vaga</u></a>" ?>
                    </div>
				</div>
				<div class="col-md-3">
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button><?php echo "<a href='/View/Academico/Vaga.php' title='Voltar'><u>Outras Vagas Disponíveis</u></a>" ?>
                    </div>
                </div>                
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>