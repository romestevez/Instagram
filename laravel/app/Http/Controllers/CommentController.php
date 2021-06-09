<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\User;
use App\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
   
    public function store(Request $request, $image_id )
    {
        //
        $comment = new Comment();
        $comment->image_id = $image_id;
        $comment->user_id = $request->user()->id;
        $comment->content = $request->get('comentario');
        $comment->save();
        return redirect('home');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($comment)
    {
    
        Comment::where('id', $comment)->delete();

        return redirect('home');

    }
}
