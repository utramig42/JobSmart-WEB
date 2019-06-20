class FormController {
  constructor(form) {
    this.formEl = form;
    this.Ibge = new IbgeUtils();
    this.ufEl = form.querySelector("#uf");
    this.defineCep();
    this.Ibge.getBrStates(this.ufEl); // Inicializando a listagem do IBGE.
    this.initEvents();
    this.showRequireds();
  }

  /**
   * Função para inicialização de eventos.
   */
  initEvents() {
    this.formEl.addEventListener("load", e => {
      console.log(e);
    });

    // this.formEl.addEventListenerAll("submit", this.validationSelects(event));

    this.ufEl.addEventListener("change", e => {
      this.Ibge.getStateCities(
        this.ufEl.value,
        this.formEl.querySelector("#cidade")
      );
    });

    if (this.defineCep()) {
      this.cepEl.addEventListener("change", e => {
        this.cep.findAddressByCep(
          this.cepEl.value,
          this.formEl.querySelector("#logradouro"),
          this.formEl.querySelector("#bairro")
        );
      });
    }
  }

  defineCep() {
    if (this.formEl.querySelector("#cep")) {
      this.cepEl = this.formEl.querySelector("#cep");
      this.cep = new CepUtils();
      return true;
    }

    return false;
  }

  /**
   * Criado para Validação do formulario de forma geral.
   * @param {Event} event Com os dados necessarios para a validação do formulário.
   */
  validationForm(event) {
    event.preventDefault(); // Não enviar os dado, o comportamento padrão.

    if (this.validationSelects().length == 0) {
      this.formEl.submit(); // Pode enviar...
    } else {
      this.validationSelects().forEach(input => {
        input.css({ borderColor: "red" }); // Colorir as bordas que não estão atendendo as condições de vermelho.

        input.addEventListener("focus", () => {
          // Quando o úsuario focar em um campo em vermelho, o retorne para a cor original.
          input.css({ borderColor: "#ced4da" });
        });
      });
    }
  }

  /**
   * Criado para retornar os campos que necessitam de validação
   * @returns {Array} retorna um array com os inputs a serem validados.
   */
  validationInputs() {
    const inputs = Array.from(this.formEl.querySelectorAll("[required]"));
    return inputs.filter(input => input.value == "");
  }

  /**
   * Criado para retornar os campos que necessitam de validação
   * @returns {Array} retorna um array com os selects a serem validados.
   */
  validationSelects() {
    const selects = Array.from(this.formEl.querySelector("[required]"));
    const invalidateSelects = selects.filter(select => select.value == "");
    return [...invalidateSelects, ...this.validationInputs()];
  }

  showRequireds() {
    this.formEl.parentElement.innerHTML += `<div style="order:1"> <span class="text-danger"> * </span> Campos obrigários </div>`;

    this.validationSelects().forEach(input => {
      input.parentElement.querySelector(
        "label"
      ).innerHTML += `<span class="text-danger"> * </span>`;

      if (input.parentElement.querySelector("select"))
        input.parentElement.querySelector("select option").innerHTML += `*`;
    });
  }

  /**
   * Recebe um input e um JSON para estilização do CSS.
   *
   * @param input Element reference ao elemento de entrada de texto, a ser alterado.
   * @param style JSON Recebe um objeto que contem as instruções para alterações de estilo de CSS.
   */

  alterStyleInputs(input, style) {
    input.css(style);
    input.focus();
  }

  /**
   * Recebe um valor e retorna se e CPF ou CNPJ
   *
   * @param valor string/numero referente ao CPF ou CNPJ a ser verificado
   * @returns {string|boolean} informando se o valor passado corresponde a um CPF ou CNPJ
   */
  verificaCpfCnpj(valor) {
    valor = valor.toString();
    valor = valor.replace(/[^0-9]/g, "");

    if (valor.length === 11) {
      return "CPF";
    } else if (valor.length === 14) {
      return "CNPJ";
    } else {
      return false;
    }
  }

  /**
   * Recebe um valor e aplica a respectiva mascara.
   *
   * @param valor string/numero referente a CPF ou CNPJ a ser formatado
   * @returns {string} do valor passado como parametro com a respectiva mascara
   */
  formataCpfCnpj(valor) {
    let formatado;

    if (this.verificaCpfCnpj(valor) === "CPF") {
      formatado = valor.substr(0, 3) + ".";
      formatado += valor.substr(3, 3) + ".";
      formatado += valor.substr(6, 3) + "-";
      formatado += valor.substr(9, 2) + "";
    } else if (this.verificaCpfCnpj(valor) === "CNPJ") {
      formatado = valor.substr(0, 2) + ".";
      formatado += valor.substr(2, 3) + ".";
      formatado += valor.substr(5, 3) + "/";
      formatado += valor.substr(8, 4) + "-";
      formatado += valor.substr(12, 14) + "";
    }

    return formatado;
  }
}
