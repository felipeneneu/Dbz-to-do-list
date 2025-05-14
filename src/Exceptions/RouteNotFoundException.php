<?php

/**
 * Agora estamos olhando para a classe RouteNotFoundException dentro da pasta src/Exceptions (ou Core/Exceptions, seguindo o use no index.php). Pense nisso como um alarme especial que dispara quando o nosso "recepcionista" (o Router) não encontra o endereço que o visitante pediu no nosso "mapa" de rotas.
 */

// 'namespace Core\Exceptions;' é como o sobrenome para todos os nossos "alarmes de erro" especiais.
namespace Core\Exceptions;

// 'use Exception;' é como dizer: "Este alarme é um tipo especial de 'Exception' (erro) que já existe no PHP."
use Exception;

// 'class RouteNotFoundException extends Exception' significa que estamos criando um novo tipo de erro
// chamado 'RouteNotFoundException' que herda todas as características de um erro comum ('Exception')
// mas tem o seu próprio nome e pode ter comportamentos específicos.
class RouteNotFoundException extends Exception
{
    // 'protected $message = 'Rota não encontrada.';' é como definir a mensagem padrão que esse alarme vai dar
    // quando ele disparar: "Rota não encontrada." Isso ajuda a explicar qual foi o problema.
    protected $message = 'Rota não encontrada.';
}

/**O que está acontecendo aqui:

Estamos criando uma classe chamada RouteNotFoundException.
Ela herda da classe Exception que já existe no PHP. Isso significa que ela é um tipo de erro.
Definimos uma mensagem padrão para essa exceção: "Rota não encontrada." */