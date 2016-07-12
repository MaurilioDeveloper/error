<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $guarded = ['id'];
    
    static $rules = [
            'nome' => 'required|max:255',
            'categoria' => 'required|max:100',
            'valor' => 'required'
    ];
        
}
