const table = document.querySelector('table tfoot'); // Declarações temporárias.
const searchBar = document.querySelector('#search-table'); // Declarações temporárias.

initEvents(searchBar, table);

function initEvents(searchForm, table) {
	/* Função criada com o objetivo de inicializar eventos. 
	 *
	 * Adicionando 2 eventos nesse caso. (PS: Forma criada no projeto, no ./utils/index.js)
	 * 1- Para caso o usuario clique no botão de pesquisa.
	 * 2 -Para caso o usuario digite na barra de pesquisa.
	*/
	searchForm.addEventListenerAll('submit input', (event) => {
		event.preventDefault(); // Retirando o comportamento padrão (Recarregamento das pagina e envio de dados ao servidor).

		const searchBar = searchForm.querySelector('input'); // Selecionando a barra de pesquisa. Necessária para filtrar as buscas.

		console.log(search(table, searchBar)); // Função que retorna os resultados compativeis com as buscas.
		// (Temporariamente com o console.log).
	});
}

function search(table, searchBar) {
	let textSearch = new RegExp(searchBar.value, 'gi'); // Criando uma simples regex, de maneira global e não sensível (case insensitive).

	let tables = Array.from(table.querySelectorAll('tr')); // Selecionando todas as linhas da tabela e transformando nodeList em Array (Necessário, para correto funcionamento do filter).

	let result = tables.filter((data) => data.innerText.match(textSearch)); // Filtrando os resultados que corresponde a pesquisa feita.

	return result;
}
