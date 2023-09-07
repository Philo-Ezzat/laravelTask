<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<a href="{{route('product.create')}}">add product</a>
    <table border="6">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Product price</th>
                <th>Product availablity</th>
                <th>Product picture</th>
                <th>Actions</th>


            </tr>
        </thead>

        <tbody>
            @foreach ($products as $product )
            <tr>
                <td>{{$product->name}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->availability}}</td>
                <td><img src="../Images/{{$product->image}}" alt="" width="100px"></td>
                <td><button onclick="location='products/{{$product->id}}'">show</button>
                <button onclick="location='products/{{$product->id}}/delete'">delete</button>
                <button onclick="location='products/{{$product->id}}/edit'">update</button></td>
            </tr>
            @endforeach

        </tbody>
    </table>
    <a href="{{route('category.index')}}">Categories</a>
<br>
    <a href="{{route('order.index')}}">Orders</a>
</body>
</html>