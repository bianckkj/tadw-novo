<?php

$idcliente = $_GET['idcliente'];
$valor_total = $_GET['valortotal'];
$data_compra = $_GET['data_compra'];
$idproduto = $_GET['idproduto'];
$quantidade = $_GET['quantidade'];

echo "idcliente: $idcliente";
echo "<br>valor: $valor_total";
echo "<br>data compra: $data_compra";
echo "<br>idproduto:";
print_r($idproduto);
echo "<br>quantidade: $quantidade";

?>