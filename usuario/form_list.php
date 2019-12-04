<?php
require_once '..\conexao.php';
require_once '..\cabecalho_admin.php';
$query = "select usuario.id, usuario.nome, usuario.login, usuario.senha, usuario.admin from usuario";

$result = $conn->query($query);
if(!$result) die("Fatal Error");
$rows = $result->num_rows;

echo <<<_END
<table class="table">
<tr>
<th>Id</th>
<th>Nome</th>
<th>Login</th>
<th>Admin</th>
<th> Excluir </th>
</tr>
_END;

echo "<br><br><a class=\"btn btn-primary\" href=\"form_edit.php?id=0\" role=\"button\">Inserir</a>". "<br><br>";

for ($j = 0; $j < $rows; ++$j){
    $result->data_seek($j);
    $row = $result->fetch_assoc();
    $id = $row['id'];
    echo "<tr>";
    echo "<td><a href='form_edit.php?id=$id'>" . $id . "</a></td>";
    echo "<td><a href='form_edit.php?id=$id'>" . $row['nome'] . "</a></td>";
    echo "<td><a href='form_edit.php?id=$id'>" . $row['login'] . "</a></td>";
    echo "<td><a href='form_edit.php?id=$id'>" . $row['admin'] . "</a></td>";
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