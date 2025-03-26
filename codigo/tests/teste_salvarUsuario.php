<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$nome = "bibs";
$email = "bia@email.com";
$senha = "123";

salvarUsuario($conexao, $nome, $email, $senha);