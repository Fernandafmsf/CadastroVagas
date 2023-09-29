<?php

/**
 * Ponte entre o sistema e o banco de dados com PDO. Funcionar como querybuilder -> nao vamos precisar escrever as consultas sql 
 */

 namespace src\db;

 //dependencias
 use \PDO;
 use \PDOException;

 class Database
 {
  const HOST = 'localhost:3306';
  const NAME = 'bancoVagas';
  const USER = 'admin';
  const PASS = 'admin';

  private $table; 
  private $conn ; //instancia de conexao com o db 

  
  public function __construct($table = null)
  {
    $this ->table = $table;
    $this ->setConnection(); //metodo que efetivamente faz a conexao
  }

 
  public function setConnection()
  {
    try
    {
      $this->conn = new PDO('mysql:host='.self::HOST.';dbname=' .self::NAME, self::USER, self::PASS );
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    catch(PDOException $e)
    {
      echo 'Erro ao conectar com o MySQL: ' . $e->getMessage(); 
    }
  }

  /**
   * Reponsavel por executar queries dentro do DB 
   * @param string $query
   * @param array $params
   * @return PDOstatement
   */

  public function execute($query, $params = []) //funcao muito importante
  {
    try{
      $statement = $this->conn->prepare($query);
      $statement ->execute($params);
      return $statement;

    }catch(PDOException $e){
      echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
    }
  }

  public function insert($values) //insere dados no banco
  {
    //dados da query -> dinamizando-os
    $fields= array_keys($values);
    $binds = array_pad([],count($fields), '?'); //inicia array vazio, cria tantos elementos quanto se tem em $fields e preenche com '?' 
    

    $q='INSERT into '.$this->table.'('.implode(',' ,$fields).') VALUES ('.implode(',',$binds).')'; //testar outros formato depois 
    
    $this->execute($q, array_values($values));//executa insert 
    return $this->conn->lastInsertId(); // retorna ultimo id inserido

  }

  public function select($where=null,$order=null,$limit=null)
  {
    //verificando se foi passado parametro e preeenchendo caso tiver sido
    $where = strlen($where) ? 'WHERE' .$where : '';
    $order = strlen($order) ? 'ORDER BY' .$order : '';
    $limit = strlen($limit) ? 'LIMIT' .$limit : '';

    $q='SELECT * FROM '.$this->table.' '.$where. ' ' .$order.' '.$limit;
    return $this->execute($q);
  }


 }