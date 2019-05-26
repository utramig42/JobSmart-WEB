/**
 * Busca na API viaCep o endereço completo, dado um CEP
 *
 * @param cep string contendo o cep a ser buscado
 * @returns objeto definindo o endereço relativo ao parametro
 */
function findAddressByCep(cep) {
    cep = cep.replace(/[^a-zA-Z0-9]/g, '');

    const request = new XMLHttpRequest();
    request.open(
        "GET",
        `https://viacep.com.br/ws/${cep}/json/`,
        true
    );
    request.send();

    request.onreadystatechange = () => {
        if (this.status === 200) {
            return this.response;
        }
    }

}