// JavaScript
const btnAbrirNuevo = document.querySelector("#btn-modal-nuevo");
const btnCerrarNuevo = document.querySelector("#btn-cerrar-nuevo");
const modalNuevo = document.querySelector("#modal-nuevo");
const btnAbrirEditar = document.querySelector("#btn-modal-editar");
const btnCerrarEditar = document.querySelector("#btn-cerrar-editar");
const modalEditar = document.querySelector("#modal-editar");

// Abrir modal nuevo
btnAbrirNuevo.addEventListener("click", () => {
  modalNuevo.showModal();
});

// Cerrar modal nuevo
btnCerrarNuevo.addEventListener("click", () => {
  modalNuevo.close();
});

// Abrir modal editar
btnAbrirEditar.addEventListener("click", () => {
  modalEditar.showModal();
});

// Cerrar modal editar
btnCerrarEditar.addEventListener("click", () => {
  modalEditar.close();
});

