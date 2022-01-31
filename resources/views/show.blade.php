
@extends('layouts.app')
@section('content')

        <div class="container-fluid">


        </div>
        <div class="container">

        <div class="row">
<div class="col-md-8" >
        <div class="card" >
            <img src="{{asset('./uploads/'.$livre->image)}}" class="card-img-top"  alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$livre->titre}}</h5>
                <p class="card-text">{{$livre->prix}}DH</p>
            </div>

        </div>
    </div>
    <div class="col-md-4">
        <form action="{{ route("add.cart",$livre->id) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="qty" class="label-input">
                    Qty :
                </label>
                <input type="number" name="qte" id="qte"
                       value="1"
                       placeholder="Quantité"
                       max="{{ $livre->inStock }}"
                       min="1"
                       class="form-control"
                >
            </div>
            <div class="form-group pt-2">
                <button type="submit" class="btn text-white btn-block bg-dark">
                    <i class="fa fa-shopping-cart"></i>
                    Add to cart
                </button>
            </div>
        </form>
        <div class="mt-5">
            <div class="card">
                <div class="card-header">
                    Description
                </div>
            <div class="card-body">
            {{$livre->description}}
            </div>
            </div>
        </div>
    </div>

</div>

@endsection



