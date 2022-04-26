<?php

  $mensagem = '';
  if(isset($_GET['status'])){
    switch ($_GET['status']) {
      case 'success':
        $mensagem = '<div class="alert alert-success">Ação executada com sucesso!</div>';
        break;

      case 'error':
        $mensagem = '<div class="alert alert-danger">Ação não executada!</div>';
        break;
    }
  }

  $resultados = '';
  foreach($Alunos as $Aluno){
    $resultados .= '<tr>
                      <td>'.$Aluno->id.'</td>
                      <td>'.$Aluno->nome.'</td>
                      <td>'.$Aluno->apelido.'</td>
                      <td>'.date('d/m/Y',strtotime($Aluno->data_nascimento)).'</td>
                      <td>'.$Aluno->designacao.'</td>
                      <td>'.($Aluno->genero == 1 ? 'M' : 'F').'</td>                      
                      <td>
                        <a href="Editar.php?id='.$Aluno->id.'">
                          <button type="button" class="btn btn-primary">Editar</button>
                        </a>
                        <a href="Excluir.php?id='.$Aluno->id.'">
                          <button type="button" class="btn btn-danger">Excluir</button>
                        </a>
                      </td>
                    </tr>';
  }

  $resultados = strlen($resultados) ? $resultados : '<tr>
                                                       <td colspan="6" class="text-center">
                                                              Nenhum Aluno encontrado
                                                       </td>
                                                    </tr>';

?>
<main>

  <?=$mensagem?>

  <section>
    <a href="cadastrar.php">
      <button class="btn btn-success">Novo Aluno</button>
    </a>
  </section>

  <section>

    <table class="table bg-light mt-3">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Apelido</th>
            <th>Data De Nascimento</th>
            <th>Distrito</th>
            <th>Genero</th>
          </tr>
        </thead>
        <tbody>
            <?=$resultados?>
        </tbody>
    </table>

  </section>


</main>