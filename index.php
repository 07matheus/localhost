<?php

error_reporting(E_ALL);
ini_set('display_errors', true);

$arquivoConfiguracao = __DIR__ . '/.sites.json';

// VERIFICA SE O AQUIVO DE CONFIGURAÇÃO EXISTE
if(!file_exists($arquivoConfiguracao)) file_put_contents($arquivoConfiguracao, json_encode([]));

$dados = file_get_contents($arquivoConfiguracao);
$dados = json_decode($arquivoConfiguracao);


// if(!empty($dados)) {

// }
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


  <style>
    * {
      margin: 0;
      padding: 0;
    }

    #listagem .header {
      background-color: var(--bs-dark-border-subtle);
      color: var(--bs-dark-text);
      font-size: 18px;
      font-weight: bold;
    }
    #listagem .item .item-drop-down > svg {
      display: none;
    }
    #listagem .item .btn.open > svg.open {
      display: block;
    }
    #listagem .item .btn.close > svg.close {
      display: block;
    }
  </style>
</head>
<body>
  
  <main class="container">
    <div class="d-inline-flex w-100 p-2 border-bottom border-secondary">
      <button type="button" class="mx-2 btn btn-primary">Novo site</button>
      <button type="button" class="mx-2 btn btn-danger">Remover em massa</button>
    </div>

    <div class="border mt-3 p-2" id="listagem">
      <div class="d-inline-flex w-100 header">
        <div class="py-2 text-center col-1"></div>
        <div class="py-2 text-center col">Nome</div>
        <div class="py-2 text-center col-3">Acoẽs</div>
      </div>

      <div class="item">
        <div class="d-inline-flex w-100 align-items-center principal">
          <div class="py-2 text-center col-1">
            <input type="checkbox" name="item-1">
          </div>

          <div class="py-2 col ali">
            <button type="button" class="btn item-drop-down open" data-drop-item="1">
              <svg class="open" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
              </svg>

              <svg class="close" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-up" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z"/>
              </svg>
            </button>

            <span>Site 1</span>
          </div>

          <div class="py-2 col-3">
            <button type="button" class="btn btn-success" title="Ver site">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
              </svg>
            </button>

            <button type="button" class="btn btn-secondary">Secondary</button>
            <button type="button" class="btn btn-secondary">Secondary</button>
          </div>
        </div>

        <div class="collapse" id="drop-item-1">
          <div class="d-inline-flex w-100 align-items-center">
            teste
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- BOOTSTRAP -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

  <script>
    function dropDownItem() {
      let item     = this.getAttribute('data-drop-item');
      let dropDown = document.getElementById("drop-item-" + item);

      if(this.classList.contains('open')) {
        this.classList.toggle('open');
        this.classList.toggle('close');

        dropDown.classList.remove('collapse');
        dropDown.classList.add('collapsing');

        setTimeout(() => {
          dropDown.classList.add('collapse');
          dropDown.classList.add('show');
          dropDown.classList.remove('collapsing');
        }, 300);
      } else {
        this.classList.toggle('close');
        this.classList.toggle('open');

        dropDown.classList.remove('collapse');
        dropDown.classList.remove('show');
        dropDown.classList.add('collapsing');
        
        dropDown.classList.add('collapse');
        dropDown.classList.remove('collapsing');
      }
    }

    let itens = document.querySelectorAll("[data-drop-item]");
    itens.forEach(item => item.addEventListener('click', dropDownItem));
  </script>
</body>
</html>