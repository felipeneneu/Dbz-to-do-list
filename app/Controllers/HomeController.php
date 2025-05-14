<?php
/*
Imagine que a sua aplicação web é como uma casa com várias tarefas acontecendo.

A Pasta app/Controllers é como a Central de Comando da Casa!

O que é: Pense nessa pasta como o cérebro da sua aplicação. É aqui que as decisões importantes são tomadas sobre o que fazer quando alguém (um usuário) pede alguma coisa para o seu site.

Do que se trata: Quando alguém digita um endereço no navegador (como www.seusite.com.br) ou clica em um botão, essa "mensagem" chega primeiro aqui, nos Controllers. Os Controllers olham para essa mensagem e dizem: "Ah, essa pessoa quer ver a página inicial! O que eu preciso fazer para mostrar isso?".

Como usa: Dentro dessa pasta, você cria arquivos (como o HomeController.php que você mostrou). Cada arquivo desses é como um "gerente" para uma parte específica do seu site. Por exemplo, o HomeController cuida de tudo relacionado à página inicial.

*/

// Imagine que 'App\Controllers' é como o sobrenome de todos os gerentes da nossa Central de Comando.
// Isso ajuda a organizar tudo para não ter gerentes com o mesmo nome fazendo coisas diferentes.
namespace App\Controllers;

// 'class HomeController' é como dar um nome para um dos nossos gerentes.
// Esse gerente específico é responsável por cuidar da "casa" principal, a página inicial.
class HomeController
{
    // 'public function index()' é como dar um nome para uma das tarefas que esse gerente sabe fazer.
    // 'index()' geralmente significa "a página principal" ou "a primeira coisa a mostrar".
    public function index()
    {
        // 'require_once __DIR__ . '/../Views/home.php';' é como o gerente dizendo:
        // "Para mostrar a página inicial, eu preciso pegar o desenho (a 'View') que está lá na pasta 'Views' e mostrar para a pessoa!".
        // '__DIR__' significa "a pasta onde este arquivo ('HomeController.php') está".
        // '/../Views/home.php' significa "volte uma pasta (para 'app') e depois entre na pasta 'Views' e pegue o arquivo 'home.php'".
        require_once __DIR__ . '/../Views/home.php';
    }
    public function error()
    {
        // http_response_code(404); // Define o código de status HTTP para 404
        return require_once __DIR__ . '/../Views/home.php';
        // 'require_once __DIR__ . '/../Views/home.php';' é como o gerente dizendo:
        // "Para mostrar a página inicial, eu preciso pegar o desenho (a 'View') que está lá na pasta 'Views' e mostrar para a pessoa!".
        // '__DIR__' significa "a pasta onde este arquivo ('HomeController.php') está".
        // '/../Views/home.php' significa "volte uma pasta (para 'app') e depois entre na pasta 'Views' e pegue o arquivo 'home.php'".

    }
}

/*
Para dar sequência nisso:

Criar mais Gerentes (Controllers): Se o seu site tiver outras partes (como uma página de produtos, uma página de contato, etc.), você criaria mais arquivos dentro da pasta Controllers. Por exemplo: ProdutoController.php, ContatoController.php.

Dar mais Tarefas aos Gerentes (Métodos): Dentro de cada Controller, você criaria mais "tarefas" (funções/métodos) para lidar com diferentes pedidos. Por exemplo, no ProdutoController, você poderia ter tarefas como listar() (mostrar todos os produtos), detalhar($id) (mostrar um produto específico), criarFormulario() (mostrar o formulário para adicionar um produto), salvar() (guardar um novo produto).

Conectar os Pedidos às Tarefas (Rotas): Você precisará de um sistema (que geralmente fica em outro lugar, como na pasta routes) para dizer: "Quando alguém acessar o endereço / (a página inicial), chame a tarefa index() do HomeController". E "Quando alguém acessar /produtos, chame a tarefa listar() do ProdutoController". Isso é como ter um mapa que diz qual "gerente" deve cuidar de qual "pedido".

Em resumo, os Controllers são os "cérebros" que decidem o que fazer quando alguém interage com o seu site, e eles geralmente terminam mostrando alguma "desenho" (View) para o usuário.
*/