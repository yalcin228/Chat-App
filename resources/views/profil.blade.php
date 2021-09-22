@extends('layouts.app')


@section('content')
    <div class="container">
        <h3 class="text-center">Profil Səhifəsi</h3>

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $item)
                    <li>{{$item}}</li>
                 @endforeach
            </div>
        @endif

        <form action="" method="post" enctype="multipart/form-data" > 
            @method('PUT')      
            @csrf

            <div class="mb-3">
                <label for="age">Yaş</label>
                <input type="number" class="form-control" id="age" name="age" value="{{auth()->user()->age}}" >
            </div>
            <div class="mb-3">
                <label for="age">Mövcüd profil şəkli</label><br>
                <img src="{{asset('storage').'/profile/'.auth()->user()->image}}" style="height: 70px;with:70px;" alt="">
            </div>
            <div class="input-group mb-3">
                <input type="file" name="image" class="form-control" id="inputGroupFile02">
                <label class="input-group-text" for="inputGroupFile02">Şəkil yenilə</label>
            </div>
        

            <button type="submit" class="btn btn-primary">Məlumatları Yenilə</button>
        </form>
    </div>
@endsection