@extends('layouts.app')
@section('content')
     @include('search')
    <div class="container mt-3">
        <div class="row ">
            @foreach($livres as $livre)

                <div class="col-sm-3 mb-2" >
                    <div class="card" >
                        <img src="{{asset('./uploads/'.$livre->image)}}" class=" card-img-top h-30"  alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$livre->titre}}</h5>
                            <p class="card-text">{{$livre->prix}}DH</p>
                            <a href="{{route('livre.show',$livre->slug)}}" class="btn btn-primary">Voir detaille</a>

                        </div>
                    </div>
                </div>

    @endforeach
@endsection
