<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Home</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="stylo.css/estilo_cadastrarProduto.css">
</head>
<style>
    body{
        background-color: rgb(0, 0, 0);
        color:rgb(255, 255, 255);
        font-family:Verdana, Geneva, Tahoma, sans-serif;
        font-size: 25px;
    }
</style>

    <header id="header">
       <div class="container">

            <div class="flex">
                <nav>
                    <ul>    
                        <li><a href="home.php">Home</a></li>
                        <li><a href="produtos.html">Produtos</a></li>
                        <li><a href="#">Cadastrar Produtos</a></li>
                    </ul>
                </nav>

                <div class="btn-contato">
                    <a href="contato.html"><button> CONTATO</button></a>
                </div>
                
                <div class = "search-box"> 
                    <input type="text" class="search-txt" placeholder="Pesquisar">
                    <a href="#" class="search-btn">
                        <img src="imagens/lupa.png" alt="lupa" height="20" width="20">
                        </a></div>
          
                    </div><!--flex-->

        </div><!--container-->
        </header>
        </div> 
        <body>
    <section>
        <form action="" method="POST" enctype="multipart/form-data">
        <h1> Cadastrar Produtos </h1>
        <label for="nome"> Nome do Produto </label>
        <input type="text" name="nome" id="nome" class = "sombra">

        <label for="desc"> Descrição </label>
        <textarea name="desc" id = "desc" class = "sombra"></textarea>
        
        <input type="file" name = "foto[]" multiple id="foto"
        class = "sombra meuInput">
        <input type="submit" id="botao">
        
    </form>
    </section>
    
</body>
        
        
        <script src="home.js"></script>
</html>
<?php
//checar se o usuario preencheu ao menos o campo nome do produto
if( isset($_POST['nome']) && !empty($_POST['nome'])){
    //coloca o dado preenchido no formulario em varias e checa se nao tem injection( se estão tentando usar um comando sql)
    $nome        = addsLashes( $_POST['nome'] );
    $descricao   = addsLashes( $_POST['desc'] );

    //criar um array vazio para guardar os nomes das imagens caso tenha enviado alguma
    $fotos       = array();

    //checar se foi enviada alguma foto
    if( isset($_FILES['foto']) ){
        $tipo = "";
        //criar um laço de repetição enquanto houver fotos
        for($i=0; $i<count($_FILES['foto']['name']); $i++){
            if( $_FILES['foto']['type'][$i] == "image/jpeg"){
                $tipo = ".jpg";
            } elseif( $_FILES['foto']['type'][$i] == "image/png"){
                $tipo = ".png";
            }else{
                $tipo = "outro";
            }    
        

        if( $tipo == "outro"){
            ?>
            <script>
                alert("Só é possivel enviar arquivos JPG e PNG")
            </script>
            <?php    
        } else{
            //encripitar o nome do arquivo e coloca o tipo 
            $nome_arquivo = md5($_FILES['foto']['name'][$i] ).rand(1,999) .$tipo;

            //move o arquivo para a pasta de imagens ja com o nome do arquivo
            move_uploaded_file($_FILES['foto']['tmp_name'][$i], "imagens/" .$nome_arquivo);
            
            //armazena o nome do arquivo no vetor fotos
            array_push($fotos, $nome_arquivo);
           
        }

    }

    }
    echo "<pre>";
    var_dump($fotos);
    
}else{
    echo"
    <script>
        alert('preencha todos os campos!')
    </script>";
}
