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
               Ajouter un livre
           </h3>
   </div>
       <div class="card-body">
           <form method="post" action="{{route('livre.store')}}" enctype="multipart/form-data">
               @csrf
               <div class="mb-3">
                   <label for="exampleFormControlInput1" class="form-label">titre</label>
                   <input type="text" class="form-control" name="titre" id="titre" placeholder="titre">
               </div>
               <div class="mb-3">
                   <label for="exampleFormControlTextarea1" class="form-label">description</label>
                   <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
               </div>
               <div class="mb-3">
                   <label for="exampleFormControlInput1" class="form-label">auteur</label>
                   <input type="text" class="form-control" name="auteur" id="auteur" placeholder="auteur">
               </div>
               <div class="mb-3">
                   <label for="exampleFormControlInput1" class="form-label">image</label>
                   <input type="file" class="form-control" name="image" id="iamge" placeholder="">
               </div>
               <div class="mb-3">
                   <label for="exampleFormControlInput1" class="form-label">prix</label>
                   <input type="text" class="form-control" name="prix" id="prix" placeholder="prix">
               </div>
               <div class="mb-3">
                   <label for="exampleFormControlInput1" class="form-label">category</label>
                   <input type="text" class="form-control" name="category" id="category" placeholder="category">
               </div>
               <div class="mb-3">
                   <label for="exampleFormControlInput1" class="form-label">inStock</label>
                   <input type="text" class="form-control" name="inStock" id="stock" placeholder="stock">
               </div>
               <button class="btn btn-primary"  >Enregister</button>
           </form>
       </div>
    </div>
</div>
</div>
@endsection
