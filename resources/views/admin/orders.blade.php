@extends('admin.layout.admin')
@section('content')
    <h3> Orders </h3>

    <ul>

        @foreach($orders as $order)
            <li>
                <h4> Order By {{$order->user->name}} <br> TOtal Price: {{$order->total}}</h4>

                <form action="{{route('toggle.deliver',$order->id)}}" method="POST" class="pull-right" id="deliver-toggle">
                {{csrf_field()}}
                    <label for="deliverd">Delivered</label>
                    <input type="checkbox" value="1" name="deliverd" {{$order->deliverd==1?"checked":""}}>
                    <input type="submit" value="Submit">

                </form>
                <div class="clearfix"></div>
                <hr>

                <h5>Items</h5>

                <table class="table table-bordered">
                    <tr>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                    <tr>
                        @foreach($order->orderItems as $item)
                            <tr>
                                <td> {{$item->name}}</td>
                                <td> {{$item->pivot->qty}}</td>
                                <td> {{$item->pivot->total}}</td>
                            </tr>
                        @endforeach


                    </tr>
                </table>

            </li>
           @endforeach
    </ul>
@endsection