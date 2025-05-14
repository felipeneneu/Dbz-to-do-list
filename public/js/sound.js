document.addEventListener("DOMContentLoaded", () => {
  const sound = document.getElementById("levelUpSound");
  const modal = document.getElementById("my_modal_3");
  const modalClose = document.getElementById("modalClose");

  if (modal?.hasAttribute("open")) {
    sound.play();
    modalClose.addEventListener("click", () => {
      sound.pause();
      modal.close(); // Fecha o modal ao clicar no botão
    });
  }
});
