<?php


require_once("config.php");

// $sql = new Sql();

// $usuarios = $sql->select("SELECT * FROM usuarios");

// echo json_encode($usuarios);


//carrega um usuario
// $root = new Usuario();

// $root->loadById(1);

// echo $root;


//carrega a lista 
// $lista = Usuario::getList();

// echo json_encode($lista)


//carrega um lista de usuarios buscando pelo login

$busca = Usuario::search("salete");

echo json_encode($busca)

?>