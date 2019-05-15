// Adicionando mutiplos eventos para o elemento.
Element.prototype.addEventListenerAll = function(events, fn) {
  events.split(" ").forEach(event => {
    this.addEventListener(event, fn);
  });

  return this;
};

// Facilitando a troca de estilo CSS, pelo JS.
// É possivel passar um JSON com todos os parametros a serem mudados.
Element.prototype.css = function(styles) {
  for (let name in styles) {
    this.style[name] = styles[name];
  }
  return this;
};
