<?php

$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root.'/connection.php';
require_once $root.'/validation.php';
require_once $root.'/Model/Empresario.php';
require_once $root.'/Model/Freelancer.php';

/* verifica se o email ja esta registrado */

// abre a conexao com o banco de dados
DB::connect();

if (!empty($_POST['email']))
{
    $email = test_input($_POST['email']);
    $registrado = Empresario::emailRegistrado($email);

    if($registrado === true)
    {
        echo "false";  //registrado
    }
    else
    {
        $registrado = Freelancer::emailRegistrado($email);

        if($registrado === true)
        {
            echo "false";  //registrado
        }
        else
        {
            echo "true"; //nao registrado
        }
    }
}
else
{
    echo "false"; //invalid post var
}

// fecha a conexao com o banco de dados
DB::close();

?>