 <!-- <?php
        if (file_exists('../dao/Connection.php')) require_once '../dao/Connection.php';

        $Sql = new Connection();
        // Calculo de número de paginas total.
        $numTotal =  $Sql->numOfRows("SELECT * FROM $table"); // Número de linhas total no banco.
        $maxPages = ceil($numTotal / $maxItens); // Número total de paginas retornadas.

        $disablePrev = $page == 0 ? 'disabled' : '';
        $disableProx = $page == $maxPages - 1 ? 'disabled' : '';

        ?>
-->
 <!-- Pagination Buttons 
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
 </nav> -->