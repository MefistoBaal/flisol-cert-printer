<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cert extends Model
{
    protected $table    = 'cert';
    protected $fillable = ['cert_title', 'celebrated_on', 'year'];

    public function rol(){
        return $this->hasOne('App\Rol');
    }
}
