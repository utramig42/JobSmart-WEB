<!-- Sidebar -->
<?php if ($_SESSION['user_profile'] == 1) : ?>

    <ul class="sidebar navbar-nav toggled">
        <li class="nav-item active">
            <a class="nav-link" href="index.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="usuarios.php">
                <i class="fas fa-fw fa-user"></i>
                <span>Usuarios</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="relatorios.php">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Relatorios</span> <span> Gerais </span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="fornecedores.php">
                <i class="fas fa-fw fa-table"></i>
                <span>Fornecedores</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="produtos.php">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                <span>Produtos</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="vendas.php">
                <i class="fas fa-dollar-sign    "></i>
                <span>Vendas</span>
            </a>
        </li>

    </ul>
<?php endif ?>

<?php if ($_SESSION['user_profile'] == 2) : ?>

    <ul class="sidebar navbar-nav toggled">
        <li class="nav-item active">
            <a class="nav-link" href="index.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="relatorios.php">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Relatorios</span> <span> Operacionais </span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="fornecedores.php">
                <i class="fas fa-fw fa-table"></i>
                <span>Fornecedores</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="produtos.php">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                <span>Produtos</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="vendas.php">
                <i class="fas fa-dollar-sign    "></i>
                <span>Vendas</span>
            </a>
        </li>

    </ul>
<?php endif ?>


<?php if ($_SESSION['user_profile'] == 3) : ?>
    <ul class="sidebar navbar-nav toggled">
        <li class="nav-item active">
            <a class="nav-link" href="index.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="relatorios.php">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Relatorios</span> <span> Administrativo </span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="usuarios.php">
                <i class="fas fa-fw fa-user"></i>
                <span>Usuarios</span>
            </a>
        </li>
    </ul>
<?php endif ?>