<?php


namespace App\Controllers;

use App\Models\ContactEmail;
use App\Models\User;
use Src\DB\Database;



class ContactController
{
  public function __construct()
  {
    $db = new Database(); // Instancia a conexão com o banco
    // Instancia o model User, passando a conexão
    $db->connect();
    $user = new User($db);
  }
  public function show()
  {
    require_once __DIR__ . '/../Views/contact.php';
  }
  public function store()
  {

    try {
      $contactEmail = new ContactEmail;
      $contactEmail->setFrom(['name' => 'Felipe', 'email' => 'felipe@teste.com.br']);
      $contactEmail->setTo(['name' => 'Felipe', 'email' => 'felipe@teste.com.br']);
      $contactEmail->setMessage('message');
      $contactEmail->send();
      // Redireciona com mensagem de sucesso
      $_SESSION['success'] = 'E-mail enviado com sucesso!';
      header("Location: /contact");
      exit;
    } catch (\Throwable $th) {
      var_dump($th);
    }
  }
}
