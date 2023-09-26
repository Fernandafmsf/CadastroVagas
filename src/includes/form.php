<main>
  <section class="container">
    <button class="btn btn-success">
      <a href="index.php" class="nav-link"> Voltar </a>
    </button>
  </section>

  <section class="container">
    <h2 class="mt-3">Cadastrar vagas</h2>

    <form method="post">
      <div>
        <label for="titulo">Titulo</label>
        <input type="text" name="titulo" class="form-control" required>
      </div>
      <br>

      <div>
        <label for="descricao">Descriçao</label>
        <textarea name="descricao" class="form-control" required></textarea>
      </div>
      <br>

      <div>
        <label for="status">Status</label>

        <div>
          <div class="form-check-inline">
            <label class="form-control">
              <input type="radio" name="ativo" value="s" checked>Ativo
            </label>
          </div>

          <div class="form-check form-check-inline">
            <label class="form-control">
              <input type="radio" name="ativo" value="n">Inativo
            </label>
          </div>
        </div>

      </div>
      <br>

      <div>
        <button type="submit" name="Enviar" class="btn btn-success">Enviar</button>
      </div>


    </form>
  </section>

</main>