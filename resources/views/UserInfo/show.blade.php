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

        <a href="{{route("home")}}" class="btn btn-primary">Voltar</a>
        <a href="{{route("userinfo.edit", $userInfo->Users_id)}}" class="btn btn-secondary">Editar</a>
        <a
            href="#"
            class="btn btn-danger class-button-destroy"
            data-bs-toggle="modal"
            data-bs-target="#destroyModal"
            value="{{route("userinfo.destroy", $userInfo->Users_id)}}">
                Excluir
        </a>
        <div class="form-group">
            <label for="idUserInfo">ID</label>
            <input name="id" type="text" class="form-control" id="idUserInfo" placeholder="#" value={{$userInfo->Users_id}} disabled>
            <small class="form-text text-muted">Não é necessário informar o ID para cadastrar um novo dado.</small>
        </div>
        <div class="form-group">
            <label for="profileImgUserInfo">ProfileImg</label>
            <input name="profileImg" type="text" class="form-control" id="profileImgUserInfo" placeholder="Insira a foto de perfil..." value={{$userInfo->profileImg}} disabled>
        </div>
        <div class="form-group">
            <label for="statusUserInfo">Status</label>
            <input name="status" type="text" class="form-control" id="statusUserInfo" placeholder="#" value={{$userInfo->status}} disabled>
            <small class="form-text text-muted">O status não é controlado pelo usuário.</small>
            </div>
        <div class="form-group">
            <label for="dataNascUserInfo">Data de nascimento</label>
            <input name="dataNasc" type="date" class="form-control" id="dataNascUserInfo" placeholder="Insira a data de nascimento..." value={{$userInfo->dataNasc}} disabled>
        </div>
        <div class="form-group">
            <label for="generoUserInfo">Gênero</label>
            <input name="genero" type="text" class="form-control" id="generoUserInfo" placeholder="Insira seu gênero..." value={{$userInfo->genero}} disabled>
        </div>
    </div>

    <div class="modal fade" id="destroyModal" tabindex="-1" aria-labelledby="destroyModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="destroyModalLabel">Confirmação de remoção</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Deseja realmente remover este recurso?
                </div>
                <div class="modal-footer">
                    <form id="id-form-modal-botao-remover" action="" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger" value="Confirmar remoção">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const arrayBtnRemover = document.querySelectorAll(".class-button-destroy");
        const formModalBotaoRemover = document.querySelector("#id-form-modal-botao-remover");
        arrayBtnRemover.forEach(btnRemover => {
            btnRemover.addEventListener("click", configurarBotaoRemoverModal);
        });
        function configurarBotaoRemoverModal(){
            formModalBotaoRemover.setAttribute("action", this.getAttribute("value"));
        }
    </script>

</body>
</html>
@endsection