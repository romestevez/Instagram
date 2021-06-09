<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Image;
use App\Comment;
use App\Like;
/*Este controlador es solo para las imagenes*/
class InstagramController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = new Image();
        $image->user_id = $request->user()->id;
        $image->image_path = $request->file('imagen')->store('images', 'users');
        $image->description = \Str::random(random_int(20, 60));
        $image->save();

        return redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($image_id)
    {

        Image::where('id', $image_id)->delete();
        return redirect('home');
    }
}
