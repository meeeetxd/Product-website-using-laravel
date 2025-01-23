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
        <h1>Available Results</h1>
        <div>
            <a href="/" class="btn btn-dark mt-3 mb-3">Back</a>
        </div>

        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Type</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->category }}</td>
                        <td>{{ $product->type }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No products found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</body>

</html>