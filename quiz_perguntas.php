<?php
require_once "cabecalho.php";
require_once 'conexao.php';

if (isset ($_GET["id"]) == false){
    $query4 = "SELECT pergunta.id, pergunta.descricao, pergunta.img FROM pergunta LIMIT 0,1";
    $result4 =$conn->query($query4);
    if(!$result4) die("Fatal Error");
    $rows4 = $result4->num_rows;
    $row4 = $result4->fetch_assoc();
    $id = $row4['id'];
}else{
    $id = $_GET["id"];
}

$usuario_id = $_SESSION['id'];
$query5 = "select resposta.id, opcoes_pergunta_id, usuario_id 
from resposta, opcoes_pergunta,pergunta
where pergunta.id=opcoes_pergunta.pergunta_id
  and opcoes_pergunta.id = resposta.opcoes_pergunta_id
  and  usuario_id=$usuario_id and pergunta.id=$id";
$result5 =$conn->query($query5);
if(!$result5) die("Fatal Error");
$rows5 = $result5->num_rows;
$row5 = $result5->fetch_assoc();
$opcoes_pergunta_id = $row5['opcoes_pergunta_id'];


$query = "SELECT pergunta.id, pergunta.descricao, pergunta.img FROM pergunta where id='$id'";
$result =$conn->query($query);
if(!$result) die("Fatal Error");
$rows = $result->num_rows;
$row = $result->fetch_assoc();
$pergunta_id = $row['id'];
$pergunta_descricao = $row['descricao'];
$img = $row['img'];

$query3 = "SELECT pergunta.id, pergunta.descricao, pergunta.img FROM pergunta";
$result3 =$conn->query($query3);
if(!$result3) die("Fatal Error");
$rows3 = $result3->num_rows;

echo<<<END
<div class="container">


END;


echo<<<END
  <div class="card text-center" style="width:50%; ">
        <img class="card-img-top" src="$img" alt="Card image">
        <div class="card-body">
            <h4 class="card-title text-center">$pergunta_descricao</h4>
            <p class="card-text"><small class="text-muted">[$pergunta_id]</small></p>
                <form action="gravar_pergunta.php" method="post">
                <input type="hidden" name="pergunta_id" value="$pergunta_id">
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
    <div class="form-check d-flex p-2">
        <input class="form-check-input" type="radio" name="op_id" value="$op_id" id="$pergunta_id" 
END;
    if ($opcoes_pergunta_id == $op_id){
     echo"checked";
    }
    echo<<<END
        >
        <label class="form-check-label text-justify" for="opcoes">
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
<div class="pagination">
<ul class="pagination">
END;

for($j = 1; $j <= $rows3; ++$j) {
    $row3 = $result3->fetch_assoc();
    $id3 = $row3['id'];
    echo<<<END
    <li class="page-item"><a class="page-link" href="quiz_perguntas.php?id=$id3">$j</a></li>
END;
}

echo<<<END
             </ul>   
            </div>
        </div>
    </div>
</div>
END;

