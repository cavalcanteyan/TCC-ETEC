<?php
session_start();
$perfil = $_SESSION['perfil'];

if($perfil != 1){
    header('Location: login.html');
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylo.css/estilo_home.css">
    <title>Click Bebidas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="logo">
            <a href="home.html">
                <img src="imagens/Logotipo.png" alt="Logo" style="height: 50px;"> <!-- Ajuste a altura conforme necessário -->
            </a>
        </div>
        <div class="nav-links">
            <a href="home.html">Home</a>
            <a href="produtos.html">Produtos</a>
            <a href="contato.html">Contato</a>
        </div>
        <div class="search-bar">
            <input type="text" placeholder="Pesquisar...">
            <button>
                <div class="search-label">Buscar</div>
            </button>
        </div>
        <button class="logout-button">Sair</button>
    </div>
</body>
</html>