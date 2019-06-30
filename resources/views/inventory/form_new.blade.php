@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">New Delivery</div>

                <div class="card-body">
                    <form action="{{ route('inventory.store') }}" method="POST">
                     {{csrf_field()}}
                     <section>
                         <div class="panel panel-header"></div>
                         <div class="panel panel-content" >
                             <table class="table table-bordered">
                                 <thead>
                                     <tr>
                                         <th width="25%">Product Name</th>
                                         <th>Lot</th>
                                         <th width="10%">Quantity</th>
                                         <th>Price (COP)</th>
                                         <th width="10%">Expiration</th>
                                         <th>Total Product</th>
                                         <th><a href="#" class="addRow" onclick="addRow();"><i class="fa fa-plus"></i> New row</a></th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <tr>
                                     <td>
                                            <select id="select-products" class="form-control" required name="product_id[]">
                                                    <option value=""> Select product </option>
                                                @foreach($products as $product)
                                                    <option value="{{$product->id}}"> {{$product->name}} </option>
                                                @endforeach
                                            </select>
                                     </td>
                                     <td><input type="number" name="lot[]" class="form-control" required></td>    
                                       <td><input type="number" name="quantity[]" class="form-control quantity" required=""></td>
                                       <td><input type="number" name="price[]" class="form-control price" required></td>
                                       <td><input type="date" name="expiration[]" class="form-control" required></td>
                                       <td><input type="number" name="totalProduct[]" class="form-control totalProduct" readonly></td>
                                     <td><a href="#" class="btn btn-danger remove"><i class="fa fa-trash"></i></a></td>
                                     </tr>
                                     </tr>
                                 </tbody>
                                 <tfoot>
                                     <tr>
                                         <td style="border: none"></td>
                                         <td style="border: none"></td>
                                         <td style="border: none"></td>
                                         <td style="border: none"></td>
                                         <td>Total</td>
                                         <td><b class="total"></b> </td>
                                         <td><input type="submit" value="Deliver products" class="btn btn-success"></td>
                                     </tr>
                                 </tfoot>
                             </table>
                         </div>
                     </section>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@section('scripts')
<script src="{{ asset("/js/mi_js.js")}}"></script>
@endsection
@endsection
