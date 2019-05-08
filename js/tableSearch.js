const table = document.querySelector('table tfoot');
const searchBar = document.querySelector('#search-table input');

searchBar.addEventListenerAll('keyup', () => {
	console.log(search(table, searchBar));
});

function search(table, searchBar) {
	let textSearch = new RegExp(searchBar.value, 'i');
	let tables = Array.from(table.querySelectorAll('tr'));
	let result = tables.filter((data) => data.innerText.match(textSearch));

	return result;
}
