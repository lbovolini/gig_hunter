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
            <th><h2>Empresario</h2></th>
            <th><h2>Freelancer</h2></th>
            <th><h2>Academico</h2></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="col-md-4">
              <p>Vel ea dicta affert, eu unum feugait scripserit sit. Velit aliquam no per. Et constituto adversarium pro, cum dicta reprehendunt ea. Ut platonem democritum sit, an alii clita ius.</p>
              <a href="/View/Empresario/Create.php" class="btn btn-primary btn-lg">Criar Conta</a>
            </td>
            <td class="col-md-4">
              <p>Sadipscing dissentiet persequeris eos te. Usu vidit ullamcorper et, et mucius malorum has. Vel dolores noluisse complectitur at, ne sea habeo malis fabulas. Te quod tollit atomorum sit, pro ne esse etiam. Usu option aliquando id.</p>
              <a href="/View/Freelancer/Create.php" class="btn btn-primary btn-lg">Criar Conta</a>
            </td>
            <td class="col-md-4">
              <p>Per quis quidam perpetua ne, ea quis summo labore pro, odio labitur vis ut. Populo accusam vulputate ea duo. Libris copiosae consetetur qui an. Semper everti prodesset an pri. Fabellas recusabo voluptaria et ius. Nominavi persecuti nam an.</p>
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