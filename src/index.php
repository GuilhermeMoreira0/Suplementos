<?php
$servername = "db";
$username = "myuser";
$password = "mypassword";
$database = "mydatabase";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $database);

// Verificar a conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Processar o formulário quando submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $tipo = $_POST['tipo'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];

    // Preparar e executar a query de inserção
    $stmt = $conn->prepare("INSERT INTO Suplementos (nome, tipo, preco, quantidade) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nome, $tipo, $preco, $quantidade);

    if ($stmt->execute()) {
        echo "Dados enviados com sucesso!";
    } else {
        echo "Erro ao enviar dados: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Contato</title>
</head>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Arial', sans-serif;
    background-color: #e0e0e0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 500px;
    text-align: center;
}

h1 {
    margin-bottom: 20px;
    color: #333;
    font-size: 24px;
}

form {
    display: flex;
    flex-direction: column;
    align-items: stretch;
}

label {
    font-size: 14px;
    font-weight: bold;
    color: #555;
    margin-bottom: 5px;
    text-align: left;
}

input[type="text"], select {
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    width: 100%;
}

input[type="submit"] {
    padding: 10px;
    background-color: #4CAF50;
    color: white;
    font-size: 16px;
    font-weight: bold;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

select {
    background-color: #fff;
    color: #555;
    appearance: none;
    cursor: pointer;
}

</style>
<body>
   <div class="container"> 
      <h1>Formulário para cadastrar suplementos</h1>
        <form method="post" action="">
            <label for="nome">Marca:</label>
            <input type="text" id="nome" name="nome" required><br><br>

            <label for="tipo">Tipo:</label>
            <select name="tipo" id="tipo">
                <option value="" disabled selected>Selecione</option>
                <option value="Barra de proteína">Barra de proteína</option>
                <option value="Whey">Whey</option>
                <option value="Creatina">Creatina</option>
                <option value="Hipercalórico">Hipercalórico</option>
            </select>

            <label for="preco">Preço:</label>
            <input type="text" id="preco" name="preco" required>

            <label for="quantidade">Quantidade:</label>
            <input type="text" id="quantidade" name="quantidade" required>

            <input type="submit" value="Enviar">
        </form>
    </div> 
</body>

</html>
