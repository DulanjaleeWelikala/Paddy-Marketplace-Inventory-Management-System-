<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Checkout - {{ $paddy->product_name }}</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .container {
      max-width: 1140px;
    }
    .card {
      border-radius: 1.5rem;
      box-shadow: 0 0.7rem 1.4rem rgba(0,0,0,0.18);
      overflow: hidden;
      background: #fff;
      min-height: 560px;
      padding: 1rem;
    }
    .product-image {
      width: 100%;
      height: 100%;
      object-fit: cover;
      border-radius: 1.5rem 0 0 1.5rem;
      box-shadow: inset 0 0 40px rgba(0,0,0,0.05);
      transition: transform 0.3s ease;
    }
    .product-image:hover {
      transform: scale(1.05);
    }
    @media (max-width: 767.98px) {
      .product-image {
        height: 360px;
        border-radius: 1.5rem 1.5rem 0 0;
      }
      .card-body {
        padding: 1.75rem 1.5rem;
      }
    }
    h3.card-title {
      font-weight: 700;
      font-size: 2rem;
      color: #2c3e50;
      margin-bottom: 0.8rem;
    }
    p.card-text {
      font-size: 1.1rem;
      color: #495057;
    }
    label.form-label {
      font-weight: 600;
      color: #343a40;
      font-size: 1rem;
    }
    .input-group-text {
      background-color: #e9f7ef;
      border: 1px solid #198754;
      color: #198754;
      font-weight: 700;
      font-size: 1.25rem;
      border-radius: 0.5rem 0 0 0.5rem;
    }
    .form-control {
      font-size: 1.1rem;
      border-radius: 0 0.5rem 0.5rem 0;
      border: 1px solid #198754;
      padding-left: 1rem;
    }
    select.form-select {
      font-size: 1.1rem;
      border-radius: 0.5rem;
      border: 1px solid #198754;
    }
    #totalPrice {
      font-size: 1.5rem;
      color: #198754;
      font-weight: 700;
      letter-spacing: 0.05em;
    }
    .btn-success {
      font-weight: 700;
      font-size: 1.2rem;
      padding: 0.85rem;
      border-radius: 0.75rem;
      background-color: #198754;
      border: none;
      transition: background-color 0.3s ease;
      box-shadow: 0 0.4rem 0.8rem rgba(25, 135, 84, 0.5);
    }
    .btn-success:hover {
      background-color: #146c43;
      box-shadow: 0 0.5rem 1rem rgba(20, 108, 67, 0.7);
    }
    .alert {
      border-radius: 0.75rem;
      font-size: 1.05rem;
    }
  </style>
</head>
<body>

@if ($errors->any())
  <div class="container mt-4">
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  </div>
@endif

@if(session('success'))
  <div class="container mt-4">
    <div class="alert alert-success">{{ session('success') }}</div>
  </div>
@endif

<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-12">
      <div class="card shadow rounded-4">
        <div class="row g-0 align-items-stretch">
          <!-- Product Image -->
          <div class="col-md-6 order-md-1">
            <img src="{{ asset('storage/' . $paddy->image) }}" 
                 alt="{{ $paddy->product_name }}" 
                 class="product-image" />
          </div>

          <!-- Product Details & Order Form -->
          <div class="col-md-6 order-md-2 d-flex flex-column">
            <div class="card-body d-flex flex-column justify-content-center h-100">
              <h3 class="card-title">{{ $paddy->product_name }}</h3>
              <p class="card-text mb-3">{{ $paddy->description }}</p>
              <p class="card-text mb-4">
                <i class="bi bi-box-seam me-2" style="color:#198754;"></i>
                <strong>Available Quantity:</strong> {{ $paddy->quantity }} kg<br>
                <strong><i class="bi bi-cash-coin"></i> Price per kg:</strong> Rs. {{ number_format($paddy->price, 2) }}
              </p>
          
              @if($totalSystemStock >= $maxCapacity)
    <div class="alert alert-danger">
        Cannot add more paddy. Stock limit of {{ number_format($maxCapacity) }} kg reached!
    </div>
@else

<form action="{{ route('place.order') }}" method="POST">
  @csrf
  <!-- Use string-based paddy_id (like PD1) -->
  <input type="hidden" name="paddy_id" value="{{ $paddy->paddy_id }}">
  <input type="hidden" id="unit_price" value="{{ $paddy->price }}">

  <!-- Quantity Input -->
  <div class="mb-4">
    <label for="quantity" class="form-label">Order Quantity (kg)</label>
    <div class="input-group">
      <span class="input-group-text"><i class="bi bi-calculator"></i></span>
      <input type="number" name="quantity" id="quantity" class="form-control" 
             min="25" max="{{ $paddy->quantity }}" required placeholder="Minimum 25 kg">
    </div>
    <small class="text-muted">Minimum 25kg. Cannot exceed available stock.</small>
  </div>

  <!-- Payment Method -->
  <div class="mb-4">
    <label for="payment_method" class="form-label">Payment Method</label>
    <div class="input-group">
      <span class="input-group-text"><i class="bi bi-credit-card-2-front-fill"></i></span>
      <select name="payment_method" id="payment_method" class="form-select" required>
        <option value="" disabled selected>-- Select Payment Method --</option>
        <option value="Cash">Cash</option>
        <option value="Credit Card">Credit Card</option>
        <option value="Bank Transfer">Bank Transfer</option>
      </select>
    </div>
  </div>

  <!-- Total Price Display -->
  <div class="mb-4">
    <label class="form-label">Total Price:</label>
    <div id="totalPrice">Rs. 0.00</div>
  </div>

  <button type="submit" class="btn btn-success w-100">
    <i class="bi bi-cart-check me-2"></i> Place Order
  </button>
</form>

@endif


<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Calculate Total Price -->
<script>
  document.getElementById('quantity').addEventListener('input', function () {
    const qty = parseFloat(this.value);
    const price = parseFloat(document.getElementById('unit_price').value);
    const total = (qty && qty >= 25) ? (qty * price).toFixed(2) : '0.00';
    document.getElementById('totalPrice').innerText = `Rs. ${total}`;
  });
</script>

</body>
</html>
