<?php if (!empty($_SESSION['lvlup'])): ?>
  <dialog id="my_modal_3" class="modal" open>
    <div class="modal-box bg-white text-gray-600 py-16 border-4 border-purple-500 shadow-2xl relative overflow-hidden">
      <!-- partículas -->

      <audio id="levelUpSound" src="/sounds/lvl.mp3" preload="auto"></audio>
      <form method="dialog">
        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
      </form>

      <div class="flex flex-col px-4 w-full h-full items-center justify-center gap-y-5">
        <img src="/img/lvlup.svg" alt="" class="w-4/6 animate-bounce">
        <p class="font-bold">Você subiu para o nível <?= $userData->lvl ?>!</p>
        <form method="dialog">
          <button class="btn w-full bg-purple-600 " onclick="" id="modalClose">Fechar</button>
        </form>
      </div>

    </div>
  </dialog>
  <script src="/js/sound.js"></script>
  <?php unset($_SESSION['lvlup']); ?>
<?php endif; ?>