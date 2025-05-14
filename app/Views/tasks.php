<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashbord <?= $userData->nome; ?></title>
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

      <!-- Topo -->
      <div class="absolute w-[90%]  bg-green-950 rounded-full border-2 border-[#006e35] h-10 mt-9"></div>

      <div class="w-full max-w-md flex items-center justify-between px-4 py-2 relative">
        <!-- <div class="w-14 h-14 rounded-full border-4 border-yellow-300 overflow-hidden"> com borda-->
        <div class="flex items-center gap-1">
          <img src="../img/star.svg" alt="XP" class="w-14 h-14">
          <span class="text-yellow-300 font-bold text-lg"><?= $userData->xp ?></span>
        </div>
        <div class="w-24 h-24 rounded-full  overflow-hidden ">
          <a href="/dashboard">
            <img src="<?= $_SESSION['avatar'] ?>" alt="Avatar" class="w-full h-full object-cover"></a>
        </div>
        <div class="flex items-center gap-1">
          <img src="../img/lvl.svg" alt="LVL" class="w-12 h-12">
          <span class="text-yellow-300 font-bold text-lg"><?= $userData->lvl ?></span>
        </div>
      </div>
      <!-- Cabeçalho com Avatar e XP -->
      <?php if (!empty($tarefas)) : ?>
        <button type="submit" onclick="window.location.href='/dashboard/show/allcompleted'"
          class="bg-[#1b5e43] text-yellow-300 text-2xl font-extrabold px-8 py-3 rounded-xl border-4 border-yellow-400 shadow-md mb-6">

          DELETAR TAREFAS
        </button>
      <?php endif; ?>









      <div class="space-y-3 w-full max-w-md px-1">
        <?php foreach ($tarefas as $t): ?>
          <div class="bg-[#0d2d24] p-4 rounded-xl border-2 border-yellow-400 flex items-center justify-between">
            <div class="flex items-center gap-2 w-3/4">
              <?php if (!$t->concluido): ?>
                <form action="/dashboard/show/<?= $t->id ?>/concluir" method="post">
                  <label class="cursor-pointer">
                    <input type="checkbox" name="concluido" value="1" class="w-5 h-5 accent-yellow-400"
                      onchange="this.form.submit()" />
                  </label>
                </form>
                <div class="flex flex-col break-words">
                  <h3 class="font-bold text-lg text-yellow-300"><?= $t->titulo ?></h3>
                  <p class="text-sm text-gray-400">+200 XP</p>
                </div>
              <?php else: ?>
                <div class="flex items-center gap-2">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                    stroke="currentColor" class="w-6 h-6 text-green-400">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                  <div class="flex flex-col break-words">
                    <h3 class="font-bold text-lg line-through text-green-400"><?= $t->titulo ?></h3>
                    <p class="text-sm text-gray-400">Concluída! (+200 XP)</p>
                  </div>
                </div>
              <?php endif; ?>
            </div>
            <form action="/dashboard/show/<?= $t->id ?>/excluir" method="post">
              <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-2 rounded-md text-sm" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="w-5 h-5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </form>
          </div>
        <?php endforeach; ?>
      </div>

      <!-- Nova tarefa -->
      <div class="w-full max-w-md bg-[#0d2d24] p-4 mt-8 rounded-xl border-2 border-yellow-400 text-center">
        <h2 class="text-yellow-300 text-xl font-bold mb-4">NOVA TAREFA</h2>
        <form action="/dashboard/criar" method="post" class="space-y-3">
          <input type="text" name="titulo" placeholder="Nome da tarefa"
            class="w-full px-4 py-2 rounded-lg bg-[#103e32] border border-yellow-400 text-white placeholder:text-yellow-300" />

          <button type="submit"
            class="w-full bg-yellow-400 text-[#103e32] font-extrabold py-3 rounded-xl shadow-md hover:scale-105 transition">
            CRIAR TAREFA
          </button>
          <button type="button"
            class="w-full bg-yellow-400 text-[#103e32] font-extrabold py-3 rounded-xl shadow-md hover:scale-105 transition">
            <a href="/logout" class="w-full">
              SAIR
            </a>
          </button>
        </form>
      </div>
      <?php include_once 'lvlup.php' ?>

    </div>
  </div>




</body>



</html>