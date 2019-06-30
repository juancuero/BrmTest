@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <div class="row">
                    <div class="col-md-10">
                      <h5><i class="fa fa-list"></i> Shopping Cart</h5>
                    </div>
                    <div class="col-md-2">
                      <a href="{{ route('inventory.create') }}" class="btn btn-primary btn-sm btn-block">
                        <i class="fa fa-plus"></i> New Inventory
                      </a>
                    </div>
                  </div>
                </div>

                <div class="card-body">
                  @foreach ($products as $inventory)   
                    <div class="row">
                      <div class="col-md-2">
                        <img class="img-responsive" src="http://placehold.it/100x70">
                      </div>
                      <div class="col-md-6">
                        <h4 class="product-name"><strong>{{$inventory->product->name}}</strong><small class="text-muted">({{$inventory->quantity}} Units available)</small></h4><h4><small>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.</small></h4>
                      </div>
                      <div class="col-md-4 text-center">
                        <p><b>Lot: </b> {{$inventory->lot}} </p>
                        <p><b>Units: </b> {{$inventory->quantity_original}} </p>
                        <p><b>Price: </b> {{$inventory->price}} </p>
                        <p><b>Expiration date: </b> {{$inventory->expiration}} </p>
                      </div>
                    </div>
                    <hr> 
                  @endforeach
                {{$products->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
@endsection
@endsection
