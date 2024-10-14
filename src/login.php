<?php
$message = ""; // Variável para armazenar a mensagem de sucesso ou erro

// Verificar se o formulário de login foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['usuario']) && isset($_POST['senha'])) {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    // Lógica de validação do login
    if ($usuario == 'admin' && $senha == '1234') {
       $message1="Login realizado com sucesso! Bem-vindo, $usuario.";
        // Aqui você pode redirecionar para outra página ou exibir a página principal
    } else {
        $message1="Usuário ou senha inválidos.";
        exit(); // Para a execução se o login falhar
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login</title>
   
</head>
<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #565656;
    height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

header {
    position: absolute;
    top: 0;
    width: 100%;
    background-color: #333;
    color: white;
    text-align: center;
    padding: 15px 0;
}

header h1 {
    margin: 0;
}

.login-container {
    background-color: white;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
    width: 300px;
    text-align: center;
}

.login-container h2 {
    margin-bottom: 20px;
}

.input-group {
    margin-bottom: 15px;
    text-align: left;
}

.input-group label {
    display: block;
    margin-bottom: 5px;
}

.input-group input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    width: 100%;
    padding: 10px;
    background-color: #333;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

button:hover {
    background-color: #555;
}

</style>
<body>
    <header>
        <h1>Gestão</h1>
    </header>
    
    <div class="login-container">
        <h2>Login</h2>
        <form action="index.php" method="POST">
            <div class="input-group">
                <label for="usuario">Usuário:</label>
                <input type="text" id="usuario" name="usuario" required>
            </div>
            <div class="input-group">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>
            </div>
            <button type="submit">Enviar</button>
            <div>
            <?php if (!empty($message1)): ?>
                <p><?php echo $message1; ?></p>
            <?php endif; ?>
        </div>
        </form>
    </div>
</body>
</html>
