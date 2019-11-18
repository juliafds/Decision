<html>
<head>
<title>Decision</title>
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
<nav class="navbar navbar-expand-sm navbar-dark fixed-top" style="background-color: #19256c">  
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="decision.php">Início</a>
    </li>
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Áreas
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <?php

              require_once "conexao.php";
              $query = "select id, nome from area";
              $result =$conn->query($query);
              if(!$result) die("Fatal Error");
              $rows = $result->num_rows;

              for($j = 0; $j < $rows; ++$j){
                  $row = $result->fetch_assoc();
                  $id = $row['id'];
                  echo "<a class='dropdown-item' href='areas.php?id=$id'>" . $row['nome'] . "</a>";
              }
              ?>
          </div>
      </li>
    <li class="nav-item">
      <a class="nav-link" href="#section2">Mercado</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#section3">Subárea</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#section4">footer</a>
    </li>
   
  </ul>
</nav>

<?php
    require_once "conexao.php";
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

?>

<div id="section4" class="container-fluid bg-secondary" style="padding-top:70px;padding-bottom:70px">
    <div class="container r">
      <center><h1 class="display-3"> footer </h1></center>
    </div>
</div>

</body>
</html>
