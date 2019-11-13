<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<?php
require_once '..\conexao.php';

$id = $_GET["id"];
if (empty($fk)) {$fk = $_GET["fk"];}
if (empty($retorno)) {$retorno = $_GET["retorno"];}if (empty($retorno)) {$retorno = $_POST["retorno"];}
$query = "select area_id, pergunta_id, peso from area_pergunta where id= $id";
$result = $conn->query($query);
if(!$result) die("Fatal Error");
$rows = $result->num_rows;

if ($rows == 0)
{
    $objetivo='I';
    $area_id = 0;
    $pergunta_id = 0;
    $peso = '';
    $nome_submit = 'Inserir';
}
else
{
    $objetivo='A';
    $result->data_seek(0);
    $row = $result->fetch_assoc();
    $area_id = $row['area_id'];
    $pergunta_id = $row['pergunta_id'];
    $peso = $row['peso'];
    $nome_submit = 'Alterar';
}

echo <<<_END

<form action="rotina_bd.php?objetivo=$objetivo" method="post">
    <input type="hidden" name="id" value="$id">
    <input type="hidden" name="retorno" value="$retorno">
    <div class="form-group">
        <label for="id">Id</label>
        <input type="text" class="form-control" id="id" name="id" value="$id" disabled>
    </div>
    
    <div class="form-group">
        <label for="area_id">Selecione a área</label>
        <select class="form-control" name="area_id">
        <option value="erro">Selecione...</option>
_END;
        $query1 = "SELECT id, nome FROM area";

        $result1 = $conn->query($query1);
        if(!$result1) die("Fatal Error");
        $rows1 = $result1->num_rows;
        for ($j = 0; $j < $rows1; ++$j)
        {
            $result1->data_seek($j);
            $row1 = $result1->fetch_assoc();
            if (($row1['id'] == $row['area_id']))
            {
                echo "<option value=".$row1['id']."  selected>".$row1['nome']."</option>";
            }
            else
            {
                echo "<option value=".$row1['id']." >".$row1['nome']."</option>";
            }

        }

        echo <<<_END
        </select><br/>
    </div>
    
    <div class="form-group">
        <label for="pergunta_id">Id da pergunta</label>
        <select class="form-control" name="pergunta_id">
        <option value="erro">Selecione...</option>
_END;
$query1 = "SELECT pergunta.id, pergunta.descricao FROM pergunta";

$result1 = $conn->query($query1);
if(!$result1) die("Fatal Error");
$rows1 = $result1->num_rows;
for ($j = 0; $j < $rows1; ++$j)
{
    $result1->data_seek($j);
    $row1 = $result1->fetch_assoc();
    if ($row1['id'] == $row['pergunta_id'] ||  ($row1['id'] == $fk))
    {
        echo "<option value=".$row1['id']."  selected>".$row1['descricao']."</option>";
    }
    else
    {
        echo "<option value=".$row1['id']." >".$row1['descricao']."</option>";
    }

}

echo <<<_END
        </select><br/>
    </div>
    
    <div class="form-group">
        <label for="peso">Peso</label>
        <input type="text" class="form-control" id="peso" name="peso" value="$peso">
    </div>
    
    
    <input type="submit" class="btn btn-primary" name="$nome_submit" value="$nome_submit">
    <input type="button" class="btn btn-primary" name="Voltar" value="Voltar" onclick="window.location='$retorno'">
</form>

_END;

echo "</body></html>";
?>
