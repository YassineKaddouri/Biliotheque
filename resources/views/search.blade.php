<div class="d-flex justify-content-center">
<form action="{{route('livres.search')}}" class="col-md-4">
    <div class="input-group mb-3 ">
        <select class="form-control" id="exampleFormControlSelect1" name="cat">
            <option value="" disabled selected>Choisir une category</option>
            @foreach($livres as $livre)

                <option>{{$livre->category}}</option>
            @endforeach
        </select>
        <input type="text" class="form-control" name="q" placeholder="Rchercher" >
        <button type="submit"  class="btn btn-primary" id="button-addon2"><i class="fas fa-search"></i></button>
    </div>

</form>

</div>
