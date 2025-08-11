<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
    <link rel="stylesheet" href="{{ asset('Stock_Manager/styles.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">



      <style>
  body {
        font-family: 'Poppins', sans-serif;
        background-color:rgb(179, 214, 247);
        margin: 0;
        padding: 0;
      }

      .nav-link {
        color: white;
        text-decoration: none;
      }

      .card {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgb(0 0 0 / 0.1);
        margin-top: 1.5rem;
        padding: 1rem 1.5rem;
      }

      .card-header {
        font-weight: 600;
        font-size: 1.2rem;
        margin-bottom: 1rem;
        color: #021f4e;
      }

      .dashboard-row {
        display: flex;
        gap: 1.5rem;
        margin-top: 2rem;
        flex-wrap: wrap;
      }

      .top-stock-varieties {
        flex: 1;
        background: transparent;
        padding: 0;
        box-shadow: none;
        color: #021f4e;
      }

      .dashboard-row > div:last-child {
        flex: 2;
      }

      .dashboard-row > div:last-child .card {
        max-width: 100%;
      }

      @media (max-width: 768px) {
        .dashboard-row {
          flex-direction: column;
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

.card-body {
  height: 350px;
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
          <div class="title">Dashboard</div>
          <div class="action-buttons">
            <button class="btn btn-outline">
              <i class="fas fa-download"></i>
              Export
            </button>
            <button class="btn btn-primary">
              <i class="fas fa-plus"></i>
              Add New
            </button>
          </div>
        </div>

        <!-- Stats Cards -->
        <div class="stats-cards">
          <div class="stat-card">
            <div class="card-header">
              <div>
                <div class="card-value">1,504</div>
                <div class="card-label">Total Users</div>
              </div>
              <div class="card-icon purple">
                <i class="fas fa-users"></i>
              </div>
            </div>
          </div>

          <div class="stat-card">
            <div class="card-header">
              <div>
                <div class="card-value">100</div>
                <div class="card-label">Total Products</div>
              </div>
              <div class="card-icon blue">
                <i class="fas fa-dollar-sign"></i>
              </div>
            </div>
          </div>

          <div class="stat-card">
            <div class="card-header">
              <div>
                <div class="card-value">324</div>
                <div class="card-label">Total Orders</div>
              </div>
              <div class="card-icon green">
                <i class="fas fa-shopping-cart"></i>
              </div>
            </div>
            <div class="card-change negative">
              <i class="fas fa-arrow-down"></i>
              <span>3.1% from last month</span>
            </div>
          </div>

          <div class="stat-card">
            <div class="card-header">
              <div>
                <div class="card-value">85%</div>
                <div class="card-label">Conversion Rate</div>
              </div>
              <div class="card-icon orange">
                <i class="fas fa-chart-line"></i>
              </div>
            </div>
            <div class="card-change positive">
              <i class="fas fa-chart-line"></i>
            <span>Paddy market up 4.6% this month</span>
            </div>
          </div>
        </div>
         
           <div class="dashboard-row">
          <!-- Left: Top Stock Varieties (no card box) -->
          <div class="top-stock-varieties">
            <livewire:top-stock-varieties wire:poll.15s />
          </div>

          <!-- Right: Bar Chart -->
          <div>
            <div class="card" style="max-width: 700px;">
              <div class="card-header">Monthly Summary</div>
              <div class="card-body">
                <canvas id="projectsBarChart" height="300" width="600"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- JS for Chart -->
    <script>
      const ctx = document.getElementById("projectsBarChart").getContext("2d");
      new Chart(ctx, {
        type: "bar",
        data: {
          labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
          datasets: [
            {
              label: "Completed Projects",
              data: [3, 5, 2, 6, 4, 7],
              backgroundColor: "rgba(2, 31, 78, 0.8)",
              borderColor: "rgba(2, 31, 78, 1)",
              borderWidth: 1,
              borderRadius: 5,
            },
          ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          scales: {
            y: {
              beginAtZero: true,
              ticks: {
                stepSize: 1,
              },
            },
          },
          plugins: {
            legend: {
              position: "top",
            },
          },
        },
      });
    </script>
       
  </body>
</html>