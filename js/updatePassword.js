const form = document.querySelector("#password"); // Selecionando formúlario.

// Observando evento submit dentro de um formulário.
form.addEventListener("submit", event => {
  const inputs = Array.from(form.querySelectorAll("input")); // Selecionando todos os inputs
  let filterInputs = inputs.filter(input => input.value == ""); // Filtrando campos vazios.

  // Se houveres campos vazios...
  if (filterInputs.length > 0) {
    event.preventDefault(); // Impedindo envio das informações via POST.
    form.reset();
    styledEmptyInputs(filterInputs);
  } else if (inputs[3].value != inputs[4].value) {
    document.querySelector(".card").innerHTML +=
      '<div class="alert alert-danger"> Os campos de novas senhas deveram ser iguais </div>';
    event.preventDefault(); // Impedindo envio das informações via POST.
    form.reset();
    styledEmptyInputs([inputs[3], inputs[4]]);
  }
});

function styledEmptyInputs(filterInputs) {
  // Estilização dos campos vazios.
  filterInputs.forEach((input, index) => {
    if (index == 0) input.focus();
    input.classList.add("validate-error");
  });
}
