<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.html");
    exit();
}
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dish_name = $_POST['dish_name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $sql = "INSERT INTO dishes (dish_name, price, description) VALUES ('$dish_name', '$price', '$description')";
    if ($conn->query($sql) === TRUE) {
        echo "Novo prato inserido com sucesso";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Criar Novo Prato</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Criar Novo Prato</h2>
        <form method="post" action="create_dish.php">
            <div class="form-group">
                <label for="dish_name">Nome do Prato:</label>
                <input type="text" class="form-control" id="dish_name" name="dish_name" required>
            </div>
            <div class="form-group">
                <label for="price">Preço:</label>
                <input type="text" class="form-control" id="price" name="price" required>
            </div>
            <div class="form-group">
                <label for="description">Descrição:</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Criar</button>
        </form>
    </div>
</body>
</html>
