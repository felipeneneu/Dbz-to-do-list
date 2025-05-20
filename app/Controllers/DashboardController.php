<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Tarefa;
use Src\DB\Database;
use App\Config\Session;

class DashboardController
{
  private $userModel;
  private $database;
  protected Session $session;


  public function __construct()
  {
    $this->database = new Database(); // Instancia a conexão com o banco
    $this->userModel = new User($this->database);
    $this->session = new Session(); // Instancia o model User, passando a conexão
    if (!$this->session->has('user')) {
      header("Location: /login");
      exit;
    }
  }

  public function index()
  {


    $idUser = $this->session->get('user');
    $userData = $this->userModel->findById($idUser);


    // Extrai os dados do usuário para variáveis individuais
    if (!$this->session->has('user')) {
      header("Location: /login");
      exit;
    }
    require_once __DIR__ . '/../Views/dashboard.php';
  }




  public function show()
  {
    // session_start();
    // $idUser = $_SESSION['user'];
    $idUser = $this->session->get('user');
    $userData = $this->userModel->findById($idUser);

    $tarefaModel = new Tarefa($this->database, $this->userModel);
    $tarefas = $tarefaModel->findById($idUser);


    require_once __DIR__ . '/../Views/tasks.php';
  }



  public function criar()
  {
    if (empty($titulo = filter_input(INPUT_POST, 'titulo'))) {
      $this->session->set('error', 'Preencha o campo Task');
      header("Location: /dashboard/show");
      // echo "<script>alert('Preencha o campo Nome'); window.location.href='/dashboard/teste';</script>";
      exit;
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $titulo = filter_input(INPUT_POST, 'titulo');

      $usuario_id = $_SESSION['user'];

      $tarefaModel = new Tarefa($this->database, $this->userModel);
      $tarefaModel->criar($titulo, $usuario_id);

      header("Location: /dashboard/show");
      exit;
    }
  }

  public function concluir($id)
  {
    // session_start();
    $usuario_id = $this->session->get('user');
    // $usuario_id = $_SESSION['user'];
    $tarefaModel = new Tarefa($this->database, $this->userModel);
    $tarefaModel->concluir($id, $usuario_id);
    header("Location: /dashboard/show");
    exit;
  }

  public function allcompleted()
  {
    // session_start();
    $usuario_id = $this->session->get('user');
    // $usuario_id = $_SESSION['user'];
    $tarefaModel = new Tarefa($this->database, $this->userModel);
    $tarefaModel->deletarAll($usuario_id);
    header("Location: /dashboard/show");
    exit;
  }

  public function excluir($id)
  {
    // session_start();

    // $usuario_id = $_SESSION['user'];
    $usuario_id = $this->session->get('user');
    $tarefaModel = new Tarefa($this->database, $this->userModel);
    $tarefaModel->deletar($id, $usuario_id);
    header("Location: /dashboard/show");
    exit;
  }
}