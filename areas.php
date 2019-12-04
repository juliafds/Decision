<?php
    require_once "conexao.php";
    require_once "cabecalho.php";
    $id = $_GET["id"];

    $query = "select id, nome, descricao, mercado, imagem, peqdesc from area where id='$id';";
    $result =$conn->query($query);
    if(!$result) die("Fatal Error");

    $row = $result->fetch_assoc();
    $nome = $row['nome'];
    $desc = $row['descricao'];
    $mercado = $row['mercado'];

    echo <<<END
<div id="section1" class="container-fluid" style="padding-top:70px;padding-bottom:10px; background-color: #ffffff">
   <div class="container">
    <div class="row">
    <center>
    <div class="col-10 text-center my-5">
    <h1 class="display-4 ">$nome</h1>
  
      <br>
     <p align="justify">$desc</p>
    </div></center>
    
  </div>
  </div>
</div>

<div id="section2" class="container-fluid " style="padding-top:40px;padding-bottom:70px;">
  <div class="container">
   <div class="row">
   <center>
   <div class="col-10 text-center my-5">
     <h5 class="display-4">Mercado de Trabalho</h5 class="display-4">
     <br>
     <p align="justify">$mercado</p>
   </div>
   </center>
 </div>
 </div>
</div>

END;

    ?>

<?php

require_once "conexao.php";
$id = $_GET["id"];

$query = "select id, nome, duracao, disciplinas, descricao, imagem, peqdesc from subarea where area_id = $id;";
$result =$conn->query($query);
if(!$result) die("Fatal Error");
$rows = $result->num_rows;

echo <<<END
<div id="section3" class="container-fluid " style="padding-top:70px;padding-bottom:70px; background-color: #ffffff">
<div class="container">
    <div class="row">
  	<div class="col-12 text-center my-4">
  		<h1 class="display-4">Subáreas</h1>
    </div>
  </div>

END;


for($j = 0; $j < $rows; ++$j){
    $row = $result->fetch_assoc();
    $nome = $row['nome'];
    $peqdesc = $row['peqdesc'];
    $imagem = $row['imagem'];
    $id = $row['id'];

    echo <<<END

<center><div class="row card mb-3 my-4 border-0" style="max-width: 90%">
      <div class="row no-gutters">
        <div class="col-md-4">
          <img src="$imagem" class="card-img " alt="oioioi">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <a href="subareas.php?id=$id"><h5 class="card-title">$nome</h5></a>
             <br>
            <p class="card-text" align="justify" style="margin-left: 50px;">$peqdesc</p>
         
          </div>
        </div>
      </div>
    </div></center>

END;

}

echo <<<END
            </div>
    </div>


END;
require_once "rodape.php";
?>
