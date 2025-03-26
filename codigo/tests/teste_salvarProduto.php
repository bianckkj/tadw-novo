<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$nome = "bibs";
$tipo = "aaa";
$preco_compra = 2.5;
$preco_venda = 30;
$margem_lucro = 300;
$quantidade = 500;

salvarProdutos($conexao, $nome, $tipo, $preco_compra, $preco_venda, $margem_lucro, $quantidade);