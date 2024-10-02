<?php
session_start();
if (isset($_POST['acao'])){
    $senha = $_POST['senha'];
    $email = $_POST['email'];
    $perfil = $_POST['perfil'];
    include "usuario.class.php";
    $usuario = new Usuario();

    $user = $usuario -> checkUserPass($email, $senha);
    if(empty($user)){
        echo"
            <script>
                alert('Usuário ou Senha inválidos!')
            </script>";    
    }else{
        $_SESSION['usuario'] = $user["nome"];
        header("location: teste.php");
    }
}?>


<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tela de Login</title>
       <link rel="stylesheet" href="stylo.css/estilo_login.css">
    </head>
    <body>
        <div class="login-container">
            <div class="background"></div>
            <div class="login-form">
                <h2>Acesse sua conta </h2>
                <form action="#">
                    <input type="email" placeholder="Email" required>
                    <input type="password" placeholder="Senha" required>
                    <button type="submit">ENTRAR</button>
                    <a href="#">Não tem uma conta?</a>
    
                </form>
            </div>
        </div>
    </body>
    </html>
