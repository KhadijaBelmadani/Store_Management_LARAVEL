@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">

            @if(session('message'))
            <h2 class="alert alert-success">{{ session('message') }}</h2>
            @endif


                <h2  style="color:rgb(255, 166, 0)">Dashboard</h2>



          </div>
          <div class="row">
            <div class="col-md-4">
                <div class="card card-header text-white " style="background-color: rgb(255, 166, 0);font-weight:bold">Les commandes</div>
                <div class="card card-body bg-primary text-white mb-3">
                    <label for="">Total Commandes</label>
                    <h1>{{ $totorder }}</h1>
                    <a href="{{ url('admin/orders') }}" class="btn text-white"
                     style="background-color: rgb(255, 166, 0);width:80px;height:35px;font-weight:bold">
                        Voir
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-header text-white " style="background-color: rgb(255, 166, 0);font-weight:bold">Les commandes</div>
                <div class="card card-body bg-primary text-white mb-3 ">
                    <label for="">Les commandes d'aujourd'hui</label>
                    <h1>{{ $todorder }}</h1>
                    <a href="{{ url('admin/orders') }}" class="btn text-white"
                     style="background-color: rgb(255, 166, 0);width:80px;height:35px;font-weight:bold">
                        Voir
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-header text-white " style="background-color: rgb(255, 166, 0);font-weight:bold">Les commandes</div>
                <div class="card card-body bg-primary text-white mb-3">
                    <label for="">Les commandes de cet mois</label>
                    <h1>{{ $thisMonthOrder }}</h1>
                    <a href="{{ url('admin/orders') }}" class="btn text-white"
                     style="background-color: rgb(255, 166, 0);width:80px;height:35px;font-weight:bold">
                        Voir
                    </a>
                </div>
            </div>


    </div><hr>
    <div class="row">
        <div class="col-md-4">
            <div class="card card-header text-white " style="background-color: rgb(255, 166, 0);font-weight:bold">Users</div>
            <div class="card card-body bg-primary text-white mb-3">
                <label for="">Total Users</label>
                <h1>{{ $totUsers }}</h1>
                <a href="{{ url('admin/users') }}" class="btn text-white"
                 style="background-color: rgb(255, 166, 0);width:80px;height:35px;font-weight:bold">
                    Voir
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-header text-white " style="background-color: rgb(255, 166, 0);font-weight:bold">Users</div>
            <div class="card card-body bg-primary text-white mb-3">
                <label for="">Users</label>
                <h1>{{ $totuser }}</h1>
                <a href="{{ url('admin/users') }}" class="btn text-white"
                 style="background-color: rgb(255, 166, 0);width:80px;height:35px;font-weight:bold">
                    Voir
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-header text-white " style="background-color: rgb(255, 166, 0);font-weight:bold">Users</div>
            <div class="card card-body bg-primary text-white mb-3">
                <label for="">Admins</label>
                <h1>{{ $totadmin }}</h1>
                <a href="{{ url('admin/users') }}" class="btn text-white"
                 style="background-color: rgb(255, 166, 0);width:80px;height:35px;font-weight:bold">
                    Voir
                </a>
            </div>
        </div>

    </div><hr>
    <div class="row">
        <div class="col-md-4">
            <div class="card card-header text-white " style="background-color: rgb(255, 166, 0);font-weight:bold">Catégories</div>
            <div class="card card-body bg-primary text-white mb-3">
                <label for="">Total Catégories</label>
                <h1>{{ $totcat }}</h1>
                <a href="{{ url('admin/category') }}" class="btn text-white"
                 style="background-color: rgb(255, 166, 0);width:80px;height:35px;font-weight:bold">
                    Voir
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-header text-white " style="background-color: rgb(255, 166, 0);font-weight:bold">Produits</div>
            <div class="card card-body bg-primary text-white mb-3">
                <label for="">Total Produits</label>
                <h1>{{ $totprod }}</h1>
                <a href="{{ url('admin/products') }}" class="btn text-white"
                 style="background-color: rgb(255, 166, 0);width:80px;height:35px;font-weight:bold">
                    Voir
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-header text-white " style="background-color: rgb(255, 166, 0);font-weight:bold">Marques</div>
            <div class="card card-body bg-primary text-white mb-3">
                <label for="">Total Marques</label>
                <h1>{{ $totbrands }}</h1>
                <a href="{{ url('admin/brands') }}" class="btn text-white"
                 style="background-color: rgb(255, 166, 0);width:80px;height:35px;font-weight:bold">
                    Voir
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
