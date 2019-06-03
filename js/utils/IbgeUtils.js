class IbgeUtils {
  /**
   * Lista todos os estados do Brasil, realizando consulta na API publica do IBGE
   * @param selectStatesMenu Elemento Select do html o qual deve listar.
   */
  getBrStates(selectStatesMenu) {
    const ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function(e) {
      if (this.readyState == 4 && this.status == 200) {
        let estados = JSON.parse(this.response);

        estados.forEach(estado => {
          const optionTag = `<option value="${estado.id}">${
            estado.sigla
          }</option>`;
          selectStatesMenu.innerHTML += optionTag;
        });
      }
    };
    ajax.open(
      "GET",
      "http://servicodados.ibge.gov.br/api/v1/localidades/estados/",
      true
    );
    ajax.send();
  }

  /**
   * Lista todas as cidades de um estado passado como parametro para a consulta
   *
   * @param stateId id do estado, proveniente da requisiçao de listagem de estados
   * @param selectCitiesMenu Elemento HTML, o qual vão ser listado os estados.
   */
  getStateCities(stateId, selectCitiesMenu) {
    const request = new XMLHttpRequest();
    request.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        let cidades = JSON.parse(this.response);

        cidades.forEach(cidade => {
          const optionTag = `<option value="${cidade.id}">${
            cidade.nome
          }</option>`;

          selectCitiesMenu.innerHTML += optionTag;
        });
      }
    };

    request.open(
      "GET",
      `http://servicodados.ibge.gov.br/api/v1/localidades/estados/${stateId}/municipios`,
      true
    );

    request.send();
  }
}
