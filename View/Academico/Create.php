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
        <h2 class="text-muted">Cadastrar Acadêmico</h2>
      </div>
      <hr class="featurette-divider">
      <div class="row">
        <div class="col-xs-12 col-md-8">
          <form class="form-horizontal" action="" method="POST">
            <div class="form-group">
            <label class="col-sm-2 control-label">Nome</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="nome" placeholder="Ex. João da Silva">
            </div>
            </div>
            <div class="form-group">
            <label class="col-sm-2 control-label">Email</label>
            <div class="col-md-8">
              <input class="form-control" type="email" name="email" placeholder="Ex. joao@mail.com">
            </div>
            </div>            
            <div class="form-group">
            <label class="col-sm-2 control-label">Confirmação de Email</label>
            <div class="col-md-8">
              <input class="form-control" type="email" name="confirmacao_email" placeholder="Ex. joao@mail.com">
            </div>
            </div>
            <div class="form-group">
            <label class="col-sm-2 control-label">Nome de Usuário</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="username" placeholder="Ex. jsilva">
            </div>
            </div>
            <div class="form-group">
            <label class="col-sm-2 control-label">Senha</label>
            <div class="col-md-8">
              <input class="form-control" type="password" name="senha" placeholder="Min. 8 Caracteres">
            </div>
            </div>
            <div class="form-group">
            <label class="col-sm-2 control-label">Confirmação de Senha</label>
            <div class="col-md-8">
              <input class="form-control" type="password" name="confirmacao_senha" placeholder="Min. 8 Caracteres">
            </div>
            </div>
            <div class="form-group">
            <label class="col-sm-2 control-label">Data de Nascimento</label>
            <div class="col-md-3">
              <input class="form-control" type="date" name="data_nascimento" placeholder="Ex. 01/01/1999">
            </div>
            <label class="col-sm-2 control-label">Número de Telefone</label>
            <div class="col-md-3">
              <input class="form-control" type="tel" name="telefone" placeholder="Ex. 5599887766">
            </div>
            </div>
            <div class="form-group">
            <label class="col-sm-2 control-label">RG</label>
            <div class="col-md-3">
              <input class="form-control" type="text" name="rg" placeholder="Ex. 6677788899">
            </div>
            <label class="col-sm-2 control-label">CPF</label>
            <div class="col-md-3">
              <input class="form-control" type="text" name="cpf" placeholder="Ex. 999.888.777-66">
            </div>
            </div>
            <div class="form-group">
            <label class="col-sm-2 control-label">CEP</label>
            <div class="col-md-4">
              <input class="form-control" type="text" name="cep" placeholder="Ex. 01000-099">
            </div>
            </div>
            <div class="form-group">
            <label class="col-sm-2 control-label">Rua</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="rua" placeholder="Ex. R. São Paulo">
            </div>
            </div>
            <div class="form-group">
            <label class="col-sm-2 control-label">Bairro</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="bairro" placeholder="Ex. Jardim São Paulo">
            </div>
            </div>
            <div class="form-group">
            <label class="col-sm-2 control-label">Estado</label>
            <div class="col-md-2">
              <input class="form-control" type="text" name="estado" name="estado">
            </div>
            <label class="col-sm-2 control-label">Cidade</label>
            <div class="col-md-4">
              <input class="form-control" type="text" name="cidade" name="cidade">
            </div>
            </div>
			<div class="form-group">
            <label class="col-sm-2 control-label">Instituição de Ensino</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="instituicao" placeholder="Ex. Universidade de São Paulo">
            </div>
            </div>
			<div class="form-group">
            <label class="col-sm-2 control-label">Matrícula</label>
            <div class="col-md-4">
              <input class="form-control" type="text" name="matricula" placeholder="Ex. 200020209">
            </div>
            </div>
			<div class="form-group">
            <label class="col-sm-2 control-label">Lattes</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="lattes" placeholder="Ex. ">
            </div>
            </div>
			<div class="form-group">
            <label class="col-sm-2 control-label">Linkedin</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="linkedin" placeholder="Ex. ">
            </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-8 col-sm-12">
                <button type="submit" class="btn btn-primary btn-lg">Cadastrar</button>
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
  </body>
</html>

<?php
/*
 * caso haja o preencimento dos dados e a submissão do formulário, o
 * controlador, será chamado para interpretar a ação
 */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $root = $_SERVER['DOCUMENT_ROOT'];
  require_once $root.'/Controller/AcademicoController.php';

  $academico = new AcademicoController();
  $academico->criar();
}
?>
