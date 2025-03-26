<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$idproduto = 1;
$nome = "Pepsi";
$tipo = "bibs";
$preco_compra = 4.5;
$preco_venda = 10;
$margem_lucro = 200;
$quantidade = 400;


editarProduto($conexao, $nome, $tipo, $preco_compra, $preco_venda, $margem_lucro, $quantidade, $idproduto);