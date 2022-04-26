<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entidade\Aluno;

//$Alunos = Aluno::getAlunos();
$Alunos = Aluno::get_by_province();

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/listagem.php';
include __DIR__.'/includes/footer.php';