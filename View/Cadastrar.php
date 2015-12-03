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

    <div class="container">
      <table class="table table-condensed table-striped">
        <thead>
          <tr>
            <th><h2>Empresário</h2></th>
            <th><h2>Freelancer</h2></th>
            <th><h2>Acadêmico</h2></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="col-md-4">
              <p>Se você é dono ou dirigente de uma empresa, ou que opera no agenciamento de negócios, cuidando dos interesses profissionais e financeiros de pessoas que têm um desempenho público destacado.</p>
              <a href="/View/Empresario/Create.php" class="btn btn-primary btn-lg">Criar Conta</a>
            </td>
            <td class="col-md-4">
              <p>Se você é um profissional autônomo que se autoemprega em diferentes empresas ou, ainda, guia seus trabalhos por projetos, captando e atendendo seus clientes de forma independente.</p>
              <a href="/View/Freelancer/Create.php" class="btn btn-primary btn-lg">Criar Conta</a>
            </td>
            <td class="col-md-4">
              <p>Se você é um estudante de uma universidade ou um estabelecimento de ensino superior, seja em áreas de ensino ou pesquisa, e busca uma graduação de nível superior.</p>
              <a href="/View/Academico/Create.php" class="btn btn-primary btn-lg">Criar Conta</a>
            </td>
          </tr>
        </tbody>
      </table>
      
    </div>
    <!-- Footer, jQuery, Bootstrap -->
    <?php
    $root = $_SERVER['DOCUMENT_ROOT']; 
    require $root.'/View/Templates/Footer.php'; ?>
  </body>
</html>