<?php
require_once '..\conexao.php';

$objetivo = $_GET["objetivo"];

if (($objetivo == 'A') || ($objetivo == 'I'))
{
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $mercado = $_POST["mercado"];
    $imagem = $_POST["imagem"];
    $peqdesc = $_POST["peqdesc"];
    if ($objetivo == 'A')
    {
        $query = "update area set nome='$nome', descricao='$descricao', mercado='$mercado', imagem ='$imagem', peqdesc='$peqdesc' where id=$id";
        echo "$query";
        $result = $conn->query($query);
        if(!$result) die("Fatal Error");
    }
    if ($objetivo == 'I')
    {
        $query = "insert into area (nome,descricao,mercado,imagem,peqdesc) values ('$nome', '$descricao', '$mercado','$imagem','$peqdesc')";
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