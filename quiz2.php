<html>
<head>
<title> Decision </title>
<meta  charset = " utf-8 ">  
    <meta  name = " viewport "  content = " width = largura do dispositivo, escala inicial = 1 ">
    <link  rel = " stylesheet "  href = " https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css ">
    <script  src = " https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js "> </script>
    <script  src = " https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js " > </script>
    <script  src = " https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js " > </script>
    <link  rel = " icon "  href = " Imagens / ultimo.png ">
  <!-- isso é o icone da decision no title -->
  <style>
    .page-link {
      color: #19256c;
    }
  </style>
</head> 

<body>
<nav class="navbar navbar-expand-sm navbar-dark sticky-top fixed-top" style="background-color: #19256c">
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
         <li class="nav-item">
        <a class="nav-link" href="#section6">Mercado</a>
      </li>
        <a class="nav-link" href="#section7">Quiz</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#section8">Sobre nós</a>
      </li>
        <li style="text-align: left">
            <a class="nav-link" href="home.php">Admin</a>
        </li>
  
    </ul>
  </nav>

<div class="container">
<center>
<div class="col-sm-10 my-4" style="background-color:white; justify-content: center;">

  <ul class="pagination pagination-lg " style="margin-bottom: 0px;" >
    <li class="page-item"><a class="page-link" href="#" >Anterior</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">4</a></li>
    <li class="page-item"><a class="page-link" href="#">5</a></li>
    <li class="page-item"><a class="page-link" href="#">6</a></li>
    <li class="page-item"><a class="page-link" href="#">7</a></li>
    <li class="page-item"><a class="page-link" href="#">8</a></li>
    <li class="page-item"><a class="page-link" href="#">9</a></li>
    <li class="page-item"><a class="page-link" href="#">10</a></li>
    <li class="page-item"><a class="page-link" href="#">Próximo</a></li>
  </ul>


    <div class="card text-center" style="width:100%; ">
        <img class="card-img-top" src="imagens/violino1.jpg" alt="Card image" style="width:100%">
            <div class="card-body">
                <h4 class="card-title text-center">Eu sei tocar um instrumento musical</h4>
                <p class="card-text"><small class="text-muted">Selecione uma das opções abaixo</small></p>  
               
                        <button type="button" class="btn btn-lg" style="border-radius: 50%; background-color: #19256c; color: white;">1</button>
                        <button type="button" class="btn btn-lg" style="border-radius: 50%; background-color: #19256c; color: white;">2</button>
                        <button type="button" class="btn btn-lg" style="border-radius: 50%; background-color: #19256c; color: white;">3</button>
                        <button type="button" class="btn btn-lg" style="border-radius: 50%; background-color: #19256c; color: white;">4</button>
                        <button type="button" class="btn btn-lg" style="border-radius: 50%; background-color: #19256c; color: white;">5</button>
                    
             <!--  
                <a href="#" class="btn btn-primary">1</a>
                <a href="#" class="btn btn-primary">2</a>
                <a href="#" class="btn btn-primary">3</a>
                <a href="#" class="btn btn-primary">4</a>
                <a href="#" class="btn btn-primary">5</a>
             -->
            </div>
    </div>
</div>
</center>
</div>
</body>
</html>


