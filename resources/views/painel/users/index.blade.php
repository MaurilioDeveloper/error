@extends('painel.templates.index')
@section('content')

<div class="container">
    <div class="row">
        <header>
            <h1 class="oculta" style="display:none;">Login | Visitas</h1>     
        </header>
            <div class="panel panel-default">
                <div class="panel-heading">Listagem de Usuarios</div>
                <div class="panel-body">
                    
                    <a href="users/cadastrar" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Cadastrar Novo</a>
                    <br/>
                    <br/>
                    <hr/>
                    @if( $status != "" )
                    <div class="alert alert-success">
                        {{ $status }}
                    </div>

                    @endif
                    {{-- Listagem de Users --}}
                    <table class='table table-striped'>
                        <thead>
                        <th>Nome</th>
                        <th>User</th>
                        <th>Email</th>
                        <th>Data</th>
                        <th>Ações</th>
                        </thead>
                        @forelse ($users as $user)
                        <tbody>
                        <td>{{$user->name}}</td>
                        <td>{{$user->user}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>{!! Html::link("users/editar/{$user->id}", 'Editar', ['class' => 'btn btn-primary']) !!}
                            {!! Html::link("users/deletar/{$user->id}", 'Deletar', ['class' => 'btn btn-danger']) !!}
                        </td>
                        </tbody>

                        @empty
                        <li>Nenhum user Cadastrado</li>
                        @endforelse
                    </table>

                    <center>{!! $users->render() !!}</center>

                </div>
            </div>
    </div>
</div>
@endsection
