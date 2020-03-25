<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Verification extends Model
{
    protected $fillable = ['code' , 'used'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
