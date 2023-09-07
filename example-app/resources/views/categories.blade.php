<!DOCTYPE html>
<html lang="en">
<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
</head>
<body>
    <table border="2">
        <thead>
            <tr>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($categories as $category )
            <tr>
                <td>{{$category->name}}</td>
                <td><a href="{{route('category.show',$category->id)}}">Show</a></td>
            </tr>
            @endforeach

        </tbody>
    </table>
    <a href="{{route('products')}}">Back</a>
</body>
</html>