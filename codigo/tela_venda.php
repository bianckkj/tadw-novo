<?php
require_once "conexao.php";
require_once "funcoes.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>Tela do processo de venda</h1> <br>

    <form action="">
        
        <select id="" name="">
            <option>nome clientes</option>
        </select> <br><br>

        Preço: <br>
        <input type="text"> <br><br>

        <input type="date"> <br> <br>

        <?php


        $listar_produtos = listarProdutos($conexao);

        foreach ($listar_produtos as $produto) {
            $nome = $produto['nome'];
            $id = $produto['idproduto'];

            echo "<input type='checkbox' name='produto[]' value='$id'> $nome";
            echo "<input type='text' name='?'><br>";
        }

        ?>
        <br>
        <input type="submit" value="Teste">
    </form>

</body>

</html>