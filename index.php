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
<form action="" method="post">
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
</body>
</html>