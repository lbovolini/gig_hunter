<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <div>
          <button class="close glyphicon glyphicon-remove" data-dismiss="modal" aria-hidden="true"/>
        </div>
        <div>
          <h4 class="modal-title" id="loginModalLabel">Entrar</h4>
        </div>
 
        <form id="login-form" action="" method="POST">
          <div class="modal-body">
            <div class="form-group">
              <div class="input-group">
                <input type="text" class="form-control" id="email" name="email" placeholder="Username">
                <label for="email" class="input-group-addon glyphicon glyphicon-user"></label>
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <input type="password" class="form-control" id="password" name="password" placeholder="Senha">
                <label class="input-group-addon glyphicon glyphicon-lock"></label>
                <span class="error" for="password" generated="true"></span>
              </div>
            </div>
          </div> 

          <div class="modal-footer text-left">
            <button type="submit" class="pull-left btn btn-success">Entrar</button>

            <div class="progress">
              <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="100" style="width: 0%;">
                <span class="sr-only">progress</span>
              </div>
            </div>
          </div> 
        </form>
        
      </div>
    </div>
  </div>
</div>
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