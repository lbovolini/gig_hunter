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
        <?php
            DB::connect();
            if (isset($_GET['idUsuario'])) {
                $idUsuario = $_GET['idUsuario'];
                $_SESSION['idUsuario'] = $idUsuario;
            }
            $result = mysql_query("SELECT * FROM usuarios WHERE id = '" . $_SESSION['idUsuario'] . "'");
            $row = mysql_fetch_array($result);
            $result2 = mysql_query("SELECT * FROM enderecos WHERE id = '" . $row['endereco_id'] . "'");
            $row2 = mysql_fetch_array($result2);
        ?>
    <div class="container">
      <div class="matshead">
        <h2 class="text-muted">Usuário</h2>
      </div>
      <hr class="featurette-divider">
      <div class="row">
        <div class="col-xs-12 col-md-8">
		  <form class="form-horizontal" id="register-form" action="" method="">
            <div class="form-group">
              <label class="col-sm-2 control-label">Nome:</label>
              <div class="col-md-8">
                <?php echo $row["nome"] ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Email:</label>
              <div class="col-md-8">
                <?php echo $row["email"] ?>
              </div>
            </div>            
            <div class="form-group">
              <label class="col-sm-2 control-label">Nascimento:</label>
              <div class="col-md-8">
                <?php echo $row["data_nascimento"] ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Telefone:</label>
              <div class="col-md-8">
                <?php echo $row["telefone"] ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">RG:</label>
              <div class="col-md-8">
                <?php echo $row["rg"] ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">CPF:</label>
              <div class="col-md-8">
                <?php echo $row["cpf"] ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Tipo:</label>
              <div class="col-md-8">
                <?php echo $row["tipo"] ?>
              </div>
            </div>
  
            <div class="form-group">
              <label class="col-sm-2 control-label">Lattes:</label>
              <div class="col-md-8">
                <?php
                if ((0 !== strpos($row["lattes"], 'http://')) && (0 !== strpos($row["lattes"], 'https://'))) {
                  $row["lattes"] = "http://" . $row["lattes"];  
                }
                ?>  
                <a href="<?php echo $row["lattes"];?>"> Lattes </a>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Linkedin:</label>
              <div class="col-md-8">
                <?php
                if ((0 !== strpos($row["linkedin"], 'http')) && (0 !== strpos($row["linkedin"], 'https'))) {
                  $row["linkedin"] = "http://" . $row["linkedin"];  
                }
                ?>  
                <a href="<?php echo $row["linkedin"];?>"> Linkedin </a>
              </div>
            </div>
			<div class="form-group">
              <label class="col-sm-2 control-label">Requisitos:</label>
              <div class="col-md-8">
                <?php 
					$result3 = mysql_query("SELECT * FROM requisitos r, usuario_requisitos ur WHERE r.id = ur.requisito_id AND ur.requisito_id = '" . $_SESSION['id'] . "'");
					while ($row3 = mysql_fetch_array($result3))
						echo $row3['nome'] . "<br/>";
				?>
              </div>
            </div>
			<div class="form-group">
              <label class="col-sm-2 control-label">CEP:</label>
              <div class="col-md-8">
                <?php echo $row2["cep"] ?>
              </div>
            </div>
			<div class="form-group">
              <label class="col-sm-2 control-label">Rua:</label>
              <div class="col-md-8">
                <?php echo $row2["rua"] ?>
              </div>
            </div>
			<div class="form-group">
              <label class="col-sm-2 control-label">Bairro:</label>
              <div class="col-md-8">
                <?php echo $row2["bairro"] ?>
              </div>
            </div>
			<div class="form-group">
              <label class="col-sm-2 control-label">Cidade:</label>
              <div class="col-md-8">
                <?php echo $row2["cidade"] ?>
              </div>
            </div>
			<div class="form-group">
              <label class="col-sm-2 control-label">Estado:</label>
              <div class="col-md-8">
                <?php echo $row2["estado"] ?>
              </div>
            </div>
		  </form>
        </div>
      </div>
    </div>
  </body>
</html>