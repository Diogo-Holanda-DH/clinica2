<?php
// inserir.php
include "conexao.php";

$cpf = $_POST['cpf_cliente'];
$nome = $_POST['nome_cliente'];
$data_nasc = $_POST['data_nascimento'];
$contato = $_POST['celular_cliente'];

// 1ª Passo - Comando sql
$sql = "INSERT INTO tb_clientes
(cpf_cliente, nome_cliente, data_nascimento, celular_cliente) VALUES
('$cpf', '$nome', '$data_nasc', '$contato')";
// 2ª Passo - Preparar conexão
$inserir = $pdo->prepare($sql);

// 3ª Passo - Tentar executar
try {
    $inserir->execute();
    header("Location: cadastrado.php");
}catch(PDOException $erro){
    echo "Falha ao inserir".$erro->getMessage();
}

?>