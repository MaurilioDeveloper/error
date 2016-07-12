<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Carro extends Model
{
    use \Illuminate\Database\Eloquent\SoftDeletes;
    
    protected $visible = ['nome', 'placa', 'created_at'];
    protected $dates = ['deleted_at'];
    protected $table = 'carros';
    protected $guarded = ['id'];
    
    static $rules = [
            'nome' => 'required|max:255',
            'placa' => 'required|min:8|max:8|unique:carros',
            'id_marca' => 'required'
    ];
    
    /*
    public function getNomeAttribute($nome)
    {
        return strtoupper($nome);
    }
    
     * 
     */
    public function getChassi()
    {
        return $this->hasOne('\App\Models\CarrosChassi', 'id');
    }
    
    public function getMarca()
    {
        return $this->hasMany('\App\Models\MarcasCarro', 'id', 'id_marca');
    }
    
    public function getLigaCores()
    {
        return $this->belongsToMany('\App\Models\CoresCarro', 'liga_cores_carros',  'id', 'id');
    }
}
