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

let orderForm = document.getElementById('order-form');

        orderForm.addEventListener("submit", (e) => {
            e.preventDefault();

            emailjs.sendForm('service_5avz66c', 'template_lw46xln', '#order-form').then(
                (response) => {
                  let orderForm = document.getElementById('order-form');
                  orderForm.reset();
                  modal.hide();
                },
                (error) => {
                    console.log('FAILED...', error);
                },
            );
        });



