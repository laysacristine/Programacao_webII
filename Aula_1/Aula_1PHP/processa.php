<?php
$id = $_POST['id'];
$title = $_POST['title'];
$price = $_POST['price'];
$category = $_POST['category'];
$description = $_POST['description'];
$nomeImagem  = $_FILES['image']['name'];

echo "<h2>Dados do Produto Cadastrado</h2>";
echo "<b>ID:</b> " . $id . "<br>";
echo "<b>Título:</b> " . $title . "<br>";
echo "<b>Preço:</b> R$ " . $price . "<br>";
echo "<b>Categoria:</b> " . $category . "<br>";
echo "<b>Descrição:</b> " . $description . "<br>";
echo "<b>Arquivo enviado:</b> " . $nomeImagem . "<br>";
?>