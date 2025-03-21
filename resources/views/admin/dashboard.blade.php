<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background: #343a40;
            color: white;
            padding: 20px;
            position: fixed;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
        }
        .sidebar a:hover {
            background: #495057;
        }
        .content {
            margin-left: 260px;
            padding: 20px;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <a href="{{url('dashboard')}}">Dashboard</a>
        <a href="{{url('product_listing')}}">Product Listing</a>
        <a href="{{url('show_product')}}">Products</a>
        <form method="post" action="{{route('logout')}}">
            @csrf
            <button>logout</button>
        </form>
    </div>
    
    <div class="content">
        <h1>Welcome to Admin Dashboard</h1>
        <p>Manage your website from here.</p>
    </div>
</body>
</html>
