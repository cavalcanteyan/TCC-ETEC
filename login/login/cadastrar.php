<?php
include "usuario.class.php";
$usuario = new Usuario();
$usuario -> insertUser("admin","admin@gmail.com","123","2");