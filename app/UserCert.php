<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCert extends Model
{
    protected $table    = 'user_certs';
    protected $fillable = ['user_id', 'cert_id', 'rol_id', 'verification_code'];
}
