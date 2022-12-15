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
        <form method="POST" action="{{route("userinfo.update", $userInfo->Users_id)}}">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="idUserInfo">ID</label>
              <input name="id" type="text" class="form-control" id="idUserInfo" placeholder="#" value={{$userInfo->Users_id}} disabled>
              <small class="form-text text-muted">Não é possível alterar o ID.</small>
            </div>
            <div class="form-group">
                <label for="profileImgUserInfo">ProfileImg</label>
                <input name="profileImg" type="text" class="form-control" id="profileImgUserInfo" placeholder="Insira a foto de perfil..." value={{$userInfo->profileImg}}>
            </div>
            <div class="form-group">
                <label for="statusUserInfo">Status</label>
                <input name="status" type="text" class="form-control" id="statusUserInfo" placeholder="#" value={{$userInfo->status}} disabled>
                <small class="form-text text-muted">O status não é controlado pelo usuário.</small>
              </div>
            <div class="form-group">
                <label for="dataNascUserInfo">Data de nascimento</label>
                <input name="dataNasc" type="date" class="form-control" id="dataNascUserInfo" placeholder="Insira a data de nascimento..." value={{$userInfo->dataNasc}}>
            </div>
            <div class="form-group">
                <label for="generoUserInfo">Gênero</label>
                <input name="genero" type="text" class="form-control" id="generoUserInfo" placeholder="Insira seu gênero..." value={{$userInfo->genero}}>
            </div>
            <div class="my-1">
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="{{route("userinfo.show", $userInfo->Users_id)}}" class="btn btn-primary">Voltar</a>
            </div>
        </form>
    </div>
</body>
</html>
@endsection