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

// Consulta para obter os dados
$sql = "SELECT * FROM Suplementos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Exibir os dados
    echo "<table border='1'><tr><th>ID</th><th>Nome</th><th>Tipo</th><th>Preço</th><th>Quantidade</th><th>Data Criada</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["nome"]. "</td><td>" . $row["tipo"]. "</td><td>" . $row["preco"]. "</td><td>" . $row["quantidade"]. "</td><td>" . $row["data_criacao"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 resultados";
}

$conn->close();
?>
