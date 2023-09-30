<?php
$resultados = '';

foreach ($vagas as $vaga) {
    $resultados.= '<tr>
                      <td>'.$vaga->titulo.'</td>
                      <td>'.$vaga->descricao.'</td>
                      <td>'.($vaga->ativo =='s'? 'Ativo':'Inativo').'</td>
                      <td>'.date('d/m/Y à\s H:i:s', strtotime($vaga->data)). '</td>
                      <td>
                        <button type="button" class="btn btn-primary">
                          <a class="nav-link" href="editar.php?id=' . $vaga->id . '">
                          Editar
                          </a>
                        </button>                    
                        
                        <a href="excluir.php?id='.$vaga->id.'">
                          <button type="button" class="btn btn-danger">Excluir</button>  
                        </a>
                      </td>
                    </tr>';
}

?>

  <main>
    <section class="container">
      <button class="btn btn-success">
        <a href="cadastrar.php" class="nav-link"> Nova vaga </a>
      </button>
    </section>

    <section class="container-sm">
      <table class="table table-striped table-hover table-bordered mt-3">
        <thead>
          <tr>
            <td>Titulo</td>
            <td>Descrição</td>
            <td>Status </td>
            <td>Data</td>
            <td>Ação</td>
          </tr>
        </thead>
        <tbody>
          <?=$resultados?>
        </tbody>
      </table>
    </section>

  </main>