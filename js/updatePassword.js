const form = document.querySelector("#password"); // Selecionando formúlario.

// Observando evento submit dentro de um formulário.
form.addEventListener("submit", event => {
  let inputs = Array.from(form.querySelectorAll("input")); // Selecionando todos os inputs
  console.log(inputs);
  let filterInputs = inputs.filter(input => input.value == ""); // Filtrando campos vazios.

  let conditions = filterInputs.lenght > 0 ? true : false;

  // Se houveres campos vazios...
  if (conditions) {
    event.preventDefault(); // Impedindo envio das informações via POST.
    styledEmptyInputs(filterInputs);
  }
});

function styledEmptyInputs(filterInputs) {
  // Estilização dos campos vazios.
  filterInputs.forEach((input, index) => {
    if (index == 0) input.focus();
    input.classList.add("validate-error");
  });
}
