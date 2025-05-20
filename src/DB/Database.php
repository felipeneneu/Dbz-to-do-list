<?php

namespace Src\DB;

use PDO;
use PDOException;
use App\Config\ConfigDatabase;

class Database
{

  public function __construct() {}

  public function connect(): PDO
  {
    try {
      // require_once __DIR__ . '/config.php';
      $config = new ConfigDatabase();
      return new PDO("mysql:host=" . $config->getHost() . ";dbname=" . $config->getDb(), $config->getUser(), $config->getPass(), [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ERRMODE_EXCEPTION => true
      ]);
    } catch (PDOException $e) {
      die('Erro no banco' . $e->getMessage());
    }
  }
}