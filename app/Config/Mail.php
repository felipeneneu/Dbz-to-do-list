<?php

namespace App\Config;


class Mail
{
  private string $host;
  private string $username;
  private string $password;
  private int $port;

  // Carrega as configs
  public function __construct()
  {
    $this->host = 'sandbox.smtp.mailtrap.io';
    $this->username = '80488fc1ce4cfd';
    $this->password = '50c01b29fbcbf4';
    $this->port = 2525;
  }


  public function getHost()
  {
    return $this->host;
  }

  public function getUsername()
  {
    return $this->username;
  }
  public function getPassword()
  {
    return $this->password;
  }

  public function getPort()
  {
    return $this->port;
  }
}