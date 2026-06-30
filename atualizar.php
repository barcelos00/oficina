<?php
include("conexao.php");

$id = $_POST['id'];
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$carro = $_POST['carro'];

$sql = "UPDATE clientes
        SET nome='$nome', 
            telefone='$telefone', 
            carro='$carro'
        WHERE id='$id'";

mysqli_query($conexao, $sql);

header("Location: listar.php");
exit();
?>