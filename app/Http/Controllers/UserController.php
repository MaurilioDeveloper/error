<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Validation\Factory as Validator;

class UserController extends Controller
{
    private $request;
    
    private $validator;
    
    private $user;
    
    public function __construct(Request $request, Validator $validator, User $user) {
        $this->request = $request;
        $this->validator = $validator;
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->user->paginate(2);
        $titulo = 'Listagem de Users';
        $status = "";
        
        if($this->request->session()->has('status')){
            $status = $this->request->session()->get('status');
        }
        return view('painel.users.index', compact('users', 'titulo', 'status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('painel.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //$user = new User();
        $dadosForm = $this->request->all();
        $validator = $this->validator->make($dadosForm, User::$rules);
        if( $validator->fails()){
            return redirect('users/cadastrar')
                    ->withErrors($validator)
                    ->withInput();
        }
        //$dadosForm['password'] = Hash::make($dadosForm['password']);
        $dadosForm['password'] = bcrypt($dadosForm['password']);
        $this->user->create($dadosForm)->save();
        $status = "Usuario ".$dadosForm['name']." Cadastrado com sucesso";
        $this->request->session()->flash('status', $status);
        
        //dd($request->all());
        return redirect('users')->withInput();
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
        $user = $this->user->find($id);
        return view('painel.users.edit', compact('id', 'user'));
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
        $validator = $this->validator->make($dadosForm, User::$rules);
        if( $validator->fails()){
            return redirect("users/editar/$id")
                    ->withErrors($validator)
                    ->withInput();
        }
        $this->user->where('id', $id)->update($dadosForm);
        return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->user->find($id);
        $user->delete();
        return redirect('users');
    }
    
    public function missingMethod($parameters = array()) {
        return view('errors.404');
    }
}
