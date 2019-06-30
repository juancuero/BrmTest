@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                

                <div class="card-body">
                    <div class="row">
                        @foreach ($products as $product)                           
                        <div class="col-md-4">
                          <div class="card mb-4 box-shadow">
                            <img class="card-img-top" alt="{{$product->name}}" src="https://via.placeholder.com/348x225">
                            <div class="card-body">
                              <h3 class="card-text text-center"> {{$product->name}} </h3>
                              <h6 class="card-text text-center"> $ {{$product->price}} </h6>
                              <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                  <a href="{{ route('cart-add', ['product' => $product->id,'price' => $product->price]) }}" class="btn btn-sm btn-success "><i class="fa fa-cart-plus fa-lg"></i> Add to Cart</a>
                                </div>
                                <small class="text-muted">{{$product->total}} Units available</small>
                              </div>
                            </div>
                          </div>
                        </div>
                        @endforeach
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>


@section('scripts')

@endsection
@endsection
