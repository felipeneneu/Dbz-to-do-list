<?php

namespace App\Models;

use PDO;
use Src\DB\Database;
use App\Models\User;

class Tarefa
{
  private $pdo;
  private $user;

  public function __construct(Database $db)
  {
    $this->pdo = $db->connect();
    $this->user = new User($db);
  }

  public function  findById($usuario_id)
  {
    $stmt = $this->pdo->prepare("SELECT * FROM tarefas WHERE usuario_id = :usuario_id ORDER BY criado_em DESC");
    $stmt->bindParam(':usuario_id', $usuario_id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }


  public function criar($titulo, $usuario_id)
  {
    $stmt = $this->pdo->prepare("INSERT INTO tarefas (titulo, concluido, usuario_id) VALUES (:titulo, 0, :usuario_id)");
    $stmt->bindValue(":titulo", $titulo);
    $stmt->bindValue(":usuario_id", $usuario_id);
    $stmt->execute();
  }

  public function concluir($id, $usuario_id)
  {
    $stmt = $this->pdo->prepare("UPDATE tarefas SET concluido = 1 WHERE id = :id");
    $stmt->bindValue(":id", $id);
    $stmt->execute();

    // Dá 200 de XP ao usuário
    $this->user->xp(200, $usuario_id);

    // Aqui você pode verificar o nível atual e atualizar se for necessário
    $usuario = $this->user->findById($usuario_id);


    if ($usuario->xp >= 1000) {
      $this->user->xp(0, $usuario_id);
      $this->user->level($usuario->lvl + 1, $usuario_id);
      $_SESSION['lvlup'] = true;
      // echo "<script>window.location.href='/dashboard';</script>";  // Redireciona para o dashboard após 2 segundos
      // echo "<script>setTimeout(function(){ window.location.href='/dashboard'; }, 2000);</script>";
    } // Zera os pontos de XP

  }

  public function deletar($id)
  {
    $stmt = $this->pdo->prepare("DELETE FROM tarefas WHERE id = :id");
    $stmt->bindValue(":id", $id);
    $stmt->execute();
  }

  public function deletarAll($usuario_id)
  {

    $stmt = $this->pdo->prepare("DELETE FROM tarefas WHERE concluido = 1 AND usuario_id = :usuario_id");
    $stmt->bindValue(":usuario_id", $usuario_id);
    $stmt->execute();
  }
}
