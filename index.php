<!DOCTYPE html>
<html>
<head>
  <title>Gerenciador de Registros</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
</head>
<body>
<div class="container" style="max-width:800px;">
  <h2>Cadastro de Registro</h2>
  <form id="form_registro">
    <div class="form-group">
      <label>Título</label>
      <input type="text" name="titulo" class="form-control" required>
    </div>
    <div class="form-group">
      <label>Conteúdo</label>
      <textarea name="conteudo" class="form-control" required></textarea>
    </div>
    <div class="form-group">
      <label>Status Inicial</label><br>
      <input type="checkbox" id="status_toggle" checked data-toggle="toggle" data-on="Ativo" data-off="Inativo" data-onstyle="success" data-offstyle="danger">
      <input type="hidden" name="status" id="status_hidden" value="Ativo">
    </div>
    <button type="submit" class="btn btn-primary">Cadastrar</button>
  </form>

  <hr>

  <h3>Gerenciar Registros</h3>
  <div id="area_gerenciamento"></div>

  <hr>

  <h3>Registros Ativos</h3>
  <div id="area_ativos"></div>
</div>

<script>
$(document).ready(function(){
  $('#status_toggle').change(function(){
    $('#status_hidden').val($(this).prop('checked') ? 'Ativo' : 'Inativo');
  });

  $('#form_registro').on('submit', function(e){
    e.preventDefault();
    $.post('insert_registro.php', $(this).serialize(), function(response){
      alert(response);
      $('#form_registro')[0].reset();
      $('#status_toggle').bootstrapToggle('on');
      carregarGerenciamento();
      carregarAtivos();
    });
  });


function carregarGerenciamento(page = 1){
  $.get('fetch_all.php?page=' + page, function(data){
    $('#area_gerenciamento').html(data);
    $('.status_toggle').bootstrapToggle();

    $('.status_toggle').change(function(){
      var id = $(this).data('id');
      var novoStatus = $(this).prop('checked') ? 'Ativo' : 'Inativo';
      $.post('update_status.php', {id: id, status: novoStatus}, function(){
        carregarGerenciamento(page);
        carregarAtivos();
      });
    });

    $('.page-link-gerenciar').click(function(e){
      e.preventDefault();
      var page = $(this).data('page');
      carregarGerenciamento(page);
    });
  });
}

function carregarAtivos(page = 1){
  $.get('fetch_ativos.php?page=' + page, function(data){
    $('#area_ativos').html(data);

    $('.page-link-ativos').click(function(e){
      e.preventDefault();
      var page = $(this).data('page');
      carregarAtivos(page);
    });
  });
}

$(document).ready(function(){
  carregarGerenciamento();
  carregarAtivos();
});



  carregarGerenciamento();
  carregarAtivos();
});
</script>
</body>
</html>
