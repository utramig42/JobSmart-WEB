const temp = document.querySelector("#temp");
const checkbox = temp.querySelector('input[type="checkbox"]');
const parent = temp.querySelector("#parent");
const div = document.createElement("div");

checkbox.addEventListenerAll("change click", () => {
  toggleTemp(checkbox, parent);
});

function toggleTemp(checkbox, parentElement) {
  div.classList.add("form-label-group");
  div.innerHTML = `                                        
    <input type="date" id="dataResc" name="dataResc" class="form-control"
    placeholder="Data do fim do contrato" required />
    <label for="dataResc">Data do fim do contrato</label>
    `;

  if (checkbox.checked) parentElement.appendChild(div);
  else parentElement.removeElement(div);
}

function getElementTemporario() {}

const form = document.querySelector("#user");
window.form = new FormController(form);
