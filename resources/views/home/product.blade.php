<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Listing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            transition: transform 0.3s ease-in-out;
            border: none;
            overflow: hidden;
            border-radius: 10px;
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        .price {
            font-size: 1.3rem;
            font-weight: bold;
            color: #28a745;
        }
        .search-container {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
        }
        .search-container input {
            width: 300px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .search-container input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 8px 15px;
            margin-left: 5px;
            border-radius: 5px;
            cursor: pointer;
        }
        .search-container input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .product-image {
            height: 200px;
            object-fit: cover;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>

    <div class="container mt-5">
        <div class="heading_container text-center">
            <h2 class="mb-4">
                Our <span class="text-primary">Products</span>
            </h2>

            <!-- Search Bar -->
            <div class="search-container">
                <form action="{{ url('search') }}" method="GET" class="d-flex">
                    @csrf
                    <input type="text" name="query" placeholder="Search for Products & Categories" required>
                    <input type="submit" value="Search">
                </form>
            </div>
        </div>
        
        <!-- Product Listing -->
        <div class="row">
            @foreach ($product as $product)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    @if($product->image) <!-- Display Image if Exists -->
                        <img src="{{ asset('storage/'.$product->image) }}" class="card-img-top product-image" alt="{{ $product->title }}">
                    @else
                        <img src="https://via.placeholder.com/300x200" class="card-img-top product-image" alt="No Image Available">
                    @endif

                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $product->title }}</h5>
                        <p class="price">${{ $product->price }}</p>
                        <p class="card-text text-muted">{{ $product->catagory }}</p>

                        <!-- Buttons with Better UI -->
                        <div class="d-flex justify-content-center">
                            <a onclick="return confirm('Are You Sure To Delete This')" 
                               href="{{ url('delete_product', $product->id) }}" 
                               class="btn btn-outline-danger me-2">
                               🗑 Delete
                            </a>
                            <a href="{{ url('edit_product', $product->id) }}" 
                               class="btn btn-primary">
                               ✏️ Edit
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
