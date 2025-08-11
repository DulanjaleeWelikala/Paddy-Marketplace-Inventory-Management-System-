
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Paddy marketplace-Inventery Management System</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://maps.app.goo.gl/Sqo25B8QsKeKaNJG7" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Stylesheet -->
        <link href="css/style.css" rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


        <style>
.modal-content {
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
}

.modal-header {
  border-bottom: none;
}

.form-control:focus, .form-select:focus {
  border-color: #2b8a3e;
  box-shadow: 0 0 0 0.25rem rgba(43, 138, 62, 0.25);
}

.btn-success {
  background-color: #2b8a3e;
  border-color: #2b8a3e;
  transition: background-color 0.3s ease;
}

.btn-success:hover {
  background-color: #246e32;
  border-color: #246e32;
}

.btn-warning {
  background-color: #e38316;
  border-color: #e38316;
  transition: background-color 0.3s ease;
}

.btn-warning:hover {
  background-color: #b96b11;
  border-color: #b96b11;
}

.btn-close-white {
  filter: invert(1);
}

  
.pagination a.active {
    background-color: var(--bs-primary);
    color: var(--bs-light);
    border: 1px solid var(--bs-secondary);
}
  
.pagination a:hover:not(.active) {background-color: var(--bs-primary)}

.nav.nav-tabs .nav-link.active {
    border-bottom: 2px solid var(--bs-secondary) !important;
}
/*** Single Page End ***/


/*** Facts Start ***/
.counter {
    height: 100%;
    text-align: center;
    box-shadow: 0 0 30px rgba(0, 0, 0, 0.05);
}

.counter i {
    font-size: 60px;
    margin-bottom: 25px;
}

.counter h4 {
    color: var(--bs-primary);
    letter-spacing: 1px;
    text-transform: uppercase;
}

.counter h1 {
    margin-bottom: 0;
}
/*** Facts End ***/
.paddy-section {
  max-width: 1300px;
  margin: 0 auto;
  padding: 40px 20px;
  text-align: center;
}

.tighter-row {
  display: flex;
  flex-wrap: wrap;
  gap: 19px;  /* කාඩ් අතර ඉඩ */
  justify-content: center;
}

.paddy-card {
  flex: 1 1 calc(25% - 10px);  /* 4 cards per row with gap accounted */
  max-width: 280px;             /* card width limit */
  box-sizing: border-box;       /* padding/margin එකට හොඳින් handle කරන */
}

/* Card styling - ඔබට තියෙන code එකට අනුකූලව */
.card.h-100 {
  max-width: 100%;   /* paddy-card max-width 280px ඒකට 100% */
  min-height: 370px;
  background: #fff;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 4px 10px rgba(0,0,0,0.1);
  transition: transform 0.3s ease;
  cursor: pointer;
}

.card.h-100:hover {
  transform: scale(1.03);
}

/* Image size */
.card-img-top {
  border-top-left-radius: 12px !important;
  border-top-right-radius: 12px !important;
  width: 100%;
  height: 210px;
  object-fit: cover;
  display: block;
}

/* Badge, text, button styles as you have */
.badge.bg-success {
  position: absolute;
  top: 10px;
  left: 10px;
  background: #f78821 !important;
  color: #fff !important;
  padding: 4px 10px;
  font-size: 12px;
  border-radius: 5px;
  z-index: 10;
}

/* Button */
.btn.btn-primary {
  background-color: transparent;
  border: 1px solid #6c757d;
  border-radius: 20px;
  padding: 5px 12px;
  color: #177d03;
  font-size: 13px;
  transition: all 0.2s ease;
}

.btn.btn-primary:hover {
  background-color: #e38316;
  border-color: #e38316;
  color: #fff;
}

/* Responsive */
@media (max-width: 1024px) {
  .paddy-card {
    flex: 1 1 calc(33.33% - 10px); /* 3 cards per row on medium screens */
  }
}

@media (max-width: 768px) {
  .paddy-card {
    flex: 1 1 calc(50% - 10px); /* 2 cards per row on small screens */
  }
}

@media (max-width: 480px) {
  .paddy-card {
    flex: 1 1 100%; /* 1 card per row on extra small */
  }
}

.paddy-section .row {
  row-gap: 30px;  /* row අතර ඉඩ මෙහෙ වැඩි කරයි */
}

.tighter-row {
  column-gap: 40px;
}

/*** Footer Start ***/
.footer {
    background-color: #111; /* dark background */
    color: rgba(255, 255, 255, 0.7);
    padding-top: 50px;
    padding-bottom: 30px;
    font-size: 14px;
}

.footer h4,
.footer h5,
.footer h6 {
    color: #fff;
    margin-bottom: 20px;
}

.footer a {
    color: rgba(255, 255, 255, 0.5);
    text-decoration: none;
    transition: 0.3s;
}

.footer a:hover {
    color: var(--bs-secondary);
}

.footer .btn-outline-secondary {
    border-color: rgba(255, 255, 255, 0.3);
    color: rgba(255, 255, 255, 0.5);
}

.footer .btn-outline-secondary:hover {
    color: #fff;
    background-color: var(--bs-secondary);
    border-color: var(--bs-secondary);
}

.footer .footer-item {
    margin-bottom: 30px;
}

/*** Footer End ***/




        </style>

    </head>

    <div class="container-fluid fixed-top">
            <div class="container topbar bg-primary d-none d-lg-block">
                <div class="d-flex justify-content-between">
                    <div class="top-info ps-2">
                        <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#" class="text-white">110 Street,Arukwaththa,Padukka</a></small>
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
                    <a href="index.html" class="navbar-brand"><h1 class="text-primary display-6">Paddy Market</h1></a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                        <div class="navbar-nav mx-auto">
                            <a href="/index" class="nav-item nav-link active">Home</a>
                            <a href="/about" class="nav-item nav-link active">About</a>
                            <a href="/varaity" class="nav-item nav-link">Paddy</a>
                            <a href="/contact" class="nav-item nav-link">Contact</a>
                                </div>

                        <div class="d-flex m-3 me-0">
                            @if (Route::has('login'))

                            @auth
                            <x-app-layout>
   
                            </x-app-layout>
                            @else
                            
                            <a href="{{url('login')}}" class="btn btn-success">Login</a>

                            @if (Route::has('register'))
                            <a href="{{url('register')}}" class="btn btn-primary">Register</a>
    
                           @endif
                           @endauth
                
                           @endif
                        </div>

                        </div>
                    </div>
                </nav>
            </div>
        </div>

        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center">
                        <div class="input-group w-75 mx-auto d-flex">
                            <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Search End -->

        <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Paddy Varity</h1>
        </div>
        <!-- Single Page Header End -->

       

       <!-- Paddy Seed Section Start -->
<div class="container-fluid py-5 bg-light">
  <div class="container py-5">
    <h1 class="mb-5 fw-bold text-center text-success" style="font-size: 30px;">Paddy Seed</h1>
    <div class="row mb-4 align-items-center">
      <div class="col-md-6 col-lg-4 mx-auto mx-lg-0">
        <div class="input-group shadow-sm rounded">
          <input
            type="search"
            class="form-control p-3 border-success"
            placeholder="Search by keywords..."
            aria-label="Search Paddy Seed"
            aria-describedby="search-icon"
          />
          <button class="btn btn-success" id="search-icon" type="button">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>

     <div class="col-md-6 col-lg-4 ms-auto text-lg-end mt-3 mt-lg-0 d-flex justify-content-end gap-2">

    @php
        $role = auth()->user()->usertype ?? '';
    @endphp

    @if($role !== 'admin' && $role !== 'manager')
        <button
            class="btn btn-success px-4 fw-semibold shadow-sm rounded-pill"
            data-bs-toggle="modal"
            data-bs-target="#addPaddyModal"
        >
            + Add New Paddy
        </button>

        <button>
            <a href="{{ route('mypaddies') }}" class="btn btn-outline-success px-4 fw-semibold shadow-sm rounded-pill">
                <i class="fas fa-archive me-2"></i> My Paddy
            </a>
        </button>
    @endif

</div>

    </div>

    <!-- Add Paddy Modal -->
    <div
      class="modal fade"
      id="addPaddyModal"
      tabindex="-1"
      aria-labelledby="addPaddyModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content shadow border-0 rounded-4">
          <div class="modal-header bg-success text-white rounded-top-4">
            <h5 class="modal-title fw-bold" id="addPaddyModalLabel">
              Add New Paddy Product
            </h5>
            <button
              type="button"
              class="btn-close btn-close-white"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body bg-light p-4 rounded-bottom-4">
            <form
              action="{{ route('varaity.store') }}"
              method="POST"
              enctype="multipart/form-data"
              novalidate
            >
              @csrf
              <div class="mb-3">
                <label for="product_name" class="form-label fw-semibold"
                  >Product Name <span class="text-danger">*</span></label
                >
                <input
                  type="text"
                  class="form-control"
                  id="product_name"
                  name="product_name"
                  value="{{ old('product_name') }}"
                  placeholder="Enter product name"
                  required
                />
              </div>

              <div class="mb-3">
                <label for="description" class="form-label fw-semibold"
                  >Description <span class="text-danger">*</span></label
                >
                <textarea
                  class="form-control"
                  id="description"
                  name="description"
                  rows="4"
                  placeholder="Brief description of the product"
                  required
                >{{ old('description') }}</textarea>
              </div>

              <div class="row g-3 mb-3">
                <div class="col-md-6">
                  <label for="quantity" class="form-label fw-semibold"
                    >Quantity (kg) <span class="text-danger">*</span></label
                  >
                  <input
                    type="number"
                    class="form-control"
                    id="quantity"
                    name="quantity"
                    min="0.1"
                    step="0.1"
                    value="{{ old('quantity') }}"
                    placeholder="e.g. 25"
                    required
                  />
                </div>
                <div class="col-md-6">
                  <label for="price" class="form-label fw-semibold"
                    >Price (LKR) <span class="text-danger">*</span></label
                  >
                  <input
                    type="number"
                    class="form-control"
                    id="price"
                    name="price"
                    step="0.01"
                    value="{{ old('price') }}"
                    placeholder="e.g. 1250.00"
                    required
                  />
                </div>
              </div>

              <div class="mb-3">
                <label for="badge" class="form-label fw-semibold"
                  >Optional Badge</label
                >
                <select
                  class="form-select"
                  id="badge"
                  name="badge"
                  aria-label="Select Badge"
                >
                  <option value="">-- None --</option>
                  <option value="New" {{ old('badge') == 'New' ? 'selected' : '' }}>
                    New
                  </option>
                  <option value="Best" {{ old('badge') == 'Best' ? 'selected' : '' }}>
                    Best
                  </option>
                  <option value="Hot" {{ old('badge') == 'Hot' ? 'selected' : '' }}>
                    Hot
                  </option>
                </select>
              </div>

              <div class="mb-4">
                <label for="image" class="form-label fw-semibold"
                  >Upload Image <span class="text-danger">*</span></label
                >
                <input
                  class="form-control"
                  type="file"
                  id="image"
                  name="image"
                  accept="image/*"
                  required
                />
              </div>

              <div class="d-flex justify-content-center">
                <button
                  type="submit"
                  class="btn btn-warning px-5 fw-semibold shadow-sm rounded-pill"
                >
                  Add Product
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>


 



    <!-- Success Alert -->
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
      {{ session('success') }}
      <button
        type="button"
        class="btn-close"
        data-bs-dismiss="alert"
        aria-label="Close"
      ></button>
    </div>
    @endif

   <div class="paddy-section">
  <div class="tighter-row">
    @foreach($paddyVarieties as $paddy)
     @php
    $hasActiveOrders = $paddy->orders()->where('status', '!=', 'rejected')->exists();
  @endphp

  @if ($paddy->quantity > 0 && !$hasActiveOrders)

      <div class="paddy-card">
        <div
          class="card h-100 shadow-sm border-0 rounded-4"
          style="transition: transform 0.3s ease"
          onmouseover="this.style.transform='scale(1.03)'"
          onmouseout="this.style.transform='scale(1)'"
        >
          <img
            src="{{ asset('storage/' . $paddy->image) }}"
            class="card-img-top rounded-top-4"
            alt="{{ $paddy->product_name }}"
            loading="lazy"
          />
          <div class="card-body d-flex flex-column">
            <h5 class="card-title fw-bold">{{ $paddy->product_name }}</h5>
            <p class="card-text flex-grow-1">{{ Str::limit($paddy->description, 100) }}</p>
            <p class="card-text mb-2 fw-semibold">
              Rs: {{ number_format($paddy->price, 2) }} / {{ $paddy->quantity }} kg
            </p>
            @if($paddy->badge)
              <span class="badge bg-success mb-3">{{ $paddy->badge }}</span>
            @endif

            @auth
              @if (Auth::user()->usertype === 'manager')
                <a href="{{ route('checkout', ['paddy_id' => $paddy->paddy_id]) }}" class="btn btn-primary mt-auto rounded-pill">
                  Order Now
                </a>
              @endif
            @endauth
          </div>
        </div>
      </div>
      @endif
    @endforeach
  </div>
</div>

<!-- Paddy Seed Section End -->


  



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

<script>
     document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById('myPaddyModal');
    modal.addEventListener('show.bs.modal', function () {
        fetch('/my-paddy')
            .then(response => response.json())
            .then(data => {
                const container = document.getElementById('myPaddyList');
                container.innerHTML = ''; // Clear old content

                if (data.length === 0) {
                    container.innerHTML = '<p>No paddy entries found.</p>';
                    return;
                }

                data.forEach(paddy => {
                    container.innerHTML += `
                        <div class="col-md-6 mb-3">
                          <div class="card shadow-sm">
                            <img src="/storage/${paddy.image}" class="card-img-top" alt="${paddy.product_name}">
                            <div class="card-body">
                              <h5 class="card-title">${paddy.product_name}</h5>
                              <p class="card-text">${paddy.description}</p>
                              <p>Price: Rs. ${paddy.price}</p>
                              <p>Quantity: ${paddy.quantity}</p>
                              <span class="badge bg-success">${paddy.badge || ''}</span>
                              <div class="mt-2">
                                <button class="btn btn-sm btn-primary">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                              </div>
                            </div>
                          </div>
                        </div>`
                });
            });
    });
});

</script>

    <!-- Javascript -->
    <script src="js/main.js"></script>
    </body>

</html>