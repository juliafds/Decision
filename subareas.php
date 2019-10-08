<html>
<?php
require_once "conexao.php";
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

<head>
<title>$nome</title>
<meta charset="utf-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="icon" href="Imagens/ultimo.png">
  <!--isso é o icone do decision no title-->
</head>    

<body data-spy="scroll" data-target=".navbar" data-offset="50">
<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">  
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="decision.php">Início</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="areas.php?id=$area_id">$n_area</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#section1">$nome</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#section2">Mercado</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#section3">Disciplinas</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#section4">footer</a>
    </li>
   
  </ul>
</nav>
<div id="section1" class="container-fluid " style="padding-top:70px;padding-bottom:10px; background-color: #ffffff">
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

<div id="section2" class="container-fluid " style="padding-top: 0px;padding-bottom:70px; ">
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

<div id="section3" class="container-fluid " style="padding-top:0px;padding-bottom:70px; background-color: #ffffff">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center my-5">
                <h1>Disciplinas</h1>
            </div>
            <p align="justify">$disciplinas</p>
            
            <p align="justify"><b>Duração média do curso: </b>$duracao</p>
        </div>



    </div>
</div>


END;


?>

<div id="section4" class="container-fluid bg-secondary" style="padding-top:70px;padding-bottom:70px">
    <div class="container r">
      <center><h1 class="display-3"> footer </h1></center>
    </div>
</div>

</body>
</html>