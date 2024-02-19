<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;

class Usercontroller extends Controller
{
    public function index(){

        $users = User::withCount('posts')->orderByDesc('posts_count')->paginate(5);
        return view('users.index', compact('users')); 
    }

    public function show ($id)
    {
        $user = User::findOrFail($id);
        $posts = $user->posts()->with('user')->paginate(2);
        
        return view('users.show', compact('user', 'posts'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {

        User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=>$request->password,
        ]);

        return redirect (url('/users'));
    }

    public function edit ($id)
    {
        $user = User::findOrFail($id);

        return view('users.edit',[
            'user' => $user
        ]);
    }

    public function update($id, Request $request)
    {
        user::findOrFail($id)->update([
            'name'=> $request->name,
            'email'=> $request->email,
        ]);
        return redirect (url('/users'));
    }

    public function delete($id){
        user::findOrFail($id)->delete();

        return redirect (url('/users'));
    } 

}
