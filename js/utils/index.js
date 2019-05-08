// Adicionando mutiplos eventos para o elemento.
Element.prototype.addEventListenerAll = function(events, fn) {
	events.split(' ').forEach((event) => {
		this.addEventListener(event, fn);
	});

	return this;
};
