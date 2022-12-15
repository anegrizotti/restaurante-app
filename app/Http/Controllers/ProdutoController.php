<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $produtos = DB::select(
                "SELECT produtos.id as id,
                        produtos.nome as nome,
                        produtos.preco as preco,
                        tipo_produtos.descricao as descricao
                FROM PRODUTOS
                JOIN TIPO_PRODUTOS ON produtos.Tipo_Produtos_id = tipo_produtos.id;"
            );
        } catch (\Throwable $th) {
            return view("Produto/index")
                ->with("produtos", [])
                ->with("message", [$th->getMessage(), 'danger']);
        }
        return view("Produto/index")->with("produtos", $produtos);
    }

    public function indexMessage($message){
        try {
            $produtos = DB::select(
                "SELECT produtos.id as id,
                        produtos.nome as nome,
                        produtos.preco as preco,
                        tipo_produtos.descricao as descricao
                FROM PRODUTOS
                JOIN TIPO_PRODUTOS ON produtos.Tipo_Produtos_id = tipo_produtos.id;"
            );
        } catch (\Throwable $th) {
            return view("Produto/index")
                ->with("produtos", [])
                ->with("message", [$th->getMessage(), 'danger']);
        }
        return view("Produto/index")->with("produtos", $produtos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoProdutos = DB::select("SELECT * FROM TIPO_PRODUTOS");
        return view("Produto/create")->with("tipoProdutos", $tipoProdutos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $produto = new Produto();
            $produto->nome = $request->nome;
            $produto->preco = $request->preco;
            $produto->Tipo_Produtos_id = $request->Tipo_Produtos_id;
            $produto->ingredientes = $request->ingredientes;
            $produto->urlImage = $request->urlImage;
            $produto->save();
        } catch (\Throwable $th) {
            return $this->indexMessage([$th->getMessage(), 'danger']);
        }

        return $this->indexMessage(['Produto cadastrado com sucesso', 'success']);
        // return \Redirect::route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $produtoSelecionado = DB::select(
                "SELECT produtos.id,
                        produtos.nome,
                        produtos.preco,
                        produtos.ingredientes,
                        produtos.urlImage,
                        tipo_produtos.descricao
                FROM PRODUTOS
                JOIN TIPO_PRODUTOS ON produtos.Tipo_Produtos_id = tipo_produtos.id
                WHERE produtos.id = $id;"
            );

            if(isset($produtoSelecionado)){
                return view("Produto/show")->with("produtoSelecionado", $produtoSelecionado[0]);
            }

            return $this->indexMessage(['O produto não foi encontrado', 'warning']);
        } catch (\Throwable $th) {
            return $this->indexMessage([$th->getMessage(), 'danger']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $produtoSelecionado = DB::select(
                "SELECT produtos.id,
                        produtos.nome,
                        produtos.preco,
                        produtos.ingredientes,
                        produtos.urlImage,
                        tipo_produtos.id as tipo_produto_id,
                        tipo_produtos.descricao
                FROM PRODUTOS
                JOIN TIPO_PRODUTOS ON produtos.Tipo_Produtos_id = tipo_produtos.id
                WHERE produtos.id = $id;"
            );

            if(isset($produtoSelecionado)){
                $tipoProdutos = TipoProduto::all();

                return view("Produto/edit")
                    ->with("produtoSelecionado", $produtoSelecionado[0])
                    ->with("tipoProdutos", $tipoProdutos);
            }

            return $this->indexMessage(['O produto não foi encontrado', 'warning']);
        } catch (\Throwable $th) {
            return $this->indexMessage([$th->getMessage(), 'danger']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $produto = Produto::find($id);

            if(isset($produto)) {
                $produto->nome = $request->nome;
                $produto->preco = $request->preco;
                $produto->ingredientes = $request->ingredientes;
                $produto->urlImage = $request->urlImage;
                $produto->Tipo_Produtos_id = $request->Tipo_Produtos_id;
                $produto->update();

                return $this->indexMessage(["Produto atualizado com sucesso", "success"]);
            }

            return $this->indexMessage(['O produto não foi encontrado', 'warning']);
        } catch (\Throwable $th) {
            return $this->indexMessage([$th->getMessage(), 'danger']);
        }
        // return \Redirect::route('produto.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $produto = Produto::find($id);

            if( isset($produto) ) {
                $produto->delete();

                return $this->indexMessage( ["Produto removido com sucesso", "success"] );
            }
            return $this->indexMessage( ["O produto não foi encontrado", "warning"] );
        } catch (\Throwable $th) {
            return $this->indexMessage( [$th->getMessage(), "danger"] );
        }
    }
}
