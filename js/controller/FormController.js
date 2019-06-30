class FormController {
  constructor(form) {
    this.formEl = form;
    this.Ibge = new IbgeUtils();
    this.ufEl = form.querySelector("#uf");
    this.defineCep();
    this.Ibge.getBrStates(this.ufEl); // Inicializando a listagem do IBGE.
    this.initEvents();
    this.initMaskInputs();
  }

  /**
   * Função para inicialização de eventos.
   */
  initEvents() {
    this.ufEl.addEventListener("change", e => {
      this.Ibge.getStateCities(
        this.ufEl.value,
        this.formEl.querySelector("#cidade")
      );
    });

    if (this.formEl.querySelector)
      if (this.defineCep()) {
        this.cepEl.addEventListener("change", e => {


          this.cep.findAddressByCep(
            this.cepEl.value,
            this.formEl.querySelector("#logradouro"),
            this.formEl.querySelector("#bairro")
          );


          if(this.formEl.querySelector('.alert')){
            this.formEl.querySelector('.alert') = "";
          }

        });

        console.log(this.formEl.querySelector("#logradouro").value);
      }
  }

  /**
   * Função para iniciar as mascaras dos inputs.
   */
  initMaskInputs() {
    if (this.formEl.querySelector("#cpf")) {
      let doc = this.formEl.querySelector("#cpf");
      doc.pattern = "[0-9]{3}.?[0-9]{3}.?[0-9]{3}-?[0-9]{2}";
      $(doc).mask("000.000.000-00", { reverse: true });
    }

    if (this.formEl.querySelector("#cep")) {
      let doc = this.formEl.querySelector("#cep");
      doc.pattern = "[0-9]{8}";
      $(doc).mask("00000000", { reverse: true });
    }

    if (this.formEl.querySelector("#cnpj")) {
      let doc = this.formEl.querySelector("#cnpj");
      doc.pattern = "[0-9]{3}.[0-9]{3}.[0-9]{3}/[0-9]{4}-[0-9]{2}";
      $(doc).mask("000.000.000/0000-00", { reverse: true });
    }

    if (this.formEl.querySelector("#salario")) {
      let sal = this.formEl.querySelector("#salario");
      $(sal).mask("000.000,00", { reverse: true });
    }

    if (this.formEl.querySelector("#telefone")) {
      let tel = this.formEl.querySelector("#telefone");
      $(tel).mask("(00) 0000-00009");
    }

    if (this.formEl.querySelector("#fixo")) {
      let tel = this.formEl.querySelector("#fixo");
      $(tel).mask("(00) 0000-0000");
    }

    if (this.formEl.querySelector("#celular")) {
      let tel = this.formEl.querySelector("#celular");
      $(tel).mask("(00) 00000-0000");
    }
  }

  /**
   * Função para definir CEP caso, no formulário exista o campo.
   * @returns {Boolean} Se o cep foi definido ou não.
   */
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
        // Colorir as bordas que não estão atendendo as condições de vermelho.
        input.css({ borderColor: "red" });

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
    const selects = Array.from(this.formEl.querySelectorAll("[required]"));
    const invalidateSelects = selects.filter(select => select.value == "");
    return [...invalidateSelects, ...this.validationInputs()];
  }
}
