<?php
require ('conexao.php');

$consultaDB = $conexaoDB ->prepare('SELECT * FROM produto');
$consulta = $consultaDB ->execute();

$livros = $consultaDB ->fetchAll(PDO::FETCH_ASSOC); 


//para checar de está aparecendo os livros
//echo "<pre>";
// var_dump($livros); 
// echo "</pre>"; 


//mostrar o que tem na coluna id_produto
foreach($livros as $livro) {
    echo $livro["id_produto"]. "<br>";
}

?>