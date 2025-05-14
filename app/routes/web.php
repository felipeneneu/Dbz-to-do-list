<?php
//Pense nele como o mapa da nossa cidade web. Ele diz para onde ir dependendo do 
//endereço (URL) que as pessoas digitam no navegador.

// 'use App\Controllers\HomeController;' é como dizer: "Ei, para usar o mapa, a gente vai precisar saber onde fica o 'HomeController' (o gerente da página inicial)".
// 'use App\Controllers\UserController;' é como dizer: "E também vamos precisar saber onde fica o 'UserController' (o gerente dos usuários)".
use App\Controllers\ContactController;
use App\Controllers\HomeController;
use App\Controllers\UserConfigController;
use App\Controllers\LoginController;
use App\Controllers\DashboardController;
use App\Controllers\PasswordResetController;
use App\Controllers\RegisterController;
use App\Controllers\UserController;

// '$router->add('/', HomeController::class, 'index');' é uma linha do nosso mapa.
// '/' significa "quando alguém acessar a raiz do nosso site" (como 'www.seusite.com.br').
// 'HomeController::class' diz que o "gerente" responsável por essa página é o 'HomeController'.
// 'index' diz que a "tarefa" que esse gerente deve fazer é a função 'index()'.
// Então, quando alguém acessa a página inicial, a função 'index()' dentro do 'HomeController' será executada.
// $router->add('/', HomeController::class, 'index');
// '$router->add('user/{id}/show', UserController::class, 'show');' é outra linha do nosso mapa, um pouco mais interessante.
// 'user/{id}/show' é o endereço. A parte '{id}' é como um espaço reservado. Significa que qualquer coisa que você colocar ali vai ser o ID do usuário que queremos ver. Por exemplo: '/user/123/show' ou '/user/456/show'.
// 'UserController::class' diz que o "gerente" responsável por essa página é o 'UserController'.
// 'show' diz que a "tarefa" que esse gerente deve fazer é a função 'show($id)'.
// O valor que você colocar no lugar de '{id}' no endereço será passado para a função 'show()' como o valor da variável '$id'.
$router->add('/', LoginController::class, 'index');
$router->add('user/{id}/show', UserController::class, 'show');
$router->add('user', UserConfigController::class, 'index');
$router->add('register', RegisterController::class, 'index');
$router->add('register/criar', RegisterController::class, 'store', 'POST');
$router->add('login', LoginController::class, 'index');
$router->add('auth', LoginController::class, 'auth', 'POST');
$router->add('logout', LoginController::class, 'logout', 'GET');
$router->add('dashboard', DashboardController::class, 'index', 'GET');
$router->add('dashboard/show', DashboardController::class, 'show');
$router->add('dashboard/show/allcompleted', DashboardController::class, 'allcompleted');
$router->add('dashboard/criar', DashboardController::class, 'criar', 'POST');
$router->add('dashboard/show/{id}/concluir', DashboardController::class, 'concluir', 'POST');
$router->add('dashboard/show/{id}/excluir', DashboardController::class, 'excluir', 'POST');
$router->add('contact', ContactController::class, 'show');
$router->add('contact/send', ContactController::class, 'store');
$router->add('forgot-password', PasswordResetController::class, 'showForgotForm');
$router->add('forgot-password/send', PasswordResetController::class, 'sendResetLink');
$router->add('reset-password', PasswordResetController::class, 'showResetForm');
$router->add('reset-password/confirm', PasswordResetController::class, 'resetPassword');

// $router->add('dashboard/tarefa/{id}/concluir', DashboardController::class, 'concluir', 'POST');


/*
Em resumo sobre as rotas:

O arquivo routes/web.php define as regras de como os endereços da web (URLs) são ligados aos Controllers e suas ações (métodos).
Cada linha como $router->add(...) é uma dessas regras, dizendo: "Se alguém acessar este endereço usando este método (por padrão, GET, para acessar páginas), chame esta função neste Controller".
As rotas podem ter partes fixas (como /user/show) e partes dinâmicas (como {id}), que permitem passar informações pela URL.
Para dar sequência aqui:

Criar a Classe Router: Para que $router->add() funcione, você precisará ter uma classe chamada Router em algum lugar (provavelmente na pasta src/Router, como vimos na estrutura inicial). Essa classe terá a lógica para guardar essas rotas e, quando alguém acessar uma URL, encontrar a rota correspondente e chamar o Controller e o método corretos.

Implementar o Despacho de Rotas: No seu arquivo principal de entrada (public/index.php), você precisará pegar a URL que o usuário acessou e usar a sua classe Router para verificar qual rota corresponde a essa URL. Depois, você precisará "despachar" essa rota, ou seja, criar uma instância do Controller e chamar o método especificado na rota, passando quaisquer parâmetros que foram pegos da URL (como o id no nosso exemplo).

Suportar Diferentes Métodos HTTP: Além de acessar páginas (que geralmente usam o método GET), você terá ações como enviar formulários (que usam o método POST), atualizar informações (PUT/PATCH) e deletar coisas (DELETE). Seu sistema de rotas precisará ser capaz de lidar com esses diferentes métodos HTTP.

As rotas são cruciais porque elas são a ponte entre o que o usuário digita no navegador e o código PHP que realmente faz alguma coisa!
*/