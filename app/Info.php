<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    //
    public $fillable = ['nome', 'email', 'datanasc', 'cpf', 'endereco', 'cep', 'longitude', 'latitude'];
    protected $table = "info";

}
