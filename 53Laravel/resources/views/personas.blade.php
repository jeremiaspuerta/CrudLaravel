@extends('layout')

@section('title','Personas')

@section('content')
<div class="centrado">
    <a href="{{ route('personas.create') }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Crear usuario</a>
</div>
<div class="centrado" >
    <ul class="list-group">
        @forelse ($personas as $personasItem)
        <li class="list-group-item">
            <a href="{{ route('personas.show', $personasItem) }}">{{ $personasItem->names ." ". $personasItem->lastname }}</a>
            @empty
            <p class="centrado">No hay usuarios registrados</p>
        </li>
        <br>
        @endforelse
    </ul>
</div>
@endsection
