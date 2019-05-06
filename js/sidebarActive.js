// Arquivo de controle criado para gerenciar as paginas atualmente ativas.
// Com base no nome do arquivo, ative o elemento descrito.
function sideBarActive(name) {
  // Função de inicialização.

  const sideBars = document
    .querySelector(".sidebar")
    .querySelectorAll(".nav-item"); // Selecionando os itens a serem alterados.

  if (name == "Index") name = "Dashboard"; // Caso o nome do arquivo seja Index, mude-o para Dashboard.

  alterStates(sideBars, name); // Alterar estados dos elementos.
}

function alterStates(elements, name) {
  // Função para alterações de estados.
  changeStatusOff(findDesactive(elements)); // Desativando o estado atual e selecionando o qual deve ser desativado.
  changeStatusOn(findActive(elements, name)); // Ativando o estados e  selecionando o qual deve ser ativado.
}

function findActive(sideBars, name) {
  // Função que encontra o estado a ser alterado.

  let element = ""; // Variável que contém a informação do elemento que a função retorna.

  // Metodo para encontrar os elementos a serem alterados.
  sideBars.forEach(sideBar => {
    // Utilizando uma regex, caso o retorno seja diferente de null, deve adicionar a variavel de retorno.
    if (sideBar.innerText.match(name)) element = sideBar;
  });

  return element;
}

function findDesactive(elements) {
  // Função para encontrar o elemento a ser desativado.
  let component = "";

  elements.forEach(element => {
    // Verificando se o elemento em questão está atualmente ativo.
    if (element.classList.contains("active")) component = element;
  });

  return component;
}

function changeStatusOn(element) {
  // Função para alterar o estado do elemento, para ativo.

  // Adicionando a classe 'active', para o elemento selecionado/encontrado.
  element.classList.add("active");
}

function changeStatusOff(element) {
  // Função para alterar o estado do elemento, para inativo.

  // Removendo a classe 'active', para o elemento selecionado/encontrado.
  element.classList.remove("active"); // Se sim, remove o estado.
}
