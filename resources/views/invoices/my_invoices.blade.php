@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Shoppings</div>

                <div class="card-body">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Date</th>
                          <th scope="col">Items</th>
                          <th scope="col">Total</th>
                          <th scope="col">Show Invoice</th>
                          <th scope="col">Return</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($invoices as $invoice) 
                            <tr>
                              <th scope="row">{{$invoice->id}}</th>
                              <td>{{$invoice->created_at}}</td>
                              <td>{{$invoice->details->count()}}</td>
                              <td>{{$invoice->total}}</td>
                              <td>
                                  <a href="{{ route('invoices.show', $invoice->id) }}" class="btn btn-sm btn-success "><i class="fa fa-eye fa-lg"> </i></a>
                              </td>
                              <td><a href="#" class="btn btn-sm btn-danger " onclick="event.preventDefault();
                                                     document.getElementById('delete-form').submit();"><i class="fa fa-trash fa-lg"> </i></a></td>
                            </tr>
                            <form id="delete-form" action="{{ route('invoices.destroy', $invoice->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                    </form>
                        @endforeach

                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
