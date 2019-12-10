<?php
require_once "conexao.php";
require_once "cabecalho.php";
$id = $_GET["id"];

$query = "select nome, duracao, disciplinas, descricao, area_id, imagem, peqdesc, mercado from subarea where id='$id';";
$result =$conn->query($query);
if(!$result) die("Fatal Error");

$row = $result->fetch_assoc();
$nome = $row['nome'];
$duracao = $row['duracao'];
$desc = $row['descricao'];
$disciplinas = $row['disciplinas'];
$mercado = $row['mercado'];
$area_id = $row['area_id'];

$query2 = "select nome from area where id='$area_id';";
$result2 =$conn->query($query2);
if(!$result2) die("Fatal Error");

$row2 = $result2->fetch_assoc();
$n_area = $row2['nome'];

echo <<<END

<div id="section1" class="container-fluid " style="padding-top:70px;padding-bottom:10px; background-color: #ffffff; margin-top: -60px;">
   <div class="container">
    <div class="row">
    <div class="col-12 my-5">
    <h1 class="text-center">$nome</h1>
      <br>
     <p align="justify">$desc</p>

    </div>
  </div>
  </div>
</div>

<div id="section2" class="container-fluid " style="padding-top: 0px;padding-bottom:70px; margin-top: -40px; background-color: #DCDCDC;">
  <div class="container">
   <div class="row">
   <div class="col-12 my-5">
     <h1 class="text-center">Mercado</h1>
     <br>
     <p align="justify">$mercado</p>
   </div>
 </div>
 </div>
</div>

<div id="section3" class="container-fluid " style="padding-top:0px;padding-bottom:70px; background-color: #ffffff; margin-top: -50px;">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center my-5">
                <h1>Disciplinas</h1>
            </div>
            <p align="justify">$disciplinas</p><br>
            
            <p align="justify"><b>Duração média do curso: </b>$duracao</p>
        </div>



    </div>
</div>

END;
require_once "rodape.php";
