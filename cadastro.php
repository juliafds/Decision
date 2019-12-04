<?php

require_once "conexao.php";

$nome = $_POST['nome'];
$login = $_POST['login'];
$senha = $_POST['senha'];

$query = "SELECT login FROM usuario WHERE login = '$login'";
$result =$conn->query($query);
if(!$result) die("Fatal Error");
$rows = $result->num_rows;

$row = $result->fetch_assoc();
$loginp = $row['login'];


  if($login == "" || $login == null || $nome == "" || $nome == null || $senha == "" || $senha == null){
    echo"<script language='javascript' type='text/javascript'>
    alert('Todos os campos devem ser preenchidos');window.location.href='cadastro_form.php';</script>";

    }else{
      if($loginp == $login){

        echo"<script language='javascript' type='text/javascript'>
        alert('Esse login já existe');window.location.href='cadastro_form.php';</script>";
        die();

      }
      else{
          $senha1 = MD5($senha);
          $query2 = "INSERT INTO usuario(nome,login,senha) VALUES('$nome','$login','$senha') ";
          $result2 =$conn->query($query2);
          if(!$result2) die("Fatal Error");

        if($result2){
          echo"<script language='javascript' type='text/javascript'>
          alert('Usuário cadastrado com sucesso!');window.location.href='login_form.php'</script>";
        }
        else{
          echo"<script language='javascript' type='text/javascript'>
          alert('Não foi possível cadastrar esse usuário');window.location.href='cadastro_form.php'</script>";
        }
      }
    }
?>


