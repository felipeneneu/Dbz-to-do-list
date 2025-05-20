<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dbz Todolist</title>
  <link href="/dist/output.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
    rel="stylesheet">
</head>



<body class="overflow-hidden">
  <div class="bg-[#103e32] min-h-screen flex flex-col items-center relative ">
    <div class="absolute inset-0 bg-[url('/img/bg2.png')] bg-no-repeat bg-cover bg-center opacity-70 "></div>
    <div class="relative p-4 w-full max-w-md flex flex-col items-center z-10 min-h-screen justify-center">


      <div class="md:w-full w-52 flex items-center justify-center">
        <img src="/img/logo1.svg" alt="">
      </div>
      <div class="w-full max-w-md bg-[#0d2d24] p-4 rounded-xl border-2 border-yellow-400 text-center">
        <h2 class="text-yellow-300 text-xl font-bold mb-4">Recuperar Senha</h2>
        <?php if ($this->session->has('success')): ?>
          <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">

            <?= $this->session->get('success');
            ?>
          </div>
          <?php $this->session->remove('success'); ?>
        <?php endif; ?>

        <?php if ($this->session->has('error')): ?>
          <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <?= $this->session->get('error');
            ?>
          </div>
          <?php $this->session->remove('error'); ?>
        <?php endif; ?>

        <form action="forgot-password/send" method="post" class="space-y-3">
          <input type="email" name="email" placeholder="Digite seu email para recuperar sua senha"
            value="felipe3@adm.com"
            class="w-full px-4 py-2 rounded-lg bg-[#103e32] border border-yellow-400 text-white placeholder:text-yellow-300" />

          <button type="submit"
            class="w-full bg-yellow-400 text-[#103e32] font-extrabold py-3 rounded-xl shadow-md hover:scale-105 transition">
            Recuperar Senha
          </button>

        </form>
      </div>
      <div class="flex flex-row w-full justify-between p-2 font-mono font-500 text-yellow-300">
        <a href="/register" class="transition-transform hover:text-yellow-500">Criar conta</a>
        <a href="" class="transition-transform hover:text-yellow-500">Esqueci a senha</a>
      </div>





    </div>
  </div>
</body>



</html>