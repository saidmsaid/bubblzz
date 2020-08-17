<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Email</th>
        <th>Total</th>
        <th>Order</th>
    </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <tr>
            <td>{{ $order->name }}</td>
          
            <td>{{ $order->mobile }}</td>
            <td>{{ $order->address }}</td>
            <td>{{ $order->email }}</td>
            <td>
                {{$order->totalPrice}}
            </td>
            <td>
                <table>
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Quantity</th>
                    </tr>
                    </thead>
                    <tbody>
                @foreach($order->ordproducts as $product)
               <tr>
                   <td>{{$product->product->name}}</td>
                   <td>{{$product->quantity}}</td>
                        
               </tr>
                        
               
                @endforeach
                    </tbody>
                </table>
            </td> 
            
        </tr>
    @endforeach
    </tbody>
</table>
