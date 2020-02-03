<?php 
//criando uma conexão do mySQL com o PHP
$dsn = "mysql:host=localhost;dbname=livraria;port=3307";
$username = "root";
$password = "";


//para testar a conexão. try e catch tem a mesma estrutura de if e catch. Como o PDO é mySQL, se der erro, não aparece autómatico, pois não é um erro PHP
try {
    $conexaoDB = new PDO($dsn, $username, $password);
   // echo "<h1>DEU CERTO!</h1>";
} catch (PDOException $e) {
    //.$e->getMessage() para mostrar o erro na conexão 
    echo "<h1>Nessa máquina não funciona! </h1>" .$e->getMessage();

}

?> 