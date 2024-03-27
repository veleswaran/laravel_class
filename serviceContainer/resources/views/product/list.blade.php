<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Produce List</h2>   
  <table class="table table-dark table-hover text-center">
    <thead>
      <tr>
        <th>Product</th>
        <th>Brand</th>
        <th>Price</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
     @foreach($product as $product)
     <tr>
        <td>{{$product->name}}</td>
        <td>{{$product->brand}}</td>
        <td>{{$product->price}}</td>
        <td class="d-flex justify-content-center"  >
            <form action="/product/{{$product->id}}" method="post">
                @method('delete')
                @csrf
                <input type="submit" class="btn btn-danger p-2 me-3" value="DELETE">
            </form>
            <a href="/product/{{$product->id}}" class="btn btn-info">EDIT</a>
        </td>
     </tr>
     @endforeach
    </tbody>
  </table>
</div>

</body>
</html>
