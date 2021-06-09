@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <img src="{{ Storage::disk('users')->url(Auth::user()->avatar) }}" alt="" width="400px" height="400px" class="rounded-circle img-fluid">

            <div class="card">
                <div class="card-header">Perfil de {{Auth::user()->name}}</div>
                <div class="card-body">

                

                    @foreach ($images as $image)
                        <div class="mb-5">
                            <img src="{{ Storage::disk('users')->url($image->image_path) }}" alt="" class="img-fluid">
                            <a href="{{action('InstagramController@destroy', ['id'=> $image->id ])}}"><i class="fas fa-trash-alt"></i></a>
                        </div>
                        @foreach ($image->comments()->take(3)->get() as $comment)
                                
                                <ul>
                                    <li class="comment">{{$comment->content}}</li>
                                </ul>
                        @endforeach
                    @endforeach

                    {{ $images->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
