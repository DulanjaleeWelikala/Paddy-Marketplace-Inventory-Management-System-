<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Stock Manager Dashboard</title>

  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
  />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
    rel="stylesheet"
  />
  <link rel="stylesheet" href="{{ asset('Admin/styles.css') }}">

  <style>
    /* Reuse your styles from above for consistency */
     body {
      background-color:rgb(192, 217, 252);
      color: var(--text);
      overflow-x: hidden;
      font-family: 'Poppins', sans-serif;
    }

    .card {
      background: white;
      border-radius: 12px;
      padding: 30px 40px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
      max-width: 1000px;
      margin: 40px auto;
    }

    .user-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 30px;
    }

    .btn {
      padding: 10px 18px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-weight: 500;
      transition: all 0.2s ease-in-out;
    }

    .btn-primary {
      background-color: #3b82f6;
      color: white;
    }

    .btn-primary:hover {
      background-color: #2563eb;
    }

    .btn-sm {
      padding: 6px 10px;
      font-size: 14px;
      border-radius: 6px;
      margin-right: 4px;
    }

    .btn-sm.btn-danger {
      background-color: #ef4444;
      color: white;
    }

    .btn-sm.btn-edit {
      background-color: #3b82f6;
      color: white;
    }

    .user-table {
      width: 100%;
      border-collapse: collapse;
    }

    .user-table th,
    .user-table td {
      padding: 14px 18px;
      text-align: left;
      border-bottom: 1px solid #e5e7eb;
      font-size: 15px;
      vertical-align: middle;
    }

    .user-table th {
      background-color: #f3f4f6;
      color: #374151;
    }

    .status {
      padding: 4px 10px;
      border-radius: 20px;
      font-size: 12px;
      font-weight: 500;
    }

    .status.active {
      background-color: #d1fae5;
      color: #10b981;
    }

    /* Images inside table */
    table img {
      max-width: 80px;
      height: auto;
      border-radius: 6px;
      display: block;
    }

    /* Modal Styles */
    .modal {
      display: none;
      position: fixed;
      z-index: 1000;
      left: 0; top: 0;
      width: 100%; height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
    }

    .modal-content {
      background-color: white;
      margin: 10% auto;
      padding: 20px;
      border-radius: 12px;
      width: 400px;
      position: relative;
    }

    .modal-content h3 {
      margin-bottom: 15px;
      font-size: 20px;
    }

    .modal-content input,
    .modal-content select {
      width: 100%;
      padding: 10px;
      margin-bottom: 12px;
      border-radius: 6px;
      border: 1px solid #d1d5db;
    }

    .close-btn {
      position: absolute;
      top: 10px;
      right: 16px;
      font-size: 22px;
      cursor: pointer;
      color: #6b7280;
    }

    .close-btn:hover {
      color: black;
    }

    @media (max-width: 768px) {
      .card {
        max-width: 90%;
        padding: 20px;
      }

      .user-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
      }

      .modal-content {
        width: 90%;
      }
    }

    /* Toast Container */
     #toast-container {
      position: fixed;
      top: 20px;
      left: 50%;
      transform: translateX(-50%);
      z-index: 9999;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 10px;
      pointer-events: none; /* So clicks pass through if no toasts */
    }

    .toast-message {
      background: #333;
      color: white;
      padding: 12px 18px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      display: flex;
      align-items: center;
      gap: 10px;
      font-size: 14px;
      animation: fadeIn 0.5s ease forwards;
      pointer-events: auto; /* So you can interact with the toast */
      min-width: 200px;
      text-align: center;
    }

    .toast-message.success {
      background-color:rgb(45, 92, 233);
    }

    .toast-message.error {
      background-color: #ef4444;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(-20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

       .sidebar {
  width: 250px;
  background-color: #021f4e;
  color: #fff;
  padding: 1.5rem 1rem;
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  overflow-y: auto;
  z-index: 1000;
}

  </style>
</head>
<body>

<div class="container">
      <!-- Sidebar -->
      <div class="sidebar">
        <div class="logo">
          <h1>Stock <span>Manager</span></h1>
        </div>
        <div class="nav-menu">
          <div class="menu-heading">Main</div>
          <div class="nav-item">
            <i class="fas fa-home"></i>
            <a href="/varaity" class="nav-link"><span>Home</span></a>
          </div>
          <div class="nav-item ">
            <i class="fas fa-chart-pie"></i>
            <a href="/stock_manager/index" class="nav-link"><span>Dashboard</span></a>
          </div>
          <div class="nav-item">
            <i class="fas fa-shopping-cart"></i>
            <a href="/stock_manager/orders" class="nav-link"><span>Orders</span></a>
          </div>
           <div class="nav-item">
            <i class="fas fa-box"></i>
            <a href="/stock_manager/stock" class="nav-link"><span>Stock</span></a>
          </div>
          <div class="nav-item">
            <i class="fas fa-folder-open"></i>
            <a href="/stock_manager/report_order" class="nav-link"><span>Reports</span></a>
          </div>
          
          <div class="menu-heading">Admin</div>
          <div class="nav-item">
            <i class="fas fa-cog"></i>
            <span>Settings</span>
          </div>
          <div class="nav-item">
            <i class="fas fa-bell"></i>
            <span>Notifications</span>
          </div>
          <div class="nav-item">
            <i class="fas fa-shield-alt"></i>
            <span>Security</span>
          </div>
        </div>
      </div>

  <!-- Header -->
      <div class="header">
        <div class="search-bar">
          <i class="fas fa-search"></i>
          <input type="text" placeholder="Search..." />
        </div>
        <div class="header-actions">
          <div class="notification">
            <i class="fas fa-bell"></i>
            <div class="badge">3</div>
          </div>
          <div class="notification">
            <i class="fas fa-envelope"></i>
            <div class="badge">5</div>
          </div>
          <div class="user-profile">
            <x-app-layout>
           </x-app-layout>
          </div>
        </div>
      </div>
      
  <!-- Main Content -->
  <div class="main-content">
    <div class="page-title">
      <div class="title"><i class="fas fa-shopping-cart"></i> Order Managment</div>
    </div>

     <div class="table-card">
      <div class="card-title">
       <h3><i class="fas fa-clipboard-list"></i>All Orders</h3>
         <!-- 🔍 Search Input -->
      <div style="margin-bottom: 15px;">
        <input type="text" id="userSearchInput" placeholder="Search users..." style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid #ccc;" />
      </div>
      </div>

   <table class="user-table" id="ordersTable">
    <thead>
        <tr>
            <th>Order ID</th>
            <th>Paddy ID</th>
            <th>Farmer ID</th>
            <th>Product Name</th>
            <th>Quantity (kg)</th>
            <th>Total Price (Rs.)</th>
            <th>Order Date</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
       @foreach($orders as $order)
<tr>
    <td>OR{{ $order->id }}</td>
    <td>PD{{ $order->paddy_id }}</td>
    <td>FM{{ $order->farmer_id }}</td>
    <td>{{ $order->product_name }}</td>
    <td>{{ $order->quantity }}</td>
    <td>{{ number_format($order->price, 2) }}</td>
    <td>{{ $order->created_at->format('Y-m-d') }}</td>
    <td>
        <span class="status {{ strtolower($order->status) }}">
            {{ ucfirst($order->status) }}
        </span>
    </td>
    <td>
        @if ($order->status !== 'cancelled')

            <!-- EDIT button opens modal -->
            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editOrderModal{{ $order->id }}">
                Edit
            </button>

            <!-- DELETE FORM -->
            <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Are you sure?');" class="btn btn-sm btn-danger">Delete</button>
            </form>

            @if ($order->status === 'pending')
            <!-- CANCEL button opens modal -->
            <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#cancelOrderModal{{ $order->id }}">
                Cancel
            </button>
            @endif

        @else
            <span class="text-muted">Cancelled</span>
        @endif
    </td>
</tr>

<!-- Cancel Modal -->
<div class="modal fade" id="cancelOrderModal{{ $order->id }}" tabindex="-1" aria-labelledby="cancelOrderModalLabel{{ $order->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('orders.cancel', $order->id) }}">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cancelOrderModalLabel{{ $order->id }}">Cancel Order</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="reason">Reason for cancellation:</label>
                <textarea name="reason" id="reason" class="form-control" rows="3" required></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-warning">Confirm Cancel</button>
            </div>
        </div>
    </form>
  </div>
</div>


<div class="modal fade" id="editOrderModal{{ $order->id }}" tabindex="-1" aria-labelledby="editOrderModalLabel{{ $order->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('orders.update', $order->id) }}">
        @csrf
        @method('PUT')

        <!-- Hidden paddy_id to fix missing value error -->
        <input type="hidden" name="paddy_id" value="{{ $order->paddy_id }}">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editOrderModalLabel{{ $order->id }}">Edit Order OR{{ $order->id }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label>Quantity (kg)</label>
                    <input type="number" name="quantity" class="form-control" value="{{ $order->quantity }}" required>
                </div>
                <div class="mb-3">
                    <label>Payment Method</label>
                    <input type="text" name="payment_method" class="form-control" value="{{ $order->payment_method ?? '' }}" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Update</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </form>
  </div>
</div>
@endforeach

<div id="toast-container"></div>

<!-- Bootstrap JS (with Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
  // Order search filter
  document.getElementById('orderSearchInput').addEventListener('input', function () {
    const filter = this.value.toLowerCase();
    const rows = document.querySelectorAll('#ordersTable tbody tr');
    rows.forEach(row => {
      const text = row.textContent.toLowerCase();
      row.style.display = text.includes(filter) ? '' : 'none';
    });
  });
</script>

<script>
  function showToast(message, type = 'success') {
    const toast = document.createElement('div');
    toast.className = `toast-message ${type}`;
    toast.innerHTML = `<i class="fas fa-check-circle"></i> ${message}`;
    document.getElementById('toast-container').appendChild(toast);

    setTimeout(() => {
      toast.remove();
    }, 3000);
  }

  // Show toast from session messages
  @if(session('success'))
    showToast("{{ session('success') }}", 'success');
  @endif

  @if(session('error'))
    showToast("{{ session('error') }}", 'error');
  @endif
</script>

</body>
</html>
