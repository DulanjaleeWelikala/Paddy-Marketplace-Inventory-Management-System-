<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Paddy marketplace-Inventery Management System</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://maps.app.goo.gl/Sqo25B8QsKeKaNJG7" rel="stylesheet"> 

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Stylesheet -->
        <link href="css/style.css" rel="stylesheet">

      <style>

.video-background {
    position: relative;
    width: 100%;
    height: 100vh;
    overflow: hidden;
}

.video-background video {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 100%;
    height: 100%;
    object-fit: cover;
    transform: translate(-50%, -50%);
}

/* Overlay for text */
.overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5); /* Semi-transparent black */
    display: flex;
    justify-content: center;
    align-items: center;
    color: white;
    text-align: center;
    padding: 20px;
}

/* Text styling */
.overlay h1 {
    font-size: 3rem;
    margin: 0;
    color: white;
    font-weight: bold;
}

.overlay p {
    font-size: 1.25rem;
    margin: 10px 0;
}

/*** About ***/
.about-img img {
    position: relative;
    z-index: 2;
}

.about-img::before {
    position: absolute;
    content: "";
    top: 0;
    left: -50%;
    width: 100%;
    height: 100%;
    background-image: -webkit-repeating-radial-gradient(#FFFFFF, #EEEEEE 5px, transparent 5px, transparent 10px);
    background-image: -moz-repeating-radial-gradient(#FFFFFF, #EEEEEE 5px, transparent 5px, transparent 10px);
    background-image: -ms-repeating-radial-gradient(#FFFFFF, #EEEEEE 5px, transparent 5px, transparent 10px);
    background-image: -o-repeating-radial-gradient(#FFFFFF, #EEEEEE 5px, transparent 5px, transparent 10px);
    background-image: repeating-radial-gradient(#FFFFFF, #EEEEEE 5px, transparent 5px, transparent 10px);
    background-size: 20px 30px;
    transform: skew(20deg);
    z-index: 1;
}
       
/* Outer section centering */
.product-section {
    max-width: 1300px;
    margin: 0 auto;
    padding: 40px 20px;
    text-align: center;
}

/* Header styling */
.product-header h1 {
    font-size: 42px;
    margin-bottom: 30px;
    color:rgb(68, 66, 66);
}

/* Card Grid */
.product-grid {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
}

/* Individual Product Card */
.product-card {
    background: #fff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    max-width: 260px;
    flex: 1 1 calc(25% - 20px);
    transition: transform 0.3s ease;
}

.product-card:hover {
    transform: scale(1.03);
}

/* Image Section */
.product-image {
    position: relative;
}

.product-image img {
    width: 100%;
    display: block;
}

/* New Badge */
.badge {
    position: absolute;
    top: 10px;
    left: 10px;
    background: #f78821;
    color: #fff;
    padding: 4px 10px;
    font-size: 12px;
    border-radius: 5px;
}

/* Content Section */
.product-content {
    padding: 15px;
}

.product-content h4 {
    font-size: 18px;
    margin-bottom: 8px;
    color: #333;
    text-transform: capitalize;
}

.product-content p {
    font-size: 14px;
    color: #555;
    margin-bottom: 15px;
}

/* Price and Order Button */
.price-order {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.price {
    font-weight: bold;
    color: #000;
    font-size: 14px;
}

.order-btn {
    background-color: transparent;
    border: 1px solid #6c757d;
    border-radius: 20px;
    padding: 5px 12px;
    color: #177d03;
    text-decoration: none;
    font-size: 13px;
    transition: all 0.2s ease;
}

.order-btn:hover {
    background-color: #e38316;
    color: #fff;
}

/* Responsive Fix */
@media (max-width: 1024px) {
    .product-card {
        flex: 1 1 calc(33.333% - 20px);
    }
}

@media (max-width: 768px) {
    .product-card {
        flex: 1 1 calc(50% - 20px);
    }
}

@media (max-width: 480px) {
    .product-card {
        flex: 1 1 100%;
    }
}

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

  
/*** Footer Start ***/
.footer .footer-item .btn-link {
    line-height: 35px;
    color: rgba(255, 255, 255, .5);
    transition: 0.5s;
}

.footer .footer-item .btn-link:hover {
    color: var(--bs-secondary) !important;
}

.footer .footer-item p.mb-4 {
    line-height: 35px;
}
/*** Footer End ***/

       </style>  

    </head>
    <body>
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
                             <x-app-layout></x-app-layout>
                                @else
                            <a href="{{ url('login') }}" class="btn btn-success me-2">Login</a>
            
                               @if (Route::has('register'))
                           <a href="{{ url('register') }}" class="btn btn-primary">Register</a>
                                @endif
                                 @endauth
                                 @endif
                            </div>

                        </div>
                    </div>
                </nav>
            </div>

        <section class="video-background">
        <!-- Video Background -->
        <video autoplay muted loop>
            <source src="video/farmer.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>

        <!-- Overlay with Text -->
        <div class="overlay">
            <div>
                <h1> To Support Farmers Everywhere</h1>
                <p>Connecting Farmers Directly to Fair Markets</p>
                <p>Empowering the Future of Farming</p>
            </div>
        </div>
    </section>

    <!-- About Us -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img position-relative overflow-hidden p-5 pe-0">
                        <img class="img-fluid w-100" src="img/farmers.jpg">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="display-5 mb-4"> Help farmers earn more for their hard work.</h1>
                    <p class="mb-3">We provide a digital platform where farmers can sell their paddy in bulk at fair and transparent prices without the need for middlemen. By connecting farmers directly with verified buyers, we ensure they receive higher returns for their produce and have greater control over the selling process.</p>
                    <p><i class="fa fa-check text-primary me-1"></i>Better pricing for farmers</p>
                    <p><i class="fa fa-check text-primary me-1"></i>Bulk selling made easy</p>
                    <p><i class="fa fa-check text-primary me-1"></i>No intermediaries, no hidden cuts</p>
                    <a class="btn btn-primary rounded-pill py-3 px-5 mt-3" href="/about">Read More</a>
                </div>
            </div>
        </div>
    </div>

   <!-- card -->
    <div class="product-section">
    <div class="product-header">
        <h1>All Products</h1>
    </div>
    <div class="product-grid">
        <!-- Card 1 -->
        <div class="product-card">
            <div class="product-image">
                <img src="img/red-basmati.jpg" alt="Red Basmati">
                <span class="badge">New</span>
            </div>
            <div class="product-content">
                <h4>Red Basmati</h4>
                <p>Aromatic long-grain rice with red rice nutrition.</p>
                <div class="price-order">
                    <span class="price">Rs: 4,500 /25kg</span>
                    <a href="/cheackout" class="order-btn"><i class="fa fa-receipt"></i> Order Now</a>
                </div>
            </div>
        </div>
        <!-- Card 2 -->
        <div class="product-card">
            <div class="product-image">
                <img src="img/nadu.jpg" alt="Nadu">
            </div>
            <div class="product-content">
                <h4>Nadu</h4>
                <p>Soft, sticky, everyday Sri Lankan rice.</p>
                <div class="price-order">
                    <span class="price">Rs: 3,000 /25kg</span>
                    <a href="/cheackout" class="order-btn"><i class="fa fa-receipt"></i> Order Now</a>
                </div>
            </div>
        </div>
        <!-- Card 3 -->
        <div class="product-card">
            <div class="product-image">
                <img src="img/samba.jpg" alt="Samba">
                <span class="badge">New</span>
            </div>
            <div class="product-content">
                <h4>Samba</h4>
                <p>Small-grain rice with a firm texture and aroma.</p>
                <div class="price-order">
                    <span class="price">Rs: 3,125 /25kg</span>
                    <a href="/cheackout" class="order-btn"><i class="fa fa-receipt"></i> Order Now</a>
                </div>
            </div>
        </div>
        <!-- Card 4 -->
        <div class="product-card">
            <div class="product-image">
                <img src="img/keeri samba.jpg" alt="Keeri Samba">
                <span class="badge">New</span>
            </div>
            <div class="product-content">
                <h4>Keeri Samba</h4>
                <p>Soft, fragrant, premium small-grain rice.</p>
                <div class="price-order">
                    <span class="price">Rs: 3,750 /25kg</span>
                    <a href="/cheackout" class="order-btn"><i class="fa fa-receipt"></i> Order Now</a>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="product-image">
                <img src="img/kalu heenati.jpg" alt="Nadu">
                <span class="badge">New</span>
            </div>
            <div class="product-content">
                <h4>Kalu Heenati</h4>
                <p>nutritious red rice from Sri Lanka, rich in iron and ideal for health diets</p>
                <div class="price-order">
                    <span class="price">Rs:3,330 /25kg</span>
                    <a href="/cheackout" class="order-btn"><i class="fa fa-receipt"></i> Order Now</a>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="product-image">
                <img src="img/pachchaperumal.jpg" alt="Nadu">
                <span class="badge">New</span>
            </div>
            <div class="product-content">
                <h4>pachchaperumal</h4>
                <p>Pachchaperumal is a Sri Lankan red rice, rich in nutrients and antioxidants.</p>
                <div class="price-order">
                    <span class="price">Rs:4,330 /25kg</span>
                    <a href="/cheackout" class="order-btn"><i class="fa fa-receipt"></i> Order Now</a>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="product-image">
                <img src="img/suwadal1.jpg" alt="Nadu">
            </div>
            <div class="product-content">
                <h4>suwadal</h4>
                <p>An aromatic white rice, soft and easy to digest, often used in Sri Lankan cuisine.</p>
                <div class="price-order">
                    <span class="price">Rs:5,000 /25kg</span>
                    <a href="/cheackout" class="order-btn"><i class="fa fa-receipt"></i> Order Now</a>
                </div>
            </div>
        </div>
        <div class="product-card">
            <div class="product-image">
                <img src="img/kakulu.jpg" alt="Nadu">
            </div>
            <div class="product-content">
                <h4>Rathu Kakulu</h4>
                <p>A short-grain red rice that’s high in fiber and often used in traditional dishes.</p>
                <div class="price-order">
                    <span class="price">Rs:5,500 /25kg</span>
                    <a href="/cheackout" class="order-btn"><i class="fa fa-receipt"></i> Order Now</a>
                </div>
            </div>
        </div>
    </div>
</div>

        <!-- Bestsaler Product Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="text-center mx-auto mb-5" style="max-width: 700px;">
                    <h1 class="display-4">Best Products</h1>
                </div>
                <div class="row g-4">
                    <div class="col-lg-6 col-xl-4">
                        <div class="p-4 rounded bg-light">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <img src="img/samba.jpg" class="img-fluid rounded-circle w-100" alt="">
                                </div>
                                <div class="col-6">
                                    <a href="#" class="h5">Samba</a>
                                    <div class="d-flex my-3">
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <h4 class="mb-3">Rs:3,125</h4>
                                    <a href="/cheackout" class="btn border border-secondary rounded-pill px-2 text-primary"><i class="fa fa-receipt me-2 text-primary"></i> Order Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-4">
                        <div class="p-4 rounded bg-light">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <img src="img/madathawalu.jpg" class="img-fluid rounded-circle w-100" alt="">
                                </div>
                                <div class="col-6">
                                    <a href="#" class="h5">Madathawalu</a>
                                    <div class="d-flex my-3">
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <h4 class="mb-3">RS:5,000</h4>
                                    <a href="/cheackout" class="btn border border-secondary rounded-pill px-2 text-primary"><i class="fa fa-receipt me-2 text-primary"></i> Order Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-4">
                        <div class="p-4 rounded bg-light">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <img src="img/kuruluthuda.jpg" class="img-fluid rounded-circle w-100" alt="">
                                </div>
                                <div class="col-6">
                                    <a href="#" class="h5">Kuruluthuda</a>
                                    <div class="d-flex my-3">
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <h4 class="mb-3">Rs:4,000</h4>
                                    <a href="/cheackout" class="btn border border-secondary rounded-pill px-2 text-primary"><i class="fa fa-receipt me-2 text-primary"></i> Order Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-4">
                        <div class="p-4 rounded bg-light">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <img src="img/kakulu.jpg" class="img-fluid rounded-circle w-100" alt="">
                                </div>
                                <div class="col-6">
                                    <a href="#" class="h5">Rathu Kakulu</a>
                                    <div class="d-flex my-3">
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <h4 class="mb-3">Rs:5,500</h4>
                                    <a href="/cheackout" class="btn border border-secondary rounded-pill px-2 text-primary"><i class="fa fa-receipt me-2 text-primary"></i> Order Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-4">
                        <div class="p-4 rounded bg-light">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <img src="img/suwadal.jpg" class="img-fluid rounded-circle w-100" alt="">
                                </div>
                                <div class="col-6">
                                    <a href="#" class="h5">suwadal</a>
                                    <div class="d-flex my-3">
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <h4 class="mb-3">Rs:5,000</h4>
                                    <a href="/cheackout" class="btn border border-secondary rounded-pill px-2 text-primary"><i class="fa fa-receipt me-2 text-primary"></i> Order Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-4">
                        <div class="p-4 rounded bg-light">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <img src="img/pachchaperumal.jpg" class="img-fluid rounded-circle w-100" alt="">
                                </div>
                                <div class="col-6">
                                    <a href="#" class="h5">pachchaperumal</a>
                                    <div class="d-flex my-3">
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <h4 class="mb-3">Rs:4,330</h4>
                                    <a href="/cheackout" class="btn border border-secondary rounded-pill px-2 text-primary"><i class="fa fa-receipt me-2 text-primary"></i> Order Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="text-center">
                            <img src="img/red-basmati.jpg" class="img-fluid rounded" alt="">
                            <div class="py-4">
                                <a href="#" class="h5">Red-Basmati</a>
                                <div class="d-flex my-3 justify-content-center">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h4 class="mb-3">Rs:4,500</h4>
                                <a href="/cheackout" class="btn border border-secondary rounded-pill px-2 text-primary"><i class="fa fa-receipt me-2 text-primary"></i> Order Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="text-center">
                            <img src="img/keeri samba.jpg" class="img-fluid rounded" alt="">
                            <div class="py-4">
                                <a href="#" class="h5">Keeri Samba</a>
                                <div class="d-flex my-3 justify-content-center">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h4 class="mb-3">Rs:3,750</h4>
                                <a href="/cheackout" class="btn border border-secondary rounded-pill px-2 text-primary"><i class="fa fa-receipt me-2 text-primary"></i> Order Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3 bg-color #6c757d">
                        <div class="text-center">
                            <img src="img/kalu heenati.jpg" class="img-fluid rounded" alt="">
                            <div class="py-4">
                                <a href="#" class="h5">Kalu Heenati</a>
                                <div class="d-flex my-3 justify-content-center">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h4 class="mb-3">Rs:5,500</h4>
                                <a href="/cheackout" class="btn border border-secondary rounded-pill px-2 text-primary"><i class="fa fa-receipt me-2 text-primary"></i> Order Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="text-center">
                            <img src="img/nadu.jpg" class="img-fluid rounded" alt="">
                            <div class="py-2">
                                <a href="/cheackout" class="h5">Nadu</a>
                                <div class="d-flex my-3 justify-content-center">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h4 class="mb-3">Rs:3,000</h4>
                                <a href="/cheackout" class="btn border border-secondary rounded-pill px-2 text-primary"><i class="fa fa-receipt me-2 text-primary"></i> Order Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bestsaler Product End -->

         <!-- Fact Start -->
         <div class="container-fluid py-5">
    <div class="container">
        <div class="bg-light p-5 rounded">
            <div class="row g-4 justify-content-center">
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="counter bg-white rounded p-5 text-center">
                        <i class="fa fa-user-check fa-2x text-secondary mb-3"></i>
                        <h4>Happy Farmers</h4>
                        <h1>1,110</h1>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="counter bg-white rounded p-5 text-center">
                        <i class="fa fa-handshake fa-2x text-secondary mb-3"></i>
                        <h4>Successful Trades</h4>
                        <h1>2,430</h1>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="counter bg-white rounded p-5 text-center">
                        <i class="fa fa-certificate fa-2x text-secondary mb-3"></i>
                        <h4>Certified Partners</h4>
                        <h1>33</h1>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="counter bg-white rounded p-5 text-center">
                        <i class="fa fa-seedling fa-2x text-secondary mb-3"></i>
                        <h4>Paddy Products</h4>
                        <h1>89</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
      </div>

      <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5">
            <div class="container py-5">
                <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5) ;">
                    <div class="row g-4">
                        <div class="col-lg-3">
                            <a href="#">
                                <h1 class="text-primary mb-0">Farmer Market</h1>
                                <p class="text-secondary mb-0">Paddy variety</p>
                            </a>
                        </div>
                        <div class="col-lg-6">
                            <div class="position-relative mx-auto">
                                <input class="form-control border-0 w-100 py-3 px-4 rounded-pill" type="number" placeholder="Your Email">
                                <button type="submit" class="btn btn-primary border-0 border-secondary py-3 px-4 position-absolute rounded-pill text-white" style="top: 0; right: 0;">Subscribe Now</button>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="d-flex justify-content-end pt-3">
                                <a class="btn  btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-youtube"></i></a>
                                <a class="btn btn-outline-secondary btn-md-square rounded-circle" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-item">
                            <h4 class="text-light mb-3">Why People Like us!</h4>
                            <p class="mb-4">People love Paddy Market Place because we put farmers first. By removing middlemen, 
                                we ensure fair prices and faster sales. Our platform is safe, transparent, and easy to use ,making it the trusted choice for farmers alike.</p>
                            <a href="" class="btn border-secondary py-2 px-4 rounded-pill text-primary">Read More</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="d-flex flex-column text-start footer-item">
                            <h4 class="text-light mb-3">Shop Info</h4>
                            <a class="btn-link" href="">About Us</a>
                            <a class="btn-link" href="">Contact Us</a>
                            <a class="btn-link" href="">Privacy Policy</a>
                            <a class="btn-link" href="">Terms & Condition</a>
                            <a class="btn-link" href="">Return Policy</a>
                            <a class="btn-link" href="">FAQs & Help</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="d-flex flex-column text-start footer-item">
                            <h4 class="text-light mb-3">Account</h4>
                            <a class="btn-link" href="">My Account</a>
                            <a class="btn-link" href="">Shop details</a>
                            <a class="btn-link" href="">Shopping Cart</a>
                            <a class="btn-link" href="">Wishlist</a>
                            <a class="btn-link" href="">Order History</a>
                            <a class="btn-link" href="">International Orders</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-item">
                            <h4 class="text-light mb-3">Contact</h4>
                            <p>Address: 110 Street,Arukwaththa,Padukka</p>
                            <p>Email: marketplace@gmail.com</p>
                            <p>Phone: 0703571834</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>        
    
</body>   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Javascript -->
    <script src="js/main.js"></script>
    </body>

</html>

