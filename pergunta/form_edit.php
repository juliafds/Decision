<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="../decision.php">Decision</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="http://localhost/home.php">Home</a>
            <a class="nav-item nav-link" href="http://localhost/area/form_list.php">Área</a>
            <a class="nav-item nav-link" href="http://localhost/subarea/form_list.php">SubÁrea</a>
            <a class="nav-item nav-link" href="http://localhost/pergunta/form_list.php">Pergunta <span class="sr-only">(current)</span></a>
        </div>
    </div>
</nav>
<?php
require_once '..\conexao.php';

$id = $_GET["id"];
$query = "select descricao, img from pergunta where id=$id";
$result = $conn->query($query);
if(!$result) die("Fatal Error");
$rows = $result->num_rows;

if ($rows == 0)
{
    $objetivo='I';
    $descricao = '';
    $img = '';
    $nome_submit = 'Inserir';
}
else
{
    $objetivo='A';
    $result->data_seek(0);
    $row = $result->fetch_assoc();
    $descricao = $row['descricao'];
    $img = $row['img'];
    $nome_submit = 'Alterar';
}

echo <<<_END

<form action="rotina_bd.php?objetivo=$objetivo" method="post">
    <input type="hidden" name="id" value="$id">
    
    <div class="form-group">
        <label for="id">Id</label>
        <input type="text" class="form-control" id="id" name="id" value="$id" disabled>
    </div>
    
    <div class="form-group">
        <label for="descricao">Descrição</label>
        <input type="text" class="form-control" id="descricao" name="descricao" value="$descricao">
    </div>
    
    
    <div class="form-group">
        <label for="imagem">Imagem</label>
        <input type="text" class="form-control" id="img" name="img" value="$img">
    </div>   
    
    <input type="submit" class="btn btn-primary" name="$nome_submit" value="$nome_submit">
    <input type="button" class="btn btn-primary" name="Voltar" value="Voltar" onclick="window.location='form_list.php'">
</form>

_END;

if ($objetivo=='A'){
    $fk = $id;
    $retorno = $url_root.'/pergunta/form_edit.php?id='.$id;
    require_once '..\opcoes_pergunta\form_list.php';
    require_once '..\area_pergunta\form_list.php';
}

echo "</body></html>";
?>
