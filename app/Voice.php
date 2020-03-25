<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Voice extends Model
{
    use SoftDeletes;
    protected $fillable = ['admin_id' , 'name' , 'url'];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
