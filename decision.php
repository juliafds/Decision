<html lang="pt-br">
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

<style>
 
  .carousel-inner img {
    width: 100%;
    height: 100%;
  }
  

</style>
</head>


<div data-spy="scroll" data-target=".navbar" data-offset="50">

  <!--
    https://getbootstrap.com.br/docs/4.1/utilities/spacing/
    https://getbootstrap.com/docs/4.1/getting-started/introduction/

    Algumas classes úteis:

    * my-1 my-2 ... my-5  (margem no eixo y)
    * mt-1 mt-2 ... mt-5  (margem somente no topo)
    * container (cria um "bloco" que já deixa os componentes responsivos)
    * container-fluid (faz ele usar)
    * row (separa uma linha)
    * col (separa as colunas)  vai no w3schools ou bootstrap/documentation e vê mais sobre isso 
    * bg-success  bg-warning  bg-primary (são as cores de fundo padrão do bootstrap: bg -> background) 
    * justify-content-sm-center (coloca os componentes no centro) usei nos cards e no navbar antigo
    * display , usado na tag <h></h>e e talvez em <p></p> são outras possibilidades de tamanho (vão de 1 a 5)
  -->

<!-- esse aqui é o jumbotrom (serve pra colocar algum texto importante pra chamar atenção )
    depois vamos mover ele pra algum lugar por enquanto pode deixar aqui ou se vc tiver uma ideia melhor... ahsuahsuahsuas
  -->

<!-- <div class="jumbotron text-center" style="margin-bottom:0">
    <h1>Decision</h1>
    <p>At vero eos et accusamus et iusto odio dignissimos</p> 
  </div> -->

  <!-- barra de navegação do site  (não edita aqui >:-p  ) -->
<!--------------------------------------navbar----------------------------------------->
<nav class="navbar navbar-expand-sm navbar-dark sticky-top fixed-top" style="background-color: #19256c">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="#section1">Início</a>
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
              <div class="dropdown-divider"></div>
              <a class=" dropdown-item" href="#section2">Mais...</a>
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
      <li class="nav-item">
          <a class="nav-link" href="home.php">Admin</a>
      </li>

  </ul>
</nav>

<!--------------------------------------navbar----------------------------------------->


<!-- divisão do site em blocos: cada seção corresponde a um bloco -->

<!--------------------------------------carrousel----------------------------------------->
<div id="section1" class="container-fluid" style="padding:0px;">


  <div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="imagens/teste1.jpg" alt="Los Angeles">
      <div class="carousel-caption">
        <h3>Los Angeles</h3>
        <p>We had such a great time in LA!</p>
      </div>   
    </div> 
    <div class="carousel-item">
      <img src="imagens/teste1.jpg" alt="Chicago">
      <div class="carousel-caption">
        <h3>Chicago</h3>
        <p>Thank you, Chicago!</p>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="imagens/teste1.jpg" alt="New York">
      <div class="carousel-caption">
        <h3>New York</h3>
        <p>We love the Big Apple!</p>
      </div>   
    </div>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div> 


    
</div>    
<!--------------------------------------carrousel----------------------------------------->


<!---------------------------------esse é o nosso onepage--------------------------------->

<div id="section2" class="container-fluid " style="padding-top:70px;padding-bottom:70px; background-color: #ffffff;">
  <div class="container">

      <div class="row">
    	<div class="col-12 text-center my-4">
  		<h1 class="display-4">Áreas</h1>
  	
    </div>
    </div>

    <!-- criando os cards -->
  <div class="row justify-content-sm-center" style="padding:0px">

      <?php

      require_once "conexao.php";
      $query = "select id, nome, imagem, peqdesc from area";
      $result =$conn->query($query);
      if(!$result) die("Fatal Error");

      $rows = $result->num_rows;
      for($j = 0; $j< $rows; ++$j){
          $row = $result->fetch_assoc();
          $id = $row['id'];
          $nome = $row['nome'];
          $imagem = $row['imagem'];
          $peqdesc= $row['peqdesc'];
          echo <<<END

<div class="col-sm-6 col-md-4 ">
      <div class="card mb-5 ">
          <img class="card-img-top " img src="$imagem"  style="width:100%">
        <div class="card-body">
            <a href="areas.php?id=$id"><h4 class="card-title">$nome</h4></a>
            <p class="card-text">$peqdesc</p>


        </div>
      </div>
    </div>

END;
      }
      ?>


  </div>


  </div>
</div>


<div id="section6" class="container-fluid" style="padding-top:70px;padding-bottom:70px; background-color: #ffffff;">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center my-4">
                    <h1 class="display-4">Mercado de trabalho</h1>
                    <br>
                    <p align="justify">
                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?
                    </p>
                </div>
            </div>
        </div>
    </div>


    <div id="section6" class="container-fluid" style="padding-top:70px;padding-bottom:70px; background-color: #ffffff;">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center my-4">
                    <h1 class="display-4">O que somos nós?</h1>
                    <br>
                    <p align="justify">

                    O projeto nomeado de “Decision” é uma plataforma online que prototipamos e estamos a desenvolver. e forma que estaremos disponibilizando em nossa plataforma áreas do mercado de trabalho, cursos, universidades e até mesmo um quiz. E com tudo sempre voltado para futuros acadêmicos que ainda não sabem o que cursar e pretendem buscar ao menos uma noção do que lhe trará uma maior afinidade.
                        A ideia surgiu a partir de que nós mesmos, estudantes, nem sempre saímos do ensino médio com a certeza do que realmente queremos para nosso futuro. Então, por quê não fazer um projeto integrando tudo o que nós já aprendemos para realizar algo que possa nos conceder uma base para o nosso futuro?
                        Sendo assim, esperamos realizar um projeto diferenciado dos outros e com uma boa qualidade de conhecimento e estética do site.

                    </p>
                </div>
            </div>
        </div>
    </div>



<div id="section8" class="container-fluid" style="padding-top:70px;padding-bottom:70px; background-color:#ffffff;">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center my-5">
              <h1 class="display-4">Sobre nós</h1>
                <br>
            </div>
          </div>

     <div class="col-sm-6 col-md-4">
              <img class="card-img-top" img src="Imagens/gabi.jpeg">
            <div class="card-body">
                <h4 class="card-title" style="text-align: center;">Gabriela Neves</h4>
            </div>
          </div>
        </div>
        <!----------------------------Gabi------------------------------->
          <div class="container">
        <div class="row">
            <div class="col-12 text-center my-5">   
            </div>
          </div>
        <div class="col-sm-6 col-md-4">
              <img class="card-img-top" img src="Imagens/ju.jpeg">
            <div class="card-body">       
                <h4 class="card-title" style="text-align: center;">Júlia Ferreira</h4>
            </div>
          </div>
        </div>
        <!----------------------------Júlia------------------------------->
          <div class="container">
        <div class="row">
            <div class="col-12 text-center my-5"> 
            </div>
          </div>
        <div class="col-sm-6 col-md-4">
              <img class="card-img-top" img src="Imagens/cubo.jpeg" style="">
            <div class="card-body">       
                <h4 class="card-title" style="text-align: center;">Kezia Souza</h4>
            </div>
          </div>
        </div>
        <!----------------------------Kezia------------------------------->
          <div class="container">
        <div class="row">
            <div class="col-12 text-center my-5">   
            </div>
          </div>
        <div class="col-sm-6 col-md-4">
              <img class="card-img-top" img src="Imagens/bia.jpeg">
            <div class="card-body">       
                <h4 class="card-title" style="text-align: center;">Bianca Dubberstein</h4>
            </div>
          </div>
        </div>
        <!----------------------------Bianca------------------------------->

      </div>
    </div>
</div>

<!---------------------------------esse é o nosso onepage--------------------------------->

</body>
</html>
