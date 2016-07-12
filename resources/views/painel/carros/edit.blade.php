@extends('painel.templates.index')

@section('content')
    {{-- Facade Form, responsavel por criar um formulario, utilizando o pacote
         de Formularios do Laravel da versão 4.2 --}}
         @if( count($errors) > 0 )
         <div class='alert alert-danger' role='alert'>
            @foreach( $errors->all() as $error)
                {{$error}}
            @endforeach
         </div>
         @endif
    {!!Form::open(['url' => "carros/editar/{$carro->id}", 'class' => 'form'])!!}
        {!!Form::text('nome',isset($carro->nome) ? $carro->nome : null, ['placeholder' => 'Nome do Carro', 'class' => 'form-control form-group'])!!}
        {!!Form::text('placa', isset($carro->placa) ? $carro->placa : null, ['placeholder' => 'Placa', 'class' => 'form-control form-group'])!!}
        {!!Form::select('id_marca', $marcas, isset($carro->id_marca) ? $carro->id_marca : null, ['class' => 'form-control form-group'])!!}
        {!!Form::submit('Editar', ['class' => 'btn btn-primary form-group'])!!}
    {!!Form::close()!!}

@endsection