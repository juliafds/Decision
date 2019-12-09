<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<br>
<h3>Opcoes_pergunta</h3><br>
<?php
require_once '..\conexao.php';
if (empty($fk)) {$fk=0;}
if (empty($retorno)) {$retorno='form_list.php';}

$query = "select opcoes_pergunta.id, opcoes_pergunta.descricao, ordem, opcoes_pergunta.pergunta_id, 
pergunta.descricao as descricao1
from opcoes_pergunta inner join pergunta on opcoes_pergunta.pergunta_id = pergunta.id
where (opcoes_pergunta.pergunta_id = $fk or $fk = 0)";

$result = $conn->query($query);
if(!$result) die("Fatal Error");
$rows = $result->num_rows;

echo <<<_END
<table class="table">
<tr>
<th>Id</th>
<th>Descrição</th>
<th>Ordem</th>
<th>&nbsp;</th>
</tr>
_END;



for ($j = 0; $j < $rows; ++$j){
    $result->data_seek($j);
    $row = $result->fetch_assoc();
    $id = $row['id'];
    echo "<tr>";
    echo "<td><a href='$url_root/opcoes_pergunta/form_edit.php?id=$id&retorno=$retorno'>" . $id . "</a></td>";
    echo "<td><a href='$url_root/opcoes_pergunta/form_edit.php?id=$id&retorno=$retorno'>" . $row['descricao'] . "</a></td>";
    echo "<td><a href='$url_root/opcoes_pergunta/form_edit.php?id=$id&retorno=$retorno'>" . $row['ordem'] . "</a></td>";
    #echo "<td><a href='$url_root/opcoes_pergunta/form_edit.php?id=$id&retorno=$retorno'>" . $row['pergunta_id'] . " - " . $row['descricao1'] . "</a></td>";


    echo "<td><a href='javascript:confirmaExclusao2($id);' class=\"btn btn-secondary btn-lg active\" role=\"button\">X</a></td>";
    echo "</tr>";
}
echo "</table>";
echo "<a class=\"btn btn-primary\" href=\"$url_root/opcoes_pergunta/form_edit.php?id=0&retorno=$retorno&fk=$fk\" role=\"button\">Inserir</a>". "<br><br>";
echo <<<END
<script>
    function confirmaExclusao2(id)
    {
        if(confirm('Deseja excluir?'))
        {
            window.location = '$url_root/opcoes_pergunta/rotina_bd.php?id='+id+'&objetivo=X&retorno=$retorno';
        }
    }
</script>
END;
echo "</body></html>";
?>