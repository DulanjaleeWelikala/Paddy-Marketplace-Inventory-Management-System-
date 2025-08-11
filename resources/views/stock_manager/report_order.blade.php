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
      right: 20px;
      z-index: 9999;
      display: flex;
      flex-direction: column;
      gap: 10px;
    }

    .toast-message {
      background: #333;
      color: white;
      padding: 12px 18px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.2);
      display: flex;
      align-items: center;
      gap: 10px;
      font-size: 14px;
      animation: fadeIn 0.5s ease forwards;
    }

    .toast-message.success {
      background-color: #22c55e;
    }

    .toast-message.error {
      background-color: #ef4444;
    }

     .badge.bg-danger {
        font-size: 0.9rem;
        padding: 4px 8px;
        border-radius: 8px;
    }
    .alert {
        margin-top: 1rem;
        font-size: 1rem;
    }

    /* Container spacing */
.main-content {
  padding: 20px 30px;
  max-width: 1100px;
  margin: 0 auto;
}

/* Page title styling */
.page-title .title {
  font-size: 1.6rem;
  font-weight: 600;
  color: #374151;
  margin-bottom: 1rem;
  display: flex;
  align-items: center;
  gap: 0.5rem;
}

/* Card container */
.card {
  background: #fff;
  border-radius: 12px;
  padding: 30px 40px;
  box-shadow: 0 4px 15px rgb(0 0 0 / 0.1);
}

/* Form layout */
.filter-form .form-row {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
  margin-bottom: 30px;
}

.filter-form .form-group {
  flex: 1 1 200px;
  display: flex;
  flex-direction: column;
}

.filter-form .form-label {
  margin-bottom: 6px;
  font-weight: 500;
  color: #374151;
}

.filter-form .form-control {
  padding: 8px 12px;
  font-size: 1rem;
  border: 1px solid #d1d5db;
  border-radius: 6px;
  transition: border-color 0.2s ease;
}

.filter-form .form-control:focus {
  outline: none;
  border-color: #3b82f6;
  box-shadow: 0 0 5px rgba(59, 130, 246, 0.5);
}

/* Align filter button bottom */
.filter-form .align-end {
  display: flex;
  align-items: flex-end;
  padding-bottom: 3px;
}

.btn-primary {
  background-color: #3b82f6;
  color: #fff;
  border: none;
  padding: 10px 22px;
  border-radius: 8px;
  cursor: pointer;
  font-weight: 600;
  font-size: 1rem;
  transition: background-color 0.3s ease;
}

.btn-primary:hover {
  background-color: #2563eb;
}

/* Table styling */
.user-table {
  width: 100%;
  border-collapse: collapse;
  font-size: 18px;       /* Bigger font size */
}

.user-table th,
.user-table td {
  padding: 20px 25px;   /* More padding for bigger cells */
  text-align: left;
  border-bottom: 1px solid #e5e7eb;
  vertical-align: middle;
}

.user-table th {
  background-color: #f3f4f6;
  color: #374151;
  font-weight: 600;
}

.user-table tbody tr {
  height: 60px;          /* More height for rows */
}

.status {
  padding: 6px 14px;     /* Slightly bigger badges */
  border-radius: 20px;
  font-size: 14px;
  font-weight: 600;
}

.user-table {
  width: 1200px;  /* fixed width wider than container */
  min-width: 1200px;
  border-collapse: collapse;
}

.card {
  max-width: 1200px;
  margin: 40px auto;
  padding: 30px 40px;
  background: white;
  border-radius: 12px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.table-wrapper {
  overflow-x: auto;  /* horizontal scroll if table too wide */
}

/* Alert box */
.alert.alert-warning {
  background-color: #fef3c7;
  color: #92400e;
  padding: 15px 20px;
  border-radius: 8px;
  font-size: 1rem;
  margin-top: 20px;
}

.report-title {
  font-weight: 700;
  font-size: 1.8rem;
  color: #2c3e50;
}

.from-input {
  font-size: 1.2rem;
  padding: 10px 12px;
}

.from-input {
    font-size: 1.5rem;       /* Larger font for From Date */
    padding: 12px 15px;      /* Bigger padding */
    height: 50px;            /* Taller input */
    max-width: 100%;
    box-sizing: border-box;
  }

  /* Make other date and select inputs consistent height */
  input[type="date"], select.form-control {
    font-size: 1rem;
    padding: 8px 12px;
    height: 40px;
    box-sizing: border-box;
  }

  .form-label {
    font-weight: 600;
    display: block;
    margin-bottom: 6px;
  }

  .btn-primary {
    cursor: pointer;
  }

  .main-content {
  margin-left: 0;
  margin-right: auto;
  max-width: 100%;
  padding: 20px;
}

 .btn-custom {
    background-color:rgb(10, 107, 116);  /* orange red */
    border-color:rgb(49, 144, 245);
    color: white; /* text color */
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
        <x-app-layout></x-app-layout>
      </div>
    </div>
  </div>

<!-- Main Content -->
<div class="main-content">
  <div class="page-title">
    <div class="title"><i class="fas fa-file-alt"></i> Report Generate</div>
       <div style="margin: 20px 40px; text-align: right;">
            <a href="{{ route('stock_manager.report_pdf') }}" class="btn btn-sm btn-primary" target="_blank">
              <i class="fas fa-file-download" style="margin-right: 6px;"></i> Generate PDF
            </a>
          </div>
  </div>

  <form method="GET" action="{{ route('stock_manager.report_order') }}" class="filter-form" style="display: flex; flex-wrap: wrap; gap: 1rem; align-items: flex-end; margin-bottom: 30px;">
    <div class="form-group">
      <label for="from" class="form-label">From Date</label>
      <input
        type="date"
        id="from"
        name="from"
        class="form-control from-input"
        value="{{ request('from') }}"
        required
      />
    </div>

    <div class="form-group">
      <label for="to" class="form-label">To Date</label>
      <input
        type="date"
        id="to"
        name="to"
        class="form-control"
        value="{{ request('to') }}"
        required
      />
    </div>

    <div class="form-group">
      <label for="status" class="form-label">Status</label>
      <select id="status" name="status" class="form-control">
        <option value="">All</option>
        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
        <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Rejected</option>
        <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Accepted</option>
      </select>
    </div>

    <div class="form-group" style="text-align: left;">
  <button type="submit" class="btn btn-primary" style="background-color:rgb(5, 64, 83); border-color:rgb(24, 33, 211);">View</button>
</div>

  </form>

  @if(session('error'))
    <div class="alert alert-warning">{{ session('error') }}</div>
  @endif

  @if($orders && $orders->count() > 0)
    <div class="card">
      <div class="table-wrapper">
        <table class="user-table">
          <thead>
            <tr>
              <th>Order ID</th>
              <th>Farmer ID</th>
              <th>Paddy ID</th>
               <th>Product Name</th>
               <th>Quantity (kg)</th>
              <th>Date</th>
              <th>Status</th>
              <th>Total Amount</th>
            </tr>
          </thead>
          <tbody>
            @foreach($orders as $order)
              <tr>
                <td>OR{{ $order->id }}</td>
                <td>FM{{ $order->farmer_id }}</td>
                <td>PD{{ $order->paddy_id }}</td>
                 <td>{{ $order->product_name }}</td>
                 <td>{{ $order->quantity }}</td>
                <td>{{ $order->created_at->format('Y-m-d') }}</td>
                <td>
                  <span class="status {{ strtolower($order->status) }}">
                    {{ ucfirst($order->status) }}
                  </span>
                </td>
                <td>{{  number_format($order->price, 2) }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  @else
    <div class="alert alert-warning">No orders found for the selected criteria.</div>
  @endif
</div>
