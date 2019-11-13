<?php
require_once '..\conexao.php';

$objetivo = $_GET["objetivo"];
$retorno = $_POST["retorno"]; if (empty($retorno)) {$retorno = $_GET["retorno"];}

if (($objetivo == 'A') || ($objetivo == 'I'))
{
    $id = $_POST["id"];
    $descricao = $_POST["descricao"];
    $ordem = $_POST["ordem"];
    $pergunta_id = $_POST["pergunta_id"];
    if ($objetivo == 'A')
    {
        $query = "update opcoes_pergunta set descricao='$descricao', ordem=$ordem,pergunta_id = $pergunta_id where id=$id";
        echo "$query";
        $result = $conn->query($query);
        if(!$result) die("Fatal Error");
    }
    if ($objetivo == 'I')
    {
        $query = "insert into opcoes_pergunta (descricao, ordem, pergunta_id) values ('$descricao',$ordem,$pergunta_id)";
        $result = $conn->query($query);
        if(!$result) die("Fatal Error");
    }
}
if ($objetivo == 'X')
{
    $id = $_GET["id"];
    $query = "delete from opcoes_pergunta where id=$id";
    $result = $conn->query($query);
    if(!$result) die("Fatal Error");
}
header('Location:'.$retorno);
