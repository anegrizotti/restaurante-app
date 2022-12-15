@extends('layouts.app')

@section('name')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create de Produto</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <form method="POST" action="{{route("produto.store")}}">
            @csrf
            <div class="form-group">
              <label for="idProduto">ID</label>
              <input name="id" type="text" class="form-control" id="idProduto" placeholder="#" disabled>
              <small class="form-text text-muted">Não é necessário informar o ID para cadastrar um novo dado.</small>
            </div>
            <div class="form-group">
                <label for="nomeProduto">Nome</label>
                <input name="nome" type="text" class="form-control" id="nomeProduto" placeholder="Digite o nome do produto...">
            </div>
            <div class="form-group">
                <label for="precoProduto">Preço</label>
                <input name="preco" type="text" class="form-control" id="precoProduto" placeholder="Digite o preço do produto...">
            </div>
            <div class="form-group">
                <label for="tipoProduto">Tipo</label>
                <select name="Tipo_Produtos_id" class="form-select" id="tipoProduto" aria-label="Selecione o tipo de produto">
                    @foreach ($tipoProdutos as $tipoProduto)
                        <option value="{{$tipoProduto->id}}">{{$tipoProduto->descricao}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="ingredientesProduto">Ingredientes</label>
                <input name="ingredientes" type="text" class="form-control" id="ingredientesProduto" placeholder="Digite os ingredientes do produto...">
            </div>
            <div class="form-group">
                <label for="urlImageProduto">urlImage</label>
                <input name="urlImage" type="text" class="form-control" id="urlImageProduto" placeholder="Digite a urlImage do produto...">
            </div>
            <div class="my-1">
                <button type="submit" class="btn btn-primary">Enviar</button>
                <a class="btn btn-primary" href="{{route("produto.index")}}">Voltar</a>
            </div>
        </form>
    </div>
</body>
</html>
@endsection