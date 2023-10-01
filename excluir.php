<?php

require_once './vendor/autoload.php';



use src\model\Vaga;

if(!isset($_GET['id']) or (!is_numeric($_GET['id']) )){
  header('location: index.php?status=error');
  exit;
}


$vagaID= $_GET['id'];

$obVaga=Vaga::getVaga($vagaID); //há uma instancia de fora, por isso é possivel usar

//validaçao da vaga 
//se obvaga nao for uma instancia de vaga, retornamos ao index
if(!$obVaga instanceof Vaga){
  header('location: index.php?status=error');
  exit;
}


if(isset($_POST['Excluir'])) {


 $obVaga->excluir(); 
 
  header('location: index.php?status=success');
  exit; //colocar sempre que tiver um header. Evita que o restante da pagina seja executada 


}


include __DIR__.'/src/includes/header.php';
include __DIR__ . '/src/includes/confirmar-exclusao.php';
include __DIR__ . '/src/includes/footer.php';

