<?php
header('Content-type: text/html; charset=utf-8');

$AlterlocTotal = '<input type="submit" id="deletar"  class="btn btn-outline-secondary" value="ALTER TOTAL"></input>';
$AlterLocUni = '<input type="submit" id="inserir" class="btn btn-outline-secondary" value="ALTER UNICO"></input>';
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

  <title>DATABIT</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/cover/">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="cover.css" rel="stylesheet">
  <link rel="stylesheet" href="CSS/styleExibicao.css">
</head>

<body class="text-center">

  <div class="card"
    style="background-color: white; width: auto; margin-left: 2%; margin-right: 2%; margin-top: 2%; border-radius: 30px;">
    <!-- <form action="http://localhost:8090/phpprod/positiva/coletores/coletorexpedicao/coletores/login.php"><button class="btn-voltar">SAIR</button></form> -->
    <img src="media/logo.png" width="150" height="50" style="margin-left: 8px; border-radius:20px;"
      class="d-inline-block align-top" alt="">
    <div class="cover-container d-flex h-100 p-3 mx-auto flex-column container-button">
      <header class="masthead mb-auto">
        <div class="inner">
          <h2 class="masthead-brand">Romaneios</h2>
        </div>
      </header>

      <div style="height: 30px; line-height: 10px; font-size: 8px;">&nbsp;</div>
      <main role="main" class="inner cover">
        <div class="divBtn">
          <form class="form-btn" action="Impres.php">
            <input type="submit" id="deletar" class="btn btn-outline-secondary" value="INSTALAÇÃO"></input>
          </form>
          <form class="form-btn" action="ImpresDESINST.php">
            <input type="submit" id="inserir" class="btn btn-outline-secondary" value="DESINSTALAÇÃO"></input>
          </form>
          <form class="form-btn" action="Impres_SUBS.php">
            <input type="submit" id="inserir" class="btn btn-outline-secondary" value="INSTALAÇÃO/SUBS"></input>
          </form>
          <form class="form-btn" action="impresDESINST_SUBS.php">
            <input type="submit" id="inserir" class="btn btn-outline-secondary" value="DESINSTALAÇÃO/SUBS"></input>
          </form>
        </div>
      </main>
    </div>
  </div>
</body>

</html>