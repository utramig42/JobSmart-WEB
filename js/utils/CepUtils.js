class CepUtils {

    /**
     * Busca na API viaCep o endereço completo, dado um CEP
     *
     * @param cep string contendo o cep a ser buscado
     * @param logradouroField campo de logradouro
     * @param bairroField campo de bairro
     */
    async findAddressByCep(cep, logradouroField, bairroField) {
        const cepReq = cep.replace(/[^a-zA-Z0-9]/g, "");
        let data = null;

        const request = new XMLHttpRequest();
        request.open("GET", `https://viacep.com.br/ws/${cepReq}/json/`, true);
        request.send();
        request.onreadystatechange = function () {
            if (this.status === 200) {
                const respBody = JSON.parse(this.response);
                logradouroField.value = respBody['logradouro'];
                bairroField.value = respBody['bairro'];
            }
        };
    }
}
