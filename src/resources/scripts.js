function initListagem() {
  getConteudo('listagem', () => {
    initRemoverTodos();
    initDropDown();
    initBotaoRemoverSite();
  });
}

function novoSite() {
  getConteudo('novo-site', () => {
    document.getElementById('criar-novo-site').addEventListener('submit', el => {
      el.preventDefault();

      let form = el.target;
      
      $.ajax({
        url: URL + 'src/request/request-novo-site.php',
        method: 'POST',
        dataType: 'json',
        data: {
          nomeSite: form.nomeSite.value,
          urlSite : form.urlSite.value,
          https   : form.https.value,
          www     : form.www.value
        },
        success: data => {
          document.getElementById('mensagem-formulario').innerHTML = data.message;
        },
        error: erro => {
          console.error(erro);
        }
      });
    });
  });
}

function initBotaoRemoverSite() {
  let botoes = document.querySelectorAll('[data-remover-site]');

  botoes.forEach(elemento => {
    elemento.addEventListener('click', () => removerSite(elemento, elemento.getAttribute('data-remover-site')));
  });
}

function removerSite(elemento, idSite) {
  $.ajax({
    url: URL + 'src/request/request-remover-site.php',
    method: 'POST',
    dataType: 'json',
    data: { idSite },
    success: data => {
      document.getElementById('alerta-listagem').innerHTML = data.mensagem;
      if(data.status) elemento.parentElement.parentElement.remove();
    },
    error: error => {
      console.error(error);
    }
  });
}

function loading(tipo, fAction = false, timeOut = true) {
  switch(tipo) {
    case true:
      let main       = document.querySelector('main#conteudo');
      main.innerHTML = '';
      getLayoutLoading(main);

      if(timeOut) {
        setTimeout(() => {
          if(fAction) fAction();
          loading(false);
        }, 1000);
      } else {
        if(fAction) fAction();
      }
      break;
    
    case false:
      document.getElementById('loading');
      break;
  }
}

function getLayoutLoading(ElMain) {
  let html = document.createElement('div');

  html.classList.add('w-100');
  html.classList.add('d-flex');
  html.classList.add('py-5');
  html.classList.add('justify-content-center');
  html.setAttribute('id', 'loading');

  ElMain.appendChild(html);

  let conteudo = document.getElementById('loading');
  insertRecursivo(conteudo, 0);
}

function insertRecursivo(local, contador) {
  if(contador < 3) {
    let aux1 = document.createElement('div');
    let aux2 = document.createElement('div');

    aux1.setAttribute('style', 'width: 2rem; height: 2rem;');
    aux1.classList.add('spinner-grow');
    aux1.classList.add('text-success');
    aux1.classList.add('me-2');
    aux2.classList.add('visually-hidden');

    aux1.appendChild(aux2);
    local.appendChild(aux1);

    setTimeout(() => insertRecursivo(local, (contador +1)), 50);
  }
}

function getConteudo(tipo, fAction = false) {
  $.ajax({
    url: URL + 'src/request/request-' + tipo + '.php',
    method: 'GET',
    success: data => {
      loading(true, () => {
        document.querySelector('main#conteudo').innerHTML = data;
        if(fAction) fAction();
      });
    },
    error: error => {
      console.error(error);
    }
  });

  loading(false);
}

function initDropDown() {
  let itens = document.querySelectorAll("[data-drop-item]");
  itens.forEach(item => item.addEventListener('click', dropDownItem));
}

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
    }, 90);
  } else {
    this.classList.toggle('close');
    this.classList.toggle('open');

    dropDown.classList.remove('collapse');
    dropDown.classList.remove('show');
    dropDown.classList.add('collapsing');
    
    setTimeout(() => {
      dropDown.classList.add('collapse');
      dropDown.classList.remove('collapsing');
    }, 90);
  }
}

function initRemoverTodos() {
  let btnRemoverTodos = document.getElementById('btn-remove-all');
  btnRemoverTodos.classList.add('d-none');

  let removeAll = document.getElementById('selecionar-todos');
  if(removeAll != null) {
    removeAll.addEventListener('change', (item) => {
      removeAllItens(item.target.checked);
    });
  }
}

function removeAllItens(check) {
  let itens = document.querySelectorAll('.checkbox-item');
  
  itens.forEach(item => {
    item.classList.toggle('d-none');
    item.checked = check;
  });

  check ? 
  document.getElementById('btn-remove-all').classList.remove('d-none'):
  document.getElementById('btn-remove-all').classList.add('d-none');
}

window.onload = () => {
  initListagem();

  document.getElementById('novo-site').addEventListener('click', novoSite);
  document.getElementById('btn-listagem').addEventListener('click', initListagem);
};