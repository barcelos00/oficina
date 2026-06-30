<?php
include("conexao.php");
$sql = "SELECT * FROM clientes";
$resultado = mysqli_query($conexao, $sql);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Clientes</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        th {
            background-color: #3dd6db;
            color: white;
            padding: 15px;
            text-align: left;
            font-weight: 600;
            border-bottom: 3px solid #2ba8ad;
        }

        td {
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f0f0f0;
            transition: background-color 0.3s ease;
        }

        a {
            text-decoration: none;
            color: white;
        }

        button {
            padding: 12px 30px;
            background-color: #3dd6db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
            display: block;
            margin: 0 auto;
        }

        button:hover {
            background-color: #2ba8ad;
        }

        button:active {
            transform: scale(0.98);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Lista de Clientes</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Endereço</th>
                    <th>Data</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($clientes = mysqli_fetch_assoc($resultado)){
                ?>
                <tr>
                    <td><?php echo $clientes["id"]; ?></td>
                    <td><?php echo $clientes["nome"]; ?></td>
                    <td><?php echo $clientes["email"]; ?></td>
                    <td><?php echo $clientes["telefone"]; ?></td>
                    <td><?php echo $clientes["endereco"]; ?></td>
                    <td><?php echo $clientes["data"]; ?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        
       <button>
            <a href="index.php">Voltar para o início</a>
        </button>
       
    </div>
</body>
</html>