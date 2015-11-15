<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require $root.'/Controller/Auth.php'; ?>

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
                    <a href="#">Vaga</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Acadêmico</h1>
                        <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                        <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>

  </body>
</html>