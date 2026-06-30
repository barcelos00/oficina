<?php
include("conexao.php");

$dados = null;
$erro = "";

if (isset($_POST['confirmar_exclusao_id'])) {
    $id_excluir = $_POST['confirmar_exclusao_id'];

    $stmt = $conexao->prepare("DELETE FROM clientes WHERE id = ?");
    $stmt->bind_param("i", $id_excluir);
    
    if ($stmt->execute()) {
        header("Location: listar.php");
        exit();
    } else {
        $erro = "Erro ao tentar excluir o pet do banco de dados.";
    }
}

if (isset($_POST['buscar_id'])) {
    $id_buscado = $_POST['buscar_id'];

    $stmt = $conexao->prepare("SELECT * FROM clientes WHERE id = ?");
    $stmt->bind_param("i", $id_buscado);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $dados = $resultado->fetch_assoc(); 
    } else {
        $erro = "Nenhum cliente encontrado com esse ID. Tente novamente.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Excluir Cadastro</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h2 { color: #333; }
        .box { max-width: 400px; margin-top: 20px; padding: 15px; border: 1px solid #ddd; border-radius: 8px; }
        input[type="number"] {
            width: 100%; padding: 8px; margin-bottom: 10px;
            border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;
        }
        .btn-buscar {
            width: 100%; padding: 10px; background-color: #555;
            color: white; border: none; border-radius: 4px; cursor: pointer;
        }
        .btn-buscar:hover { background-color: #333; }
        
        /* Botão vermelho para exclusão */
        .btn-excluir {
            width: 100%; padding: 10px; background-color: #dc3545;
            color: white; border: none; border-radius: 4px; cursor: pointer;
            font-weight: bold; margin-top: 15px;
        }
        .btn-excluir:hover { background-color: #c82333; }
        
        .dados-pet { background-color: #f8d7da; padding: 10px; border-radius: 4px; margin-top: 10px; color: #721c24; border: 1px solid #f5c6cb; }
    </style>
</head>
<body>

<h2>Sistema de Exclusão de Clientes</h2>

<div class="box">
    <form method="POST" action="">
        <h3>Buscar Cadastro para Excluir</h3>
        <input type="number" name="buscar_id" placeholder="Digite o ID do cliente" required>
        <button type="submit" class="btn-buscar">Procurar</button>
    </form>
</div>

<?php if ($erro !== ""): ?>
    <p style="color: red; font-weight: bold;"><?= $erro; ?></p>
<?php endif; ?>


<?php if ($dados !== null): ?>
    <div class="box">
        <form method="POST" action="">
            <h3 style="color: #dc3545;">Atenção: Confirmação de Exclusão</h3>
            <p>Você está prestes a excluir permanentemente o seguinte cadastro:</p>
            
            <div class="dados-pet">
                <strong>Nome do Dono:</strong> <?= htmlspecialchars($dados['nome']); ?><br>
                <strong>Email:</strong> <?= htmlspecialchars($dados['email']); ?><br>
                <strong>Telefone:</strong> <?= htmlspecialchars($dados['telefone']); ?><br>
                <strong>Endereço:</strong> <?= htmlspecialchars($dados['endereco']); ?>
            </div>
            
            <input type="hidden" name="confirmar_exclusao_id" value="<?= htmlspecialchars($dados['id']); ?>">
            
            <button type="submit" class="btn-excluir" onclick="return confirm('Tem certeza absoluta que deseja apagar este cliente?');">
                Sim, Quero Excluir Permanentemente
            </button>
        </form>
    </div>
<?php endif; ?>

</body>
</html>