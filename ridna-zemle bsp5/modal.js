const button1 = document.getElementById("open-modal");
const button2 = document.getElementById("open-modal-2");
const button3 = document.getElementById("open-modal-3");
const modal = new bootstrap.Modal(document.getElementById("exampleModal"));

button1.addEventListener("click", () => {
  modal.show();
});

button2.addEventListener("click", () => {
  modal.show();
});

button3.addEventListener("click", () => {
  modal.show();
});
