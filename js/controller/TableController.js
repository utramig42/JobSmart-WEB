class TableController {
	constructor(searchForm, table) {
		this.searchFormEl = searchForm;
		this.tableEl = table;

		this.initEvents();
	}

	initEvents() {
		/* Método criada com o objetivo de inicializar eventos. 
		*
		* Adicionando 2 eventos nesse caso. (PS: Forma criada no projeto, no ./utils/index.js)
		* 1- Para caso o usuario clique no botão de pesquisa.
		* 2 -Para caso o usuario digite na barra de pesquisa.
		*/

		this.searchFormEl.addEventListenerAll('submit input', (event) => {
			event.preventDefault(); // Retirando o comportamento padrão (Recarregamento das pagina e envio de dados ao servidor).

			const searchBar = this.searchFormEl.querySelector('input'); // Selecionando a barra de pesquisa. Necessária para filtrar as buscas.

			let result = this.search(searchBar.value); // Objeto com os resultados compativeis e incompativeis  das buscas.

			this.hideLines(result.notMatch);
			this.showLines(result.match);
		});
	}

	hideLines(lines) {
		lines.forEach((line) => {
			line.classList.add('d-none');
		});
	}

	/**
	 * Recebe um Array com os itens a serem mostrados.
	 * @param line Array referente ao oque vai ser pesuisado.
	 * @returns {Object} informando separando 2 Arrays com os itens correspodentes e não correspodentes a pesquisa.
	 */

	showLines(lines) {
		lines.forEach((line) => {
			// Caso exista a classe d-none, a remova.
			if (line.classList.contains('d-none')) line.classList.remove('d-none');
		});
	}

	/**
	 * Recebe uma string com oque a ser pesquisado e retorna um array com os valores correspondentes.
	 * @param searchBar string/numero  referente ao oque vai ser pesquisado.
	 * @returns {Object} informando separando 2 Arrays com os itens correspodentes e não correspodentes a pesquisa.
	 */
	search(searchBar) {
		let textSearch = new RegExp(searchBar, 'gi'); // Criando uma simples regex, de maneira global e não sensível (case insensitive).

		let tables = Array.from(this.tableEl.querySelectorAll('tr')); // Selecionando todas as linhas da tabela e transformando nodeList em Array (Necessário, para correto funcionamento do filter).

		let match = tables.filter((data) => data.innerText.match(textSearch)); // Filtrando os resultados que corresponde a pesquisa feita.

		let notMatch = tables.filter((data) => !data.innerText.match(textSearch)); // Filtrando os resultados que NÃO corresponde a pesquisa feita.

		return { match, notMatch };
	}
}
