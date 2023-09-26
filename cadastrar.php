<?php

require_once './vendor/autoload.php';

use src\model\Vaga;


if(isset($_POST['Enviar'])){

  $vaga = new Vaga;
  $vaga->titulo = $_POST['titulo'];
  $vaga->descricao = $_POST['descricao'];
  $vaga->ativo = $_POST['ativo'];

}


include __DIR__.'/src/includes/header.php';
include __DIR__ . '/src/includes/form.php';
include __DIR__ . '/src/includes/footer.php';

