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

// SQL para criar a tabela (se ela não existir)
$sql = "CREATE TABLE IF NOT EXISTS Suplementos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    tipo VARCHAR(50) NOT NULL,
    preco NVARCHAR(100) NOT NULL,
    quantidade VARCHAR(100) NOT NULL,
    data_criacao DATETIME DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table 'Suplementos' created successfully or already exists.<br>";
} else {
    die("Error creating table: " . $conn->error);
}

// Agora você pode colocar a consulta SELECT
$sql_select = "SELECT id, nome, DATE_FORMAT(data_criacao, '%d/%m/%Y %H:%i:%s') AS data_formatada FROM Suplementos";

$result = $conn->query($sql_select);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - Nome: " . $row["nome"] . " - Criado em: " . $row["data_formatada"] . "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>
