@extends('layouts.app')
@section('content')
<div class="row my-4">

    <div class="col-md-8 mx-auto">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-center">
                    Modifier un livre
                </h3>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('livre.update',$livre->slug)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">titre</label>
                        <input type="text" class="form-control" name="titre" id="titre" placeholder="titre"
                          value="{{$livre->titre}}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">description</label>
                        <textarea class="form-control" name="description"  value="{{$livre->description}}" id="exampleFormControlTextarea1" rows="3"> </textarea>

                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">auteur</label>
                        <input type="text" class="form-control" name="auteur" id="auteur" placeholder="auteur" value="{{$livre->auteur}}"
                        >
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">image</label>
                        <input type="file" class="form-control" name="image" id="iamge" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">prix</label>
                        <input type="text" class="form-control" name="prix" id="prix" placeholder="prix" value="{{$livre->prix}}">
                    </div>
                    <button class="btn btn-primary" type="submit">Modifier</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
