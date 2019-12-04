<?php
require_once "cabecalho.php";
require_once 'conexao.php';
$id = $_GET["id"];
$query = "SELECT pergunta.id, pergunta.descricao, pergunta.img FROM pergunta where id='$id'";

$result =$conn->query($query);
if(!$result) die("Fatal Error");
$rows = $result->num_rows;
$row = $result->fetch_assoc();
$pergunta_id = $row['id'];
$pergunta_descricao = $row['descricao'];
$img = $row['img'];
echo<<<END
<div class="container">
<center>
<div class="col-sm-10 my-4"">
  <ul class="pagination" >
    <li class="page-item"><a class="page-link" href="#" >Anterior</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">Próximo</a></li>
  </ul>
<div class="card text-center" style="width:50%; ">
        <img class="card-img-top" src="$img" alt="Card image" style="width:50%">
        <div class="card-body">
            <h4 class="card-title text-center">$pergunta_descricao</h4>
            <p class="card-text"><small class="text-muted">[$pergunta_id]</small></p>
                <form>
END;

$query1 = "SELECT op.id, op.descricao, op.ordem FROM opcoes_pergunta op where op.pergunta_id ='$id' order by op.ordem";
$result1 =$conn->query($query1);
if(!$result1) die("Fatal Error");
$rows1 = $result1->num_rows;

for($j = 0; $j < $rows1; ++$j) {
    $row1 = $result1->fetch_assoc();
    $op_id = $row1['id'];
    $op_descricao = $row1['descricao'];
    echo<<<END
    <div class="form-check">
        <input class="form-check-input" type="radio" name="$pergunta_id" value="$op_id" id="$pergunta_id" checked>
        <label class="form-check-label" for="exampleRadios1">
         $op_descricao
        </label>
    </div>
END;

}
echo<<<END
                <br><br>
                <div class="form-group row">
                    <div class="col-sm-10">
                      <button type="submit" class="btn btn-primary">Confirmar</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</center>
</div>
END;

?>





