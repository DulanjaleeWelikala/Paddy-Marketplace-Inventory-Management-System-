<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Paddy Marketplace - Inventory Management System</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://maps.app.goo.gl/Sqo25B8QsKeKaNJG7" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Wow.js Animation Library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>

    <style>
        /* Vision and Mission Card Hover Effect */
        .vision-mission-card {
            border-radius: 15px;
            transition: all 0.4s ease;
            box-shadow: 0 4px 12px rgba(169, 240, 149, 0.88);
        }

        .vision-mission-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            background:rgb(152, 209, 149);
        }

        /* About Section */
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

         /*** Features ***/
         .featurs .featurs-item .featurs-icon {
            position: relative;
            width: 120px;
            height: 120px;
        }

        .featurs .featurs-item .featurs-icon::after {
            content: "";
            width: 35px;
            height: 35px;
            background: var(--bs-secondary);
            position: absolute;
            bottom: -10px;
            transform: rotate(45deg);
        }

    </style>

</head>

<body>
    <div class="container-fluid fixed-top">
        <div class="container topbar bg-primary d-none d-lg-block">
            <div class="d-flex justify-content-between">
                <div class="top-info ps-2">
                    <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#"
                            class="text-white">110 Street,Arukwaththa,Padukka</a></small>
                    <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#"
                            class="text-white">marketplace@gmail.com</a></small>
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
                <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>
                <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                    <div class="navbar-nav mx-auto">
                        <a href="/index" class="nav-item nav-link active">Home</a>
                        <a href="/about" class="nav-item nav-link active">About</a>
                        <a href="/varaity" class="nav-item nav-link">Paddy</a>
                        <a href="/contact" class="nav-item nav-link">Contact</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <!-- Page Header -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">About Us</h1>
    </div>

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="about-img position-relative overflow-hidden p-5 pe-0">
                        <img class="img-fluid w-100" src="img/farmers.jpg" alt="Farmers Image">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.4s">
                    <h1 class="display-5 mb-4">Help Farmers Earn More For Their Hard Work</h1>
                    <p class="mb-4">We provide a digital platform where farmers can sell their paddy in bulk at fair and transparent prices without the need for middlemen. By connecting farmers directly with verified buyers, we ensure they receive higher returns for their produce and have greater control over the selling process.</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Better pricing for farmers</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Bulk selling made easy</p>
                    <p><i class="fa fa-check text-primary me-3"></i>No intermediaries, no hidden cuts</p>
                </div>
            </div>
        </div>

        <!-- Vision and Mission Section -->
        <div class="row g-5 mt-5">
            <!-- Vision Card -->
            <div class="col-lg-6 wow zoomIn" data-wow-delay="0.3s">
                <div class="bg-light p-5 h-100 vision-mission-card">
                    <h2 class="mb-4 text-primary">Our Vision</h2>
                    <p>To revolutionize the agriculture marketplace by empowering farmers with technology, enabling them to earn fair prices, access better markets, and build a sustainable future.</p>
                </div>
            </div>
            <!-- Mission Card -->
            <div class="col-lg-6 wow zoomIn" data-wow-delay="0.6s">
                <div class="bg-light p-5 h-100 vision-mission-card">
                    <h2 class="mb-4 text-primary">Our Mission</h2>
                    <p>Our mission is to create a transparent, farmer-centric platform that removes barriers, reduces dependency on middlemen, and ensures farmers achieve financial stability through direct, efficient trading opportunities.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

     <!-- Features Start -->
     <div class="container-fluid bg-light bg-icon my-5 py-6">
        <div class="container">
            <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="display-5 mb-3">Why Choose Paddy Marketplace</h1>
                <p>We connect farmers directly with buyers, ensuring fair prices, transparency, and a better future for agriculture.</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white text-center h-100 p-4 p-xl-5">
                        <img class="img-fluid mb-4" src="img/icon-1.png" alt="Fair Price">
                        <h4 class="mb-3">Fair Market Prices</h4>
                        <p class="mb-4">We eliminate middlemen so that farmers get higher profits for their paddy through transparent bulk sales.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white text-center h-100 p-4 p-xl-5">
                        <img class="img-fluid mb-4" src="img/icon-2.png" alt="Verified Buyers">
                        <h4 class="mb-3">Verified Buyers & Sellers</h4>
                        <p class="mb-4">All traders on our platform are verified, ensuring safe transactions and quality produce every time.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white text-center h-100 p-4 p-xl-5">
                        <img class="img-fluid mb-4" src="img/icon-3.png" alt="Easy Logistics">
                        <h4 class="mb-3">Easy Logistics</h4>
                        <p class="mb-4">We offer support for transporting your paddy to buyers quickly and safely, reducing time and effort.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->

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
