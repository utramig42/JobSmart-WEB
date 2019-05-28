class FormController {
  constructor(form) {
    this.formEl = form;
    this.initEvents();
  }

  /**
   * Função para inicialização de eventos.
   */
  initEvents() {
    getBrStates(); // Tentando incializar o IBGE.x'

    this.formEl.addEventListener("submit", event => {
      event.preventDefault(); // Não enviar os dado, o comportamento padrão.

      if (this.validationInputs().length == 0) {
        this.formEl.submit(); // Pode enviar...
      } else {
        this.validationInputs().forEach(input => {
          input.css({ borderColor: "red" }); // Colorir as bordas que não estão atendendo as condições de vermelho.

          input.addEventListener("focus", () => {
            // Quando o úsuario focar em um campo em vermelho, o retorne para a cor original.
            input.css({ borderColor: "#ced4da" });
          });
        });
      }
    });
  }

  validationInputs() {
    const inputs = Array.from(this.formEl.querySelectorAll("[required]"));
    const invalidateInputs = inputs.filter(input => input.value == "");

    return invalidateInputs;
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
