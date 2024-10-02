<?php

class Usuario{
    private $email;
    private $senha;
    private $perfil;
    private $pdo;

    public function getEmail(){
        return $this-> email;
    }

    public function setEmail($email){
        $this-> email = $email ;
    }
    public function getSenha(){
        return $this-> senha;
    }

    public function setSenha($senha){
        $this-> senha = $senha ;
    }
    public function getPerfil(){
        return $this-> perfil;
    }

    public function setPerfil($perfil){
        $this-> perfil = $perfil ;
    }

    function __construct(){
        $dns = "mysql:dbname=db_cliente;host=localhost";
        $user = "root";
        $pass ="";
        try {
            $this -> pdo= new PDO($dns,$user,$pass);
        } catch (\Throwable $th) {
            echo"
            <script>
                alert('Banco indisponivél. Tente mais tarde')
            </script>";    

        }
    }

    function insertUser($nome,$email,$senha,$perfil){
        $sql = "insert into usuario set nome = :n, email = :e, senha = :s , perfil = :p";
        $sql = $this -> pdo -> prepare($sql);
        $sql -> bindValue(":e",$email);
        $sql -> bindValue(":s",$senha);
        $sql -> bindValue(":n",$nome);
        $sql -> bindValue(":p",$perfil);

        return $sql-> execute();
    }

    function checkUser($email){
        $sql = " select *FROM usuario where email = :e";
        $sql = $this -> pdo -> prepare($sql);
        $sql -> bindValue(":e",$email);

        if ($sql->rowCount() >0 ){
            return $sql-> fetch();
        }else{
            return array();
        }
    }

    function checkUserPass($email, $senha){
        $sql = " select *FROM usuario where email = :e and senha = :s";
        $sql = $this -> pdo -> prepare($sql);
        $sql -> bindValue(":e",$email);
        $sql -> bindValue(":s",$senha);
        echo $sql->rowCount();     
        exit;   
        if ($sql->rowCount() >0 ){
            return $sql-> fetch();
        }else{
            return array();
        }
    }
}