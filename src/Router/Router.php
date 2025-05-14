<?php

/** Chegamos à classe Router dentro da pasta src/Router (ou Core/Router). Pense nessa classe como o maestro que lê o "mapa" de rotas (que definimos no routes/web.php */

// 'namespace Core\Router;' é o sobrenome para todos os nossos "mapas" e ferramentas de navegação da aplicação.
namespace Core\Router;

// 'use Core\Exceptions\RouteNotFoundException;' é como ter o alarme de "endereço não encontrado" por perto, caso o maestro não ache a música no mapa.
use Core\Exceptions\RouteNotFoundException;
// 'use Core\Http\Request;' é como o maestro recebendo o "pedido musical" (a requisição) para saber qual música o público quer ouvir.
use Core\Http\Request;
// 'use Exception;' é como ter um alarme genérico para qualquer outro problema que possa acontecer durante a execução da música.
use Exception;

// 'class Router' é o nosso maestro, responsável por direcionar as requisições para os Controllers corretos.
class Router
{
    // 'protected array $routes = [];' é onde o maestro guarda o seu "mapa de músicas" (as rotas).
    // Cada rota associa um "endereço" (URI) a um "músico" (Controller) e uma "nota" (método).
    protected array $routes = [];

    // 'public function add(string $uri, string $controller, string $method): void' é como o maestro adicionando uma nova música ao seu mapa.
    // '$uri' é o "endereço" da música (ex: '/', '/usuarios', '/produtos/{id}').
    // '$controller' é o nome do "músico" (ex: 'HomeController', 'UserController').
    // '$method' é a "nota" específica que esse músico deve tocar (ex: 'index', 'show').
    public function add(string $uri, string $controller, string $method): void
    {
        // '$uri = preg_replace('/\{(\w+)\}/', '(?P<$1>[^/]+)', $uri);' é como o maestro traduzindo endereços com partes variáveis.
        // Por exemplo, '/usuarios/{id}' se torna algo que o maestro consegue entender como "qualquer coisa aqui é o 'id'".
        $uri = preg_replace('/\{(\w+)\}/', '(?P<$1>[^/]+)', $uri);
        // '$this->routes[$uri] = ['controller' => $controller, 'method' => $method];' é o maestro finalmente anotando no mapa:
        // "Quando alguém pedir o endereço '$uri', chame o 'controller' e execute o 'method'".
        $this->routes[$uri] = ['controller' => $controller, 'method' => $method];
    }

    // 'public function resolve(Request $request)' é o momento em que o maestro recebe um "pedido" (a requisição) e tenta encontrar a "música" correspondente no seu mapa.
    public function resolve(Request $request)
    {
        // '$uri = $request->getUri();' é o maestro olhando o "endereço" exato que o público digitou.
        $uri = $request->getUri();

        // 'if (empty($uri)) { $uri = '/'; }' é como dizer: "Se não digitaram nada depois do nome do site, vamos para a página inicial ('/')".
        if (empty($uri)) {
            $uri = '/';
        }

        // 'foreach ($this->routes as $route => $params)' é o maestro folheando o seu mapa de músicas, uma por uma.
        foreach ($this->routes as $route => $params) {
            // 'if (preg_match("#^$route$#", $uri, $matches))' é o maestro comparando o "endereço" do pedido com cada "endereço" no mapa.
            // Se houver uma correspondência (a música certa foi encontrada), ele guarda algumas informações na variável '$matches'.
            if (preg_match("#^$route$#", $uri, $matches)) {
                // '$controller = new $params['controller'];' é o maestro chamando o "músico" (criando um novo objeto do Controller).
                $controller = new $params['controller'];
                // '$method = $params['method'];' é o maestro lembrando qual "nota" (método) esse músico deve tocar.
                $method = $params['method'];

                // 'if (!method_exists($controller, $method))' é o maestro verificando se o "músico" realmente sabe tocar essa "nota".
                if (!method_exists($controller, $method)) {
                    // Se o método não existir, o maestro lança um erro.
                    throw new Exception("Método '{$method}' não encontrado no controlador " . get_class($controller));
                }

                // '$args = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);' é o maestro pegando quaisquer "notas extras" (os valores das partes variáveis na URL, como o 'id' em '/usuarios/123') para passar para o músico.
                $args = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);

                // 'return call_user_func_array([$controller, $method], [...$args]);' é o maestro finalmente dizendo ao músico para tocar a nota, passando as notas extras se houver.
                // 'call_user_func_array' chama o método do Controller com os argumentos corretos.
                return call_user_func_array([$controller, $method], [...$args]);
            }
        }

        // 'throw new RouteNotFoundException();' é o que acontece se o maestro folhear todo o mapa e não encontrar nenhuma música que corresponda ao pedido. Ele dispara o alarme de "endereço não encontrado".
        throw new RouteNotFoundException();
    }
}

/**Em resumo sobre a classe Router:

Ela guarda todas as rotas da aplicação (as associações entre URLs, Controllers e métodos).
Ela recebe um objeto Request (com a URL da requisição).
Ela tenta encontrar uma rota que corresponda à URL da requisição.
Se encontra uma rota, ela cria uma instância do Controller associado e chama o método especificado, passando quaisquer parâmetros da URL.
Se não encontra nenhuma rota correspondente, ela lança uma RouteNotFoundException. */

