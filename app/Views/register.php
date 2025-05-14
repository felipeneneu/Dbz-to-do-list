<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro</title>
  <link href="/dist/output.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
    rel="stylesheet">
</head>



<body>
  <div class="bg-[#103e32] min-h-screen flex flex-col items-center relative">
    <div class="absolute inset-0 bg-[url('/img/bg2.png')] bg-no-repeat bg-cover bg-center opacity-70 "></div>
    <div class="relative p-4 w-full max-w-md flex flex-col items-center z-10">
      <div class="md:w-full w-52 flex items-center justify-center">
        <img src="/img/logo1.svg" alt="">
      </div>

      <div class="w-full max-w-md bg-[#0d2d24] p-4 mt-8 rounded-xl border-2 border-yellow-400 text-center">
        <h2 class="text-yellow-300 text-xl font-bold mb-4">Registrar!</h2>
        <form action="register/criar" method="post" class="space-y-3">
          <input type="text" name="nome" placeholder="Digite seu nome!" value="felipe@adm.com"
            class="w-full px-4 py-2 rounded-lg bg-[#103e32] border border-yellow-400 text-white placeholder:text-yellow-300"
            required />
          <input type="email" name="email" placeholder="Digite seu email para logar" value="felipe@adm.com"
            class="w-full px-4 py-2 rounded-lg bg-[#103e32] border border-yellow-400 text-white placeholder:text-yellow-300"
            required />
          <input type="password" name="senha" placeholder="Digite a sua senha para logar!" value="1234"
            class="w-full px-4 py-2 rounded-lg bg-[#103e32] border border-yellow-400 text-white placeholder:text-yellow-300"
            required />
          <div class="flex items-center justify-between gap-3">
            <button type="submit"
              class="w-full bg-yellow-400 text-[#103e32] font-extrabold py-3 rounded-xl shadow-md hover:scale-105 transition">
              Criar Conta
            </button>
            <button type="reset" id="cancelar"
              class="w-full border-2 border-yellow-400 text-green-100 font-extrabold py-3 rounded-xl shadow-md hover:scale-105 transition">
              <a href="#" class="w-full">
                Cancelar
              </a>
            </button>
          </div>

        </form>
      </div>



    </div>
  </div>
</body>



</html>