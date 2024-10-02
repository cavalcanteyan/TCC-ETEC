<?php
session_start();

if(isset($_SESSION['nome'])){
    echo"Bem Vindo ".$_SESSION['nome'];
}else{
    echo"Você não está logado";
}
include "Usuario.class.php";
$u = new Usuario();