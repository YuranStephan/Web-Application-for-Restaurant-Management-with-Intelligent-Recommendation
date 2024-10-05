<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.html");
    exit();
}
include 'db.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Dashboard do Administrador</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Bem-vindo ao Dashboard, <?php echo $_SESSION['admin']; ?>!</h1>
        <a href="logout.php" class="btn btn-danger">Logout</a>
        <h2>Gerenciar Pratos</h2>
        <a href="create_dish.php" class="btn btn-primary">Criar Novo Prato</a>
        <h2>Pedidos</h2>
        <?php
        $sql = "SELECT * FROM orders";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table class='table'><tr><th>Nome</th><th>Telefone</th><th>Pedido</th><th>Data</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["name"]."</td><td>".$row["phone"]."</td><td>".$row["order_details"]."</td><td>".$row["datetime"]."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "0 resultados";
        }
        ?>
    </div>
</body>
</html>
<?php $conn->close(); ?>
