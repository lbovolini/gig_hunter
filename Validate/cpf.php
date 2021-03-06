<?php

$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root.'/connection.php';
require_once $root.'/validation.php';
require_once $root.'/Model/Empresario.php';
require_once $root.'/Model/Freelancer.php';

/* verifica se o cpf ja esta registrado */

// abre a conexao com o banco de dados
DB::connect();

if (!empty($_POST['cpf']))
{
    $cpf = test_input($_POST['cpf']);
    $registrado = Empresario::cpfRegistrado($cpf);

    if($registrado === true)
    {
        echo "false";  //registrado
    }
    else
    {
        $registrado = Freelancer::cpfRegistrado($cpf);

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