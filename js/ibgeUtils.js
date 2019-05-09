/**
 * Lista todos os estados do Brasil, realizando consulta na API publica do IBGE
 */
function getBrStates() {

	const selectStatesMenu = document.querySelector('#estados');

	const request = new XMLHttpRequest();
	request.open("GET", 'http://servicodados.ibge.gov.br/api/v1/localidades/estados/', true);
	request.send();

	request.onreadystatechange = () => {
		if (this.status === 200) {
			let estados = JSON.parse(this.response);

			estados.forEach(estado => {
				const optionTag = `<option value="${estado.id}">${estado.nome}</option>`;
				selectStatesMenu.innerHTML += optionTag;
			})

		}
	}

}

/**
 * Lista todas as cidades de um estado passado como parametro para a consulta
 *
 * @param stateId id do estado, proveniente da requisiçao de listagem de estados
 */
function getStateCities(stateId) {

	const selectCitiesMenu = document.querySelector('#cidades');

	const request = new XMLHttpRequest();
	request.open("GET", `http://servicodados.ibge.gov.br/api/v1/localidades/estados/${stateId}/municipios`, true);
	request.send();

	request.onreadystatechange = () => {
		if (this.status === 200) {
			let cidades = JSON.parse(this.response);

			cidades.forEach(cidade => {
				const optionTag = `<option value="${cidade.id}">${cidade.nome}</option>`;
				selectCitiesMenu.innerHTML += optionTag;
			})
		}
	}

}