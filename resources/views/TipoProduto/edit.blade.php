@extends('layouts.app')

@section('name')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit de TipoProduto</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <form method="POST" action="{{route("tipoproduto.update", $tipoProdutoSelecionado->id)}}">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="idTipoProduto">ID</label>
              <input name="id" type="text" class="form-control" id="idTipoProduto" placeholder="#" value="{{$tipoProdutoSelecionado->id}}" disabled>
              <small class="form-text text-muted">Não é necessário informar o ID para cadastrar um novo dado.</small>
            </div>
            <div class="form-group">
                <label for="descricaoTipoProduto">Descrição</label>
                <input name="descricao" type="text" class="form-control" id="descricaoTipoProduto" placeholder="Digite a descrição do produto..." value="{{$tipoProdutoSelecionado->descricao}}">
            </div>
            <div class="my-1">
                <button type="submit" class="btn btn-primary">Enviar</button>
                <a class="btn btn-primary" href="{{route("tipoproduto.index")}}">Voltar</a>
            </div>
        </form>
    </div>
</body>
</html>
@endsection