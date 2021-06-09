<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use App\User;
use App\Comment;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Request $request)
    {
        // $user = User::find($request->user()->id);
        $images = $request->user()->images()->orderBy('created_at', 'DESC')->paginate(2);


        return view('perfil', [
            'images' => $images,
        ]);
    }

    public function edit()
    {
        return view('editarPerfil');
    }

    public function update(Request $request)
    {   
        $user = $request->user();
        $user->name = $request->get('name');
        $user->surname = $request->get('surname');
        $user->nick = $request->get('nick');
        $user->email = $request->get('email');
        if ($request->hasFile('avatar')) {
            $user->avatar = $request->file('avatar')->store('images-avatar', 'users');
        }

        $user->save();

        return redirect()->route('users.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

       User::where('id', $request->user()->id)->delete();

       return redirect('login');

    }
}
