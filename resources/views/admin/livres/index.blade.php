@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                @include('layouts.sidebar')
            </div>
            <div class="col-md-8">

                    <a class="btn btn-info " href="{{route('livre.create')}}">Ajouter Livre

                    </a>

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Tire</th>
                        <th>Description</th>
                        <th>auteur</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>In Stock</th>
                        <th>Category</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($livres as $livre)
                        <tr>
                            <td>{{ $livre->id }}</td>
                            <td>{{ $livre->titre}}</td>
                            <td>{{ $livre->description }}</td>
                            <td>{{ $livre->auteur }}</td>
                            <td>
                                <img src="{{asset('./uploads/'.$livre->image)}}"
                                     alt="{{ $livre->titre }}"
                                     width="50"
                                     height="50"
                                     class="img-fluid rounded"
                                >
                            </td>
                            <td>{{ $livre->prix }} DH</td>
                            <td>{{ $livre->inStock }}</td>




                            <td>
                                {{ $livre->category}}
                            </td>
                            <td>
                                <a href="{{route('livre.edit',$livre->slug)}}" class="btn btn-primary">Modifier</a>
                            </td>
                            <td>
                                <form  id="{{$livre->id}}"action="{{route('livre.delete',$livre->slug)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <button onclick="event.preventDefault();
                                    if(confirm('etes vous sur? '))
                                    document.getElementById({{$livre->id}}).submit();" type="submit" class="btn btn-primary">supprimer
                                </button>
                            </td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>
                <hr>
                <div class="justify-content-center d-flex">
                    {{ $livres->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
