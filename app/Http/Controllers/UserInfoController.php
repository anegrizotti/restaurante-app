<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Auth;

class UserInfoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function indexMessage($message, $id = null){
        try {
            $userInfo = UserInfo::where('Users_id', $id)->first();
        } catch (\Throwable $th) {
            return view("UserInfo/create")
                ->with("userInfo", null)
                ->with("message", [$th->getMessage(), 'danger']);
        }

        return view("UserInfo/create")->with("userInfo", $userInfo)->with("message", $message);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userInfo = UserInfo::where('Users_id', Auth::user()->id)->first();
        if($userInfo)
            return view("UserInfo/show")->with("userInfo", $userInfo);
        return view("UserInfo/create");
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
            $userInfo = new UserInfo();
            $userInfo->Users_id = 1;
            $userInfo->status = 'A';
            $userInfo->profileImg = $request->profileImg;
            $userInfo->dataNasc = $request->dataNasc;
            $userInfo->genero = $request->genero;
            $userInfo->save();
        }
        catch(\Throwable $th){
            return $this->indexMessage([$th->getMessage(), 'danger']);
        }

        return view("UserInfo/show")->with("userInfo", $userInfo)->with("message", ['Informações do usuário cadastradas com sucesso', 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $userInfo = UserInfo::where('Users_id', $id)->first();

            if(isset($userInfo)){
                return view("UserInfo/show")->with("userInfo", $userInfo);
            }

            return $this->indexMessage(['Informações do usuário não encontradas', 'warning']);
        }
        catch(\Throwable $th){
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
        try{
            $userInfo = UserInfo::where('Users_id', $id)->first();

            if(isset($userInfo)){
                return view("UserInfo/edit")->with("userInfo", $userInfo);
            }

            return $this->indexMessage(['Informações do usuário não encontradas', 'warning']);
        }
        catch(\Throwable $th){
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
        try{
            $userInfo = UserInfo::find($id);

            if(isset($userInfo)){
                $userInfo->profileImg = $request->profileImg;
                $userInfo->dataNasc = $request->dataNasc;
                $userInfo->genero = $request->genero;
                $userInfo->save();

                return view("UserInfo/show")->with("userInfo", $userInfo)->with("message", ['Informações do usuário atualizadas com sucesso', 'success']);
            }

            return $this->indexMessage(['Informações do usuário não encontradas', 'warning']);
        }
        catch(\Throwable $th){
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
            $userInfo = UserInfo::find($id);

            if(isset($userInfo)){
                $userInfo->delete();

                return view("UserInfo/create")->with("message", ['Informações do usuário excluídas com sucesso', 'success']);
            }
            return $this->indexMessage(['Informações do usuário não encontradas', 'warning']);
        }
        catch(\Throwable $th){
            return $this->indexMessage([$th->getMessage(), 'danger']);
        }        
    }
}
