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
							<ul class="list-inline intro-social-buttons">
								<li>
									<a href="/View/Login.php" class="btn btn-primary btn-lg"><i class="glyphicon glyphicon-log-in"></i> <span class="network-name">Entrar</span></a>
								</li>
								<li>
									<a href="/View/Empresario/Create.php" class="btn btn-success btn-lg"><i class="glyphicon glyphicon-user"></i> <span class="network-name">Cadastro</span></a>
								</li>
							</ul>
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