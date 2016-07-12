@extends('painel.templates.index')

@section('content')
   
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