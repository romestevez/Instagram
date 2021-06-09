<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\Comment;
use App\Like;
use App\User;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // $request->user()->images->count(),
        // Image::where('user_id', $request->user()->id)->count(),

        // dd(Image::where('user_id', 2)->count());
        $images = Image::orderBy('created_at', 'DESC')->paginate(10);
        
       
     

        return view('home', [
            'total_images' => Image::count(),
            // 'total_my_images' => Image::where('user_id', $request->user()->id)->count(),
            'images' => $images,
            // 'user' => User::orderBy('created_at', 'DESC'),
           
        ]);
    }
}