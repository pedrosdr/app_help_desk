<?php require_once('validador_acesso.php'); ?>

<?php
  $arquivo = fopen('../../app_help_desk/arquivo.hd', 'r');

  $chamados = [];

  while (!feof($arquivo)) { // feof() -> file end of file
    $line = fgets($arquivo); // fgets() -> gets line from file
    if ($line == null) continue;
    $chamados[] = $line;
  }

  if($_SESSION['perfil_id'] == 2) {
    $chamados = array_filter($chamados, function($c) {
      return explode('#', $c)[0] == $_SESSION['id'];
    });
  }

  fclose($arquivo);
?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>

      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="logoff.php">SAIR</a>
        </li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">
              
              <?php
                foreach($chamados as $chamado) {
                  $dados = explode('#', $chamado);
              ?>

              <div class="card mb-3 bg-light">
                <div class="card-body">
                  <h5 class="card-title"><?= $dados[1] ?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?= $dados[2] ?></h6>
                  <p class="card-text"><?= $dados[3] ?></p>

                </div>
              </div>

              <?php
                }
              ?>

              <div class="row mt-5">
                <div class="col-6">
                  <a href="home.php" class="btn btn-lg btn-warning btn-block" type="submit">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>