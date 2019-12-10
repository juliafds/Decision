<html>
<head>
    <title>Decision</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="icon" href="Imagens/original.png">
    <style>

        .carousel-inner img {
            width: 100%;
            height: 100%;
        }
        .rede{
            margin-top: 9px;
            margin-right: 10px;
            transition: all 0.4s ease-out;
            cursor: pointer;
        }


        .rede:hover{
            transform: translateY(-5px);
            box-shadow: 0px 7px 4px 0px rgba(21, 32, 131, 0.253);
        }

        .bt {
            width:50%;
            background-color:#EE5C42;
            color: #E6E6FA;
            margin: 50px;
        }

        .bt:hover{
            background-color: rgb(180, 83, 66);
        }

    </style>
    <!--isso é o icone do decision no title-->
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
<nav class="navbar navbar-expand-sm navbar-dark " style="background-color: #19256c">
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
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
                <a class="nav-link" href="decision.php?#mercado">Mercado</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="decision.php?#sobre">Sobre nós</a>
            </li>


        </ul>
    </div>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2 ">
        <ul class="navbar-nav ml-auto">
            <?php
            session_start();

            if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
            {
                unset($_SESSION['login']);
                unset($_SESSION['senha']);
                echo"
                <li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"cadastro_form.php\">Cadastro</a>
                </li>
                <li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"login_form.php\">Login</a>
                </li>
                ";
            }
            else {
                $logado = $_SESSION['login'];
                $admin = $_SESSION['admin'];
                if($admin==1){
                    echo"
                    <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"admin.php\">Admin</a>
                    </li>
                    ";
                }
                if(isset($logado)){
                    echo"                    
                     <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"quiz_home.php\">Quiz</a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdown\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                        Bem-Vindo, $logado
                        </a>
                        <div class=\"dropdown-menu dropdown-menu-right text-right\" aria-labelledby=\"navbarDropdown\">
                            <a class='dropdown-item' href='logout.php'> Logout </a>
                        </div>
                    </li>
                     ";


                }
            }
            ?>
        </ul>
    </div>
</nav>