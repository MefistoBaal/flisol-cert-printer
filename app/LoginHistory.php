<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoginHistory extends Model
{
    protected $table    = 'login_history';
    protected $fillable = ['admin_id', 'ip', 'remote_host', 'so', 'navigator'];
}
