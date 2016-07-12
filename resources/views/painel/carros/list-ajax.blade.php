@extends('painel.templates.index')
@section('content')
{!! Html::link("carros/cadastrar", 'Cadastrar', ['class' => 'btn btn-success']) !!} <br/>
<h1>Itens por pagina  </h1><br />
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Modal
</button>
<br/>
<table class='table table-bordered'>
    <thead>
        <th>Nome</th>
        <th>Placa</th>
        <th>Data</th>
        <th>Ações</th>
    </thead>
</table>

    
<div class='preloader' style="display:none;"> Listando os Dados... Aguarde... </div>
    
@endsection
@section('scripts')
<script>
    $(function(){
       jQuery.ajax({
          url: 'json',
          type: "GET",
          dataType: "JSON",
          beforeSend: inicializaPreloader()
       }).done(function(data){
           finalizaPreloader();
           jQuery.each(data, function(key, value){
               jQuery(".table").append('<tr><td>'+value.nome+'</td><td>'+value.placa+'</td><td>'+value.created_at+'</td></tr>');
           });
           console.log(data);
       }).fail(function(){
           finalizaPreloader();
            alert('Falha ao Listar Carros');
       });
       return false;
    });
    
    function inicializaPreloader(){
        jQuery('.preloader').show();
    }
    function finalizaPreloader(){
        jQuery('.preloader').hide();
    }
        
</script>
@endsection