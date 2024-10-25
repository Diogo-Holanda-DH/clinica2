<?php

include "conexao.php";
$cpf = $_GET['cod'];
echo "chegou '$cpf'";

// 1º Passo - Comando SQL
$sql = "SELECT * FROM tb_clientes
        WHERE cpf_cliente = '$cpf'";

// 2º Passo - Preparar a conexão
$consultar = $pdo->prepare($sql);

// 3º Passo - Tentar executar
try{
    $consultar->execute();
    $resultado = $consultar->fetch(PDO::FETCH_ASSOC);
    $cpf = $resultado['cpf_cliente'];
    $nome = $resultado['nome_cliente'];
    $data_nasc = $resultado['data_nascimento'];
    $contato = $resultado['celular_cliente'];
}catch(PDOException $erro){
    echo "Falha ao consultar!" . $erro->getMessage();
}
?>
<h1>Editar Cadastro</h1>
<div id="formulario">
<br>
<form action="atualizar.php" method="post">
    <label>CPF: </label><br>
    <input type="number" name="cpf_cliente" value='<?php echo $cpf;?>' hidden> <br><br>

    <label>NOME: </label><br>
    <input type="text" name="nome_cliente" value='<?php echo $nome;?>'> <br><br>

    <label>DATA DE NASCIMENTO:</label><br>
    <input type="date" name="data_nascimento" value='<?php echo $data_nasc;?>'> <br><br>

    <label>CONTATO:</label><br>
    <input type="number" name="celular_cliente" value='<?php echo $contato;?>'> <br><br>

    <button type="submit">Concluir></button>

</form>
</div>