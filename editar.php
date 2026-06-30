<?php
include("conexao.php");

$dados = null; 
$erro = "";    

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
    <title>Buscar e Editar Cadastro</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h2 { color: #333; }
        .box { max-width: 400px; margin-top: 20px; padding: 15px; border: 1px solid #ddd; border-radius: 8px; }
        input[type="text"], input[type="number"] {
            width: 100%; padding: 8px; margin-bottom: 10px;
            border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;
        }
        button {
            width: 100%; padding: 10px; background-color: #30dddd;
            color: white; border: none; border-radius: 4px; cursor: pointer;
        }
        button:hover { background-color: #27adc5fa; }
        .btn-buscar { background-color: #555; }
        .btn-buscar:hover { background-color: #333; }
        
        /* Estilo para o novo botão de excluir */
        .btn-excluir {
            background-color: #dc3545;
            margin-top: 10px;
            font-weight: bold;
        }
        .btn-excluir:hover { background-color: #c82333; }
    </style>
</head>
<body>

<h2>Sistema de Edição de Clientes</h2>

<div class="box">
    <form method="POST" action="">
        <h3>Buscar Cadastro</h3>
        <input type="number" name="buscar_id" placeholder="Digite o ID do cliente para buscar" required>
        <button type="submit" class="btn-buscar">Buscar no Banco</button>
        <button type="button" class="btn-excluir" onclick="window.location.href='excluir.php'">Ir para Exclusão</button>
        <br><br>
        <button type="button" class="btn-voltar" onclick="window.location.href='index.php'">Voltar pro Início</button>
    </form>
</div>

<?php if ($erro !== ""): ?>
    <p style="color: red; font-weight: bold;"><?= $erro; ?></p>
<?php endif; ?>


<?php if ($dados !== null): ?>
    <div class="box">
        <form action="atualizar.php" method="POST">
            <h3>Atualize as informações:</h3>
            <p style="color: red; font-size: 14px;">* Preencha todos os campos corretamente.</p>
            
            <input type="hidden" name="id" value="<?= htmlspecialchars($dados['id']); ?>">
            
            Nome:<br>
            <input type="text" name="nome" value="<?= htmlspecialchars($dados['nome']); ?>"><br>
            
            Email:<br>
            <input type="text" name="email" value="<?= htmlspecialchars($dados['email']); ?>"><br>
            
            Telefone:<br>
            <input type="text" name="telefone" value="<?= htmlspecialchars($dados['telefone']); ?>"><br>
            
            Endereço:<br>
            <input type="text" name="endereco" value="<?= htmlspecialchars($dados['endereco']); ?>"><br>
            
            Cidade:<br>
            <input type="text" name="cidade" value="<?= htmlspecialchars($dados['cidade']); ?>"><br>

            <button type="submit">Salvar Atualizações</button>
        </form>

        <form action="excluir.php" method="POST">
            <input type="hidden" name="buscar_id" value="<?= htmlspecialchars($dados['id']); ?>">
            <button type="submit" class="btn-excluir">Ir para Exclusão deste Cliente    </button>
        </form>
    </div>
<?php endif; ?>

</body>
</html>