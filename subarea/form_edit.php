<?php
require_once '..\conexao.php';
require_once '..\cabecalho_admin.php';
$id = $_GET["id"];
$query = "select subarea.id, subarea.nome, subarea.duracao, subarea.disciplinas, subarea.descricao,subarea.imagem,subarea.peqdesc, subarea.area_id, subarea.mercado, area.nome as area from subarea inner join area on subarea.area_id = area.id where subarea.id=$id";

$result = $conn->query($query);
if(!$result) die("Fatal Error");
$rows = $result->num_rows;

if ($rows == 0)
{
    $objetivo='I';
    $nome = '';
    $duracao = '';
    $disciplinas = '';
    $descricao = '';
    $imagem = '';
    $peqdesc = '';
    $mercado = '';
    $area_id = '';
    $area_nome = '';
    $nome_submit = 'Inserir';
}
else
{
    $objetivo='A';
    $result->data_seek(0);
    $row = $result->fetch_assoc();
    $nome = $row['nome'];
    $duracao = $row['duracao'];
    $disciplinas = $row['disciplinas'];
    $descricao = $row['descricao'];
    $imagem = $row['imagem'];
    $peqdesc = $row['peqdesc'];
    $mercado = $row['mercado'];
    $area_id = $row['area_id'];
    $area_nome = $row['area'];
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
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" value="$nome">
    </div>
    
    <div class="form-group">
        <label for="duracao">Duração</label>
        <input type="text" class="form-control" id="duracao" name="duracao" value="$duracao">
    </div>
    
    <div class="form-group">
        <label for="disciplinas">Discplinas</label>
        <textarea class="form-control" id="disciplinas" name="disciplinas" rows="3">$disciplinas</textarea>
    </div>
    
    <div class="form-group">
        <label for="descricao">Descrição</label>
        <textarea class="form-control" id="descricao" name="descricao" rows="3">$descricao</textarea>
    </div>
    
     <div class="form-group">
        <label for="imagem">Imagem</label>
        <input type="text" class="form-control" id="imagem" name="imagem" value="$imagem">
    </div>
    
    <div class="form-group">
        <label for="peqdesc">Pequena Descrição</label>
        <textarea class="form-control" id="peqdesc" name="peqdesc" rows="3">$peqdesc</textarea>
    </div>
    
    <div class="form-group">
        <label for="mercado">Mercado</label>
        <textarea class="form-control" id="mercado" name="mercado" rows="3">$mercado</textarea>
    </div>
    
    
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
    if ($row1['id'] == $row['area_id'])
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
    <input type="submit" class="btn btn-primary" name="$nome_submit" value="$nome_submit">
    <input type="button" class="btn btn-primary" name="Voltar" value="Voltar" onclick="window.location='form_list.php'">
</form>

_END;
echo "</body></html>";
?>


