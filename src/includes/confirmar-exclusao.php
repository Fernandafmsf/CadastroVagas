<main>
  <section class="container">
    <button class="btn btn-success">
      <a href="index.php" class="nav-link"> Voltar </a>
    </button>
  </section>

  <section class="container">
    <h2 class="mt-3">Excluir vaga</h2>

    <form method="post">
      <div class="form-group">
        <p>Voce deseja realmente excluir a vaga <strong><?= $obVaga->titulo ?></strong>?</p>
      </div>
      <div>
        <button type="button" class="btn btn-success">
          <a href="index.php" class="nav-link">Cancelar</a>
        </button>
    
        <button type="submit" name="Excluir" class="btn btn-danger">Excluir</button>
      </div>



    </form>
  </section>

</main>