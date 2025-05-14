<!-- <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./public/dist/output.css">
  <title>Document</title>
</head>

<body>
<h2>Bem-vindo ao Meu Site!</h2>
<p>Esta é a página inicial.</p>

<p><a href="http://localhost:8000/user/45/show">Usuario 45</a></p>
</body>

</html> -->

<!-- app/views/home/index.php -->

<!DOCTYPE html>
<html lang="pt-BR">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<head>
  <meta charset="UTF-8">
  <title>To-do - Lista de Tarefas</title>
  <link href="/dist/output.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
    rel="stylesheet">
</head>

<body class="bg-gray-100 text-base-content min-h-screen font-[Inter] ">

  <div class="bg-gray-300 h-[173px] w-full ">
    <img src="./img/logo.svg" alt="Logo" class="my-auto mx-auto w-[128px] h-full md:w-44">
  </div>

  <div class="flex flex-row -mt-7 w-full px-6 gap-2 md:container md:mx-auto">
    <input type="text" placeholder="Adicione uma nova tarefa"
      class="bg-gray-100 border-2 h-14 py-2 px-4 rounded-lg border-gray-300 input-bordered w-full max-w-xs mx-auto md:container md:mx-auto  focus:border-purple-600 focus:outline focus:outline-purple-600 placeholder:text-gray-400 text-gray-600" />
    <button
      class="bg-purple-700 w-16 flex items-center justify-center rounded-lg transition delay-150 duration-300 hover:bg-purple-800"><img
        src="./img/PlusCircleRegular.svg" alt="plus icon" class="w-7"></button>
  </div>
  <div class="flex flex-row justify-between w-full px-6 mt-16 md:container md:mx-auto">
    <div class="flex flex-row items-center gap-2">
      <p class="text-gray-500 font-semibold">Tarefas criadas</p><span
        class="bg-purple-200 min-w-2 py-1 px-2 text-purple-500 rounded-full font-semibold"> 16 </span>
    </div>

    <div class="flex text-black">
      <div class="flex flex-row items-center gap-2">
        <p class="text-gray-500 font-semibold">Concluídas</p><span
          class="bg-green-200 py-1 px-2 text-green-500 rounded-full font-semibold"> 8 </span>
      </div>
    </div>

  </div>


  <hr class="border-gray-300 border-1 mt-5 mx-6 md:container md:mx-auto" />

  <!-- Aqui vai rolar um if -->



</body>

</html>




<?php

/*
Em resumo sobre as Views:

As Views são arquivos (geralmente com a extensão .php ou .html, ou outros formatos de template) que contêm o código HTML que será enviado para o navegador do usuário.
Elas podem conter texto fixo (como "Bem-vindo...") e também podem exibir informações dinâmicas que vêm dos Controllers (lembra que os Controllers pegam os dados dos Models e "entregam" para as Views?). No nosso exemplo, a View home.php não está mostrando nenhum dado dinâmico por enquanto.
As Views são responsáveis apenas por mostrar as coisas, a lógica de pegar os dados e decidir o que mostrar fica nos Controllers.
Para dar sequência aqui:

Criar outras Views: Para cada página diferente do seu site (a página de listar produtos, a página de contato, a página de detalhes de um usuário, etc.), você criará um arquivo .php diferente dentro da pasta Views (ou em subpastas dentro dela, para organizar melhor). Por exemplo: Views/produtos/listar.php, Views/contato.php, Views/usuarios/detalhes.php.

Passar dados dos Controllers para as Views: Quando um Controller decide qual View mostrar, ele geralmente precisa passar algumas informações para essa View exibir. Por exemplo, no UserController, depois de buscar as informações do usuário com o Model, ele precisaria passar esses dados para a user-show.php para que o nome, a foto, etc., do usuário pudessem ser mostrados na tela. Isso geralmente é feito usando um array associativo (como um "dicionário") que o Controller entrega para a View.

Usar um sistema de templates (opcional, mas comum): Em aplicações maiores, é comum usar um sistema de templates (como Blade no Laravel ou Twig no Symfony). Esses sistemas facilitam a escrita das Views, permitindo usar estruturas de controle (como if e foreach) e exibir variáveis de forma mais organizada e segura.

A View é o que o usuário realmente vê! É a parte visual do nosso site.
*/
?>