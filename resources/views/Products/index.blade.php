<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRODUCTS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-sm bg-dark">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text text-light" href="/">Products</a>
                </li>
            </ul>
        </div>
    </nav>



    <div class="container">
        <form action="get" action="/product/filter" class="d-flex align-items-center mt-3">
            <div class="me-3">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ request('name') }}">
            </div>


            <div class="me-3">
                <label for="min_price">Min Price:</label>
                <input type="number" id="min_price" name="min_price" value="{{ request('min_price') }}">
            </div>

            <div class="me-3">
                <label for="max_price">Max Price:</label>
                <input type="number" id="max_price" name="max_price" value="{{ request('max_price') }}">
            </div>

            <div class="me-3">
                <label for="category">Category:</label>
                <select id="category" name="category">
                    <option value="">--Select Category--</option>
                    <option value="Console" {{ request('category') == 'Console' ? 'selected' : '' }}>Console</option>
                    <option value="PC" {{ request('category') == 'PC' ? 'selected' : '' }}>PC</option>
                    <option value="Hardware" {{ request('category') == 'Hardware' ? 'selected' : '' }}>Hardware</option>
                </select>
            </div>

            <button class="btn btn-dark btn-sm" type="submit">Filter</button>

        </form>
        <div class="mb-3">
            <form method="GET" action="/product/search" class="d-flex align-items-center mt-3">
                <div>
                    Search Products here: <input type="text" name="query" class="form-control"
                        placeholder="Search products..." value="{{ request('query') }}"><br>
                    <button type="submit" class="btn btn-primary btn-sm">Search</button>
                </div>
            </form>
        </div>
        <div>
            <a href="product/create" class="btn btn-dark mt-3">New Product</a>
        </div>
        <h1>Products Available</h1>

        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <td>Sr. No</td>
                    <td>Name</td>
                    <td>Description</td>
                    <td>Image</td>
                    <td>Price</td>
                    <td>Category</td>
                    <td>Type</td>
                    <!-- <td>Action</td> -->
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)

                    <tr>
                        <td>{{ $loop->index + 1}}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>
                            <img src="{{ url('/') }}/public/products/{{ $product->image }}" class="rounded-circle"
                                width="50" height="50">
                        </td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->category }}</td>
                        <td>{{ $product->type }}</td>

                        <td><a href="product/{{ $product->id }}/edit" class="btn btn-dark btn-sm">Edit</a></td>
                        <td><a href="product/{{ $product->id }}/delete" class="btn btn-danger btn-sm">Delete</a></td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>