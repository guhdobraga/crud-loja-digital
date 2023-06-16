<?php
require_once 'db.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="ico/ico.png" type="image/png">
    <title>Cadastro</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/01style.css">
    
    
   
</head>
<body>
    <div class="container-formulario">
        <h1>CADASTRO CLIENTE</h1>
        <a href="http://localhost/produto-final/index.php"><img class="logo" src="assets/logo.png"></a>
        <?php
        if (isset($_POST['submit'])) {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $data = $_POST['data'];
            $genero = $_POST['genero'];
            
            
            $stmt = $pdo->prepare('SELECT COUNT(*) FROM carrinho WHERE data = ?');
            $stmt->execute([$data]);
            $count = $stmt->fetchColumn();

            if($count > 0) {
                $error = 'Já existe um registro neste nome.';
        } else {

            $stmt = $pdo->prepare('INSERT INTO carrinho
            (nome, email, telefone, data, genero)
            VALUES(:nome, :email, :telefone, :data, :genero)');
            $stmt->execute(['nome' => $nome,
            'email' => $email,
            'telefone' => $telefone, 'data' => $data, 'genero' => $genero]);

            if ($stmt->rowCount()) {
               
            } else {
                echo '<span>Erro ao agendar compromisso. Tente novamente mais tarde<span>';
            }
        }
        if (isset($error)) {
            echo '<span>' . $error . '</span>';
        }
    }
        ?>
        <section class="container">
        <form method="post">

        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>
        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" required><br>
        <label for="data">Data de nascimento:</label>
        <input type="date" name="data" required><br>
        <label for="genero">Gênero:</label>
        <input type="text" name="genero" required><br>
        
        

        <div>
            <button type="submit" name="submit" value="Agendar">Cadastrar</button>
            <button><a href="listar.php">Listar</a></button>
            <button><a href="index-carrinho.php">Produtos</a></button>a
            </div>
        </form>
        </section>
</body>
</html>