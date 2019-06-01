<?php
    session_start();
    date_default_timezone_set("America/Sao_Paulo");
    $fileName = ucfirst(str_replace(".php", '', basename(__FILE__)));
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Jobsmart - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">

</head>

<body class="bg-dark">

    <div class="container">
        <div class="card card-login mx-auto mt-5">
            <div class="card-header">Login</div>
            <div class="card-body">
                <div class="block-center">
                    <img src="img/JOBSMART.png" class="logo-center" alt="">
                </div>

                <!-- Controle de avisos na tela: Exibidos de acordo com a seção.
                     Os erros de autenticação estão sendo setados através de sessão por praticidade. -->
                <?php
                if (isset($_SESSION['empty_fields'])):
                    ?>
                    <div class="alert alert-danger" role="alert">
                        ERRO: Verifique se os campos foram devidamente preenchidos!
                    </div>
                <?php
                endif;
                unset($_SESSION['empty_fields']);
                ?>

                <?php
                    if (isset($_SESSION['auth_error'])):
                ?>
                <div class="alert alert-danger" role="alert">
                    ERRO: Matrícula ou Senha inválidos!
                </div>
                <?php
                    endif;
                    unset($_SESSION['auth_error']);
                ?>


                <form action="loginController.php" method="POST">
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="text" id="inputMatricula" name="inputMatricula" class="form-control" required="required" autofocus="autofocus">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="password" id="inputSenha" name="inputSenha" class="form-control" placeholder="Senha" required="required">
                        </div>
                    </div>

                    <input type="submit" class="btn btn-primary" value="Entrar">
                </form>

            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>