<?php

namespace App\Modules\Todo\Models;

use Illuminate\Database\Eloquent\Model;

class step extends Model
{

    // protected $guarded = [];
    protected $fillable = [
        'name','todo_id'
    ];


}
