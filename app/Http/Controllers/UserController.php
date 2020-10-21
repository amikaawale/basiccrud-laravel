<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{

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


//    $users = User::all();
      $users = User::orderBy('id','desc')->get();

    return view('user.index',compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->ajax()){
            $role = Role::where('id',$request->role_id)->first();
            $permissions = $role->permissions;

            return  $permissions;

        }

        $roles = Role::all();
        return view('user.create',['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the fields
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users|email|max:255',
            'password' => 'required|between:8,255|confirmed',
            'password_confirmation' => 'required'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        if($request->role != null) {
            $user->roles()->attach($request->role);
            $user->save();
        }

        if($request->permissions != null) {
             foreach ($request->permissions as $permission){
                 $user->permissions()->attach($permission);
                 $user->permissions();
                 $user->save();
             }
        }

        return redirect()->route('user.index')->with('message','User is successfully created.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('user.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::get();
        $userRole = $user->roles->first();
        if($userRole != null){
            $rolePermissions = $userRole->allRolePermissions;
        }else{
            $rolePermissions = null;
        }
        $userPermissions = $user->permissions;

        // dd($rolePermission);

        return view('user.edit', [
            'user'=>$user,
            'roles'=>$roles,
            'userRole'=>$userRole,
            'rolePermissions'=>$rolePermissions,
            'userPermissions'=>$userPermissions
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        //validate the fields
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password != null){
            $user->password = Hash::make($request->password);
        }
        $user->save();

        $user->roles()->detach();
        $user->permissions()->detach();

        if($request->role != null){
            $user->roles()->attach($request->role);
            $user->save();
        }

        if($request->permissions != null){
            foreach ($request->permissions as $permission) {
                $user->permissions()->attach($permission);
                $user->save();
            }
        }

        return redirect()->route('user.index')->with('message','User updated successfull.');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('user.index')->with('message','User deleted successfully.');
    }

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





}
