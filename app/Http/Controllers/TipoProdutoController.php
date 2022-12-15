<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoProduto;
use Illuminate\Support\Facades\DB;

class TipoProdutoController extends Controller
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
            $tipoProdutos = DB::select("SELECT * FROM TIPO_PRODUTOS");
        } catch (\Throwable $th) {
            return view("TipoProduto/index")
                ->with("tipoProdutos", [])
                ->with("message", [$th->getMessage(), 'danger']);
        }
        return view("TipoProduto/index")->with("tipoProdutos", $tipoProdutos);
    }

    public function indexMessage($message){
        try {
            $tipoProdutos = DB::select("SELECT * FROM TIPO_PRODUTOS");
        } catch (\Throwable $th) {
            return view("TipoProduto/index")
                ->with("tipoProdutos", [])
                ->with("message", [$th->getMessage(), 'danger']);
        }
        return view("TipoProduto/index")->with("tipoProdutos", $tipoProdutos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("TipoProduto/create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $tipoProduto = new TipoProduto();
            $tipoProduto->descricao = $request->descricao;
            $tipoProduto->save();
        }
        catch(\Throwable $th){
            return $this->indexMessage([$th->getMessage(), 'danger']);
        }

        return $this->indexMessage(['Tipo de produto cadastrado com sucesso', 'success']);
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
            $tipoProdutoSelecionado = TipoProduto::find($id);

            if(isset($tipoProdutoSelecionado)){
                return view("TipoProduto/show")->with("tipoProdutoSelecionado", $tipoProdutoSelecionado);
            }

            return $this->indexMessage(['O tipo de produto não foi encontrado', 'warning']);
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
            $tipoProdutoSelecionado = TipoProduto::find($id);

            if(isset($tipoProdutoSelecionado)){
                return view("TipoProduto/edit")->with("tipoProdutoSelecionado", $tipoProdutoSelecionado);
            }

            return $this->indexMessage(['O tipo de produto não foi encontrado', 'warning']);
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
            $tipoProduto = TipoProduto::find($id);

            if(isset($tipoProduto)){
                $tipoProduto->descricao = $request->descricao;
                $tipoProduto->save();

                return $this->indexMessage(['Tipo de produto atualizado com sucesso', 'success']);
            }

            return $this->indexMessage(['O tipo de produto não foi encontrado', 'warning']);
        } catch (\Throwable $th) {
            return $this->indexMessage([$th->getMessage(), 'danger']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $tipoProdutoSelecionado = TipoProduto::find($id);
            if(isset($tipoProdutoSelecionado)){
                $tipoProdutoSelecionado->delete();

                return $this->indexMessage(['Tipo de produto removido com sucesso', 'success']);
            }
            return $this->indexMessage(['O tipo de produto não foi encontrado', 'warning']);
        } catch (\Throwable $th) {
            return $this->indexMessage([$th->getMessage(), 'danger']);
        }
    }
}
