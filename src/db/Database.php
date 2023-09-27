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
 }