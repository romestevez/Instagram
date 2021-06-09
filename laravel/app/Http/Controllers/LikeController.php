<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Images;
use App\Comment;
use App\Like;

class LikeController extends Controller
{
    
    public function store(Request $request, $image_id )
    {
        
        $like = new Like();
        $like->image_id = $image_id;
        $like->user_id = $request->user()->id;
        $like->save();
        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    public function destroy(Request $request, $image_id)
    {
        $image_id = Like::where([['image_id', $image_id], ['user_id', $request->user()->id]])->delete();
        return redirect('home');
    }
}
