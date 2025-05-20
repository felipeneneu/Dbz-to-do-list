<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\ContactEmail;
use App\Config\Session;
use Src\DB\Database;
use Exception;

class PasswordResetController
{
  private $user;
  private $db;
  protected Session $session;
  public function __construct()
  {
    $this->session = new Session();
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
      $contactEmail->setSubject("Olá {$findEmail->nome}, redefina sua senha");
      // $contactEmail->setMessage("Clique no link para redefinir sua senha: <a href='$resetLink'>$resetLink</a>");
      $contactEmail->setMessage("
  <div style='font-family: Arial, sans-serif; max-width: 600px; margin: auto; background: #f9fafb; padding: 30px; border-radius: 10px; border: 1px solid #e5e7eb;'>
    <div style='text-align: center; margin-bottom: 20px;'>
      <img src='http://localhost:8000/img/logo1.svg' alt='Logo da empresa' style='max-height: 120px;'>
    </div>
    <h2 style='color: #111827; margin-bottom: 10px;'>🔐 Redefinição de Senha</h2>
    <p style='color: #374151; font-size: 16px;'>
      Olá {$findEmail->nome},<br><br>
      Recebemos uma solicitação para redefinir sua senha. Se foi você quem pediu, clique no botão abaixo para continuar o processo.
    </p>
    <div style='text-align: center; margin: 30px 0;'>
      <a href='$resetLink' style='background-color: #3b82f6; color: white; padding: 12px 24px; text-decoration: none; border-radius: 8px; font-weight: bold; display: inline-block;'>
        Redefinir Senha
      </a>
    </div>
    <p style='color: #6b7280; font-size: 14px;'>
      Caso não tenha solicitado a redefinição, ignore este e-mail. Este link é válido por tempo limitado por motivos de segurança.
    </p>
    <hr style='margin: 30px 0; border: none; border-top: 1px solid #e5e7eb;'>
    <p style='color: #9ca3af; font-size: 12px; text-align: center;'>
      &copy; 2025 Quest List. Todos os direitos reservados.
    </p>
  </div>
");
      $contactEmail->send();

      $this->session->set('success', 'E-mail de recuperação enviado com sucesso!');
      // $_SESSION['success'] = "E-mail de recuperação enviado com sucesso!";
      header("Location: /forgot-password");
      exit;
    } catch (Exception $e) {
      $this->session->set('error', $e->getMessage());
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
      $this->session->set('success', 'Senha redefinida com sucesso!');

      header("Location: /login");
      exit;
    } catch (Exception $e) {
      $this->session->set('error', $e->getMessage());
      header("Location: /reset-password?token=" . $token);
      exit;
    }
  }
}