<?php

function deletarCliente($conexao, $idcliente) {
    $sql = "DELETE FROM tb_cliente WHERE idcliente = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idcliente);
    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    
    return $funcionou; //true ou false
};

function listarClientes($conexao) {
    $sql = "SELECT * FROM tb_cliente";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $lista_clientes = [];
    while ($cliente = mysqli_fetch_assoc($resultado)) {
        $lista_clientes[] = $cliente;
    }

    mysqli_stmt_close($comando);
    return $lista_clientes;
};

function salvarCliente($conexao, $nome, $cpf, $endereco) {
    $sql = "INSERT INTO tb_cliente (nome, cpf, endereco) VALUES (?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'sss', $nome, $cpf, $endereco);
    
    mysqli_stmt_execute($comando);
    
    // retorna o valor do id que acabou de ser inserido
    $idcliente = mysqli_stmt_insert_id($comando);

    mysqli_stmt_close($comando);

    return $idcliente;
};

function editarCliente($conexao, $nome, $cpf, $endereco, $idcliente) {
    $sql = "UPDATE tb_cliente SET nome=?, cpf=?, endereco=? WHERE idcliente=?";
    $comando = mysqli_prepare($conexao, $sql);
    
    // varchar, string, data -> s
    // inteiro -> i
    // dinheiro, decimal -> d
    mysqli_stmt_bind_param($comando, 'sssi', $nome, $cpf, $endereco, $idcliente);
    

    $funcionou = mysqli_stmt_execute($comando);
    
    mysqli_stmt_close($comando);
    return $funcionou;
};

function deletarProduto($conexao, $idproduto) {};

function listarProdutos() {};

function salvarProduto() {};

function editarProduto() {};


//desafio
function salvarUsuario() {};

function salvarVenda($conexao, $idcliente, $valor_total, $data) {
    $sql = "INSERT INTO tb_venda (idcliente, valor_total, data) VALUES (?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'ids', $idcliente, $valor_total, $data);

    $funcionou = mysqli_stmt_execute($comando);

    // retorna o valor do id que acabou de ser inserido
    $idvenda = mysqli_stmt_insert_id($comando);
    
    mysqli_stmt_close($comando);
    
    return $idvenda;
};

function salvarItemVenda($conexao, $id_venda, $id_produto, $quantidade) {
    $sql = "INSERT INTO tb_item_venda (idvenda, idproduto, quantidade) VALUES (?, ?, ?)";

    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'iid', $id_venda, $id_produto, $quantidade);

    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);

    return $funcionou;
}

// retornar uma variável com todos os dados do cliente
function pesquisarClienteId($conexao, $idcliente) {
    $sql = "SELECT * FROM tb_cliente WHERE idcliente = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idcliente);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $cliente = mysqli_fetch_assoc($resultado);

    mysqli_stmt_close($comando);
    return $cliente;
};

// retornar uma variável com todos os dados do produto
function pesquisarProdutoId() {};

//mostrar o nome do cliente ao invés do id
//mostrar o nome do produto ao invés do id

function listarVendas($conexao) {
    $sql = "SELECT * FROM tb_venda";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $lista_venda = [];
    while ($venda = mysqli_fetch_assoc($resultado)) {
        $lista_venda[] = $venda;
    }

    mysqli_stmt_close($comando);
    return $lista_venda;
};

function listarItemVenda($conexao, $idvenda) {
    $sql = "SELECT * FROM tb_item_venda WHERE idvenda = ?";
    $comando = mysqli_prepare($conexao, $sql);

// linha do bind... 
    mysqli_stmt_bind_param($comando, 'i', $idvenda);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $lista_itemvenda = [];
    while ($vendaS = mysqli_fetch_assoc($resultado)) {
        $lista_itemvenda[] = $vendaS;
    }

    mysqli_stmt_close($comando);
    return $lista_itemvenda;
};



function listargeral ($conexao) {
    // seleciona as vendas
    $sql = "SELECT * FROM tb_venda WHERE tb_item_venda = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    
    $vendas = [];
    while ($venda = mysqli_fetch_assoc($resultado)) {
        // busca o nome do cliente
        $clienteS = "SELECT nome FROM tb_cliente WHERE idcliente = {$venda['idcliente']}";
        $cliente_resultado = mysqli_query($conexao, $clienteS);
        $cliente = mysqli_fetch_assoc($cliente_resultado);
        
        // busca o nome do produto
        $produtoS = "SELECT nome FROM tb_produto WHERE idproduto = {$venda['idproduto']}";
        $produto_resultado = mysqli_query($conexao, $produtoS);
        $produto = mysqli_fetch_assoc($produto_resultado);

        // adiciona dados p venda
        $venda['nome_cliente'] = $cliente['nome'];
        $venda['nome_produto'] = $produto['nome'];

        // adiciona venda p lista
        $vendas[] = $venda;
    }
    mysqli_stmt_close($comando);
    return $vendas;
}


?>
?>
