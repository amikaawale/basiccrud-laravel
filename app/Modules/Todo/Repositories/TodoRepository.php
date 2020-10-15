<?php

namespace App\Modules\Todo\Repositories;


use App\Modules\Todo\Models\Todo;
use Illuminate\Support\Facades\Auth;

class TodoRepository implements TodoInterface
{


    public function getTodoById($id)
    {
        return Todo::find($id);
    }


    public function getAllTodos()
    {
       return   $todos = auth()->user()->todos->sortBy('completed');
    }

    public function getFormattedTodos()
    {
        return Todo::orderBy('title')
                ->where('completed',1)
                ->with('user')
                ->get()
                ->map(function ($todo){
//                    return $todo->format();
                    return $this->format($todo);
                });

    }

    public function format($todo)
    {
         return [
           'id' => $todo->id,
            'title' => $todo->title
         ];
    }


    public function test()
    {
        
    }


}