
@extends('layouts.app')

@section('titulo','Pagina Inicial')
@section('content')

<h3>Lista de Usuarios</h3>

{{--  formulario para filtro  --}}
<form action="{{ route('users.index') }}" method="get">
<input type="text" name="search" id="" placeholder="Pesquisar">
<button>Pesquisar</button>
</form>

<ul>
    @foreach ( $users as $user )
    <li>Nome: {{ $user->name }}</li>
    <li>E-mail: {{ $user->email }}</li>
    <li>Data de Criacao: {{ $user->created_at }}</li>
    <li> Mais detalhes clique <a href="{{ route('users.show', $user->id) }}">Aqui</a> </li>
    <li>Opcoes: <a href="{{ route('users.edit',$user->id) }}">Editar || </li>
    <hr>
    @endforeach
<hr>
</ul>

<a href="{{ route('users.create') }}">Adiciona(+)</a>

@endsection




