<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Lista de Produtos</h1>

    <table border="1">
        <tr>
            <td>Id</td>
            <td>IDcliente</td>
            <td>IDproduto</td>
            <td>Valor total</td>
            <td>Data</td>
            <td colspan="2">Ação</td>
        </tr>
            <?php
                require_once "conexao.php";

                $sql = "SELECT * FROM tb_venda";

                $resultados = mysqli_query($conexao, $sql);

                while ($linha = mysqli_fetch_array($resultados)) {
                    $id = $linha['idvenda'];
                    $idcliente = $linha['idcliente'];
                    $idproduto = $linha['idproduto'];
                    $valor_total = $linha['valor_total'];
                    $data = $linha['data'];


                    echo "<tr>";
                    echo "<td>$id</td>";
                    echo "<td>$idcliente</td>";
                    echo "<td>$idproduto</td>";
                    echo "<td>$valor_total</td>";
                    echo "<td>$data</td>";
                    echo "<td><a href='deletarProduto.php?id=$id'>Excluir</a></td>";
                    echo "<td><a href='formProduto.php?id=$id'>Editar</a></td>";
                    echo "</tr>";
                }
            ?>
    </table>
</body>
</html>