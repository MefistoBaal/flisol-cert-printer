<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendee extends Model
{
    protected $table    = 'attendee';
    protected $fillable = ['first_names', 'second_names', 'document_id', 'email', 'phone'];

    public function certs()
    {
        return $this->hasMany('App\UserCert');
    }

    public function document()
    {
        return $this->hasOne('App\Document');
    }
}
