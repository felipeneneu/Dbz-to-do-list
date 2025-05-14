<?php

/**
 * Pense nele como o recepcionista principal da nossa casa web. Todas as visitas que não são diretamente para arquivos existentes (graças ao .htaccess) passam por ele primeiro. Ele decide quem vai atender o visitante (qual Controller) e o que fazer.
 * 
 */

// 'require_once __DIR__ . '/../vendor/autoload.php';' é como dizer:
// "Primeiro, precisamos carregar todas as ferramentas e bibliotecas que nossa casa usa."
// O 'autoload.php' é gerado pelo Composer e cuida de carregar todas as classes do nosso projeto
// e das bibliotecas que instalamos.
require_once __DIR__ . '/../vendor/autoload.php';

// 'use Core\Router\Router;' é como dizer: "Vamos usar o 'mapa' (Router) que criamos para saber para onde direcionar as pessoas."

use App\Controllers\HomeController;
use Core\Router\Router;
// 'use Core\Exceptions\RouteNotFoundException;' é como dizer: "Vamos também nos preparar para o caso de alguém pedir um endereço que não existe no nosso mapa (erro de 'Rota Não Encontrada')."
use Core\Exceptions\RouteNotFoundException;
// 'use Core\Http\Request;' é como dizer: "E vamos precisar de uma forma de entender o 'pedido' (Request) que o visitante fez (qual endereço ele digitou, quais informações ele enviou, etc.)."
use Core\Http\Request;

// '$router = new Router();' é como o recepcionista pegando o mapa para começar a trabalhar.
$router = new Router();

// 'include_once __DIR__ . '/../app/routes/web.php';' é como o recepcionista abrindo o livro de rotas
// (o arquivo 'web.php' na pasta 'app/routes') para ver todos os endereços possíveis e quem cuida de cada um.
include_once __DIR__ . '/../app/routes/web.php';

// '$request = new Request();' é o recepcionista olhando para o 'pedido' (a requisição) que acabou de chegar.
// Ele está pegando informações como a URL que o visitante digitou, o método (se foi para ver a página ou enviar algo), etc.
$request = new Request();

// 'try { ... } catch (...) { ... }' é como o recepcionista tentando encontrar o caminho certo
// e se preparando para lidar com problemas.
try {
    // 'echo $router->resolve($request);' é a parte principal!
    // O recepcionista (Router) pega o 'pedido' (Request) e usa o 'mapa' (rotas em 'web.php')
    // para descobrir qual "gerente" (Controller) deve atender o visitante e qual "tarefa" (método) esse gerente deve fazer.
    // A função 'resolve()' faz isso e retorna a resposta (geralmente o HTML da página) que deve ser mostrada para o visitante.
    // O 'echo' então envia essa resposta para o navegador do visitante.
    echo $router->resolve($request);
} catch (RouteNotFoundException $e) {
    // 'http_response_code(404);' é o que acontece se o recepcionista não encontrar o endereço no mapa.
    // Ele envia um código de erro 404 ("Página Não Encontrada") para o navegador.
    http_response_code(404);
    // 'echo 'Erro 404: Página não encontrada.';' e também mostra uma mensagem amigável de erro.
    require_once __DIR__ . '../../app/Views/404.php';
    echo 'Erro 404: Página não encontrada.';
} catch (Exception $e) {
    // 'http_response_code(500);' é o que acontece se algo der errado dentro da nossa casa (um erro no código).
    // Ele envia um código de erro 500 ("Erro Interno do Servidor").
    http_response_code(500);
    // 'echo 'Erro interno: ' . $e->getMessage();' e mostra uma mensagem de erro mais técnica para ajudar a entender o problema.
    echo 'Erro interno: ' . $e->getMessage();
}

/**Em resumo sobre o index.php:

É o ponto de entrada principal para todas as requisições web que não são arquivos estáticos.
Ele carrega as configurações e as classes necessárias.
Ele inicializa o sistema de roteamento.
Ele inclui as definições de rotas do arquivo web.php.
Ele cria um objeto de requisição para entender o que o usuário pediu.
Ele usa o roteador para encontrar a rota correspondente à requisição e executar o Controller e o método corretos.
Ele envia a resposta gerada de volta para o navegador do usuário.
Ele também lida com erros como "Página Não Encontrada" e erros internos do servidor.
Para dar sequência aqui:

Implementar a Classe Router (em Core\Router\Router): Você precisará criar a classe Router que tem a lógica para adicionar rotas (como fazemos no web.php) e para encontrar a rota correspondente a uma URL e executar o Controller e o método associados. Essa classe precisará analisar a URL da requisição e compará-la com as rotas definidas.

Implementar a Classe Request (em Core\Http\Request): Você precisará criar a classe Request que ajuda a obter informações sobre a requisição do usuário, como a URL, o método HTTP (GET, POST, etc.), os parâmetros da URL, os dados de formulário, etc.

Criar a Estrutura de Pastas Core\Router e Core\Http: Como estamos usando use Core\Router\Router; e use Core\Http\Request;, você precisará criar uma pasta chamada Core dentro da pasta principal do seu projeto (onde estão app, public, src, etc.) e dentro dela criar as subpastas Router e Http para colocar essas classes.

O index.php é o maestro que coordena todo o processo de receber um pedido do usuário e entregar a resposta! Próximo passo: quer dar uma olhada em como essas classes Router e Request poderiam ser implementadas (mesmo que de forma bem básica)? 😊 */
