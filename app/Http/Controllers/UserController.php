<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{

    public function uploadAvatar(Request $request){

        if($request->hasFile('image')){

            User::uploadAvatar($request->image);
//            session()->put('message','Image Uploaded');
//            $request->session()->flash('message','Images uploaded.');
//            return redirect()->back();

             return redirect()->back()->with('message','Image uploaded.');
        }

        $request->session()->flash('error','Images not uploaded.');
        return redirect()->back();

    }




    public function index(){



    // 1. using raw query
    // insert     
    // DB::insert('insert into users (name,email,password)
    // values(?,?,?)', [
    //   'admin','admin@gmail.com','admin'
    // ]);

    // read
    // $users = DB::select('select * from users');

    // update
    // DB::update('update users set name = ? where id = 1',[
    //     'amika'
    // ]);
 
    // delete
    // $users = DB::select('select * from users');


    // 2. using eloquent ORM
    // delete
    // DB::delete('delete from users where id = 1');
    // $users = DB::select('select * from users');

    // return $users;

    // $user = new User();
    // $user->name = 'admin';
    // $user->email = 'admin@gmail.com';
    // $user->password = bcrypt('admin');
    // $user->save();

    // User::where('id',2)->delete();

    // User::where('id',3)->update(['name' => 'amikaaa']);
    // $users = User::all();

    // 3. eloquent short form

    // $data = [
    //   'name' => 'aarish',
    //   'email' => 'aarish@gmail.com',
    //   'password' => 'aarish'
    // ];
    // User::create($data);


    $users = User::all();
    return $users;

    

    return view('home');

    }
}
