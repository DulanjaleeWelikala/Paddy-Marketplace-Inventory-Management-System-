<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Paddy Marketplace - Inventory Management System</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet"> 

    <!-- Icons & Libraries -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid fixed-top">
        <div class="container topbar bg-primary d-none d-lg-block">
            <div class="d-flex justify-content-between">
                <div class="top-info ps-2">
                    <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#" class="text-white">110 Street, Arukwaththa, Padukka</a></small>
                    <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#" class="text-white">marketplace@gmail.com</a></small>
                </div>
                <div class="top-link pe-2">
                    <a href="#" class="text-white"><small class="text-white mx-2">Privacy Policy</small>/</a>
                    <a href="#" class="text-white"><small class="text-white mx-2">Terms of Use</small></a>
                </div>
            </div>
        </div>
        <div class="container px-0">
            <nav class="navbar navbar-light bg-white navbar-expand-xl">
                <a href="/index" class="navbar-brand"><h1 class="text-primary display-6">Paddy Market</h1></a>
                <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>
                <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                    <div class="navbar-nav mx-auto">
                        <a href="/index" class="nav-item nav-link active">Home</a>
                        <a href="/about" class="nav-item nav-link">About</a>
                        <a href="/varaity" class="nav-item nav-link">Paddy</a>
                        <a href="/contact" class="nav-item nav-link">Contact</a>
                    </div>

                    <div class="d-flex m-3 me-0">
                        @if (Route::has('login'))
                            @auth
                                <x-app-layout />
                            @else
                                <a href="{{ url('login') }}" class="btn btn-success">Login</a>
                                @if (Route::has('register'))
                                    <a href="{{ url('register') }}" class="btn btn-primary">Register</a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <!-- Page Header -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Add Product</h1>
    </div>

    <!-- Add Product Form -->
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card p-4 shadow rounded-4">
                    <h3 class="text-center mb-4">Add Paddy Product</h3>

                    <!-- Success Message -->
                    @if (session('success'))
                        <div class="alert alert-success text-center">{{ session('success') }}</div>
                    @endif

                    <!-- Validation Errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Product Form -->
                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="product_name" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="product_name" name="product_name" value="{{ old('product_name') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity (kg)</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity') }}" required min="0.1" step="0.1">
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Price (LKR)</label>
                            <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}" step="0.01" required>
                        </div>

                        <div class="mb-3">
                            <label for="badge" class="form-label">Optional Badge</label>
                            <select class="form-select" id="badge" name="badge">
                                <option value="">-- None --</option>
                                <option value="New" {{ old('badge') == 'New' ? 'selected' : '' }}>New</option>
                                <option value="Best" {{ old('badge') == 'Best' ? 'selected' : '' }}>Best</option>
                                <option value="Hot" {{ old('badge') == 'Hot' ? 'selected' : '' }}>Hot</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Upload Image</label>
                            <input class="form-control" type="file" id="image" name="image" accept="image/*" required>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary px-5">Add Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
