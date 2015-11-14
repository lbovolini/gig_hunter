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
                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                <label for="username" class="input-group-addon glyphicon glyphicon-user"></label>
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
      					<input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
			       		<label for="password" class="input-group-addon glyphicon glyphicon-lock"></label>					
              </div>
            </div>
          </div> 

          <div class="modal-footer text-left">
            <button type="submit" class="pull-left btn btn-success">Entrar</button>
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