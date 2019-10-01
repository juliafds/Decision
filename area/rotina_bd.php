<?php
require_once '..\conexao.php';

$objetivo = $_GET["objetivo"];

if (($objetivo == 'A') || ($objetivo == 'I'))
{
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $mercado = $_POST["mercado"];
    if ($objetivo == 'A')
    {
        $query = "update area set nome='$nome', descricao='$descricao', mercado='$mercado' where id=$id";
        echo "$query";
        $result = $conn->query($query);
        if(!$result) die("Fatal Error");
    }
    if ($objetivo == 'I')
    {
        $query = "insert into area (nome,descricao,mercado) values ('$nome', '$descricao', '$mercado')";
        $result = $conn->query($query);
        if(!$result) die("Fatal Error");
    }
}
if ($objetivo == 'X')
{
    $id = $_GET["id"];
    $query = "delete from area where id=$id";
    $result = $conn->query($query);
    if(!$result) die("Fatal Error");
}
header('Location: form_list.php');