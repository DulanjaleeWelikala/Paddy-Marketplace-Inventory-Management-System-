<div class="sidebar">
  <div class="logo">
    <h1>Admin<span>Panel</span></h1>
  </div>
  <div class="nav-menu">
    <div class="menu-heading">Main</div>
    <div class="nav-item {{ Request::is('admin/index') ? 'active' : '' }}">
      <i class="fas fa-chart-pie"></i>
      <a href="/admin/index" class="nav-link"><span>Dashboard</span></a>
    </div>
    <div class="nav-item {{ Request::is('admin/users') ? 'active' : '' }}">
      <i class="fas fa-users"></i>
      <a href="/admin/users" class="nav-link"><span>Users</span></a>
    </div>
    <div class="nav-item">
      <i class="fas fa-box"></i>
      <a href="/admin/product" class="nav-link"><span>Product</span></a>
    </div>
    <div class="nav-item">
      <i class="fas fa-shopping-cart"></i>
      <span>Orders</span>
    </div>
    <div class="menu-heading">Reports</div>
    <div class="nav-item">
      <i class="fas fa-chart-line"></i>
      <span>Analytics</span>
    </div>
    <div class="nav-item">
      <i class="fas fa-coins"></i>
      <span>Invoice</span>
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
