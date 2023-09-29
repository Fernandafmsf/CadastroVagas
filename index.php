<?php



require_once './vendor/autoload.php';

use src\model\Vaga;

$vagas = Vaga::getVagas(); // pegando metodo 

include __DIR__.'/src/includes/header.php';
include __DIR__ . '/src/includes/footer.php';
include __DIR__ .'/src/includes/listagem.php';



?>

