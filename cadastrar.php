<?php

include("conexao.php");
$nome = $_POST["nome"];
$telefone = $_POST["telefone"];
$carro = $_POST["carro"];



$sql = "INSERT INTO clientes (nome, telefone, carro) 
 VALUES ('$nome', '$telefone', '$carro')";
mysqli_query($conexao, $sql);
echo "Cadastro realizado com sucesso!";
?>

<button onclick="window.location.href='index.php'">Voltar para o início </button>