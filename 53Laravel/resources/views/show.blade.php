
@extends('layout')

@section('title', $personas -> names ." ". $personas -> lastname)

@section('content')
<div class="show">
    <h1>{{ $personas -> names ." ". $personas -> lastname}}</h1>
    <br>
    <form method="POST" action="{{ route('personas.destroy', $personas) }}">
        {{csrf_field()}}
        <input name="_method" type="hidden" value="DELETE">
        <a href="{{ route('personas.actualizar', $personas) }}" class="btn btn-success" role="button" aria-pressed="true">Editar</a>
        <button class="btn btn-danger">Eliminar</button>
    </form>
    <p class="tiempo">{{ $personas ->created_at->diffForHumans() }}</p><br>
    <p class="descripcion">{{$personas ->email}}</p>
    <img src="{{$personas ->photo}}" alt="image">
</div>
@endsection
