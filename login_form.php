<?php
require_once "cabecalho.php";
?>

<br><br><br>
<center>
<h3>Login</h3>
<div class="card" style="width: 30rem;">
<div class="card-body">
<form method="post" action="login.php">
    <div class="form-group">
        <label for="login">Login</label>
        <input type="text" class="form-control" name="login" id="login" placeholder="Entre com o login">
    </div>
    <div class="form-group">
        <label for="senha">Senha</label>
        <input type="password" class="form-control" name="senha" id="senha" placeholder="senha">
    </div>
    <button type="submit" class="btn btn-primary">Entrar</button>
</form>
</div>
</div>
</center>
<br><br><br>
</body>
</html>
