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
      <div class="matshead">
        <h2 class="text-muted">Cadastrar Empresário</h2>
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
                <input class="form-control" type="text" id="data_nascimento" name="data_nascimento" placeholder="Ex. 01/01/1999">
              </div>
              <label class="col-sm-2 control-label">Número de Telefone</label>
                <div class="col-md-3">
                  <input class="form-control" type="text" id="telefone" name="telefone" placeholder="Ex. (55) 9988-7766">
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
              <div class="col-sm-offset-7 col-sm-12">
				<input type="button" value="Cancelar" class="btn btn-danger btn-lg" onclick="javascript: location.href='/index.php';" />&nbsp
                <button type="submit" class="btn btn-success btn-lg">Cadastrar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Footer, jQuery, Bootstrap -->
    <?php
    $root = $_SERVER['DOCUMENT_ROOT']; 
    require $root.'/View/Templates/Footer.php'; ?>
    <!-- Lista de cidades e estados -->
    <!--<script src="/public/js/cidades-estados-v0.2.js"></script>-->
    <script language="JavaScript" type="text/javascript" src="/public/js/cidades-estados-utf8.js"></script>

    <script language="JavaScript" type="text/javascript" charset="utf-8">
      new dgCidadesEstados({
        cidade: document.getElementById('cidade'),
        estado: document.getElementById('estado')
      })
    </script>
    <!-- jQuery validate -->
    <script src="/public/js/jquery.validate.min.js"></script>
    <!-- Valida cadastro -->
    <script src="/public/js/validate/empresario.validate.js"></script>
    <!-- masked input -->
    <script src="/public/js/jquery.maskedinput.min.js"></script>
  </body>
</html>
<?php
/*
 * caso haja o preencimento dos dados e a submissão do formulário, o
 * controlador, será chamado para interpretar a ação
 */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $root = $_SERVER['DOCUMENT_ROOT'];
  require_once $root.'/Controller/EmpresarioController.php';

  $empresario = new EmpresarioController();
  $empresario->criar();
  
  echo "<script> alert('Conta criada com sucesso!'); location.href='/index.php'; </script>";
}
?>
