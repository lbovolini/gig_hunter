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
                        Empresario
                    </a>
                </li>
                <li>
                    <a href="/View/Empresario/Conta.php">Conta</a>
                </li>
                <li>
                    <a href="#">Empresa</a>
                </li>
                <li>
                    <a href="#">Vaga</a>
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
			<h2 class="text-muted">Conta Empresário</h2>
		  </div>
		  <hr class="featurette-divider">
		  <div class="row">
			<div class="col-xs-12 col-md-8">
			  <form class="form-horizontal" id="register-form" action="" method="POST">
				<div class="form-group">
				  <label class="col-sm-2 control-label">Nome</label>
				  <div class="col-md-8">
					<input class="form-control" type="text" id="nome" name="nome" placeholder="Ex. João da Silva">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Email</label>
				  <div class="col-md-8">
					<input class="form-control" type="email" id="email" name="email" placeholder="Ex. joao@mail.com">
				  </div>
				</div>            
				<div class="form-group">
				  <label class="col-sm-2 control-label">Confirmação de Email</label>
				  <div class="col-md-8">
					<input class="form-control" type="email" id="confirmacao_email" name="confirmacao_email" placeholder="Ex. joao@mail.com">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Nome de Usuário</label>
				  <div class="col-md-8">
					<input class="form-control" type="text" id="username" name="username" placeholder="Ex. jsilva">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Senha</label>
				  <div class="col-md-8">
					<input class="form-control" type="password" id="senha" name="senha" placeholder="Min. 8 Caracteres">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Confirmação de Senha</label>
				  <div class="col-md-8">
					<input class="form-control" type="password" id="confirmacao_senha" name="confirmacao_senha" placeholder="Min. 8 Caracteres">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Data de Nascimento</label>
				  <div class="col-md-3">
					<input class="form-control" type="date" id="data_nascimento" name="data_nascimento" placeholder="Ex. 01/01/1999">
				  </div>
				  <label class="col-sm-2 control-label">Número de Telefone</label>
					<div class="col-md-3">
					  <input class="form-control" type="tel" id="telefone" name="telefone" placeholder="Ex. (55) 9988-7766">
					</div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">RG</label>
				  <div class="col-md-3">
					<input class="form-control" type="text" id="rg" name="rg" placeholder="Ex. 66.777.888.99">
				  </div>
				  <label class="col-sm-2 control-label">CPF</label>
				  <div class="col-md-3">
					<input class="form-control" type="text" id="cpf" name="cpf" placeholder="Ex. 999.888.777-66">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">CEP</label>
				  <div class="col-md-4">
					<input class="form-control" type="text" id="cep" name="cep" placeholder="Ex. 01000-099">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Rua</label>
				  <div class="col-md-8">
					<input class="form-control" type="text" id="rua" name="rua" placeholder="Ex. R. São Paulo">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Bairro</label>
				  <div class="col-md-8">
					<input class="form-control" type="text" id="bairro" name="bairro" placeholder="Ex. Jardim São Paulo">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Estado</label>
				  <div class="col-md-3">
					<select type="text" class="form-control" id="estado" name="estado"></select>
				  </div>
				  <label class="col-sm-2 control-label">Cidade</label>
				  <div class="col-md-3">
					<select type="text" class="form-control" id="cidade" name="cidade" ></select>
				  </div>
				</div>
				<div class="form-group">
				  <div class="col-sm-offset-8 col-sm-12">
					<button type="submit" class="btn btn-success btn-lg">Editar</button>
				  </div>
				</div>
			  </form>
			</div>
		  </div>
		</div>
        <!-- /#page-content-wrapper -->

    </div>

  </body>
</html>