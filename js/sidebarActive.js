/**
 * Arquivo de controle criado para gerenciar as paginas atualmente ativas,
 * com base no nome do arquivo, ative o elemento descrito.
 * @access public
 * @param {String} name Nome do item a ser ativado.
 */
function sideBarActive(name) {
  // Função de inicialização.
  const sideBars = document
    .querySelector(".sidebar")
    .querySelectorAll(".nav-item"); // Selecionando os itens a serem alterados.

  // Caso o nome do arquivo seja Index, mude-o para Dashboard.
  if (name == "Index") name = "Dashboard";

  // Alterar estados dos elementos.
  alterStates(sideBars, name);
}

/**
 * Função para alterações de estados.
 * @access public
 * @param {NodeList} elements Elemento o qual deve ser alterado
 * @param {String} name Nome do item a ser ativado ou desativado.
 */
function alterStates(elements, name) {
  changeStatusOff(findDesactive(elements)); // Desativando o estado atual e selecionando o qual deve ser desativado.
  changeStatusOn(findActive(elements, name)); // Ativando o estados e  selecionando o qual deve ser ativado.
}

/**
 * Função para encontrar o elemento a ser ativado.
 * @access public
 * @param {NodeList} sideBars Elementos HTML, o qual encontra-se o que deve ser ativado.
 * @param {String} name Nome do item a ser ativo.
 * @returns {Element} Elemento o qual deve ser ativado.
 */
function findActive(sideBars, name) {
  let element = ""; // Variável que contém a informação do elemento que a função retorna.

  // Metodo para encontrar os elementos a serem alterados.
  sideBars.forEach(sideBar => {
    // Utilizando uma regex, caso o retorno seja diferente de null, deve adicionar a variavel de retorno.
    if (sideBar.innerText.match(name)) element = sideBar;
  });

  return element;
}

/**
 * Função para encontrar o elemento a ser desativado.
 * @access public
 * @param {NodeList} elements Todos os elementos da barra lateral.
 * @returns {Element} Elemento a ser desativado.
 */
function findDesactive(elements) {
  // Função para encontrar o elemento a ser desativado.
  let component = "";

  elements.forEach(element => {
    // Verificando se o elemento em questão está atualmente ativo.
    if (element.classList.contains("active")) component = element;
  });

  return component;
}

/**
 * Função para alterar o estado do elemento, para ativo.
 * @access public
 * @param {Element} element Elemento a ser ativado.
 */
function changeStatusOn(element) {
  // Adicionando a classe 'active', para o elemento selecionado/encontrado.
  element.classList.add("active");
}

/**
 * Função para alterar o estado do elemento, para inativo.
 * @access public
 * @param {Element} element Elemento a ser desativado.
 */
function changeStatusOff(element) {
  // Removendo a classe 'active', para o elemento selecionado/encontrado.
  element.classList.remove("active"); // Se sim, remove o estado.
}
