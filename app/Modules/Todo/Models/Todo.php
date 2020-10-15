<?php

namespace App\Modules\Todo\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{

    // protected $guarded = [];
    protected $fillable = [
        'title','completed','slug','user_id','description'
    ];

    public function steps()
    {
        return $this->hasMany(step::class);
    }


    public function format()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
//            'created_by' => $this->user
//            'created_at' => $this->created_at->diff
        ];
    }

    /**
     * Get the post that owns the comment.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

//
//    /**
//     * Get the route key for the model.
//     *
//     * @return string
//     */
//    public function getRouteKeyName()
//    {
//        return 'title';
//    }

}
