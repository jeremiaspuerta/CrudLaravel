
@extends('layout')

@section('title','Actualizar ' . $persona -> lastname)

@section('content')
<div class="centrado">
    <h1>Actualizar datos</h1>
</div>
<div class="centrado">
    <form method="POST" action="{{ route('personas.update', $persona) }}" enctype="multipart/form-data">
        {{csrf_field()}}
        <input name="_method" type="hidden" value="PATCH">
        <div class="form-group">
            Nombres <br>
            <input class="form-control" name="names" value="{{$persona -> names}}">
        </div>
        <br>
        @if ($errors->any())
        <p id="error">{{ $errors->first('names') }}</p>
        <br>
        @endif
        <div class="form-group">
            Apellido <br>
            <input class="form-control" name="lastname" value="{{$persona -> lastname}}"></input>
        </div>
        <br>
        @if ($errors->any())
        <p id="error">{{ $errors->first('lastname') }}</p>
        @endif
        <br>
        <div class="form-group">
            Email <br>
            <input class="form-control" name="email" value="{{$persona -> email}}"></input>
        </div>
        <br>
        @if ($errors->any())
        <p id="error">{{ $errors->first('email') }}</p>
        @endif
        <br>
        Fecha de nacimiento <br>
        <input id="date" type="date" name="birthdate" value="{{$persona -> birthdate}}">
        <br>
        @if ($errors->any())
        <p id="error">{{ $errors->first('birthdate') }}</p>
        @endif
        <br>
        Foto <br>
        <input type="file" class="form-control" name="photo" >
        <br>
        @if ($errors->any())
        <p id="error">{{ $errors->first('photo') }}</p>
        @endif
        <br>
        <button class="btn btn-success">Actualizar</button>
    </form>
</div>
@endsection

