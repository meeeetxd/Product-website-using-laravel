<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Products</title>
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
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <strong>{{ $message }}</strong>
        </div>

    @endif
    <div class="container">
        <div>
            <a href="/" class="btn btn-dark mt-3">Back</a>
        </div>
        <h1>Create New Product</h1>
    </div>

    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card mt-3 p-3">
                <form method="post" action="/product/store" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name')}}">

                        @if ($errors->has('name'))
                            <span class="text-danger">
                                {{ $errors->first('name') }}
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description" rows="4"
                            value="{{ old('description')}}"></textarea>

                        @if ($errors->has('description'))
                            <span class="text-danger">
                                {{ $errors->first('description') }}
                            </span>
                        @endif

                    </div>


                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control">

                        @if ($errors->has('image'))
                            <span class="text-danger">
                                {{ $errors->first('image') }}
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" name="price" class="form-control" value="{{ old('price')}}">

                        @if ($errors->has('price'))
                            <span class="text-danger">
                                {{ $errors->first('price') }}
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Category</label>
                        <input type="text" name="category" class="form-control" value="{{ old('category')}}">

                        @if ($errors->has('category'))
                            <span class="text-danger">
                                {{ $errors->first('category') }}
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Type</label>
                        <input type="text" name="type" class="form-control" value="{{ old('type')}}">

                        @if ($errors->has('type'))
                            <span class="text-danger">
                                {{ $errors->first('type') }}
                            </span>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-dark mt-3">Add Product</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>