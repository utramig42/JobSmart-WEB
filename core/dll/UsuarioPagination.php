 <?php
    if (file_exists('../dao/Connection.php')) require_once '../dao/Connection.php';
    if (file_exists('../dao/UsuarioModel.php')) require_once '../dao/UsuarioModel.php';


    // Configurações. 
    $maxItens = 10; // Número de itens por pagina.
    $page = (isset($_GET['pagina']) ? intval($_GET['pagina']) : 0); // Pagina Atual.

    // Buscando informações a serem mostradas do banco.

    $pagesSql = $page * $maxItens; // Para pegar o dado de 10 em 10.
    $sql = "SELECT mat_fun FROM funcionario LIMIT $pagesSql,$maxItens"; // Selecionando os itens a serem mostrados;


    $Sql = new Connection();

    $execute = $Sql->select("SELECT id_fun FROM funcionario LIMIT $pagesSql,$maxItens"); // Guardando informação.

    // Calculo de número de paginas total.
    $numTotal =  $Sql->update("SELECT * FROM funcionario"); // Número de linhas total no banco.
    $maxPages = round($numTotal / $maxItens); // Número total de paginas retornadas.

    $disablePrev = $page == 0 ? 'disabled' : '';
    $disableProx = $page == $maxPages - 1 ? 'disabled' : '';

    ?>
 <!-- Pagination Buttons -->
 <nav aria-label="Paginação de tabelas dos fornecedores">

     <ul class="pagination justify-content-center">
         <li class="page-item <?php echo $disablePrev ?>">
             <a class="page-link" href="?pagina=<?php echo $page <= 0 ?  0 : $page - 1 ?>">
                 Anterior
             </a>
         </li>

         <?php for ($i = 0; $i < $maxPages; $i++) {
                $active = $page == $i ?  'active' : ''; ?>

         <li class="page-item <?php echo $active ?>">
             <a class="page-link" href="?pagina=<?php echo $i; ?>">
                 <?php echo $i + 1; ?>
             </a>
         </li>

         <?php } ?>

         <li class="page-item <?php echo $disableProx ?>"><a class="page-link"
                 href="?pagina=<?php echo $page >= $maxPages - 1 ?  $numPage : $page + 1; ?>">Próximo</a>
         </li>
     </ul>
 </nav>