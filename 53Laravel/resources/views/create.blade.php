
@extends('layout')

@section('title','Crear nuevo usuario')

@section('content')
<div class="centrado">
    <h1>Crear usuario</h1>
</div>
<div class="centrado">
    <form method="POST" action="{{ route('personas.store') }}" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            Nombres <br>
            <input class="form-control" name="names" value="{{ old('names')}}">
        </div>
        @if ($errors->any())
        <p id="error">{{ $errors->first('names') }}</p>
        <br>
        @endif
        <div class="form-group">
            Apellido <br>
            <input class="form-control" name="lastname" value="{{ old('lastname')}}"></input>
        </div>
        @if ($errors->any())
        <p id="error">{{ $errors->first('lastname') }}</p>
        @endif
        <br>
        <div class="form-group">
            Email <br>
            <input class="form-control" name="email" value="{{ old('email')}}"></input>
        </div>
        @if ($errors->any())
        <p id="error">{{ $errors->first('email') }}</p>
        @endif
        <br>
        Fecha de nacimiento <br>
        <input id="date" type="date" name="birthdate" value="{{ old('birthdate')}}">
        <br>
        @if ($errors->any())
        <p id="error">{{ $errors->first('birthdate') }}</p>
        @endif
        <br>
        Foto <br>
        <input type="file" class="form-control" name="photo">
        <br>
        @if ($errors->any())
        <p id="error">{{ $errors->first('photo') }}</p>
        @endif
        <br>
        <button class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection

@section('script')
<script>

</script>
@endsection
