<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="css/theme.css" type="text/css"> 
  <title>FilmeAR</title>
</head>

<body class="bg-light">
  <nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <div class="container">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar3SupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse text-center justify-content-center" id="navbar3SupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#">FilmeAR.com
              <br> </a>
          </li>
        </ul>
        <a class="ml-3 btn navbar-btn btn-primary" href="php/view/registro.php">Registrar Agora
          <br> </a>
      </div>
    </div>
  </nav>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="">
            <b>Faça Já o Login</b>
          </h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
            <form id="" method="POST" action="php/control/controleLocadora.php">
            <div class="form-group">
              <label for="nomeUsuario">Nome de Usuário</label>
              <input type="text" class="form-control" maxlength="30" required placeholder="Digite o Nome de Usuario" id="nomeUsuario" name="nomeUsuario"> </div>
            <div class="form-group">
              <label for="senha">Senha</label>
              <input type="password" class="form-control" maxlength="50" required placeholder="Digite a Senha" id="senha" name="senha"> </div>
            <button type="submit" name="opcao" id="opcao" value="Logar" class="btn btn-primary">
              <i class="fa d-inline fa-lg fa-sign-in"></i> Entrar
              <br> </button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="/js/jquery-3.3.1.min.js"></script>
  <script src="/js/popper.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/controleLogin.js"></script>
</body>

</html>