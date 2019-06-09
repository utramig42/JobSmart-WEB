const temp = document.querySelector("#temp");
const checkbox = temp.querySelector('input[type="checkbox"]');
const parent = temp.querySelector("#parent");
const div = document.createElement("div");

checkbox.addEventListenerAll("change click", () => {
  toggleTemp(checkbox, parent);
});

function toggleTemp(checkbox, parentElement) {
  !checkbox.checked
    ? parentElement.classList.add("d-none")
    : parentElement.classList.remove("d-none");
}

const form = document.querySelector("#user");
window.form = new FormController(form);
