<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $guard = 'admin';
    protected $fillable = ['email', 'password'];
    protected $hidden = ['password'];

    public function voices()
    {
        return $this->hasMany(Voice::class);
    }
}
