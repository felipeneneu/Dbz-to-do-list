<?php

namespace App\Config;

class ConfigDatabase
{
  private string $host;
  private string $db;
  private string $user;
  private string $pass;

  public function __construct()
  {
    $this->host = 'localhost';
    $this->db = 'taskgame';
    $this->user = 'root';
    $this->pass = '';
  }


  public function getHost()
  {
    return $this->host;
  }

  public function getDb()
  {
    return $this->db;
  }

  public function getUser()
  {
    return $this->user;
  }

  public function getPass()
  {
    return $this->pass;
  }
}