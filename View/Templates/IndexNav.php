<nav class="navbar-default navbar-top topnav" role="navigation">
  <div class="container topnav">
  
    <?php
    $root = $_SERVER['DOCUMENT_ROOT']; 
    require $root.'/View/Login.php'; ?>
	
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="../../index.php"><i class="navbar-brand topnav fa fa-briefcase fa-2x"></i></a>
      <a class="navbar-brand topnav" href="/index.php">Gig Hunter</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="#loginModal" data-toggle="modal" >Entrar</a>
        </li>
        <li>
          <a href="../../View/Cadastrar.php">Cadastro</a>
        </li>
        <li>
          <a href="../../View/Templates/About.php">Sobre</a>
        </li>
      </ul>
    </div>
  </div>
</nav>