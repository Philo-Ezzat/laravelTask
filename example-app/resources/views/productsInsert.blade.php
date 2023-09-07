<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>
<body>
    <h1>Add Product</h1>
    <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
      @csrf
     <input type="text" name="name" placeholder="product_name" >
     <br>
     <br>
     <input type="number" name="price" placeholder="product_price">
     <br>
     <br>

     <input type="file" name="image"placeholder="product_picture">
     <br>
     <br>
     <input type="text" name="category_id"placeholder="category_id">
     <br>
     <br>
    
     <input type="submit" >
     </form>
</body>
</html>
