<?php

namespace Src\DB;

use PDO;
use PDOException;

class Database
{

  public function connect(): PDO
  {
    try {
      require_once __DIR__ . '/config.php';
      return new PDO("mysql:host=" . HOST . ";dbname=" . DB, USER, PASS, [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ERRMODE_EXCEPTION => true
      ]);
    } catch (PDOException $e) {
      die('Erro no banco' . $e->getMessage());
    }
  }
}
