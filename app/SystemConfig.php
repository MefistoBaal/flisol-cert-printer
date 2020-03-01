<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SystemConfig extends Model
{
    protected $table    = 'system_config';
    protected $fillable = ['title_site', 'icon_site'];
}
