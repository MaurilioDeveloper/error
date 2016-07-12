<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Produto;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::paginate(2);
        $titulo = 'Listagem de Produtos';
        return view('painel.produtos.index', compact('produtos', 'titulo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('painel.produtos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$produto = new Produto();
        $dadosForm = $request->except('file');
        $validator = \Illuminate\Support\Facades\Validator::make($dadosForm, Produto::$rules);
        if( $validator->fails()){
            return redirect('produtos/cadastrar')
                    ->withErrors($validator)
                    ->withInput();
        }
        $file = $request->file('file');
        
        if($request->hasFile('file') && $file->isValid()){
            $file->move('../storage/app', $file->getClientOriginalName());
        }
        Produto::create($dadosForm);
        
        //dd($request->all());
        return redirect('produtos')->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = Produto::find($id);
        return view('painel.produtos.edit', compact('id', 'produto'));
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
        $dadosForm = $request->except('_token');
        $validator = \Illuminate\Support\Facades\Validator::make($dadosForm, Produto::$rules);
        if( $validator->fails()){
            return redirect("produtos/editar/$id")
                    ->withErrors($validator)
                    ->withInput();
        }
        Produto::where('id', $id)->update($dadosForm);
        return redirect('produtos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Produto::find($id);
        $produto->delete();
        return redirect('produtos');
    }
    
    public function missingMethod($parameters = array()) {
        return 'Erro 404, Pagina não encontrada';
    }
}
