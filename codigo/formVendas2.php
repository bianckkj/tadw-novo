<?php
if (isset($_GET['id'])) {
    // echo "editar";

    require_once "conexao.php";
    $id = $_GET['id'];

    $sql = "SELECT * FROM tb_venda WHERE idvenda = $id";

    $resultados = mysqli_query($conexao, $sql);

    $linha = mysqli_fetch_array($resultados);

    $idcliente = $linha['idcliente'];
    $idproduto = $linha['idproduto'];
    $valor_total = $linha['valot_total'];
    $data = $linha['data'];


    $botao = "Atualizar";
} else {
    // echo "novo";
    $id = 0;
    $idcliente = "";
    $idproduto = "";
    $valor_total = "";
    $data = "";

    $botao = "Cadastrar";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="salvarUsuario.php" method="post">
        idcliente: <br>
        <input type="" name=""> <br><br>
        idproduto: <br>
        <input type="text" name="email"> <br><br>
        valor total: <br>
        <input type="text" name="senha"> <br><br>
        data:
        <input type="date" name="data"> <br> <br>

        

        <input type="submit" value="Cadastrar">
    </form>
</body>

</html>