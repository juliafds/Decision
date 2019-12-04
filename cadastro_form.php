<?php
require_once "cabecalho.php";
?>
<br><br><br>
<center>
    <h3>Cadastro de usuário</h3>
    <div class="card" style="width: 30rem;">
        <div class="card-body">
            <form method="post" action="cadastro.php">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome" id="nome" placeholder="Entre com o nome" maxlength="20">
                </div>
                <div class="form-group">
                    <label for="login">Login</label>
                    <input type="text" class="form-control" name="login" id="login" placeholder="Entre com o login"  maxlength="20">
                </div>
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" class="form-control" name="senha" id="senha" placeholder="senha"  maxlength="20">
                </div>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </form>
        </div>
    </div>
</center>
<br><br><br>
</body>
</html>