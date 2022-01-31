@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center">Gestion des Livres et Commandes</h2>

        <div class="row justify-content-center">
            <div class="col-md-4">
                <a href="{{ route("admin.livres") }}" style="text-decoration: none">
                    <div class="card bg-primary text-white">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <h3>Livres</h3>
                            <span class="font-weight-bold">
                            {{ $livres->count() }}
                        </span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route("admin.orders") }}" style="text-decoration: none">
                    <div class="card bg-danger text-white">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <h3>Commandes</h3>
                            <span class="font-weight-bold">
                            {{ $orders->count() }}
                        </span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection

