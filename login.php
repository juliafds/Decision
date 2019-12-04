<?php
require_once "conexao.php";
session_start();
$login = $_POST['login'];
$senha = $_POST['senha'];


if(isset($login)){

    $query = "select id, nome,login,senha,admin from usuario where login='$login' and senha='$senha'";
    $result =$conn->query($query);
    if(!$result) die("Fatal Error");
    $rows = $result->num_rows;


    $row = $result->fetch_assoc();
    $loginr = $row['login'];
    $nomer = $row['nome'];
    $adminr = $row['admin'];

    if($rows == 0){
        //"Usuário e/ou senha incorreto(s) ou vc nao ta cadastrado";
        echo "<script language='javascript'  type='text/javascript'>
            alert('Login e/ou senha incorretos');
            window.location.href='login_form.php';
            </script>";
        die();
    }
    else{
        $_SESSION['login'] = $login;
        $_SESSION['senha'] = $senha;
        $_SESSION['admin'] = $adminr;
        header('location:decision.php');
    }
}



