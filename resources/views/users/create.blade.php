@extends('layouts.app')

@section('titulo','Criar Usuario')
@section('content')

<h3>Adicionar novo Usuario</h3>
{{--  mostrar mesg de erros  --}}

@if($errors->any())
    <ul class="errors">
        @foreach ($errors->all() as $error)
            <li class="error">{{ $error }}</li>
        @endforeach
    </ul>
@endif
<form action="{{ route('users.store') }}" method="post">
@csrf
<input type="text" name="name" id="" placeholder="Nome" value="{{ old('name') }}">
<input type="email" name="email" id="" placeholder="seu email" value="{{ old('email') }}">
<input type="password" name="password" id="" placeholder="Sua senha...">
<button type="submit">Salvar</button>
</form>
@endsection
