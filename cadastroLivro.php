<?php
require_once ('conexao.php');
$consultaEditora = $conexaoDB ->prepare('SELECT * FROM editora');
$resultado = $consultaEditora ->execute();
$editoras = $consultaEditora ->fetchAll(PDO::FETCH_ASSOC); 

if(isset($_POST['cadastro-livro'])) {
    //verificar campos preenchidos
    if($_POST['nome'] != "" && $_POST['descricao'] !=""){

    //prepara a query
    $query = $conexaoDB->prepare('INSERT INTO produto (nome, descricao, preco, fk_editora, fk_categoria, imagem) VALUES (:nome, :descricao, :preco, :fk_editora, 49, "sem-imagem")');

    $resultado = $query->execute([
    ":nome" => $_POST['nome'],
    ":descricao" => $_POST['descricao'],
    ":preco" => $_POST['preco'],
    ":fk_editora" => $_POST['fk_editora']
    ]);

    //se tudo der certo, redireciona para lista de livros
    header('location:livros.php');
    }
}

//var_dump($editoras);

?> 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Cadastro</title>
</head>
<body>
    <div class="container my-5">
        <h1>Cadastrar livro</h1>

    <form action="" method="POST"> 
        <label for="nome">Nome Produto:</label>
            <input type="text" name="nome" id="nome" class="form-control">
        <label for="descricao">Descrição:</label>
            <input type="text" name="descricao" id="descricao" class="form-control">
        <label for="preco">Preço:</label>
            <input type="number" name="preco" id="preco" class="form-control">
        <label for="imagem">Imagem:</label>
            <input type="file" name="imagem" id="imagem" class="form-control">
        <label for="fk_editora">Editora:</label>
            <select name="fk_editora" id="fk_editora" class="form-control">
                <?php foreach($editoras as $editora) { ?>
                    <option value=""> <?php echo $editora['nome']; ?> </option>
                <?php } ?>
            </select>
        <button name="cadastro-livro" class="btn btn-primary">Enviar</button>
    </form>

    </div>
</body>
</html>