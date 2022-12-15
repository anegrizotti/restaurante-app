@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit de Endereco</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="form-group">
            <label for="idEndereco">ID</label>
            <input name="id" type="text" class="form-control" id="idEndereco" placeholder="#" value="{{$enderecoSelecionado->id}}" disabled>
            <small class="form-text text-muted">Não é necessário informar o ID para cadastrar um novo dado.</small>
            </div>
            <div class="form-group">
                <label for="bairroEndereco">Bairro</label>
                <input name="bairro" type="text" class="form-control" id="bairroEndereco" value="{{$enderecoSelecionado->bairro}}" disabled>
            </div>
            <div class="form-group">
                <label for="logradouroEndereco">Logradouro</label>
                <input name="logradouro" type="text" class="form-control" id="logradouroEndereco" value="{{$enderecoSelecionado->logradouro}}" disabled>
            </div>
            <div class="form-group">
                <label for="numeroEndereco">Número</label>
                <input name="numero" type="text" class="form-control" id="numeroEndereco" value="{{$enderecoSelecionado->numero}}" disabled>
            </div>
            <div class="form-group">
                <label for="complementoEndereco">Complemento</label>
                <input name="complemento" type="text" class="form-control" id="complementoEndereco" value="{{$enderecoSelecionado->complemento}}" disabled>
            </div>
            <div class="my-1">
                <button type="submit" class="btn btn-primary">Enviar</button>
                <a class="btn btn-primary" href="{{route("endereco.index")}}">Voltar</a>
        </div>
    </div>
</body>
</html>
@endsection