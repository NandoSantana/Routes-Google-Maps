<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    //
    public $fillable = ['endereco', 'longitude', 'latitude'];
    protected $table = "info";

}
