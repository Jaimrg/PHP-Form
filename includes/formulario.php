<main>
<section>
    <a href="index.php">
      <button class="btn btn-success">Voltar</button>
    </a>
  </section>



  <form method="post">

    <div class="form-group">
      <label>Nome</label>
      <input type="text" class="form-control" name="nome" value="<?=$obAluno->nome?>">
    </div>

    <div class="form-group">
      <label>Apelido</label>
      <input type="text" class="form-control" name="apelido" value="<?=$obAluno->apelido?>">
    </div>

    <div class="form-group">
      <label>Data de Nascimento</label>
      <input type="text" class="form-control" name="data_nascimento" value="<?=$obAluno->data_nascimento?>">
    </div>

    <div class="form-group">
      <label>Distrito</label>
      <input type="text" class="form-control" name="distrito" value="<?=$obAluno->distrito_id?>">
    </div>

    <div class="form-group">
      <label>Genero</label>
      <input type="text" class="form-control" name="genero" value="<?=$obAluno->genero?>">
    </div>
    

    

    <div class="form-group">
      <button type="submit" class="btn btn-success">Enviar</button>
    </div>

  </form>
  
</main>