<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<h3>Area_Opcoes_Pergunta</h3><br>
<?php
require_once '..\conexao.php';
if (empty($fk)) {$fk=0;}
if (empty($retorno)) {$retorno='form_list.php';}


$query = "select area_opcoes_pergunta.id, area_opcoes_pergunta.area_id, area.nome, 
area_opcoes_pergunta.opcoes_id, p.descricao, peso
 from area_opcoes_pergunta inner join area on area.id=area_opcoes_pergunta.area_id 
 inner join opcoes_pergunta op on area_opcoes_pergunta.opcoes_id = op.id
 inner join pergunta p on op.pergunta_id = p.id
 where (p.id = $fk or $fk = 0)";
$result = $conn->query($query);
if(!$result) die("Fatal Error");
$rows = $result->num_rows;

echo <<<_END
<table class="table">
<tr>
<th>Id</th>
<th>Id da Área</th>
<th>Id da Opção</th>
<th>Peso</th>
<th>&nbsp;</th>
</tr>
_END;

for ($j = 0; $j < $rows; ++$j){
    $result->data_seek($j);
    $row = $result->fetch_assoc();
    $id = $row['id'];
    echo "<tr>";
    echo "<td><a href='$url_root/area_opcoes_pergunta/form_edit.php?id=$id&fk=$fk&retorno=$retorno'>" . $id . "</a></td>";
    echo "<td><a href='$url_root/area_opcoes_pergunta/form_edit.php?id=$id&fk=$fk&retorno=$retorno'>" . $row['area_id'] . " - " . $row['nome'] . "</a></td>";
    echo "<td><a href='$url_root/area_opcoes_pergunta/form_edit.php?id=$id&fk=$fk&retorno=$retorno'>" . $row['opcoes_id'] . " </a></td>";
    echo "<td><a href='$url_root/area_opcoes_pergunta/form_edit.php?id=$id&fk=$fk&retorno=$retorno'>" . $row['peso'] . "</a></td>";
    echo "<td><a href='javascript:confirmaExclusao1($id);' class=\"btn btn-secondary btn-lg active\" role=\"button\">X</a></td>";
    echo "</tr>";
}
echo "</table>";
echo "<a class=\"btn btn-primary\" href=\"$url_root/area_opcoes_pergunta/form_edit.php?id=0&retorno=$retorno&fk=$fk\" role=\"button\">Inserir</a>";

echo <<<END
<script>
    function confirmaExclusao1(id)
    {
        if(confirm('Deseja excluir?'))
        {
            window.location = '$url_root/area_opcoes_pergunta/rotina_bd.php?id='+id+'&objetivo=X&retorno=$retorno';
        }
    }
</script>
END;

echo "</body></html>";




?>


