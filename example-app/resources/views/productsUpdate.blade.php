
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit Product</title>
</head>
<body>
    <h1>edit Product</h1>
    <form action="{{route('product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="product_name">Product Name:</label>
        <input type="text" id="name" name="name" value="{{$product->name}}" ><br><br>
        
        <label for="product_image">Product Picture:</label>
        <input type="file" id="image" name="image" value="{{$product->image}}"><br><br>
        
        <label for="product_image">Product Availability:</label>
        <input type="text" id="availability" name="availability" value="{{$product->availability}}"><br><br>
        
        <label for="product_price">Product Price:</label>
        <input type="text" step="1" id="price" name="price" value="{{$product->price}}" ><br><br>
        
        <input type="submit" value="update Product">
    </form>
</body>
</html>
