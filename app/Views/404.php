<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>404 - Página Não Encontrada</title>
  <link href="/dist/output.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
    rel="stylesheet">
</head>



<body class="bg-blue-950 text-white flex flex-col items-center justify-center h-screen relative">
  <div class="absolute inset-0 bg-[url('/img/Background.png')] bg-no-repeat bg-cover bg-center "></div>
  <div class="flex w-full justify-center items-center mx-auto px-48 relative z-10">
    <div class="flex flex-col  w-1/2 gap-5">
      <h1 class="text-4xl font-bold mb-8">Ops, esta página ,<br />não foi encontrada</h1>
      <div class="flex flex-col gap-1">
        <p>Parece que você se perdeu... Tente voltar</p>
        <p>para a página anterior ou acessar a home.</p>
      </div>

      <div class="flex gap-3 mt-14"><button class="px-6 py-3 rounded-full bg-blue-900 uppercase"
          onclick="window.history.back()">voltar</button>
        <button class="px-6 py-3 rounded-full bg-blue-900 uppercase"><a href="/">ir para a home</a></button>
      </div>

    </div>

    <div class="w-full">
      <img src="/img/404.svg" alt="">
    </div>

  </div>

</body>



</html>