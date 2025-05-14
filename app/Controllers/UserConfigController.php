<?php

// Assim como antes, 'App\Controllers' é o sobrenome do nosso gerente de usuários.
namespace App\Controllers;

class UserConfigController
{
  /** @test */
  public function index()
  {
    require_once __DIR__ . '/../Views/user-config.php';
  }
}
