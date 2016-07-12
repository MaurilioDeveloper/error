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
    {!!Form::open(['url' => 'produtos/cadastrar', 'files' => true, 'class' => 'form'])!!}
        {!!Form::text('nome', null, ['placeholder' => 'Nome do Produto', 'class' => 'form-control form-group'])!!}
        {!!Form::text('categoria', null, ['placeholder' => 'Categoria', 'class' => 'form-control form-group'])!!}
        {!!Form::text('valor', null, ['placeholder' => 'R$0,00', 'class' => 'form-control form-group'])!!}
        {!!Form::file('file', ['class' => 'form-group'])!!}
        {!!Form::submit('Enviar', ['class' => 'btn btn-success form-group'])!!}
    {!!Form::close()!!}

@endsection