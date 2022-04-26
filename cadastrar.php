<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entidade\Aluno;
$obAluno = new Aluno;

//echo "<pre>"; print_r($_POST); echo "<pre>"; exit;

if(isset($_POST['nome'],$_POST['apelido'],$_POST['data_nascimento'],$_POST['distrito'],$_POST['genero'])){

    $obAluno->nome    = $_POST['nome'];
    $obAluno->apelido = $_POST['apelido'];
    $obAluno->data_nascimento     = $_POST['data_nascimento'];
    $obAluno->distrito_id = $_POST['distrito'];
    $obAluno->genero = $_POST['genero'];
    $obAluno->cadastrar();
  
    header('location: index.php?status=success');
    exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';