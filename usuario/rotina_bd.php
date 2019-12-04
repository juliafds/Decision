<?php
require_once '..\conexao.php';

$objetivo = $_GET["objetivo"];

if (($objetivo == 'A') || ($objetivo == 'I')) {
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $login = $_POST["login"];
    $senha = $_POST["senha"];
    if ($_POST["admin"])
    {
        $admin = 1;
    }
    else {
        $admin = 0;
    }
    if ($objetivo == 'A') {
        $query = "update usuario set nome='$nome', login='$login', senha='$senha',admin='$admin' where id=$id";
        echo "$query";
        $result = $conn->query($query);
        if (!$result) die("Fatal Error");
    }
    if ($objetivo == 'I') {
        $query = "insert into usuario (nome,login,senha,admin) values ('$nome','$login','$senha','$admin')";
        $result = $conn->query($query);
        if (!$result) die("Fatal Error");
    }
}
if ($objetivo == 'X') {
    $id = $_GET["id"];
    $query = "delete from usuario where id=$id";
    $result = $conn->query($query);
    if (!$result) die("Fatal Error");
}
header('Location: form_list.php');