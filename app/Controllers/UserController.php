<?php

// Assim como antes, 'App\Controllers' é o sobrenome do nosso gerente de usuários.
namespace App\Controllers;

// 'use App\Models\User;' é como dizer: "Ei, gerente de usuários, para fazer o seu trabalho,
// você vai precisar da ajuda do 'User' (Usuário), que é como um 'catálogo' de informações sobre os usuários
// e que está guardado na pasta 'Models'".
use App\Models\User;

// 'class UserController' é o nome desse gerente específico: "Gerente de Usuários".
class UserController
{
    // 'public function show($id)' é uma das tarefas que o Gerente de Usuários sabe fazer.
    // 'show' geralmente significa "mostrar alguma coisa específica".
    // '($id)' dentro dos parênteses é como dizer: "Para mostrar um usuário específico,
    // eu preciso saber qual usuário você quer ver. O 'id' é como o número de identificação desse usuário".
    public function show($id)
    {
        // '$userModel = new User();' é como o gerente pegando o "catálogo" de usuários ('User') para poder procurar informações.
        $userModel = new User();

        // '$user = $userModel->findById($id);' é o gerente usando o "catálogo" ('userModel')
        // para encontrar as informações do usuário com o 'id' que foi dado.
        // Imagine que 'findById($id)' é como procurar um item específico no catálogo pelo seu número.
        $user = $userModel->findById($id);

        // 'require_once __DIR__ . '/../Views/user-show.php';' é o gerente dizendo:
        // "Agora que eu encontrei as informações do usuário, preciso mostrar isso para a pessoa.
        // Para fazer isso, vou pegar o 'desenho' ('View') chamado 'user-show.php' que está na pasta 'Views'".
        require_once __DIR__ . '/../Views/user-show.php';

        // Dentro do arquivo 'user-show.php' (que ainda não vimos), o "desenho" usará as informações
        // que o gerente encontrou sobre o usuário ('$user') para mostrar o nome, a foto ou outros detalhes.
    }
}
