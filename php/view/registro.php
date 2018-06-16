<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="../../css/theme.css" type="text/css"> <title>FilmeAR</title></head>

    <body class="bg-light">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <div class="container">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar3SupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse text-center justify-content-center" id="navbar3SupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="../../index.php">FilmeAR.com
                                <br> </a>
                        </li>
                    </ul>
                    <a class="ml-3 btn navbar-btn btn-primary" href="#">Registrar Agora
                        <br> </a>
                </div>
            </div>
        </nav>
        <div class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="">
                            <b>Registrar</b>
                            <br> </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form method="post" action="../control/controleLocadora.php" id="formRegistro" name="formRegistro">
                            <div class="form-group">
                                <input type="hidden" name="opcao" value="Registrar">
                                <label for="nomeUsuarioR">Nome de Usuário</label>
                                <input type="text" class="form-control" maxlength="30" placeholder="Digite o Nome de Usuario" id="nomeUsuarioR" name="nomeUsuarioR">
                                <div style="display: none" id="usuarioResult"><small class="form-text alert-danger text-danger font-weight-bold">Nome de Usuário Já Cadastrado, Tente Outro!.</small></div>
                            </div>
                            <div class="form-group">
                                <label for="senha">Senha</label>
                                <input type="password" class="form-control" placeholder="Digite a Senha" id="senha" name="senha"> </div>
                            <div class="form-group">
                                <label for="re_senha">Confirmar Senha</label>
                                <input type="password" class="form-control" placeholder="Confirme sua Senha" id="re_senha" name="re_senha"> </div>
                            <div class="form-group">
                                <label for="emailR">E-mail</label>
                                <input type="email" class="form-control" maxlength="50" placeholder="Digite Seu Email" id="emailR" name="email"> 
                                <div style="display: none" id="emailResult"><small class="form-text alert-danger text-danger font-weight-bold">E-Mail Já Cadastrado, Tente Outro!.</small></div>
                                <div style="display: none" id="emailInvalid"><small class="form-text alert-danger text-danger font-weight-bold">Por Favor, Insira um E-Mail Válido!.</small></div>
                            </div>

                            <div class="form-group">
                                <label for="tipoUsuario">Tipo
                                    <br> </label>
                                <select class="custom-control custom-select" id="tipoUsuario" name="tipoUsuario">
                                    <option value="cliente">Cliente</option>
                                    <option value="funcionario">Funcionário</option>
                                </select>
                            </div>
                            <button type="button" onclick="validarForm()"  class="btn btn-success">
                                <i class="fa fa-lg fa-envelope d-inline-block"></i> Enviar
                                <br> </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php include_once '../util/modalSuccess.php'; ?>
        <script src="../../js/jquery-3.3.1.js"></script>
        <script src="../../js/popper.min.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/controleRegistro.js"></script>
        <script src="../../js/userValidate.js"></script>
    </body>

</html>