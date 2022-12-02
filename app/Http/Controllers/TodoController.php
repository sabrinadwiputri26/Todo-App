<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function new(){
        return view('new');
    }
    public function register()
    {
        return view('dashboard.register');
    } 

    public function index()
    {
        return view('dashboard.login');
    }

    public function login()
    {
        return view('dashboard.login');
    }
    
    public function dashboard()
    {
        $todo = Todo::where('user_id', '=', Auth::user()->id)->get();
        return view('dashboard.dashboard', compact('todo'));
    }

    public function createtodo()
    {

        return view('dashboard.createtodo');
    }

    public function loginAccount(Request $request)
    {
        $request->validate([
            'username' => 'required|exists:users,username',
            'password' => 'required'
        ],[
            'username.exists' => 'username belum terdaftar',
            'username.required' => 'username harus diisi',
            'password.required' => 'password harus diisi',
        ]);
        $user = $request->only('username', 'password');
        if (Auth::attempt($user)){
            return redirect('/dashboard/dashboard');
        } else {
            return redirect()->back()->with('error', 'Gagal login, silakan cek dan coba lagi!');}
}

    public function registerAccount(Request $request)
    {
    //    dd($request->all());
        $request->validate([
            'email' => 'required|email:dns|unique:users',
            'username' => 'required|min:4|max:8|unique:users',
            'password' => 'required|min:4',
            'name' => 'required|min:3',
        ]);
        User::create([
            'name'=> $request->name,
            'username'=> $request->username,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
        ]);
        return redirect('/')->with('success', 'Berhasil menambahkan akun!! silakan login');
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function store(Request $request)
     {
        //dd($request->all());

        //validasi data
        $request->validate([
            'title' => 'required|min:5',
            'date' => 'required',
            'description' => 'required|min:8',
        ]);
        Todo::create([
                'title' => $request->title,
                'date' => $request->date,
                'description' => $request->description,
                'status' => 0,
                'user_id' => Auth::user()->id,
        ]);
        return redirect('/dashboard/dashboard ')->with('succesAdd', 'Berhasil menambahkan data Todo');
     }
    public function complated()
    {
        return view('complated');
    }
    public function updateComplated($id)
    {
        Todo::where('id', '=', $id)->update([
            'status'=> 1,
            'done_time' => \Carbon\Carbon::now(),
        ]);
        return redirect()->back()->with('done','berhasil, todo telah selesai dikerjakan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item =Todo::where('id' ,$id)->first();
        return view('dashboard.edit' ,compact ('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|min:5',
            'date' => 'required',
            'description' => 'required|min:8',
        ]);
        $todo = Todo::find($id)->update($validated);
        return redirect(route('dashboard')); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
{
        Todo::where('id', '=', $id)->delete();
        return redirect('/dashboard/dashboard')->with('successdelete', "Berhasil menghapus");
    }
}
