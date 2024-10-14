<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Aplicação</title>
    <style>
        /* Estilos gerais para o corpo */
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #e0e0e0;
        }

        /* Estilos para o header */
        header {
            background-color: #565656;
            padding: 15px;
            color: white;
            position: fixed;
            top: 0;
            width: 100%;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        }

        header nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header a {
            justify-content: space-between 23px;
            color: white;
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
        }

        header a:hover {
            text-decoration: underline;
        }

        /* Para empurrar o conteúdo para baixo e não ficar embaixo do header */
        .content {
            margin-top: 80px; /* Altura do header + espaço extra */
        }

        p {
            margin: 0;
        }

        .a2{
            padding-left: 20px ;
        }

    </style>
</head>
<body>
<header>
    <nav>
        <div>
            <a  href="index.php">Cadastrar Suplementos</a>
            <a class="a2" href="view_database.php">Visualizar Dados</a>
        </div>
        <?php if (!empty($message1)): ?>
                <p><?php echo $message1; ?></p>
            <?php endif; ?>
        <div>
            <a href="principal.php">Sair</a>
        </div>
    </nav>
</header>
</body>
