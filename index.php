<?php

require_once __DIR__ . '/src/config.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Localhost</title>

  <!-- BOOTSTRAP -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>


  <link rel="stylesheet" href="<?=URL?>src/resources/styles.css">
</head>

<body>
  <header class="container">
    <div class="d-inline-flex w-100 p-2 border-bottom border-secondary">
      <button type="button" class="mx-2 btn btn-primary" id="novo-site">Novo site</button>
      <button type="button" class="mx-2 btn btn-primary" id="btn-listagem">Listagem</button>
      <button type="button" class="mx-2 btn btn-danger d-none" id="btn-remove-all">Remover em massa</button>
    </div>
  </header>
  
  <main class="container" id="conteudo"></main>

  <!-- CONSTANTES -->
  <script> <?=$app['variaveisJS']?> </script>

  <!-- JQUERY 3.6.4 -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <!-- BOOTSTRAP -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

  <!-- FUNÇÕES -->
  <script src="<?=URL?>src/resources/scripts.js"></script>
</body>
</html>