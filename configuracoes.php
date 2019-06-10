<?php
include_once 'includes/config.php';
include_once 'includes/headers/header-init.php';

// CSS
include_once 'includes/headers/header-styles.php';

// Default Navbar
include_once 'includes/navbar/navbar-main.php';
?>

<title>Job'Smart - Configurações </title>

<!-- Form Style CSS -->
<link rel="stylesheet" href="css/forms.css">

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
                    Configurações
                    <?php $fileName = 'Dashboard'; ?>
                </li>
            </ol>

            <div class="card mx-auto w-50">
                <div class="card-header">Atualizar Senha </div>
                <div class="card-body">
                    <form id="provider" method="POST" action="core/dll/FornecedorControllerAdd.php">

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-2">
                                    <div class="form-label-group">
                                        <input type="text" id="id" name="id" class="form-control" placeholder="ID" readonly autofocus="autofocus" value="<?php echo $_SESSION['user_id'] ?>">
                                        <label for="id">ID</label>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome" autofocus="autofocus" value="<?php echo $_SESSION['user_nome'] ?>" readonly>
                                            <label for="nome">Nome </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="password" id="senhaAtual" name="senhaAtual" class="form-control" placeholder="Senha Atual" autofocus="autofocus">
                                <label for="senhaAtual">Senha Atual</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="password" id="senhaNova" name="senhaNova" class="form-control" placeholder="Nova Senha">
                                <label for="senhaNova">Nova Senha</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100"> Atualizar Senha </button>

                    </form>
                </div>
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
<script src="./js/utils/IbgeUtils.js"></script>
<script src="./js/utils/CepUtils.js"></script>
<script src="./js/controller/FormController.js"></script>
<script>
    const form = document.querySelector("#provider");
    window.form = new FormController(form);
</script>
<?php
include_once 'includes/footers/footer-final.php';
?>