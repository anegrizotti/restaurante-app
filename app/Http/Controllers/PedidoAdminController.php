<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PedidoAdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('PedidoAdmin/index');
    }
    
    public function getPedidos()
    {
        $pedidos = DB::select('SELECT * FROM Pedidos ORDER BY Pedidos.id DESC');
        $response["success"] = true;
        $response["message"] = "Consulta de tipo realizada com sucesso";
        $response["return"] = $pedidos;
        return response()->json($response, 200);
    }

    public function getProdutos($id){
        $produtos = DB::select("SELECT * FROM Produtos WHERE Produtos.Tipo_Produtos_id = ?", [$id]);
        $response["success"] = true;
        $response["message"] = "Consulta de tipo realizada com sucesso";
        $response["return"] = $produtos;
        return response()->json($response, 200);
    }  
    
    public function getPedidoProdutos($id){
            $produtos = DB::select("SELECT * FROM pedido_produtos INNER JOIN produtos ON pedido_produtos.Produtos_id = produtos.id INNER JOIN tipo_produtos ON produtos.Tipo_Produtos_id = tipo_produtos.id WHERE pedido_produtos.Pedidos_id = ?", [$id]);
            $response["success"] = true;
            $response["message"] = "Consulta de tipo realizada com sucesso";
            $response["return"] = $produtos;
            return response()->json($response, 200);
    }  

    public function getTipoProdutos() {
        $tipoProdutos = DB::select('SELECT * FROM Tipo_Produtos');
        $response["sucess"] = true;
        $response["message"] = "Consulta de tipo realizada com sucesso";
        $response["return"] = $tipoProdutos;
        return response()->json($response, 200);
    }
}
