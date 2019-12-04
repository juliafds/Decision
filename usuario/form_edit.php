<?php
require_once '..\conexao.php';
require_once '..\cabecalho_admin.php';
$id = $_GET["id"];
$query = "select usuario.id, usuario.nome, usuario.login, usuario.senha, usuario.admin from usuario where id=$id";

$result = $conn->query($query);
if(!$result) die("Fatal Error");
$rows = $result->num_rows;

if ($rows == 0)
{
    $objetivo='I';
    $id = '';
    $nome = '';
    $login = '';
    $senha = '';
    $admin = '';
    $admin_check='';
    $nome_submit = 'Inserir';
}
else
{
    $objetivo='A';
    $result->data_seek(0);
    $row = $result->fetch_assoc();
    $id = $row['id'];
    $nome = $row['nome'];
    $login = $row['login'];
    $senha = $row['senha'];
    $admin = $row['admin'];
    $nome_submit = 'Alterar';
    if ($row["admin"]) {
        $admin_check='checked';
    }
    else{
        $admin_check='';
    }

}

echo <<<_END

<form action="rotina_bd.php?objetivo=$objetivo" method="post">
    <input type="hidden" name="id" value="$id">
    
    <div class="form-group">
        <label for="id">Id</label>
        <input type="text" class="form-control" id="id" name="id" value="$id" disabled>
    </div>
    
    <div class="form-group">
        <label for="Nome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" value="$nome">
    </div>
    
    
    <div class="form-group">
        <label for="Login">Login</label>
        <input type="text" class="form-control" id="login" name="login" value="$login">
    </div>
    
    <div class="form-group">
        <label for="Senha">Senha</label>
        <input type="text" class="form-control" id="senha" name="senha" value="$senha">
    </div>
    

    <div class="form-check">

_END;
?>
        <input type="checkbox" class="form-check-input" name="admin" id="admin"

        <?php echo"$admin_check"; echo <<<_END
        >
        <label class="form-check-label" for="exampleCheck1">Admin?</label>
     </div>

    <input type="submit" class="btn btn-primary" name="$nome_submit" value="$nome_submit">
    <input type="button" class="btn btn-primary" name="Voltar" value="Voltar" onclick="window.location='form_list.php'">
</form>
</body></html>
_END;
 ?>


