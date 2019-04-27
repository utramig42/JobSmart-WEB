function sideBarActive(name) {
  const sideBar = document.querySelector(".sidebar");
  sideBar.querySelector(".active").classList.remove("active");

  const itemAtivo = sideBar.querySelectorAll(".breadcrumb-item")[1];
}
