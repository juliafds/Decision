<?php
require_once '..\conexao.php';
require_once '..\cabecalho_admin.php';
$id = $_GET["id"];
$query = "select id, nome, descricao, mercado,imagem,peqdesc from area where id=$id";
$result = $conn->query($query);
if(!$result) die("Fatal Error");
$rows = $result->num_rows;

if ($rows == 0)
{
    $objetivo='I';
    $nome = '';
    $descricao = '';
    $mercado = '';
    $imagem = '';
    $peqdesc = '';
    $nome_submit = 'Inserir';
}
else
{
    $objetivo='A';
    $result->data_seek(0);
    $row = $result->fetch_assoc();
    $nome = $row['nome'];
    $descricao = $row['descricao'];
    $mercado = $row['mercado'];
    $imagem = $row['imagem'];
    $peqdesc = $row['peqdesc'];
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
        <label for="descricao">Descrição</label>
        <textarea class="form-control" id="descricao" name="descricao" rows="3">$descricao</textarea>
    </div>
    
    <div class="form-group">
        <label for="mercado">Mercado</label>
        <textarea class="form-control" id="mercado" name="mercado" rows="3">$mercado</textarea>
    </div>
    
    <div class="form-group">
        <label for="imagem">Imagem</label>
        <input type="text" class="form-control" id="imagem" name="imagem" value="$imagem">
    </div>
    
    <div class="form-group">
        <label for="peqdesc">Pequena Descrição</label>
        <textarea class="form-control" id="peqdesc" name="peqdesc" rows="3">$peqdesc</textarea>
    </div>
    
    <input type="submit" class="btn btn-primary" name="$nome_submit" value="$nome_submit">
    <input type="button" class="btn btn-primary" name="Voltar" value="Voltar" onclick="window.location='form_list.php'">
</form>

_END;

echo "</body></html>";
?>
