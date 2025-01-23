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


        <!-- Filter Modal -->
        <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="filterModalLabel">Filter Products</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/product/filter" method="GET">
                            <!-- <div class="mb-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" id="name" name="name" class="form-control"
                                    value="{{ request('name') }}">
                            </div> -->

                            <div class="mb-3">
                                <label for="min_price" class="form-label">Min Price:</label>
                                <input type="number" id="min_price" name="min_price" class="form-control"
                                    value="{{ request('min_price') }}">
                            </div>

                            <div class="mb-3">
                                <label for="max_price" class="form-label">Max Price:</label>
                                <input type="number" id="max_price" name="max_price" class="form-control"
                                    value="{{ request('max_price') }}">
                            </div>

                            <div class="mb-3">
                                <label for="category" class="form-label">Category:</label>
                                <select id="category" name="category" class="form-select">
                                    <option value="">--Select Category--</option>
                                    <option value="Console" {{ request('category') == 'Console' ? 'selected' : '' }}>
                                        Console</option>
                                    <option value="PC" {{ request('category') == 'PC' ? 'selected' : '' }}>PC</option>
                                    <option value="Hardware" {{ request('category') == 'Hardware' ? 'selected' : '' }}>
                                        Hardware</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="type" class="form-label">Type:</label>
                                <select id="type" name="type" class="form-select">
                                    <option value="">--Select Type--</option>
                                    <option value="Digital Edition" {{ request('type') == 'Digital Edition' ? 'selected' : '' }}>
                                        Digital Edition</option>
                                    <option value="Disc Edition" {{ request('type') == 'Disc Edition' ? 'selected' : '' }}>Disc Edition</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-dark btn-sm">Apply Filters</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div>
            <form method="GET" action="/product/search" class="d-flex align-items-center mt-3">

                Search Products here: <input type="text" name="query" class="form-control ms-3"
                    placeholder="Search products..." value="{{ request('query') }}"><br>
                <button type="submit" class="btn btn-primary ms-3">Search</button>
                <button type="button" class="btn btn-primary ms-3" data-bs-toggle="modal" data-bs-target="#filterModal">
                    Filter
                </button>
            </form>
        </div>

        <h1 class="mt-3">Products Available</h1>

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
                        <td>{{ $loop->iteration + ($products->currentPage() - 1) * $products->perPage() }}</td>
                        <!-- <td>{{ $loop->index + 1}}</td> -->
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
        <div class="d-flex justify-content-center mt-4">
            {{ $products->links() }}
        </div>
        <div>
            <a href="product/create" class="btn btn-dark mt-3">New Product</a>
        </div>
    </div>
</body>

</html>