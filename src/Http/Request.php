<?php

// 'namespace Core\Http;' é como o sobrenome para todas as classes relacionadas à comunicação HTTP da nossa aplicação.
namespace Core\Http;

// 'class Request' é o nome do nosso detetive. Ele vai analisar a requisição HTTP.
class Request
{
    // 'protected string $uri;' é onde o detetive vai guardar o "endereço" (a URL) que o usuário digitou.
    protected string $uri;
    // 'protected string $method;' é onde ele vai guardar o "tipo de ação" (o método HTTP) que o usuário quer fazer (GET para pegar uma página, POST para enviar um formulário, etc.).
    protected string $method;
    // 'protected array $queryParams;' é onde ele vai guardar quaisquer informações extras que vieram na URL depois do ponto de interrogação (como '?busca=palavra').
    protected array $queryParams;
    // 'protected array $body;' é onde ele vai guardar os dados que o usuário enviou no corpo da requisição (geralmente em formulários POST ou em requisições com dados JSON).
    protected array $body;

    // 'public function __construct()' é o que acontece quando criamos um novo detetive ('Request').
    // Ele já começa a examinar a "carta" assim que é criado.
    public function __construct()
    {
        // '$this->uri = $this->cleanUri($_SERVER['REQUEST_URI']);' é o detetive pegando o endereço completo
        // que o navegador enviou (`$_SERVER['REQUEST_URI']`) e limpando ele um pouco para ficar mais fácil de usar.
        $this->uri = $this->cleanUri($_SERVER['REQUEST_URI']);
        // '$this->method = $_SERVER['REQUEST_METHOD'];' é o detetive anotando o tipo de ação (GET, POST, etc.) da requisição.
        $this->method = $_SERVER['REQUEST_METHOD'];
        // '$this->queryParams = $_GET;' é o detetive pegando todas as informações que vieram na URL depois do '?'.
        // Essas informações são guardadas em um "dicionário" (array associativo) chamado `$this->queryParams`.
        $this->queryParams = $_GET;
        // '$this->body = $this->parseRequestBody();' é o detetive analisando o corpo da requisição para ver se tem algum dado extra que o usuário enviou (como dados de um formulário ou JSON).
        $this->body = $this->parseRequestBody();
    }

    // 'protected function cleanUri(string $uri): string' é uma função secreta do detetive para arrumar o endereço.
    protected function cleanUri(string $uri): string
    {
        // 'parse_url($uri, PHP_URL_PATH)' pega só a parte do endereço que é o caminho (sem o nome do site e sem os parâmetros).
        // 'trim(..., '/')' remove quaisquer barras no começo ou no final desse caminho.
        return trim(parse_url($uri, PHP_URL_PATH), '/');
    }

    // 'protected function parseRequestBody(): array' é outra função secreta para entender o corpo da requisição.
    protected function parseRequestBody(): array
    {
        // 'if ($this->method === 'POST' && !empty($_POST))' verifica se a ação foi um 'POST' (geralmente para enviar formulários)
        // e se existem dados na variável especial `$_POST`. Se sim, ele pega esses dados.
        if ($this->method === 'POST' && !empty($_POST)) {
            return $_POST;
        }

        // 'file_get_contents('php://input')' pega o conteúdo bruto do corpo da requisição. Isso é útil para dados que não são formulários normais, como JSON.
        $input = file_get_contents('php://input');
        // 'json_decode($input, true)' tenta transformar esse conteúdo bruto em um "dicionário" (array associativo) do PHP, se ele estiver no formato JSON.
        $jsonData = json_decode($input, true);

        // 'return $jsonData ?? [];' retorna os dados JSON se conseguiu decodificar, ou um array vazio se não tinha nada ou não era JSON válido.
        return $jsonData ?? [];
    }

    // 'public function getUri(): string' é uma forma de perguntar ao detetive qual foi o endereço que o usuário digitou.
    public function getUri(): string
    {
        return $this->uri;
    }

    // 'public function getMethod(): string' é como perguntar qual foi o tipo de ação (GET, POST, etc.).
    public function getMethod(): string
    {
        return $this->method;
    }

    // 'public function getQueryParams(): array' é como perguntar quais foram as informações extras na URL.
    public function getQueryParams(): array
    {
        return $this->queryParams;
    }

    // 'public function getBody(): array' é como perguntar quais foram os dados enviados no corpo da requisição.
    public function getBody(): array
    {
        return $this->body;
    }
}

/**Em resumo sobre a classe Request:

Ela coleta e organiza todas as informações importantes sobre a requisição HTTP que o nosso site recebeu.
Ela guarda a URL, o método HTTP, os parâmetros da URL e os dados do corpo da requisição.
Ela fornece métodos simples (getUri(), getMethod(), etc.) para acessar essas informações. */