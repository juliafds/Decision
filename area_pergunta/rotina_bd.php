<?php
require_once '..\conexao.php';

$objetivo = $_GET["objetivo"];
$retorno = $_POST["retorno"]; if (empty($retorno)) {$retorno = $_GET["retorno"];}

if (($objetivo == 'A') || ($objetivo == 'I'))
{
    $id = $_POST["id"];
    $area_id = $_POST["area_id"];
    $pergunta_id = $_POST["pergunta_id"];
    $peso = $_POST["peso"];

    if ($objetivo == 'A')
    {
        $query = "update area_pergunta set area_id=$area_id, pergunta_id=$pergunta_id, peso='$peso' where id=$id";
        echo "$query";
        $result = $conn->query($query);
        if(!$result) die("Fatal Error1");
    }
    if ($objetivo == 'I')
    {
        $query = "insert into area_pergunta(area_id, pergunta_id,peso) values($area_id, $pergunta_id, '$peso')";
        $result = $conn->query($query);
        if(!$result) die("Fatal Error1");
    }
}
if ($objetivo == 'X')
{
    $id = $_GET["id"];
    $query = "delete from area_pergunta where id=$id";
    $result = $conn->query($query);
    if(!$result) die("Fatal Error");
}
header('Location:'.$retorno);