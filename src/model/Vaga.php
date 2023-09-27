<?php

namespace src\model;
use \src\db\Database;
use \PDO;

class Vaga{
  public $id;
  public $titulo;
  public $descricao;
  public $ativo;
  public $data; 

  public function cadastrar(){
  
    $this->data = date('Y-m-d H:i:s'); //definicao de data 

    $databaseObject=new Database('vagas'); //informa a table a ser usada

  }


}

