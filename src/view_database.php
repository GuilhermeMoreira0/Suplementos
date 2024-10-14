<?php
include 'header.php';  // Incluindo o header

// Criar conexão com o banco de dados
$servername = "db";
$username = "myuser";
$password = "mypassword";
$database = "mydatabase";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Atualizar registro se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $tipo = $_POST['tipo'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];

$message = "";

    // Atualizar os dados no banco
    if (isset($_POST['update'])) {
        // Atualizar os dados no banco
        $stmt = $conn->prepare("UPDATE Suplementos SET nome=?, tipo=?, preco=?, quantidade=? WHERE id=?");
        $stmt->bind_param("sssii", $nome, $tipo, $preco, $quantidade, $id);

        if ($stmt->execute()) {
            $message = "Dados atualizados com sucesso!";
        } else {
            $message = "Erro ao atualizar dados: " . $stmt->error;
        }

    } elseif (isset($_POST['delete'])) {
        // Deletar o registro
        $stmt = $conn->prepare("DELETE FROM Suplementos WHERE id=?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            $message = "Deletado com sucesso!";
        } else {
            $message = "Erro ao deletar o dado: " . $stmt->error;
        }
    }


    $stmt->close();
}

// Consulta para obter os dados
$sql = "SELECT id, nome, tipo, preco, quantidade, DATE_FORMAT(data_criacao, '%d/%m/%Y %H:%i:%s') AS data_formatada FROM Suplementos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Suplementos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            width: 80%;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            text-align: left;
        }

        th, td {
            padding: 12px;
            border: 1px solid #c1c1c1;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        td input {
            width: 100%;
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 3px;
        }

        td button {
            padding: 8px 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        td button:hover {
            background-color: #45a049;
        }

        .message-box {
            text-align: center;
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
        }

        .success {
            background-color: #4CAF50;
            color: white;
        }

        .error {
            background-color: #f44336;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Lista de Suplementos</h1>

        <!-- Adicione um div para exibir a mensagem -->
        <div id="message-box" class="message-box" style="display:none;"></div>

        <form method="POST" action="">
        <?php
        if ($result->num_rows > 0) {
            echo "<table><tr><th>ID</th><th>Nome</th><th>Tipo</th><th>Preço</th><th>Quantidade</th><th>Data Criada</th><th>Ação</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"]. "</td>";
                echo "<td><input type='text' name='nome' value='" . $row["nome"] . "'></td>";
                echo "<td><input type='text' name='tipo' value='" . $row["tipo"] . "'></td>";
                echo "<td><input type='text' name='preco' value='" . $row["preco"] . "'></td>";
                echo "<td><input type='text' name='quantidade' value='" . $row["quantidade"] . "'></td>";
                echo "<td>" . $row["data_formatada"] . "</td>";
                echo "<td>
                    <input type='hidden' name='id' value='" . $row["id"] . "'>
                    <button type='submit' name='update'>Salvar</button>
                    <button type='submit' name='delete' style='background-color: red;'>Deletar</button>
                </td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>0 resultados</p>";
        }
        ?>
        </form>
    </div>

    <script>
        // Exibir mensagem caso exista
        var message = "<?php echo $message; ?>";
        if (message) {
            var messageBox = document.getElementById("message-box");
            messageBox.innerText = message;

            // Checa se a mensagem é de sucesso ou erro e aplica a classe correspondente
            if (message.includes("sucesso")) {
                messageBox.classList.add("success");
            } else {
                messageBox.classList.add("error");
            }
            
            // Exibe a caixa de mensagem
            messageBox.style.display = "block";
        }
    </script>
</body>
</html>

<?php
$conn->close();
?>