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
    $this->id=$databaseObject->insert([
        'titulo' => $this->titulo,
        'descricao' => $this->descricao,
        'ativo'=> $this->ativo,
        'data' => $this->data
    ]);

    return true;
  }

  public function atualizar(){
    return(new Database('vagas'))->update(' id= '.$this->id,[
      'titulo' => $this->titulo,
      'descricao' => $this->descricao,
      'ativo' => $this->ativo,
      'data' => $this->data
    ]);
    return true;
  }

  // estatico pois retorna arrays com varias instancias de vagas e nao precisamos de uma instancia real no momento
  public static function getVagas($where=null, $order=null, $limit=null){ 
  
    return (new Database('vagas'))->select($where,$order,$limit)->fetchAll(PDO::FETCH_CLASS, self::class); //fetch_Class-> define o tipo do array como classe, declarando a classe como a propria

  }
  //Buscar vaga com base em id
  public static function getVaga($id){
    return (new Database('vagas'))->select(' id= '.$id) ->fetchObject(self::class);
                                  
  }


}

