@extends('layouts.app')
@section('content')


    <!-- <img src="{{ Storage::disk('users')->url($image_id->image_path) }}" > -->

    <form action="{{ route('comment.store', ['id'=> $image_id ]) }}" method="POST" enctype="multipart/form-data" class="row justify-content-center">
    @csrf
    
        <input type="textarea" name="comentario">
        <input type="submit" value="comentar">

    </form>
@endsection