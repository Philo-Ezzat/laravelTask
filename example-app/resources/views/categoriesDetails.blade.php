<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <title>Document</title>
</head>
<body>
    <fieldset>
        <legend>
            Category
        </legend>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>{{$category->name}}</td>
                </tr>

            </tbody>
        </table>
    </fieldset>

    <fieldset>
        <legend>
            Category Products
        </legend>
        <table>
            <thead>
                <tr>
                    <th>
                        Product Name
                    </th>
                    <th>
                        Product Price
                    </th>
                </tr>
            </thead>
            <tbody>

                @foreach ( $category->products as $product )
                    <tr>
                        <td>{{$product->name}}</td>
                        <td>{{$product->price}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </fieldset>
    <form action="{{route('category.index')}}">
        <button>Back</button>
    </form>
</body>
</html>