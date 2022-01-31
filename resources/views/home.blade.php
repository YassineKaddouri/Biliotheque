@extends('layouts.app')
@section('content')
    <div class="container">

            <!-- Carousel -->
            <div id="demo" class="carousel slide" data-bs-ride="carousel">

                <!-- Indicators/dots -->
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>

                </div>

                <!-- The slideshow/carousel -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://cdn.pixabay.com/photo/2019/07/29/04/35/student-4369850_1280.jpg" alt="Los Angeles" class="d-block" style="width:100%;height:500px">
                    </div>
                    <div class="carousel-item">
                        <img src="https://cdn.pixabay.com/photo/2016/08/24/16/20/books-1617327_1280.jpg" alt="Chicago" class="d-block" style="width:100%;height:500px">
                    </div>
                    <div class="carousel-item">
                        <img src="https://cdn.pixabay.com/photo/2014/10/14/20/14/library-488690_1280.jpg" alt="Chicago" class="d-block" style="width:100%;height:500px">
                    </div>
                </div>

                <!-- Left and right controls/icons -->
                <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>

         <div class="container mt-3">
        @include('search')
         </div>
    <div class="row ">
    @foreach($livres as $livre)

        <div class="col-sm-4 mb-2" >

            <div class="card " style="width: 70%;  box-shadow: lightgray 6px 6px 30px;cursor: pointer;" >
                <img src="{{asset('./uploads/'.$livre->image)}}" class="card-img-top img-fluid fade-pulse"   alt="card-img-top"  style="height: 280px" >
                <div class="card-body">
                    <h5 class="card-title">{{$livre->titre}}</h5>
                    <p class="card-text">{{$livre->prix}}DH</p>
                    <p class="card-text">{{$livre->category}}DH</p>
                    <a href="{{route('livre.show',$livre->slug)}}" class="btn btn-secondary"><i class="fas fa-eye"></i></a>

                </div>
            </div>
        </div>

    @endforeach
    </div>
        <div class="d-flex justify-content-center">
            {{$livres->links()}}
        </div>
</div>
    <div class="footer">
        @include('layouts.footer')
    </div>

@endsection

