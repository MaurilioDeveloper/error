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
{{-- Listagem de Carros --}}

@forelse ($carros as $carro) 
    <tbody>
        <td>{{$carro->nome}}</td>
        <td>{{$carro->placa}}</td>
        <td>{{$carro->created_at}}</td>
        <td>{!! Html::link("carros/editar/{$carro->id}", 'Editar', ['class' => 'btn btn-primary']) !!}
        {!! Html::link("carros/deletar/{$carro->id}", 'Deletar', ['class' => 'btn btn-danger']) !!}
        </td>
    </tbody>
@empty
<li>Nenhum carro Cadastrado</li>
@endforelse
</table>

{!! $carros->render() !!}

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Cadastrar Carro</h4>
      </div>
      <div class="modal-body">
        {{-- Facade Form, responsavel por criar um formulario, utilizando o pacote
         de Formularios do Laravel da versão 4.2 --}}
         <div class='alert alert-warning' role='alert' style='display: none;'></div>
         <div class='alert alert-success' role='alert' style='display: none;'></div>
    {!!Form::open(['url' => 'carros/cadastrar', 'send' => 'carros/cadastrar', 'class' => 'form'])!!}
        {!!Form::text('nome', null, ['placeholder' => 'Nome do Carro', 'class' => 'form-control form-group'])!!}
        {!!Form::text('placa', null, ['placeholder' => 'Placa', 'class' => 'form-control form-group'])!!}
        {!!Form::select('id_marca', $marcas, null, ['class' => 'form-control form-group'])!!}
              </div>

        <div class="modal-footer">
          <button style="width: 49%;" type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-saved"></i> Salvar</button>
          <button style='width: 49%;' class="btn btn-danger" type="button" class="btn btn-default" data-dismiss="modal"><i class="glyphicon glyphicon-trash"></i> Cancelar</button>
          <div class='preloader' style="display: none;"> Enviando dados...</div>
          {!!Form::close()!!}
          </div>
    </div>
  </div>
</div>

@section('scripts')
<script>
    $(function(){
       jQuery.ajax({
          url: 'carros',
          type: "GET",
          dataType: "JSON",
          beforeSend: inicializaPreloader();
       }).done(function(data){
           finalizaPreloader();
           jQuery.each(data, function(key, value){
               jQuery(".table").append('<tr><td>'+value.nome+'<td/><td>'+value.placa+'</td></tr>');
           });
           alert(data);
           
       }).fail(function(data){
           finalizaPreloader();
            alert('Falha ao Listar Carros') 
       });
       return false;
    });
    
    function iniciaPreloader(){
        jQuery('.preloader').show();
    }
    function finalizaPreloader(){
        jQuery('.preloader').hide();
    }
        
</script>
<script>
    $(function(){
       jQuery("form.form").submit(function(){
           var dadosForm = jQuery(this).serialize();
           
           jQuery.ajax({
              url: jQuery(this).attr("send"),
              data: dadosForm,
              type: "POST",
              beforeSend: iniciaPreloader()
           }).done(function(data){
               finalizaPreloader();
               if(data == "1"){
                   jQuery('.alert-success').html("Sucesso ao cadastrar Carro");
                   jQuery('.alert-success').show();
                   location.reload();
               }else{
                   jQuery('.alert-warning').html(data);
                   jQuery('.alert-warning').show();
                  
               }
           }).fail(function(){
               finalizaPreloader();
               alert('Erro ao submeter formulario');
           });
            return false;

        });

        function iniciaPreloader(){
            jQuery(".preloader").show();
        }
        
        function finalizaPreloader(){
            jQuery(".preloader").hide();
        }
        
    });
</script>
@endsection

@endsection