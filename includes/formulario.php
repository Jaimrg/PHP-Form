<main>
  <section>
    <a href="index.php">
      <button class="btn btn-success">Voltar</button>
    </a>
  </section>



  <form method="post">

    <div class="form-group">
      <label>Nome</label>
      <input type="text" class="form-control" name="nome" value="<?= $obAluno->nome ?>">
    </div>

    <div class="form-group">
      <label>Apelido</label>
      <input type="text" class="form-control" name="apelido" value="<?= $obAluno->apelido ?>">
    </div>

    <div class="form-group">
      <label>Data de Nascimento</label>
      <input type="text" class="form-control" name="data_nascimento" value="<?= $obAluno->data_nascimento ?>">
    </div>

    <div class="form-group">
      <label for="provincia-dropdown">Provincia</label>
      <select id="provincia-dropdown" class="form-control">
        <?php        
        require_once "C:/xampp/htdocs/PHP-Form/model/Db/Db.php";
        $result = mysqli_query($conn, "SELECT * FROM provincia");
        while ($row = mysqli_fetch_array($result)) {
        ?>
          <option value="<?php echo $row['id']; ?>"><?php echo $row["designacao"]; ?></option>
        <?php
        }
        ?>
      </select>
    </div>    

    <div class="form-group">
      <label for="distrito-dropdown">Distrito</label>
      <select name="distrito" id="distrito-dropdown" class="form-control">                
      </select>
    </div>

    <!--<div class="form-group">
      <label>Distrito</label>
      <input type="text" class="form-control" name="distrito" value="<?= $obAluno->distrito_id ?>">
    </div>-->

    <div class="form-group">
      <label for="genero-dropdown">Genero</label>
      <select name="genero" id="genero-dropdown" class="form-control">
        <?php        
        require_once "C:/xampp/htdocs/PHP-Form/model/Db/Db.php";
        $result = mysqli_query($conn, "SELECT * FROM genero");
        while ($row = mysqli_fetch_array($result)) {
        ?>
          <option   value="<?php echo $row['id']; ?>"><?php echo $row["designacao"]; ?></option>
        <?php
        }
        ?>
      </select>
    </div> 




    <div class="form-group">
      <button type="submit" class="btn btn-success">Enviar</button>
    </div>

  </form>

</main>

<script>
  $(document).ready(function() {
    $('#provincia-dropdown').on('change', function() {
      var provincia_id = this.value;      
      $.ajax({
        url: "Jquery/distrito-by-provincia.php",
        type: "POST",
        data: {
          provincia_id: provincia_id
        },
        cache: false,
        success: function(result) {
          $("#distrito-dropdown").html(result);
          
        }
      });
    });
  });
</script>