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
        @csrf

        <div class="form-group">
            <label for="idProduto">ID</label>
            <input name="id" type="text" class="form-control" id="idProduto" placeholder="#" value="{{$produtoSelecionado->id}}" disabled>
        </div>
        <div class="form-group">
            <label for="nomeProduto">Nome</label>
            <input name="nome" type="text" class="form-control" id="nomeProduto" placeholder="Digite o nome do produto..." value="{{$produtoSelecionado->nome}}" disabled>
        </div>
        <div class="form-group">
            <label for="precoProduto">Preço</label>
            <input name="preco" type="text" class="form-control" id="precoProduto" placeholder="Digite o preço do produto..." value="{{$produtoSelecionado->preco}}" disabled>
        </div>
        <div class="form-group">
            <label for="tipoProduto">Tipo</label>
            <input name="Tipo_Produtos_id" type="text" class="form-control" id="tipoProduto" placeholder="Selecione o tipo de produto" value="{{$produtoSelecionado->descricao}}" disabled>
        </div>
        <div class="form-group">
            <label for="ingredientesProduto">Ingredientes</label>
            <input name="ingredientes" type="text" class="form-control" id="ingredientesProduto" placeholder="Digite os ingredientes do produto..." value="{{$produtoSelecionado->ingredientes}}" disabled>
        </div>
        <div class="form-group">
            <label for="urlImageProduto">urlImage</label>
            <br>
            {{-- <input name="urlImage" type="text" class="form-control" id="urlImageProduto" placeholder="Digite a urlImage do produto..." value="{{$produtoSelecionado->urlImage}}" disabled> --}}
            <img src="{{$produtoSelecionado->urlImage}}" width="20%" height="20%" alt="Imagem do Produto">
        </div>
        <div class="my-1">
            <a class="btn btn-primary" href="{{route("produto.index")}}">Voltar</a>
        </div>
    </div>
</body>
</html>
@endsection