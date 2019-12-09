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
        $query2 = "INSERT INTO area_opcoes_pergunta (area_id, opcoes_id, peso)
                    SELECT area.id,opcoes_pergunta.id, 1  FROM area, opcoes_pergunta
                    where NOT EXISTS(select * from area_opcoes_pergunta as aop where
                    aop.area_id=area.id and aop.opcoes_id=opcoes_pergunta.id)";
        $result2 = $conn->query($query2);
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