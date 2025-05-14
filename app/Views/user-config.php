<?php
$nome = "Dev Felipao"
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Php Teste</title>
  <link href="/dist/output.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
    rel="stylesheet">
</head>

<body class="bg-gray-100 text-base-content min-h-screen font-[Inter] ">

  <div class="bg-gray-300 h-[173px] w-full ">
    <div class="flex flex-row justify-between items-center w-full px-6 my-auto mx-auto h-full">
      <div class="text-base text-gray-800">
        <p>Olá! <span class="font-bold"><?= $nome ?></span></p>
      </div>
      <img src="https://i.pinimg.com/474x/d3/29/28/d32928309145ae87e914fd59b99f9789.jpg" alt=""
        class="w-10 h-10 rounded-full object-cover">
    </div>

  </div>

  <!-- Nivel -->
  <div class="px-6 text-gray-500 drop-shadow-md -mt-7">
    <div class="md:container md:mx-auto bg-gray-200 px-6 rounded-lg h-full py-6">
      <div class="flex flex-row justify-between items-center w-full ">
        <p>Nivel 6</p>
        <p><span class="font-bold">150</span> Pontos XP</p>
      </div>

      <div class="py-4">
        <div class="flex w-full h-2 bg-[#D1CBD7] rounded-full overflow-hidden" role="progressbar" aria-valuenow="50"
          aria-valuemin="0" aria-valuemax="100">
          <div
            class="flex flex-col justify-center rounded-full overflow-hidden bg-purple-600 text-xs text-white text-center whitespace-nowrap transition duration-500"
            style="width: 50%"></div>
        </div>
      </div>
      <p><span class="font-bold">2</span> Conquistas</p>
    </div>
  </div>

  <!-- You can open the modal using ID.showModal() method -->
  <!-- <button class="btn" onclick="my_modal_3.showModal()">open modal</button> -->
  <dialog id="my_modal_3" class="modal" open>
    <div class="modal-box bg-white text-gray-600 py-16">
      <form method="dialog">
        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
      </form>

      <div class="flex flex-col px-4 w-full h-full items-center justify-center gap-y-5">
        <img src="/img/lvlup.svg" alt="" class="w-4/6 animate-bounce">
        <p class="font-bold">Nível 2 Atingido!</p>
        <button class="btn w-full bg-purple-600">Fechar</button>
      </div>

    </div>
  </dialog>



  <!-- Foreach -->
  <div class="flex flex-row justify-between w-full px-6 mt-4 md:container md:mx-auto">
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

  <!-- <div class="flex flex-col mt-10 w-full justify-center items-center gap-y-4 md:container md:mx-auto">
    <img src="./img/ClipboardTextRegular.svg" alt="ClipboardTextRegular" class="w-12 md:w-16">
    <div class="flex flex-col items-center">
      <p class="text-gray-500 font-bold text-base">Você ainda não tem tarefas cadastradas</p>
      <p class="text-gray-500 text-sm">Crie tarefas e organize seus itens a fazer</p>
    </div>
  </div> -->


  <!-- Tasks Para concluir -->

  <div class="my-8 px-6 mb-2 md:container md:mx-auto">
    <div class="flex p-3 bg-gray-200 border-2 border-gray-300 rounded-lg w-full md:p-4 mb-2">
      <div class="flex flex-row gap-2 justify-between w-full md:container">
        <div class="min-w-5 h-5 rounded-full border-2 border-purple-600 hover:bg-purple-300 md:min-w-6 md:h-6"></div>
        <div class="flex text-gray-600 text-sm md:text-base md:w-full w-full">Aprender Solid no PHP
        </div>
        <div class="min-w-6"><img src="./img/TrashRegular.svg" alt="Lixeira" class="w-5"></div>
      </div>

    </div>
    <!-- Repeat -->
    <div class="flex p-3 bg-gray-200 border-2 border-gray-300 rounded-lg w-full md:p-4 mb-2">
      <div class="flex flex-row gap-2 justify-between w-full md:container">
        <div class="min-w-5 h-5 rounded-full border-2 border-purple-600 hover:bg-purple-300 md:min-w-6 md:h-6"></div>
        <div class="flex text-gray-600 text-sm md:text-base md:w-full w-full">Aprender Solid no PHP
        </div>
        <div class="min-w-6"><img src="./img/TrashRegular.svg" alt="Lixeira" class="w-5"></div>
      </div>

    </div>

    <div class="flex p-3 bg-gray-100 border-2 border-gray-300 rounded-lg w-full md:p-4">
      <div class="flex flex-row gap-2 justify-between w-full md:container">
        <div class="min-w-5 h-5 rounded-full md:w-6"><img src="./img/Vector.svg" alt="Sucess" class="w-full"></div>
        <div class="flex text-gray-600 text-sm line-through md:text-base md:w-full w-full">Php Mvc e PDO
        </div>
        <div class="min-w-6 md:w-7"><img src="./img/TrashRegular.svg" alt="Lixeira" class="w-5"></div>
      </div>

    </div>
  </div>



  <!-- Tasks Para Concluida -->

  <!-- <div class="px-6 mb-2 md:container md:mx-auto">
    <div class="flex p-3 bg-gray-100 border-2 border-gray-300 rounded-lg w-full md:p-4">
      <div class="flex flex-row gap-2 justify-between w-full md:container">
        <div class="min-w-5 h-5 rounded-full md:w-6"><img src="./img/Vector.svg" alt="Sucess" class="w-full"></div>
        <div class="flex text-gray-600 text-sm line-through md:text-base md:w-full">Integer urna interdum massa libero
          auctor
          neque turpis
          turpis
          semper.
          Duis vel
          sed fames
          integer.
        </div>
        <div class="min-w-6 md:w-7"><img src="./img/TrashRegular.svg" alt="Lixeira" class="w-5"></div>
      </div>

    </div>
  </div> -->

</body>

</html>