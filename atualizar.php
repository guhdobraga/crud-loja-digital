<?php
include 'db.php';
if (!isset($_GET['id'])) {
    header('Location: listar.php');
    exit;
}
$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM carrinho WHERE id = ?');
$stmt->execute([$id]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
    header('Location: listar.php');
    exit;
}
$nome = $appointment['nome'];
$email = $appointment['email'];
$telefone = $appointment['telefone'];
$data = $appointment['data'];
$genero = $appointment['genero'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar compromisso</title>
    <link rel="stylesheet" href="css/style3.css">
    <link rel="shortcut icon" href="ico/ico.png" type="image/png">
</head>
<body>
    <h1>Atualizar Compromisso</h1>
    <form method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="<?php echo $nome; ?>" required><br>

        <label for="email">E-mail:</label>
        <input type="email" name="email" value="<?php echo $email; ?>"required><br>

        <label for="telefone">Telefone:</label>
        <input type="tel" name="telefone" value="<?php echo $telefone; ?>"required><br>

        <label for="data">Data:</label>
        <input type="date" name="data" value="<?php echo $data; ?>"required><br>

        <label for="genero">Gênero:</label>
        <input type="text" name="genero" value="<?php echo $genero; ?>"required><br>

       

        <button type="submit">Atualizar</button>
    </form>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $data = $_POST['data'];
    $genero = $_POST['genero'];
    

   $stmt = $pdo->prepare('UPDATE carrinho SET nome = ?, email = ?, telefone = ?, data = ?, genero = ? WHERE id = ?');
   $stmt->execute([$nome, $email, $telefone, $data, $genero,  $id]);
   header('Location: listar.php');
   exit; 
}
?>