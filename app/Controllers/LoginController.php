<?php

namespace App\Controllers;

// require_once __DIR__ . '/vendor/autoload.php';

use App\Models\User;
use App\Config\Session;
use Src\DB\Database;

class LoginController
{

  protected Session $session;

  public function __construct()
  {
    $this->session = new Session();
  }

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

      $this->session->set('avatar', '/img/sem-foto.jpg');

      // $_SESSION['avatar'] = '/img/sem-foto.jpg';


      if ($user) {
        // session_start();
        // $this->session->__construct();
        $this->session->set('user', $user->id);
        $this->session->set('nome', $user->nome);
        $this->session->set('moedas', $user->moedas);
        $this->session->set('nivel', $user->lvl);
        $this->session->set('xp', $user->xp);
        $avatar = $userModel->avatar($user->avatar_id);
        // $_SESSION['avatar'] = $avatar->imagem;
        $this->session->set('avatar', $avatar->imagem);
        // $_SESSION['user'] = $user->id;
        // $_SESSION['nome'] = $user->nome;
        // $_SESSION['moedas'] = $user->moedas;
        // $_SESSION['nivel'] = $user->lvl;
        // $_SESSION['xp'] = $user->xp;

        header("Location: /dashboard/show");
        exit;
      } else {
        header("Location: /login");
        $this->session->set('error', 'Email ou senha incorretos');
        // echo "<script>alert('Email ou senha incorretos'); window.location.href='/login';</script>";
      }
    }
  }

  public function logout()
  {


    // $this->session->__construct();
    $this->session->destroy();
    header("Location: /login");
    exit;
    // echo "Aqui voce desloga";
  }
}