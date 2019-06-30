<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <title>Invoice</title>

    </head>
    <body>

     <table class="table" width="100%">
      <tr ALIGN=CENTER>
        <th rowspan="4"><img src="{{ base_path() }}/public/img/logo150.png"  width="150" height="150"/></th>
        <th >INVOICE APP BRMTEST</th>
        <th COLSPAN=2># {{$invoice->id}}</th>
      </tr>
      <tr ALIGN=CENTER>
        <td>COLOMBIA, VILLAVICENCIO</td>
        <td>PHONE</td>
        <td>3132119038</td>
      </tr>
      <tr ALIGN=CENTER>
        <td>juan.cuero@unillanos.edu.co</td>
        <td COLSPAN=2>{{$invoice->created_at}}</td>
      </tr>
      <tr ALIGN=CENTER>
        <td COLSPAN=3>{{$invoice->user->name}} - {{$invoice->user->email}}</td>
      </tr>
      </table>
      <br><br>

      <table class="table table-bordered">
                                 <thead>
                                     <tr>
                                         <th>Product Name</th>
                                         <th>Description</th>
                                         <th>Quantity</th>
                                         <th>Price</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                      @foreach ($invoice->details as $detail)
                                        <tr>
                                          <td> {{$detail->inventory->product->name}} </td>
                                          <td> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                          tempor incididunt ut labore et dolore magna aliqua.</td>
                                          <td> {{$detail->quantity}} </td>
                                          <td> {{$detail->inventory->price}} </td>


                                        </tr>
                                      @endforeach
                                        
                                 </tbody>
                                 <tfoot>
                                     <tr>
                                         <td style="border: none"></td>
                                         <td style="border: none"></td>
                                         <td><b>Total</b></td>
                                         <td><b class="total"></b> {{$invoice->total}} </td>
                                         
                                     </tr>
                                 </tfoot>
                             </table>


    </body>
</html>