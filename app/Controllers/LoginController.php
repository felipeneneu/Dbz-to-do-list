<?php

namespace App\Controllers;

use App\Models\User;
use Src\DB\Database;

class LoginController
{

  public function index()
  {
    require_once __DIR__ . '/../Views/login.php';
  }


  public function auth()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $db = new Database();
      $userModel = new User($db);
      $user = $userModel->auth($_POST['email'], $_POST['senha']);

      $_SESSION['avatar'] = '/img/sem-foto.jpg';


      if ($user) {
        session_start();
        $_SESSION['user'] = $user->id;
        $_SESSION['nome'] = $user->nome;
        $_SESSION['moedas'] = $user->moedas;
        $_SESSION['nivel'] = $user->lvl;
        $_SESSION['xp'] = $user->xp;
        $avatar = $userModel->avatar($user->avatar_id);
        $_SESSION['avatar'] = $avatar->imagem;
        header("Location: /dashboard/show");
        exit;
      } else {
        echo "<script>alert('Email ou senha incorretos'); window.location.href='/login';</script>";
      }
    }
  }

  public function logout()
  {

    session_start();
    session_destroy();
    header("Location: /login");
    exit;
    // echo "Aqui voce desloga";
  }
}
