@extends('layouts.app')

@section('titulo',"Editar Usuario: {$user->name}")
@section('content')
<h3>Editar Usuario: {{ $user->name }}</h3>
{{--  mostrar mesg de erros  --}}

@if($errors->any())
    <ul class="errors">
        @foreach ($errors->all() as $error)
            <li class="error">{{ $error }}</li>
        @endforeach
    </ul>
@endif
<form action="{{ route('users.update',$user->id) }}" method="post">
{{--  <input type="hidden" name="_method" value="PUT">  --}}
@method('PUT')
@csrf
<input type="text" name="name" id="" placeholder="Nome" value="{{ $user->name }}">
<input type="email" name="email" id="" placeholder="seu email" value="{{ $user->email}}">
<input type="password" name="password" id="" placeholder="Sua senha...">
<button type="submit">Salvar</button>
</form>


@endsection
