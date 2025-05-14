<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\ContactEmail;
use Src\DB\Database;
use Exception;

class PasswordResetController
{
  private $user;
  private $db;
  public function __construct()
  {
    $this->db = new Database(); // Instancia a conexão com o banco
    $this->user = new User($this->db); // Instancia o modelo de usuário, passando a conexão do banco
  }
  public function showForgotForm()
  {
    require_once __DIR__ . '/../Views/forgot-password.php';
  }


  public function sendResetLink()
  {
    try {
      $email = $_POST['email'];
      if (empty($email)) {
        throw new Exception("Por favor, insira seu e-mail.");
      }


      $findEmail = $this->user->findEmail($email);
      // $email = $findEmail->email ?? '';
      if (!$findEmail) {
        throw new Exception("E-mail não encontrado.");
      }

      // Gera o token e salva no banco
      $token = bin2hex(random_bytes(32));
      $this->user->token($token, $findEmail->email);

      // var_dump($findEmail);
      // var_dump($findEmail->nome);
      // die();

      $resetLink = "http://localhost:8000/reset-password?token=$token";
      $contactEmail = new ContactEmail;
      $contactEmail->setFrom(['name' => 'Felipe', 'email' => 'suporte@seusite.com']);
      $contactEmail->setTo(['name' => $findEmail->nome, 'email' => $findEmail->email]);
      $contactEmail->setMessage("Clique no link para redefinir sua senha: <a href='$resetLink'>$resetLink</a>");
      $contactEmail->send();

      $_SESSION['success'] = "E-mail de recuperação enviado com sucesso!";
      header("Location: /forgot-password");
      exit;
    } catch (Exception $e) {
      $_SESSION['error'] = $e->getMessage();
      header("Location: /forgot-password");
      exit;
    }
  }


  public function showResetForm()
  {
    require_once __DIR__ . '/../Views/reset-password.php';
  }

  public function resetPassword()
  {
    try {
      $token = $_POST['token'] ?? '';
      $password = $_POST['password'] ?? '';
      $confirmPassword = $_POST['password_confirm'] ?? '';
      // var_dump($_POST);
      // var_dump($token);
      // var_dump($password);
      // var_dump($confirmPassword);
      // die;
      if (empty($token) || empty($password) || empty($confirmPassword)) {
        throw new Exception("Todos os campos são obrigatórios.");
      }
      if ($password !== $confirmPassword) {
        throw new Exception("As senhas não coincidem.");
      }


      $this->user->resetToken($password, $token);
      $_SESSION['success'] = "Senha redefinida com sucesso!";
      header("Location: /login");
      exit;
    } catch (Exception $e) {
      $_SESSION['error'] = $e->getMessage();
      header("Location: /reset-password?token=" . $token);
      exit;
    }
  }
}
