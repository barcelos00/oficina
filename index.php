
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oficina mecanica</title>
    
</head>

<body>
    <div class="container">
        <div class="card">
            <h1>Cadastro de clientes da oficina</h1>

            <form method="POST" action="cadastrar.php">
                <div>
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" required>
                </div>

                <div>
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" required>
                </div>

                <div>
                    <label for="telefone">Telefone:</label>
                    <input type="text" id="telefone" name="telefone" required>
                </div>

                <div>
                    <label for="endereco">Endereço:</label>
                    <input type="text" id="endereco" name="endereco" required>
                </div>

                <div>
                    <label for="cidade">Cidade:</label>
                    <input type="text" id="cidade" name="cidade" required>
                </div>

                <button type="submit">Cadastrar Cliente</button>
            </form>

            <div class="actions">
                <a href="listar.php">Ver clientes cadastrados</a>
                <a href="editar.php">Editar clientes cadastrados</a>
            </div>
        </div>
    </div>
</body>

</html>
