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
