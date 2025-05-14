<?php

namespace App\Controllers;

use App\Models\User;
use Src\DB\Database;

class RegisterController
{
  private $user;
  private $db;
  public function __construct()
  {
    $this->db = new Database(); // Instancia a conexão com o banco
    $this->user = new User($this->db); // Instancia o modelo de usuário, passando a conexão do banco
  }
  public function index()
  {
    require_once __DIR__ . '/../Views/register.php';
  }

  public function store()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $nome = filter_input(INPUT_POST, 'nome');
      $email = filter_input(INPUT_POST, 'email');
      $senha = filter_input(INPUT_POST, 'senha');

      $usuarioExistente = $this->user->findByEmail($email);
      if ($usuarioExistente) {
        $_SESSION['error'] = "Email já cadastrado!";
        header("Location: /register");
        exit;
      } else {
        $this->user->register($nome, $email, $senha);
        header("Location: /login");
        exit;
      }
    }
  }

  public function edit()
  {
    # code...
  }
}
