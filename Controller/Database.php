<?php

/**
 * Database Class
 * 
 * 
 * 
 * 
 */
class Database
{
  private $dbHost          = "127.0.0.1";
  private $dbUsername      = "root";
  private $dbPassword      = "";
  private $dbName          = "edelweiss";
  private $port            = "4307";
  protected $con;

  public function __construct()
  {
    try {
      $this->con = new PDO("mysql:host=$this->dbHost;port=$this->port;dbname=$this->dbName", $this->dbUsername, $this->dbPassword);
      $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      die("Verbindungsfehler zur Datenbank");
    }
  }
  public function getAll($sql)
  {
    $query = $this->con->prepare($sql);
    $query->execute();

    return $query->fetchAll();
  }
  public function getSingle($sql)
  {
    $query = $this->con->prepare($sql);
    $query->execute();

    return $query->fetch();
  }
  public function store($sql)
  {

    $query = $this->con->prepare($sql);
    $query->execute();

    return $query->fetch();
  }
  public function storeComment($sql)
  {

    $query = $this->con->prepare($sql);
    $query->execute();

    return $query->fetch();
  }
  public function duplicateCheck($sql)
  {

    $query = $this->con->prepare($sql);

    $query->execute();

    return $query->fetch();
  }
}
