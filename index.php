<?php
include "conexao.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>Formulário de Cadastro</h1>
<div id="formulario">
<br>
<form action="inserir.php" method="post">
    <label>CPF: </label><br>
    <input type="number" name="cpf_cliente"> <br><br>

    <label>NOME: </label><br>
    <input type="text" name="nome_cliente" > <br><br>

    <label>DATA DE NASCIMENTO:</label><br>
    <input type="date" name="data_nascimento"> <br><br>

    <label>CONTATO:</label><br>
    <input type="number" name="celular_cliente"> <br><br>

    <button type="submit">Enviar></button>

</form>
</div>
<h1>Lista Clientes Cadastrados </h1>
<div id="lista">
<?php
include "conexao.php";
// 1º Passo - Comando SQL
$sql = "SELECT * FROM tb_clientes";

// 2° Passo - Preparar conexao
$consultar = $pdo->prepare($sql);

// 3º Passo - Tentar executar e mostrar na página
try {
    $consultar->execute();
    $resultado = $consultar->fetchall(PDO::FETCH_ASSOC);
    foreach($resultado as $item){
        $cpf = $item['cpf_cliente'];
        $nome = $item['nome_cliente'];
        $data_nasc = $item['data_nascimento'];
        $contato = $item['celular_cliente'];
      
        echo "
        <div class='cartoes'>
            <h1> Nº CPF: $cpf </h1> <br>
            <p> Nome:$nome </p>
            <p> Data nascimento: $data_nasc </p>
            <p> Contato: $contato </p>
            <a href='pagina_editar.php?cod=$cpf'>
                <button>✏️Editar</button>
            </a>
            
            <a href='confirmar_deletar.php?cod=$cpf'>
                <button>🗑️Deletar</button>
            </a>
        </div>
    ";
    }
}catch(PDOException $erro){
    echo "Falha ao consultar".$erro->getMessage();
}

?>
</div>
</body>
</html>
