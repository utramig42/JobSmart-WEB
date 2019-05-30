<?php
include_once 'includes/config.php';
include_once 'includes/headers/header-init.php';

// CSS
include_once 'includes/headers/header-styles.php';

// Default Navbar
include_once 'includes/navbar/navbar-main.php';

// Require Files Users
require_once 'core/dao/Connection.php';
require_once 'core/dao/UsuarioModel.php';
require_once 'core/dll/UsuarioController.php';

$userModel = new UsuarioModel();
$data = $userModel->loadById($_GET['matricula'])[0];
var_dump($data);

echo date('d-m-Y', $data['dt_admin']);

?>

<title>Job'Smart - Atualização do Usuário</title>

<!-- Form Style CSS -->
<link rel="stylesheet" href="css/forms.css">

<div id="wrapper">

    <!-- Sidebar -->
    <?php
    include_once 'includes/navbar/navbar-sidebar.php';
    ?>

    <div id="content-wrapper">
        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.php">Painel de controle</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="usuarios.php">Funcionários</a>
                </li>
                <li class="breadcrumb-item active">
                    Atualização do funcionário
                    <?php $fileName = 'Usuarios'; ?>
                </li>
            </ol>

            <div class="card mx-auto">
                <div class="card-header">Dados do usuário</div>
                <div class="card-body">
                    <form id="user">
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-2">
                                    <div class="form-label-group">
                                        <input type="text" readonly id="matricula" name="matricula" class="form-control" placeholder="Matrícula" value="<?php echo $data['mat_fun'] ?>" readonly>
                                        <label for="matricula">Matrícula</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome completo" readonly value="<?php echo $data['nm_fun'] ?>">
                                        <label for="nome">Nome Completo</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-label-group">
                                        <input type="text" id="cpf" name="cpf" class="form-control" placeholder="CPF" readonly value="<?php echo $data['cpf_fun'] ?>">
                                        <label for="cpf">CPF</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-label-group">
                                        <input type="date" id="data-nascimento" name="data-nascimento" class="form-control" placeholder="Data de nascimento" readonly value="<?php echo $data['dt_nasc_fun'] ?>">
                                        <label for="data-nascimento">Data de nascimento</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-1">
                                    <div class="form-label-group">
                                        <select id="uf" name="uf" class="form-control" autofocus="autofocus" required>
                                            <option value="" selected>UF</option>
                                        </select>
                                        <label for="uf" class="d-none">UF</label>
                                    </div>
                                </div>

                                <div class=" col-md-3">
                                    <div class="form-label-group">
                                        <select id="cidade" name="cidade" class="form-control" required>
                                            <option value="" selected>Cidade</option>
                                        </select>
                                        <label for="cidade" class="d-none">Cidade</label>
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="form-label-group">
                                        <input type="text" id="endereco" name="endereco" class="form-control" placeholder="Endereço" required value="<?php echo $data['end_fun'] ?>">
                                        <label for="endereco">Endereço</label>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">

                                <div class="col-md-4">
                                    <div class="form-label-group">
                                        <input type="text" id="telefone" name="telefone" class="form-control" placeholder="Telefone" required value="<?php echo $data['tel_fun'] ?>">
                                        <label for="telefone">Telefone</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-label-group">
                                        <select id="cargo" name="cargo" class="form-control" required>
                                            <option value="" selected>Cargo</option>
                                        </select>
                                        <label for="cargo" class="d-none">Cargo</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-label-group">
                                        <input type="number" id="salario" name="salario" class="form-control" placeholder="Salário" required value="<?php echo $data['sal_fun'] ?>">
                                        <label for="salario">Salário</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-label-group">
                                        <input type="date" readonly id="data-cadastro" id="data-cadastro" name="data-cadastro" class="form-control" placeholder="Data do Cadastro" required value="<?php echo $data['sal_fun'];?>">
                                        <label for="data-cadastro">Data do Cadastro</label>
                                    </div>
                                </div>


                                <div class="col-md-2">
                                    <div class="form-label-group">
                                        <input type="date" id="dataresc" name="dataresc" readonly class="form-control" placeholder="Data Termino de contrato" required>
                                        <label for="dataresc">Data Termino de contrato</label>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Atualizar</a>
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
include_once 'includes/footers/footer-final.php';
?>

<script src="./js/controller/FormController.js"></script>

<script>
    const form = document.querySelector('#user');
    window.form = new FormController(form);
</script>