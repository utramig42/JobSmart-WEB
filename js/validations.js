/**
 * Recebe um valor e retorna se e CPF ou CNPJ
 *
 * @param valor string/numero referente ao CPF ou CNPJ a ser verificado
 * @returns {string|boolean} informando se o valor passado corresponde a um CPF ou CNPJ
 */
function verificaCpfCnpj(valor) {

	valor = valor.toString();
	valor = valor.replace(/[^0-9]/g, '');

	if (valor.length === 11) {
		return 'CPF';
	} else if (valor.length === 14) {
		return 'CNPJ';
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
function formataCpfCnpj(valor) {

	let formatado;

	if (this.verificaCpfCnpj(valor) === 'CPF') {

		formatado = valor.substr(0, 3) + '.';
		formatado += valor.substr(3, 3) + '.';
		formatado += valor.substr(6, 3) + '-';
		formatado += valor.substr(9, 2) + '';

	} else if (this.verificaCpfCnpj(valor) === 'CNPJ') {

		formatado = valor.substr(0, 2) + '.';
		formatado += valor.substr(2, 3) + '.';
		formatado += valor.substr(5, 3) + '/';
		formatado += valor.substr(8, 4) + '-';
		formatado += valor.substr(12, 14) + '';

	}

	return formatado;

}