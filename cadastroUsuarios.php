<?php
include_once('includes/headers/header-init.php');
?>

<title> Job'Smart - Administrativo </title>

<?php
include_once('includes/headers/header-styles.php');
?>

<link rel="stylesheet" href="css/forms.css">

<?php
include_once('includes/navbar/navbar-main.php');
?>

<div id="wrapper">

    <?php
    include_once('includes/navbar/navbar-sidebar.php')
    ?>

    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.php">Dashboard</a>
                </li>

                <li class="breadcrumb-item">
                    <a href="usuarios.php"> Usuarios </a>
                </li>

                <li class="breadcrumb-item active text-capitalize">
                    Cadastro de usuarios
                    <?php $fileName = 'Usuarios'; ?>
                </li>
            </ol>

            <div class="card mx-auto mt-5">
                <div class="card-header">Registrar os usuarios</div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" id="nome" name="nome" class="form-control"
                                    placeholder="Nome completo" required="required" autofocus="autofocus">
                                <label for="nome">Nome Completo</label>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <select id="cargo" name="cargo" class="form-control" required="required">
                                            <option> Cargo </option>
                                        </select>
                                        <label for="cargo" class="d-none"> Cargo </label>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <input type="number" id="numero" name="numero" class="form-control"
                                            placeholder="Salario" required="required">
                                        <label for="numero">Salario</label>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="form-label-group">
                                        <input type="text" id="cpf" name="cpf" class="form-control" placeholder="CPF"
                                            required="required">
                                        <label for="cpf">CPF</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-label-group">
                                        <input type="text" id="tel" name="tel" class="form-control"
                                            placeholder="Telefone" required="required">
                                        <label for="tel">Telefone</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-label-group">
                                        <input type="date" id="data" name="data" class="form-control"
                                            placeholder="Data de nascimento" required="required">
                                        <label for="data">Data de nascimento</label>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <input type="text" id="logradouro" name="logradouro" class="form-control"
                                            placeholder="Logradouro" required="required">
                                        <label for="logradouro">Logradouro </label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-label-group">
                                        <input type="number" id="numero" name="numero" class="form-control"
                                            placeholder="Número" required="required">
                                        <label for="numero">Número</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-label-group">
                                        <input type="text" id="complemento" name="complemento" class="form-control"
                                            placeholder="Complemento" required="required">
                                        <label for="complemento">Complemento</label>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">

                                <div class="col-md-4">
                                    <div class="form-label-group">
                                        <select id="estado" name="estado" class="form-control">
                                            <option value="" selected>
                                                Estado
                                            </option>
                                        </select>
                                        <label for="estado" class="d-none">Estado</label>
                                    </div>
                                </div>


                                <div class=" col-md-4">
                                    <div class="form-label-group">
                                        <select id="estado" name="estado" class="form-control" required="required">

                                            <option value="" selected>
                                                Cidade
                                            </option>
                                        </select>
                                        <label for="cidade" class="d-none">cidade</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-label-group">
                                        <input type="text" id="bairro" name="bairro" class="form-control"
                                            placeholder="Bairro" required="required">
                                        <label for="bairro">Bairro</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Cadastrar</a>
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
include('includes/footers/footer-init.php');
include('includes/footers/footer-modal.php');
include('includes/footers/footer-scripts.php');
?>

<script>
const labels = document.querySelectorAll('select+label');
console.log(labels);
</script>

<?php
include('includes/footers/footer-final.php');
?>