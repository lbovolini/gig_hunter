<!DOCTYPE html>
<html lang="pt-br">

	<!-- Head -->
	<?php 
	$root = $_SERVER['DOCUMENT_ROOT'];
	require $root.'/View/Templates/Head.php'; ?>
	
	<body>
		<!-- Navigation -->
		<?php
		$root = $_SERVER['DOCUMENT_ROOT']; 
		require $root.'/View/Templates/IndexNav.php'; ?>
		
		<!-- Header -->
		<a name="about"></a>
		<div class="intro-header">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="intro-message">
							<h1>Gig Hunter</h1>
							<h3>Busca e oferta de empregos</h3>
							<hr class="intro-divider">
							<section class="main">
								<form class="form-login" action="" method="POST">
									<h3>Login</h3>
									<p class="field">
										<input type="text" name="login" placeholder="Username">
									</p>
									<p class="field">
										<input type="password" name="senha" placeholder="Senha">
									</p>
									<button type="submit" class="btn btn-default">Entrar</button>
								</form>
							</section>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Footer, jQuery, Bootstrap -->
		<?php
		$root = $_SERVER['DOCUMENT_ROOT']; 
		require $root.'/View/Templates/Footer.php'; ?>

	<body>	
</html>

<?php
/*
 * caso haja o preencimento dos dados e a submissão do formulário, o
 * controlador, será chamado para interpretar a ação
 */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $root = $_SERVER['DOCUMENT_ROOT'];
  require_once $root.'/Controller/LoginController.php';

  $login = new LoginController();
  $login->logar();
}
?>