<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>
    <link rel="stylesheet" href="css/style2.css">
    <link rel="shortcut icon" href="ico/ico.png" type="image/png">
</head>
<body>
<h1>Registro</h1>
<?php
$stmt = $pdo->query('SELECT * FROM carrinho ORDER BY id');
$registros = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(count($registros) == 0) {
    echo '<p>Nenhum produto encontrado! </p>';
} else {
    echo '<table border="1">';
    echo '<thead><tr><th>Nome</th><th>E-mail</th><th>Telefone</th><th>Data</th><th>Gênero</th><th colspan="2">Opções</th></tr></thead>';
    echo '<tbody>';

    foreach ($registros as $registro) {
        echo '<tr>';
        echo '<td>' . $registro['nome'] . '</td>';
        echo '<td>' . $registro['email'] . '</td>';
        echo '<td>' . $registro['telefone'] . '</td>';
        echo '<td>' . date('d/m/Y', strtotime($registro['data'])) . '</td>';
        echo '<td>' . $registro['genero'] . '</td>';
        echo '<td><a style="color:black;" href="atualizar.php?id=' . $registro['id'] . '">Atualizar</a></td>';
        echo '<td><a style="color:black;" href="deletar.php?id=' . $registro['id'] . '">Deletar</a></';
        echo '</tr>';
    }
    
    echo '</tbody>';
    echo '</table>';

}
?>
<button><a href="cadastro.php">Voltar</a></button>  
</body>
</html>