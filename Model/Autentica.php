<?php

 
abstract class Autenticador {
 
    private static $instancia = null;
 
    private function __construct() {}
 
    /**
     * 
     * @return Autenticador
     */
    public static function instanciar() {
 
        if (self::$instancia == NULL) {
            self::$instancia = new AutenticadorDB();
        }
 
        return self::$instancia;
 
    }
 
    public abstract function entrar($username, $senha);
    public abstract function esta_logado();
    public abstract function pegar_usuario();
    public abstract function expulsar();
 
}
 
class AutenticadorDB extends Autenticador {
 
    public function esta_logado() {
 
        if (isset($_SESSION['username']) && (!empty($_SESSION['username']))) {
            return true;
        }
        else {
            return false;
        }
 
    }
 
    public function entrar($username, $senha) 
    {
        // procura login de empresario
        $query = "SELECT id, nome, username, 'Empresario' AS tipo 
                  FROM empresarios 
                  WHERE `username` = '{$username}' 
                  AND `senha` = '{$senha}' 
                  LIMIT 1";

        $row = mysql_query($query);
        $row = mysql_fetch_array($row);

        // empresario encontrado
        if($row) 
        {
            $_SESSION['id']       = $row['id'];
            $_SESSION['nome']     = $row['nome'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['tipo']     = $row['tipo'];

            return true;
        }

        // procura login de freelancer e academico
        $query = "SELECT id, nome, username, tipo 
                  FROM usuarios 
                  WHERE `username` = '{$username}' 
                  AND `senha` = '{$senha}' 
                  LIMIT 1";

        $row = mysql_query($query);
        $row = mysql_fetch_array($row);

        // freelancer ou academico encontrado
        if($row) 
        {
            $_SESSION['id']       = $row['id'];
            $_SESSION['nome']     = $row['nome'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['tipo']     = $row['tipo'];

            return true;
        }

        // admin
        if($username == 'admin' && $senha == '12345678')
        {
            $_SESSION['nome']     = 'Administrador';
            $_SESSION['username'] = $username;
            $_SESSION['tipo']     = 'Admin';
            return true;
        }

        // login nao encontrado
        return false; 
    }

 
    public function pegar_usuario() {
 
        if ($this->esta_logado()) {
            $usuario = $_SESSION['username'];
            return $usuario;
        }
        else {
            return false;
        }
 
    }
 
    public function expulsar() {
        header('location: /index.php');
    }
 
}