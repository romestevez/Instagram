@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Fotos subidas recientemente</div>

                <div class="card-body">

                    <div class="alert alert-success" role="alert">
                        
                        
                        <form action="{{ route('instagram.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input type="file" name="imagen">
                            <input type="submit" value="Subir">
                        </form>
                    </div>


                    @foreach ($images as $image)
                        <div class="mb-5">
                            {{$image->user->nick}}
                            <img src="{{ Storage::disk('users')->url($image->image_path) }}" alt="" class="img-fluid">
                            <p class="photo-subtitle">Comments:
                            
                                <form action="{{ route('comment.store', [$image->id]) }}" method="POST" enctype="multipart/form-data" class="row justify-content-center">
                                @csrf
                                
                                    <input type="textarea" name="comentario">
                                    <input type="submit" value="comentar">

                                </form>
                            </p>
                            @foreach ($image->comments()->get() as $comment)
                                
                                <ul>
                                    <li class="comment">{{$comment->content}}
                                    
                                        @if ($comment->user == Auth::user() || $image->user == Auth::user())

                                        <a href="{{action('CommentController@destroy', ['id'=> $comment->id ])}}"><i class="fas fa-trash"></i></i></a>

                                        @endif
                                    </li>
                                </ul>
                               
                                
                            @endforeach
                                
                            @if (Auth::user()->mg($image->id))
                                <a href="{{action('LikeController@destroy', ['id'=> $image->id ])}}"><i class="fas fa-heart"></i></a>
                            @else
                                <a href="{{action('LikeController@store', ['id'=> $image->id ])}}"><i class="far fa-heart"></i></a>
                            @endif

                           {{$image->countlike($image->id)}}
                            
                        </div>
                        
                            
                    @endforeach
                    

                    {{ $images->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
