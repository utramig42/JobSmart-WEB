<?php
include_once 'includes/config.php';
include_once 'includes/headers/header-init.php';

// CSS
include_once 'includes/headers/header-styles.php';

// Default Navbar
include_once 'includes/navbar/navbar-main.php';

// Require Files Users
require_once 'core/dao/Connection.php';
require_once 'core/dao/FornecedorModel.php';

$providerModal = new FornecedorModel();

if (!isset($_GET['id'])) {
    include_once 'includes/error.php';
}

if ($_SESSION['user_profile'] == 3) {
    include_once 'includes/error.php';
    exit;
}

$data = $providerModal->loadById($_GET['id'])[0];
?>

<title>Job'Smart - Atualização do Fornecedor</title>

<!-- Form Style CSS -->
<link rel="stylesheet" href="css/forms.css">

<div id="wrapper">

    <!-- Sidebar -->
    <?php
    include_once 'includes/navbar/navbar-sidebar.php'
    ?>

    <div id="content-wrapper">
        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.php">Painel de controle</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="fornecedores.php">Fornecedores</a>
                </li>
                <li class="breadcrumb-item active">
                    Atualização do fornecedor
                    <?php $fileName = 'Fornecedores'; ?>
                </li>
            </ol>

            <div class="card mx-auto">
                <div class="card-header">Dados do fornecedor</div>
                <div class="card-body">
                    <form id="provider" method="POST" action="core/dll/FornecedorControllerUpdate.php">
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-2">
                                    <div class="form-label-group">
                                        <input type="number" id="id" id="id" value="<?php echo $data['id_for'] ?>"
                                            name="id" class="form-control" placeholder="Código" readonly>
                                        <label for="id">Código</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <input required type="text" id="razao-social" id="razao-social"
                                            value="<?php echo $data['raz_soc_for'] ?>" name="razao-social"
                                            class="form-control" placeholder="Razão Social" readonly>
                                        <label for="razao-social">Razão Social</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-label-group">
                                        <input required type="text" id="cnpj" id="cnpj" name="cnpj"
                                            value="<?php echo $data['cnpj_for'] ?>" class="form-control"
                                            placeholder="CNPJ" readonly>
                                        <label for="cnpj">CNPJ</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-8">
                                    <div class="form-label-group">
                                        <input type="text" id="nome-fantasia" name="nome-fantasia"
                                            value="<?php echo $data['nm_for'] ?>" class="form-control"
                                            placeholder="Nome Fantasia" autofocus="autofocus" required>
                                        <label for="nome-fantasia">Nome Fantasia</label>
                                    </div>
                                </div>

                                <div class="col-md-1">
                                    <div class="form-label-group">
                                        <input required type="text" id="uf" name="uf"
                                            value="<?php echo $data['uf_for'] ?>" class="form-control"
                                            placeholder="Estado" autofocus="autofocus" required>
                                        <label for="uf">Estado</label>
                                    </div>
                                </div>

                                <div class=" col-md-3">
                                    <div class="form-label-group">
                                        <input required type="text" id="cidade" name="cidade"
                                            value="<?php echo $data['cid_for'] ?>" class="form-control"
                                            placeholder="Cidade" autofocus="autofocus" required>
                                        <label for="cidade">Cidade</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="form-label-group">
                                        <input required type="text" value="<?php echo $data['end_for'] ?>" id="endereco"
                                            name="endereco" class="form-control" placeholder="Endereço" required>
                                        <label for="endereco">Endereço</label>
                                    </div>
                                </div>



                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="form-label-group">
                                        <input type="text" id="nome-contato" name="nome-contato"
                                            value="<?php echo $data['nm_cont_for'] ?>" class="form-control"
                                            placeholder="Nome do Contato" required>
                                        <label for="nome-contato">Nome do Contato</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-label-group">
                                        <input type="text" id="fixo" name="fixo"
                                            value="<?php echo $data['tel_fix_for'] ?>" class=" form-control"
                                            placeholder="Telefone Fixo">
                                        <label for="fixo"> Telefone Fixo</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-label-group">
                                        <input required type="text" id="celular" name="celular" class="form-control"
                                            placeholder="Telefone Celular" value="<?php echo $data['tel_cel_for'] ?>"
                                            required>
                                        <label for="celular">Telefone Celular</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-label-group">
                                        <input type="date" id="data-cadastro" id="data-cadastro" name="data-cadastro"
                                            class="form-control" placeholder="Data do Cadastro"
                                            value="<?php echo date('Y-m-d', strtotime($data['dt_cad_for'])); ?>"
                                            readonly>
                                        <label for="data-cadastro">Data do Cadastro</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Atualizar</button>
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