@extends('painel.templates.index')
@section('content')
<br/>
    {{-- Facade Form, responsavel por criar um formulario, utilizando o pacote
         de Formularios do Laravel da versão 4.2 --}}
         @if( count($errors) > 0 )
         <div class='alert alert-danger' role='alert'>
            @foreach( $errors->all() as $error)
                {{$error}}
            @endforeach
         </div>
         @endif
    {!!Form::open(['url' => 'users/cadastrar', 'class' => 'form'])!!}
        {!!Form::text('name', null, ['placeholder' => 'Nome do User', 'class' => 'form-control form-group'])!!}
        {!!Form::text('user', null, ['placeholder' => 'Usuario', 'class' => 'form-control form-group'])!!}
        {!!Form::email('email', null, ['placeholder' => 'Email', 'class' => 'form-control form-group'])!!}
        {!!Form::password('password', ['placeholder' => 'Senha', 'class' => 'form-control form-group'])!!}
        {!!Form::submit('Enviar', ['class' => 'btn btn-success form-group'])!!}
    {!!Form::close()!!}

@endsection