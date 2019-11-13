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
            <a class="nav-item nav-link" href="http://localhost/pergunta/form_list.php">Pergunta<span class="sr-only">(current)</span></a>
        </div>
    </div>
</nav>
<?php
require_once '..\conexao.php';

$query = "select id, descricao, img from pergunta";

$result = $conn->query($query);
if(!$result) die("Fatal Error");
$rows = $result->num_rows;

echo <<<_END
<table class="table">
<tr>
<th>Id</th>
<th>Descrição</th>
<th>Imagem</th>
</tr>
_END;

echo "<br><br><a class=\"btn btn-primary\" href=\"form_edit.php?id=0\" role=\"button\">Inserir</a>". "<br><br>";

for ($j = 0; $j < $rows; ++$j){
    $result->data_seek($j);
    $row = $result->fetch_assoc();
    $id = $row['id'];
    echo "<tr>";
    echo "<td><a href='form_edit.php?id=$id'>" . $id . "</a></td>";
    echo "<td><a href='form_edit.php?id=$id'>" . $row['descricao'] . "</a></td>";
    echo "<td><a href='form_edit.php?id=$id'>" . $row['img'] . "</a></td>";


    echo "<td><a href='javascript:confirmaExclusao($id);' class=\"btn btn-secondary btn-lg active\" role=\"button\">X</a></td>";
    echo "</tr>";
}
echo "</table>";
echo "<a class=\"btn btn-primary\" href=\"form_edit.php?id=0\" role=\"button\">Inserir</a>". "<br><br>";

echo "</body></html>";
?>
<script>
    function confirmaExclusao(id)
    {
        if(confirm('Deseja excluir?'))
        {
            window.location = 'rotina_bd.php?id='+id+'&objetivo=X';
        }
    }
</script>