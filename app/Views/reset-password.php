<!DOCTYPE html>
<html>

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


  <?php if (isset($_SESSION['error'])): ?>
    <div style="color: red;"><?= $_SESSION['error']; ?></div>
    <?php unset($_SESSION['error']); ?>
  <?php endif; ?>
  <div class="bg-[#103e32] min-h-screen flex flex-col items-center relative ">
    <div class="absolute inset-0 bg-[url('/img/bg2.png')] bg-no-repeat bg-cover bg-center opacity-70 "></div>
    <div class="relative p-4 w-full max-w-md flex flex-col items-center z-10 min-h-screen justify-center">
      <div class="md:w-full w-52 flex items-center justify-center">
        <img src="/img/logo1.svg" alt="">
      </div>
      <div class="w-full max-w-md bg-[#0d2d24] p-4 rounded-xl border-2 border-yellow-400 text-center">
        <h2 class="text-yellow-300 text-xl font-bold mb-4">Redefinir Senha</h2>
        <form action="reset-password/confirm" method="POST" class="space-y-3">

          <input type="password" name="password" placeholder="Nova senha"
            class="w-full px-4 py-2 rounded-lg bg-[#103e32] border border-yellow-400 text-white placeholder:text-yellow-300"
            required />
          <input type="password" name="password_confirm" placeholder="Confirme a nova senha"
            class="w-full px-4 py-2 rounded-lg bg-[#103e32] border border-yellow-400 text-white placeholder:text-yellow-300"
            required />
          <input type="hidden" name="token" value="<?= htmlspecialchars($_GET['token']) ?>">

          <button type="submit"
            class="w-full bg-yellow-400 text-[#103e32] font-extrabold py-3 rounded-xl shadow-md hover:scale-105 transition">
            Redefinir Senha
          </button>
        </form>
      </div>
    </div>
</body>

</html>