@extends('painel.templates.index')
@section('content')
{!! Html::link("produtos/cadastrar", 'Cadastrar', ['class' => 'btn btn-success']) !!} <br/>
<h1>Itens por pagina ({{$produtos->count()}}) </h1><br />
{{-- Listagem de Produtos --}}
@forelse ($produtos as $produto)
<table class='table table-bordered'>
    <thead>
        <th>Nome</th>
        <th>Categoria</th>
        <th>Valor</th>
        <th>Data</th>
        <th>Ações</th>
    </thead>
    <tbody>
        <td>{{$produto->nome}}</td>
        <td>{{$produto->categoria}}</td>
        <td>{{$produto->valor}}</td>
        <td>{{$produto->created_at}}</td>
        <td>{!! Html::link("produtos/editar/{$produto->id}", 'Editar', ['class' => 'btn btn-primary']) !!}
        {!! Html::link("produtos/deletar/{$produto->id}", 'Deletar', ['class' => 'btn btn-danger']) !!}
        </td>
    </tbody>
</table>
@empty
<li>Nenhum produto Cadastrado</li>
@endforelse

{!! $produtos->render() !!}
{{-- Inclusão da Pagina de captura de email --}}
@include('painel.includes.email')

@endsection