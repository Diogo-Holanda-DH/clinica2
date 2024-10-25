<?php
include "conexao.php";
$cpf = $_POST['cpf_cliente'];
$nome = $_POST['nome_cliente'];
$data_nasc = $_POST['data_nascimento'];
$contato = $_POST['celular_cliente'];
// 1º Passo - Comando SQL
$sql = "UPDATE tb_clientes SET
        nome_cliente='$nome', data_nascimento='$data_nasc',
        celular_cliente='$contato' WHERE cpf_cliente='$cpf'";
// 2º Passo - Preparar a conexão
$atualizar = $pdo->prepare($sql);

// 3º Passo - Tentar executar
try{
    $atualizar->execute();
    if($atualizar->rowCount()>=1){
        echo "Atualizado com sucesso";
    }else{
        echo "Nada foi alterado!";
    }
   
    
}catch(PDOException $erro){
    echo "Falha ao atualizar!".$erro->getMessage();
}

?>