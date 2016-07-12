<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Carro;
use Illuminate\Validation\Factory as Validator;
use App\Models\MarcasCarro;

class CarroController extends Controller
{
    private $request;
    
    private $validator;
    
    private $carro;
    
    public function __construct(Request $request, Validator $validator, Carro $carro) {
        $this->request = $request;
        $this->validator = $validator;
        $this->carro = $carro;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carros = $this->carro->paginate(2);
        $titulo = 'Listagem de Carros';
        
        //sleep(3);
        //return $this->carro->get()->toJson();
        //Busca e retorna todas as marcas, que vai para uma view
        //aonde possui um <select>.
        $marcas = MarcasCarro::lists('nome', 'id');
        
        return view('painel.carros.index', compact('carros', 'titulo', 'marcas'));
    }
    
    public function CarrosAjax()
    {
        return view('painel.carros.list-ajax');
    }
    public function CarrosJson()
    {
        sleep(3);
        return $this->carro->get()->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titulo = "Cadastrar novo Carro";
        
        //Busca e retorna todas as marcas, que vai para uma view
        //aonde possui um <select>.
        $marcas = MarcasCarro::lists('nome', 'id');
        return view('painel.carros.create', compact('titulo', 'marcas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //$carro = new Carro();
        $dadosForm = $this->request->all();
        $validator = $this->validator->make($dadosForm, Carro::$rules);
        if( $validator->fails()){
            $messages = $validator->messages();
            
            $displayErrors = '';
            
            foreach($messages->all() as $error){
                $displayErrors .= $error;
            }
            return $displayErrors;
        }
        //$dadosForm['password'] = Hash::make($dadosForm['password']);
        $this->carro->create($dadosForm);
        
        //dd($request->all());
        return 1;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*
    public function show($id)
    {
        //
    }
     * 
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carro = $this->carro->find($id);
        $marcas = \App\Models\MarcasCarro::lists('id', 'nome');
        return view('painel.carros.edit', compact('id', 'carro', 'marcas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $dadosForm = $this->request->except('_token');
        $rulesEdit = [
            'nome' => 'required|max:255',
            'placa' => "required|min:8|max:8|unique:carros,placa,$id",
            'id_marca' => 'required'
        ];
        $validator = $this->validator->make($dadosForm, $rulesEdit);
        if( $validator->fails()){
            return redirect("carros/editar/$id")
                    ->withErrors($validator)
                    ->withInput();
        }
        $this->carro->where('id', $id)->update($dadosForm);
        return redirect('carros');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carro = $this->carro->find($id);
        $carro->delete();
        return redirect('carros');
    }
    
    public function missingMethod($parameters = array()) {
        return view('errors.404');
    }
}
