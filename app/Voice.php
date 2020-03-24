<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Voice extends Model
{
    use SoftDeletes;
    protected $fillable = ['user_id' , 'name' , 'url'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
