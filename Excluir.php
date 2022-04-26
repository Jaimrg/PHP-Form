<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entidade\Aluno;

//VALIDAÇÃO DO ID
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
  header('location: index.php?status=error');
  exit;
}

//CONSULTA o Aluno
$obAluno = Aluno::getAluno($_GET['id']);

//VALIDAÇÃO Do Aluno
if(!$obAluno instanceof Aluno){
  header('location: index.php?status=error');
  exit;
}

//VALIDAÇÃO DO POST
if(isset($_POST['excluir'])){

  $obAluno->excluir();

  header('location: index.php?status=success');
  exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/confirmar.php';
include __DIR__.'/includes/footer.php';