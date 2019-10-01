<?php
require_once '..\conexao.php';

$objetivo = $_GET["objetivo"];

if (($objetivo == 'A') || ($objetivo == 'I'))
{
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $duracao = $_POST["duracao"];
    $disciplinas = $_POST["disciplinas"];
    $descricao = $_POST["descricao"];
    $area_id= $_POST["area_id"];
    if ($objetivo == 'A')
    {
        $query = "update subarea set nome='$nome', duracao='$duracao', disciplinas='$disciplinas',descricao='$descricao', area_id='$area_id' where id=$id";
        echo "$query";
        $result = $conn->query($query);
        if(!$result) die("Fatal Error");
    }
    if ($objetivo == 'I')
    {
        $query = "insert into subarea (nome,duracao,disciplinas,descricao,area_id) values ('$nome','$duracao','$disciplinas','$descricao', '$area_id')";
        $result = $conn->query($query);
        if(!$result) die("Fatal Error");
    }
}
if ($objetivo == 'X')
{
    $id = $_GET["id"];
    $query = "delete from subarea where id=$id";
    $result = $conn->query($query);
    if(!$result) die("Fatal Error");
}
header('Location: form_list.php');