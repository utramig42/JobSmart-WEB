class CepUtils {
  /**
   * Busca na API viaCep o endereço completo, dado um CEP
   *
   * @param cep string contendo o cep a ser buscado
   */
  constructor(cep) {
    this.cep = cep;
    findAddressByCep();
  }

  findAddressByCep() {
    this.cep = this.cep.replace(/[^a-zA-Z0-9]/g, "");

    const request = new XMLHttpRequest();
    request.onreadystatechange = function() {
      if (this.status === 200 && this.readyState == 4) {
        this._data = this.response;
      }
    };
    request.open("GET", `https://viacep.com.br/ws/${this.cep}/json/`, true);
    request.send();
  }

  /**
   * @param {JSON} response
   */
  set dataCEP(response) {
    this._data = value;
  }

  get dataCEP() {
    return this._data;
  }
}
