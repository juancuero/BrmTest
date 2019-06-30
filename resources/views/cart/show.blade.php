@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <div class="row">
                    <div class="col-md-8">
                      <h5><i class="fa fa-shopping-cart"></i> Shopping Cart</h5>
                    </div>
                    <div class="col-md-4">
                      <a href="{{ url('/') }}" class="btn btn-primary btn-sm btn-block">
                        <i class="fa fa-reply"></i> Continue shopping
                      </a>
                    </div>
                  </div>
                </div>

                <div class="card-body">
                  @foreach ($cart as $product)   
                    <div class="row">
                      <div class="col-md-2">
                        <img class="img-responsive" src="http://placehold.it/100x70">
                      </div>
                      <div class="col-md-4">
                        <h4 class="product-name"><strong>{{$product->name}}</strong></h4><h4><small>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.</small></h4>
                      </div>
                      <div class="col-md-6 ">
                        <div class="row">
                          <div class="col-md-4 text-center">
                            <input type="text" class="form-control input-sm col-md-8" value="$ {{$product->price}}" readonly>
                          </div>
                          <div class="col-md-2 ">
                            <h2><span class="text-muted">x</span></h2>
                          </div>
                          <div class="col-md-4 text-center">
                            <input type="text" class="form-control input-sm col-md-8" value="1" >
                          </div>
                          <div class="col-md-2">
                            <button type="button" class="btn btn-danger btn-xs">
                              <i class="fa fa-trash-o"></i>
                            </button>
                          </div>
                        </div>  
                      </div>
                    </div>
                    <hr> 
                  @endforeach
                </div>
                <div class="card-footer">
                  <div class="row text-center">
                    <div class="col-md-9">
                      <h4 class="text-right">Total <strong>$50.00</strong></h4>
                    </div>
                    <div class="col-md-3">
                      <button type="button" class="btn btn-success btn-block">
                        <i class="fa fa-share"></i> Checkout
                      </button>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')

@endsection
@endsection
