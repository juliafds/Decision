<?php
session_start();
require_once "conexao.php";
$op_id = $_POST['op_id'];
$pergunta_id = $_POST['pergunta_id'];
$usuario_id = $_SESSION['id'];

$query = "select resposta.id, opcoes_pergunta_id, usuario_id 
from resposta, opcoes_pergunta,pergunta
where pergunta.id=opcoes_pergunta.pergunta_id
  and opcoes_pergunta.id = resposta.opcoes_pergunta_id
  and  usuario_id=$usuario_id and pergunta.id=$pergunta_id";

$result =$conn->query($query);
if(!$result) die("Fatal Error");
$rows = $result->num_rows;

if($rows == 0){
    $query2 = "INSERT INTO resposta(opcoes_pergunta_id,usuario_id) VALUES('$op_id','$usuario_id') ";
    $result2 =$conn->query($query2);
    if(!$result2) die("Fatal Error");
}
else{
    $row = $result->fetch_assoc();
    $resposta_id = $row['id'];

    $query2 = "UPDATE resposta set opcoes_pergunta_id = '$op_id',usuario_id='$usuario_id' where resposta.id='$resposta_id' ";
    $result2 =$conn->query($query2);
    if(!$result2) die("Fatal Error");
}
header('location:quiz_perguntas.php?id='.$pergunta_id);