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
                                         <th>Product Name</th>
                                         <th>Lot</th>
                                         <th>Quantity</th>
                                         <th>Price (COP)</th>
                                         <th>Expiration</th>
                                         <th>Total Product</th>
                                         <th><a href="#" class="addRow" onclick="addRow();"><i class="fa fa-plus"></i> New</a></th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <tr>
                                     <td><input type="text" name="product_id[]" class="form-control" required=""></td>
                                     <td><input type="text" name="lot[]" class="form-control"></td>    
                                       <td><input type="text" name="quantity[]" class="form-control quantity" required=""></td>
                                       <td><input type="text" name="price[]" class="form-control price"></td>
                                       <td><input type="date" name="expiration[]" class="form-control"></td>
                                       <td><input type="text" name="totalProduct[]" class="form-control totalProduct"></td>
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
