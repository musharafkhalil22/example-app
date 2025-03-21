<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Listing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Update Product</h2>
        <form method="post" action="{{url('update_product', $product->id)}}">
            @csrf
            <div class="mb-3">
                <label for="productTitle" class="form-label">Product Title</label>
                <input name="title" type="text" class="form-control" id="productTitle" placeholder="Enter product title" required value="{{$product->title}}">
            </div>
            <div class="mb-3">
                <label for="productPrice" class="form-label">Price</label>
                <input name="price" type="number" class="form-control" id="productPrice" placeholder="Enter price" required value="{{$product->price}}">
            </div>
            <div class="mb-3">
                <label for="productCategory" class="form-label">Category</label>
                <input name="catagory" type="text" class="form-control" id="productCategory" placeholder="Enter category" required value="{{$product->catagory}}">
            </div>
            <button type="submit" class="btn btn-success">Update Product</button>
        </form>
      
    </div>
</body>
</html>
