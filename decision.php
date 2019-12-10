<?php
require_once "cabecalho.php";
?>

<!--------------------------------------carrosel----------------------------------------->
<div id="carrosel" class="container-fluid" style="padding:0px;">
    <div id="demo" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
        </ul>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="imagens/flyerone.jpg" alt="Los Angeles">
                <div class="carousel-caption">
                    <h3>Decision</h3>
                    <p>O seu site vocacional!</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="imagens/flyertwo.jpg" alt="Chicago">
                <div class="carousel-caption">
                    <h3>Qual será a sua vocação para 2020?</h3>
                    <p>Descubra conosco!</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="imagens/flyerthree.jpg" alt="New York">
                <div class="carousel-caption">
                    <h3>Para mais informações acesse:</h3>
                    <p>https://exame.abril.com.br/carreira/as-tendencias-atuais-do-mercado-de-trabalho-para-ter-emprego-em-5-anos/</p>
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

<div id="areas" class="container-fluid " style="padding-top:70px;padding-bottom:70px; background-color: #ffffff;">
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


<div id="mercado" class="container-fluid" style="padding-top:70px;padding-bottom:70px; background-image: url(imagens/img2.png); background-attachment: fixed; color: white; background-repeat: no-repeat; background-size: 100%; background-position: center;">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center my-4">
                <h1 class="display-4">Mercado de Trabalho</h1>
                <br>
                <p align="justify">
                    A integração competitiva da economia brasileira à economia global e a conquista da estabilidade influenciaram estruturalmente o funcionamento do mercado de trabalho do País.
                    Foram registradas, na década 1990 e ao longo dos últimos anos, dinâmicas particularmente relevantes nos quesitos emprego, formalidade e renda dos trabalhadores, o que exigiu mudanças substantivas na atuação das instituições que regulam as relações trabalhistas.

                    O Governo Federal brasileiro, por seu turno, empenhado em corrigir as distorções inerentes à evolução do mercado de trabalho, vem desenvolvendo programas de fomento ao emprego e ao trabalho e de proteção e assistência ao trabalhador, contando com recursos do Fundo de Amparo ao Trabalhador – FAT.
                    Seu objetivo é criar mecanismos que permitam a melhoria das condições de trabalho e da qualidade de vida do trabalhador, destacando-se as ações nas áreas de qualificação profissional, seguro-desemprego, abono salarial, geração de emprego e renda, inspeção do trabalho e legislação trabalhista.
                </p>
            </div>
        </div>
    </div>
</div>



<div id="sobre" class="container-fluid" style="padding-top:70px;padding-bottom:70px; background-color:#ffffff;">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center my-5">
                <h1 class="display-4">Sobre nós</h1>
                <br>
                <p align="justify">

                O Decision é uma plataforma online criamos para o nosso Projeto Integrador no Curso de Informática para Internet integrado ao Ensino Médio no IFES Campus Serra.
                Disponibilizamos pesquisas realizadas sobre áreas co mercado de trabalho, cursos e até mesmo um quiz programado por nós mesmos. E com tudo sempre voltado para futuros acadêmicos que ainda não sabem o que cursar e pretendem buscar ao menos uma noção do que lhe trará uma maior afinidade.
                </p>
            </div>
        </div>
    </div>


<!---------------------------------esse é o nosso onepage--------------------------------->

<?php
require_once "rodape.php";
?>
