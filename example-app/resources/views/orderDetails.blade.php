<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <title>Order Details</title>
</head>
<body>
    <fieldset>
        <legend class="mylegend">
            Order
        </legend>
        <table border="2">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Price</th>
                    <th>Customer Name</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->price}}</td>
                    <td>{{$order->user->name}}</td>
                </tr>

            </tbody>
        </table>
    </fieldset>
    <br> <br>
    <fieldset>
        <legend class="mylegend">
            Order Products
        </legend>
        <table border="2">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Product Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $order->products as $oproduct )
                    <tr>
                        <td>{{$oproduct->product->name}}</td>
                        <td>{{$oproduct->product->price}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </fieldset>
    <br> <br>
    <form action="{{route('order.index')}}">
        <button>Back</button>
    </form>
</body>
</html>