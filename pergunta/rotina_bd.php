<?php
require_once '..\conexao.php';

$objetivo = $_GET["objetivo"];

if (($objetivo == 'A') || ($objetivo == 'I'))
{
    $id = $_POST["id"];
    $descricao = $_POST["descricao"];
    $img = $_POST["img"];
    if ($objetivo == 'A')
    {
        $query = "update pergunta set descricao='$descricao', img='$img' where id=$id";
        echo "$query";
        $result = $conn->query($query);
        if(!$result) die("Fatal Error");
    }
    if ($objetivo == 'I')
    {
        $query = "insert into pergunta (descricao, img) values ('$descricao','$img')";
        $result = $conn->query($query);
        if(!$result) die("Fatal Error");
    }
}
if ($objetivo == 'X')
{
    $id = $_GET["id"];
    $query = "delete from pergunta where id=$id";
    $result = $conn->query($query);
    if(!$result) die("Fatal Error");
}
header('Location: form_list.php');