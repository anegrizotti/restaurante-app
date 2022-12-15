@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create de UserInfo</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        @if(isset($message))
            <div class="alert alert-{{$message[1]}} alert-dismissible fade show" role="alert">
                <span>{{$message[0]}}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form method="POST" action="{{route("userinfo.store")}}">
            @csrf
            <div class="form-group">
              <label for="idUserInfo">ID</label>
              <input name="id" type="text" class="form-control" id="idUserInfo" placeholder="#" disabled>
              <small class="form-text text-muted">Não é necessário informar o ID para cadastrar um novo dado.</small>
            </div>
            <div class="form-group">
                <label for="profileImgUserInfo">ProfileImg</label>
                <input name="profileImg" type="text" class="form-control" id="profileImgUserInfo" placeholder="Insira a foto de perfil...">
            </div>
            <div class="form-group">
                <label for="statusUserInfo">Status</label>
                <input name="status" type="text" class="form-control" id="statusUserInfo" placeholder="#" disabled>
                <small class="form-text text-muted">O status não é controlado pelo usuário.</small>
              </div>
            <div class="form-group">
                <label for="dataNascUserInfo">Data de nascimento</label>
                <input name="dataNasc" type="date" class="form-control" id="dataNascUserInfo" placeholder="Insira a data de nascimento...">
            </div>
            <div class="form-group">
                <label for="generoUserInfo">Gênero</label>
                <input name="genero" type="text" class="form-control" id="generoUserInfo" placeholder="Insira seu gênero...">
            </div>
            <div class="my-1">
                <a href="{{route("home")}}" class="btn btn-primary">Voltar</a>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </form>
    </div>
</body>
</html>
@endsection