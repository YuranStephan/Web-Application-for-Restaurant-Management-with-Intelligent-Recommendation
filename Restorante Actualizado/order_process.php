<?php
include 'db.php';
// Obtendo os dados do formulário
$name = $_POST['name'];
$phone = $_POST['phone'];
$order = $_POST['order'];
$additional_food = $_POST['additional_food'];
$quantity = $_POST['quantity'];
$datetime = $_POST['datetime'];
$address = $_POST['address'];
$message = $_POST['message'];

// Preparando a query SQL para inserir os dados
$sql = "INSERT INTO orders (name, phone, order_details, additional_food, quantity, datetime, address, message) 
VALUES ('$name', '$phone', '$order', '$additional_food', '$quantity', '$datetime', '$address', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Novo pedido inserido com sucesso";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

// Fechando a conexão
$conn->close();
?>