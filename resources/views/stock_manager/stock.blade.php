
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

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

  

  

  <style>
    /* Your CSS styles here */
    body {
      background-color: rgb(192, 217, 252);
      color: var(--text);
      overflow-x: hidden;
      font-family: 'Poppins', sans-serif;
    }

    @keyframes flashRed {
  0%, 100% {
    opacity: 1;
    color: #dc2626;
    text-shadow: 0 0 8px #dc2626;
  }
  50% {
    opacity: 0.5;
    color: #f87171;
    text-shadow: none;
  }
}

.low-stock-warning {
  font-weight: 700;
  font-size: 1.1rem;
  animation: flashRed 1.5s infinite;
  display: inline-block;
  color: #dc2626;
}

/* Styled table */
.stock-table {
  width: 100%;
  border-collapse: collapse;
  background-color: #fff;
  font-size: 15px;
}

.stock-table th,
.stock-table td {
  padding: 14px;
  border: 1px solid #e5e7eb;
}

.stock-table th {
  background-color: #f3f4f6;
  font-weight: 600;
  color: #374151;
}

.stock-box {
  background-color: #f9fafb;
  padding: 12px;
  border-radius: 10px;
  box-shadow: 0 1px 4px rgba(0,0,0,0.08);
  text-align: center;
}

/* Stock amount text */
.stock-amount {
  font-size: 18px;
  display: block;
}

/* Warning style for low stock */
.low-stock-warning {
  font-weight: bold;
  font-size: 1.2rem;
  color: #dc2626;
  animation: flashRed 1.5s infinite;
}

/* Flash animation */
@keyframes flashRed {
  0%, 100% {
    opacity: 1;
    text-shadow: 0 0 8px #dc2626;
  }
  50% {
    opacity: 0.5;
    text-shadow: none;
  }
}

/* Common alert animation class */
.animated-alert {
  animation: pulseAlert 1.5s ease-in-out infinite;
  border-radius: 8px;
  padding: 15px;
  font-size: 17px;
  text-align: center;
}

/* Red alert with pulse */
.alert-stock-limit {
  background-color: #f8d7da;
  border: 1px solid #f5c2c7;
  color: #842029;
}

/* Yellow alert with pulse */
.alert-stock-warning {
  background-color: #fff3cd;
  border: 1px solid #ffeeba;
  color: #664d03;
}

.badge {
    padding: 6px 10px;
    border-radius: 8px;
    font-size: 0.85rem;
}
.bg-danger {
    background-color: #dc3545;
    color: #fff;
}
.bg-success {
    background-color: #28a745;
    color: #fff;
}

/* Flash/pulse animation */
@keyframes pulseAlert {
  0%, 100% {
    transform: scale(1);
    opacity: 1;
  }
  50% {
    transform: scale(1.05);
    opacity: 0.92;
  }
}


.badge-low-stock {
  animation: flashRed 1.5s infinite;
  background-color: #dc3545; /* red background */
  color: #fff;
  font-weight: 700;
  border-radius: 8px;
  padding: 6px 10px;
  display: inline-block;
  text-align: center;
}

/* Sufficient stock badge animation */
.badge-sufficient {
  animation: pulseAlert 2.5s ease-in-out infinite;
  background-color: #28a745;
  color: #fff;
  font-weight: 600;
  border-radius: 10px;
  padding: 8px 14px;
  display: inline-block;
  text-align: center;
  box-shadow: 0 0 10px rgba(40, 167, 69, 0.2);
  transition: transform 0.3s ease;
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


    /* ... other styles omitted for brevity ... */
  </style>
</head>
<body>

<div class="container">
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar content here -->
    <div class="logo">
      <h1>Stock <span>Manager</span></h1>
    </div>
    <div class="nav-menu">
      <!-- navigation items -->
      <div class="menu-heading">Main</div>
      <div class="nav-item">
        <i class="fas fa-home"></i>
        <a href="/varaity" class="nav-link"><span>Home</span></a>
      </div>
      <div class="nav-item">
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
        <x-app-layout></x-app-layout>
      </div>
    </div>
  </div>

  <!-- Main Content -->
  <div class="main-content">
    <div class="page-title">
      <div class="title"><i class="fas fa-warehouse"></i> Paddy Stock</div>
    </div>

    <div class="table-card">
      <div class="card-title">
        <h3><i class="fas fa-clipboard-list"></i> Stock</h3>
        <!-- Search Input -->
        <div style="margin-bottom: 15px;">
          <input type="text" id="userSearchInput" placeholder="Search users..." style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid #ccc;" />
        </div>
      </div>

    @if($totalSystemStock > $maxCapacity)
  <div class="alert alert-danger fw-bold animated-alert alert-stock-limit">
      🚫 Stock limit exceeded! Maximum allowed is {{ number_format($maxCapacity) }} kg.
  </div>
@elseif($remainingCapacity < 1000)
  <div class="alert alert-warning fw-bold animated-alert alert-stock-warning">
      ⚠️ Stock capacity nearing full. Only {{ number_format($remainingCapacity) }} kg left.
  </div>
@endif

<table class="stock-table table table-bordered" id="ordersTable">
    <thead class="table-light text-center">
        <tr>
            <th>Section ID</th>
            <th>Paddy ID</th>
            <th>Product Name</th>
            <th>Stock Alert</th>
            <th>Available Stock</th>
            <th>Store Date</th>
            <th>Total Stock (kg)</th>
        </tr>
    </thead>
    <tbody>
        @foreach($stock as $index => $item)
        <tr class="text-center align-middle {{ $item->total_quantity < 50 ? 'table-danger' : '' }}">
            <td>SID{{ $index + 1 }}</td>
            <td>PM{{ $item->paddy_id }}</td>
            <td>{{ $item->product_name }}</td>
            <td>
                @if($item->total_quantity < 50)
                    <span class="badge badge-low-stock">⚠️ Low Stock</span>
                @else
                    <span class="badge badge-sufficient">✔️ Sufficient</span>
                @endif
            </td>
            <td><strong>{{ number_format($item->total_quantity, 2) }} kg</strong></td>
            <td>{{ \Carbon\Carbon::parse($item->created_at)->format('Y-m-d') }}</td>
            <td><strong>{{ number_format($item->total_quantity, 2) }} kg</strong></td>
        @endforeach
    </tbody>
    <tfoot>
        <tr class="table-secondary text-center">
            <td colspan="6" class="text-end"><strong>Total System Stock:</strong></td>
            <td><strong>{{ number_format($totalSystemStock, 2) }} kg</strong></td>
            <td></td>
        </tr>
    </tfoot>
</table>
<!-- Bootstrap Bundle with Popper (Required for modals to work) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


<script>
  // Optional: JavaScript for Search Filtering on table
  document.getElementById('userSearchInput').addEventListener('input', function () {
    let filter = this.value.toLowerCase();
    let rows = document.querySelectorAll('#ordersTable tbody tr');

    rows.forEach(row => {
      let productName = row.cells[2].textContent.toLowerCase();
      if (productName.includes(filter)) {
        row.style.display = '';
      } else {
        row.style.display = 'none';
      }
    });
  });
</script>

</body>
</html>
