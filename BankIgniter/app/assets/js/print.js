(() => {
  const button = document.querySelector(".reporte-boton");

  if (button) {
      button.addEventListener("click", () => {
        window.print();
      });
  }
})();
