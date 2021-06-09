@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Perfil de {{Auth::user()->name}}</div>

                <div class="card-body">

                    <div class="alert alert-success" role="alert">
                        
                        
                        <form action="{{ route('users.edit') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label>Nombre</label>
                            <input type="text" name="name" value="{{Auth::user()->name}}">
                            <label>Apellido</label>
                            <input type="text" name="surname" value ="{{Auth::user()->surname}}">
                            <label>Usuario</label>
                            <input type="text" name="nick" value="{{Auth::user()->nick}}" >
                            <label>Email</label>
                            <input type="email" name="email" value="{{Auth::user()->email}}">
                            <label>Foto de perfil</label>
                            <input type="file" name="avatar">
                        
                            <input type="submit" value="Editar">
                        </form>

                        <a type="button" href="{{action('UsersController@destroy')}}">Borrar cuenta</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
