<?php

$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root.'/connection.php';
require_once $root.'/validation.php';
require_once $root.'/Model/Empresario.php';
require_once $root.'/Model/Freelancer.php';

/* verifica se o RG ja esta registrado */

// abre a conexao com o banco de dados
DB::connect();

if (!empty($_POST['rg']))
{
    $rg = test_input($_POST['rg']);
    $registrado = Empresario::rgRegistrado($rg);

    if($registrado === true)
    {
        echo "false";  //registrado
    }
    else
    {
        $registrado = Freelancer::rgRegistrado($rg);

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