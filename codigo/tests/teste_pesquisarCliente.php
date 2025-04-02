<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$idcliente = 7;

echo "<pre>";
print_r(pesquisarCliente($conexao, $idcliente));
echo "</pre>";


echo $idcliente;
?>