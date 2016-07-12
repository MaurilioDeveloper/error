@extends('painel.templates.index')

@section('content')
    {{-- Facade Form, responsavel por criar um formulario, utilizando o pacote
         de Formularios do Laravel da versão 4.2 --}}
          @if( count($errors) > 0 )
            @foreach( $errors->all() as $error)
                {{$error}}
            @endforeach
         @endif
    {!!Form::open(['url' => "produtos/editar/{$produto->id}"])!!}
        {!!Form::text('nome', isset($produto->nome) ? $produto->nome : null, ['placeholder' => 'Nome do Produto'])!!}
        {!!Form::text('categoria', isset($produto->categoria) ? $produto->categoria : null, ['placeholder' => 'Categoria'])!!}
        {!!Form::text('valor', isset($produto->valor) ? $produto->valor : null, ['placeholder' => 'R$0,00'])!!}
        {!!Form::submit('Salvar', null)!!}
    {!!Form::close()!!}

@endsection