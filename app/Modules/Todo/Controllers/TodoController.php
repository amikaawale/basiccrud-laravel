<?php

namespace App\Modules\Todo\Controllers;

//namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\TodoCreateRequest;
use App\Modules\Todo\Models\Todo;
use App\Modules\Todo\Models\Step;
use App\Modules\Todo\Repositories\TodoInterface;
use App\Modules\Todo\Repositories\TodoRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{

    private $todoRepository;

    public function __construct(TodoInterface $todoRepository)
    {
        // $this->middleware('auth');
        $this->todoRepository = $todoRepository;

    }

    public function index()
    {

//        $todos = Todo::all();
       //// $todos = Todo::orderBy('completed','desc')->get();
//        $todos = auth()->user()->todos()->orderBy('completed')->get();


       // $todos = auth()->user()->todos->sortBy('completed');

        $todos = $this->todoRepository->getAllTodos();

        return view('todos.index')->with(['todos' => $todos]);
    }


    public function create()
    {
        return view('todos.create');
    }

    public function edit(Todo $todo)
    {

//        $todo = Todo::find($id);

        return view('todos.edit',compact('todo'));
    }


    public function update(TodoCreateRequest $request, Todo $todo)
    {

     $todo->update(['title' => $request->title,'description' => $request->description]);

        if($request->stepName){
            foreach($request->stepName as $key=>$step){
                $id  = $request->stepId[$key];

                if(!$id){
                    $todo->steps()->create(['name'=> $step]);
                }else{
                    $oldStep = step::find($id);
                    $oldStep->update(['name' => $step]);
                }


            }
        }

     return redirect()->route('todo.index')->with('message','Todo task updated successfully.');

    }

    public function complete(Todo $todo)
    {

        $todo->update(['completed' => true]);

        return redirect()->route('todo.index')->with('message','Task mark as completed.');
    }


    public function incomplete(Todo $todo)
    {

        $todo->update(['completed' => false]);

        return redirect()->route('todo.index')->with('message','Task mark as incompleted.');
    }


    public function delete(Todo $todo)
    {

        if(count($todo->steps) > 0){
            $todo->steps()->each()->delete();
        }
        $todo->delete();
        return redirect()->route('todo.index')->with('message','Deleted successfully.');
    }


    public function show(Todo $todo)
    {
        return view('todos.show',compact('todo'));
    }


    public function store(TodoCreateRequest $request)
    {

//        $request->validate([
//           'title' => 'required|max:255'
//
//        ]);

//        $input = $request->all();
//        $rules = [
//          'title' =>  'required|max:255',
//        ];
//        $messages = [
//
//            'title.max' => 'Todo title should not be greater than 255 chars.'
//        ];
//
//        $validator = Validator::make($input, $rules, $messages);
//
//        if($validator->fails()){
//
//            return redirect()->back()->withErrors($validator)->withInput();
//
//        }

//        $userId = auth()->id();
//        $request['user_id'] = $userId;
//        Todo::create($request->all());


        $todo = auth()->user()->todos()->create($request->all());

        if($request->step){
            foreach($request->step as $step){
                $todo->steps()->create(['name' => $step]);
            }
        }

        return redirect()->route('todo.index')->with('message','Todo task added successfully.');
    }



}
