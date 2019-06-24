<?php
include_once 'includes/config.php';
include_once 'includes/headers/header-init.php';

// CSS
include_once 'includes/headers/header-styles.php';

// Default Navbar
include_once 'includes/navbar/navbar-main.php';

if (isset($_GET['mat']) && isset($_GET['name'])) {
    $mat = $_GET['mat'];
    $name = $_GET['name'];
} else {
    $mat = $_SESSION['user_id'];
    $name = $_SESSION['user_nome'];
}

?>

<title>Job'Smart - Alterar Senha </title>
<!-- Form Style CSS -->
<link rel="stylesheet" href="css/password.css">

<div id="wrapper">

    <!-- Sidebar -->
    <?php include_once 'includes/navbar/navbar-sidebar.php'; ?>

    <div id="content-wrapper">
        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.php">Painel de controle</a>
                </li>

                <li class="breadcrumb-item active">
                    Alterar Senha
                    <?php $fileName = 'Dashboard'; ?>
                </li>
            </ol>

            <div class="card mx-auto w-50">
                <div class="card-header">Atualizar Senha </div>
                <div class="card-body">
                    <div class="mb-2 required-text"> <span class="text-danger"> * </span> Campos obrigários </div>
                    <form id="password" method="POST" autocomplete="off" action="core/dll/UsuarioControllerUpdatePassword.php">

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-2">
                                    <div class="form-label-group">
                                        <input type="text" id="id" name="id" class="form-control" placeholder="ID" readonly autofocus="autofocus" value="<?php echo $mat  ?>">
                                        <label for="id">ID</label>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome" value="<?php echo $name ?>" readonly>
                                            <label for="nome">Nome </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="password" id="senhaAtual" autocomplete="false" name="senhaAtual" class="form-control" placeholder="Senha Atual">
                                <label for="senhaAtual">Senha Atual</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="password" id="senhaNova" autocomplete="off" name="senhaNova" class="form-control" placeholder="Nova Senha">
                                <label for="senhaNova">Nova Senha</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="password" id="senhaNovaConfirmacao" autocomplete="off" name="senhaNovaConfirmacao" class="form-control" placeholder="Nova Senha">
                                <label for="senhaNovaConfirmacao"> Confirmar Nova Senha</label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100"> Atualizar Senha </button>

                    </form>
                </div>

                <?php
                if (isset($_SESSION['msg'])) echo $_SESSION['msg'];
                unset($_SESSION['msg'])
                ?>

            </div>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->
<?php
include_once 'includes/footers/footer-init.php';
include_once 'includes/footers/footer-modal.php';
include_once 'includes/footers/footer-scripts.php';
?>
<script src="./js/updatePassword.js"></script>

<?php
include_once 'includes/footers/footer-final.php';
?>