<?php

require_once './vendor/autoload.php';

use src\model\Vaga;


if(isset($_POST['Enviar'])){
  $vaga = new Vaga;

  $vaga->titulo = $_POST['titulo']; //enviando dados 
  $vaga->descricao = $_POST['descricao'];
  $vaga->ativo = $_POST['ativo'];

  $vaga->cadastrar(); //chamando funçao cadastrar, que como padrao ja faz a conexao com o db e informa a tabela 
 
  header('location: index.php?status=success');
  exit; //colocar sempre que tiver um header. Evita que o restante da pagina seja executada 


}


include __DIR__.'/src/includes/header.php';
include __DIR__ . '/src/includes/form.php';
include __DIR__ . '/src/includes/footer.php';

