@extends('layouts.app')

@section('titulo','Detalhes do User')
@section('content')

<h4>Exibindo os dados de: {{ $user->name }}</h4>

<h3>Detalhes</h3>
<ul>
    <li>Codigo Pessoal: {{ $user->id }}</li>
    <li>Nome: {{ $user->name }}</li>
    <li>E-mail: {{ $user->email }}</li>
    <li>Data de Registo{{ $user->created_at }}</li>

</ul>
<form action="{{ route('users.destroy', $user->id)}}" method="POST">
    @method('DELETE')
    @csrf
    <button type="submit">Deletar</button>
</form>
<a href="route{{ 'users.index' }}">Voltar</a>
@endsection
