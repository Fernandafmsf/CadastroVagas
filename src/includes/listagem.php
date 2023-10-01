<?php

$mensagem= '';
if(isset($_GET['status'])){
  switch($_GET['status']){
    case 'success':
      $mensagem= '<div class=" container-sm alert alert-success">Açao executada com sucesso</div>';
      break;

    case 'error':
      $mensagem='<div class=" container-sm alert alert-danger">Açao não executada</div>';
      break;
    

  }
}
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

$resultados=strlen($resultados) ? 
$resultados: 
'<tr>
  <td colspan="6" class=" text-center">Nenhuma vaga encontrada</td>
</tr>';

?>

  <main>

    <?= $mensagem?>
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