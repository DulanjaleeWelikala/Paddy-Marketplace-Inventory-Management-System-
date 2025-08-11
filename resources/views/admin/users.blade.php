<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Dashboard</title>
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
      .modal { display: none; position: fixed; z-index: 99; padding-top: 100px; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.4); }
      .modal-content { background-color: #fff; margin: auto; padding: 20px; border-radius: 12px; width: 400px; position: relative; box-shadow: 0 5px 15px rgba(0,0,0,0.3); }
      .close-btn { position: absolute; top: 10px; right: 15px; font-size: 24px; cursor: pointer; }
      .modal-content input, .modal-content select { width: 100%; padding: 10px; margin: 10px 0; border-radius: 6px; border: 1px solid #ccc; }
      .modal-content button { background-color: #007bff; color: white; padding: 10px; width: 100%; border: none; border-radius: 6px; cursor: pointer; }
      .data-table { width: 100%; border-collapse: collapse; }
      .data-table th, .data-table td { border: 1px solid #ddd; padding: 12px; }

     #toast-container {
  position: fixed;
  top: 10%; /* Vertically center the toast */
  left: 50%; /* Horizontally center the toast */
  transform: translate(-50%, -50%); /* Corrects the exact center alignment */
  z-index: 9999;
}

.toast-message {
  display: flex;
  align-items: center;
  background-color:rgb(49, 49, 247);
  color: #fff;
  padding: 14px 20px;
  border-radius: 8px;
  min-width: 250px;
  max-width: 350px;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
  cursor: move;  /* Draggable cursor */
  position: relative;  /* Position relative for any potential adjustments */
  animation: fadein 0.5s ease-out;
}

.toast-message.error {
  background-color: #dc3545;
}

.toast-message i {
  margin-right: 10px;
  font-size: 18px;
}

.close-toast {
  background: transparent;
  border: none;
  color: #fff;
  font-size: 18px;
  cursor: pointer;
  margin-left: 10px;
}

      @keyframes fadein {
        from { opacity: 0; transform: translateX(50px); }
        to { opacity: 1; transform: translateX(0); }
      }

      @keyframes fadeout {
        from { opacity: 1; transform: translateX(0); }
        to { opacity: 0; transform: translateX(50px); }
      }

       .btn-danger {
        background-color:rgb(243, 133, 49); /* Red for Suspend */
        color: white;
        border: none;
        padding: 8px 12px;
        border-radius: 4px;
    }

    .btn-success {
        background-color:rgb(40, 146, 167); /* Green for Unsuspend */
        color: white;
        border: none;
        padding: 8px 12px;
        border-radius: 4px;
    }

    .suspend-btn:hover {
        opacity: 0.8; /* Optional: Slight hover effect */
    }

    .btn-danger.delete-btn {
  background-color:rgb(223, 57, 73); /* Red */
  color: white;
  border: none;
  padding: 6px 10px;
  border-radius: 4px;
  transition: 0.3s;
}

.btn-danger.delete-btn:hover {
  background-color: #c82333;
}

.btn-warning.edit-btn {
  background-color:rgb(232, 193, 75); /* Yellow */
  color: black;
  border: none;
  padding: 6px 10px;
  border-radius: 4px;
  transition: 0.3s;
}

.btn-warning.edit-btn:hover {
  background-color: #e0a800;
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
          <h1>Admin<span>Panel</span></h1>
        </div>
        <div class="nav-menu">
          <div class="menu-heading">Main</div>
          <div class="nav-item active">
            <i class="fas fa-chart-pie"></i>
            <a href="/admin/index" class="nav-link"><span>Dashboard</span></a>
          </div>
          <div class="nav-item">
            <i class="fas fa-users"></i>
            <a href="/admin/users" class="nav-link"><span>Users</span></a>
          </div>
          <div class="nav-item">
            <i class="fas fa-box"></i>
            <a href="/admin/paddylist" class="nav-link"><span>Paddy_List</span></a>
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

  <div class="header">
    <div class="search-bar">
      <i class="fas fa-search"></i>
      <input type="text" placeholder="Search..." />
    </div>
    <div class="header-actions">
      <div class="notification"><i class="fas fa-bell"></i><div class="badge">3</div></div>
      <div class="notification"><i class="fas fa-envelope"></i><div class="badge">5</div></div>
      <div class="user-profile"><x-app-layout /></div>
    </div>
  </div>

  <div class="main-content">
    <div class="page-title">
      <h2 class="title">User Management</h2>

     <!-- Add User Button -->
      <div style="margin-bottom: 15px; text-align: right;">
      <button class="btn btn-primary" onclick="openAddUserModal()" style="padding: 9px 18px; font-weight: 500; border-radius: 5px;">
      <i class="fas fa-plus me-2"></i>
       Add New
      </button>
    </div>
  </div>

    <div class="table-card">
      <div class="card-title">
        <h3><i class="fas fa-users"></i> All Users</h3>
         <!-- 🔍 Search Input -->
      <div style="margin-bottom: 15px;">
        <input type="text" id="userSearchInput" placeholder="Search users..." style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid #ccc;" />
      </div>
      </div>

     <div id="toast-container"></div>


      <table class="data-table">
        <thead>
          <tr>
            <th>User ID</th><th>Username</th><th>Email</th><th>Phone</th><th>Role</th><th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
          <tr>
            <td>{{ $user->formatted_id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->phone ?? '-' }}</td>
            <td>{{ $user->usertype ?? 'User' }}</td>
            <td>
    @if($user->suspended)
        <span class="badge bg-danger">Suspended</span>
    @else
        <span class="badge bg-success">Active</span>
    @endif
</td>
<td>
  <form method="POST" action="{{ route('users.toggleSuspend', $user->id) }}" onsubmit="return confirmSuspend(this, {{ $user->suspended ? 'true' : 'false' }});">
    @csrf
    <input type="hidden" name="suspend_reason" class="suspend-reason-input" />
    <button type="submit" class="btn {{ $user->suspended ? 'btn-success' : 'btn-danger' }} suspend-btn">
      {{ $user->suspended ? 'Unsuspend' : 'Suspend' }}
    </button>
  </form>
</td>
<!-- Modal Inside Table Loop -->
<div class="modal fade" id="suspendModal{{ $user->id }}" tabindex="-1" aria-labelledby="suspendModalLabel{{ $user->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('users.toggleSuspend', $user->id) }}">
      @csrf
      <div class="modal-content">
        <div class="modal-header bg-warning text-dark">
          <h5 class="modal-title" id="suspendModalLabel{{ $user->id }}">
            {{ $user->suspended ? 'Unsuspend User' : 'Suspend User' }}
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          @if(!$user->suspended)
          <div class="mb-3">
            <label for="reason{{ $user->id }}" class="form-label">Suspension Reason:</label>
            <textarea name="reason" id="reason{{ $user->id }}" class="form-control" required></textarea>
          </div>
          @else
            <p>Are you sure you want to unsuspend this user?</p>
          @endif
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-warning">{{ $user->suspended ? 'Unsuspend' : 'Suspend' }}</button>
        </div>
      </div>
    </form>
  </div>
</div>




           <td>
  <form action="{{ url('/admin/users/'.$user->id) }}" method="POST" style="display:inline;">
    @csrf @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger delete-btn">
      <i class="fas fa-trash-alt"></i>
    </button>
  </form>

  <button type="button" class="btn btn-sm btn-warning edit-btn"
    onclick="editUser({{ $user->id }}, '{{ $user->name }}', '{{ $user->email }}', '{{ $user->phone }}', '{{ $user->usertype }}')">
    <i class="fas fa-edit"></i>
  </button>
</td>

          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Edit User Modal -->
<div class="modal" id="editUserModal">
  <div class="modal-content">
    <span class="close-btn" onclick="closeModal('editUserModal')">&times;</span>
    <h2>Edit User</h2>
    <form id="editUserForm" method="POST">
      @csrf
      @method('PUT')
      <input type="text" id="editUserName" name="name" required />
      <input type="email" id="editUserEmail" name="email" required />
      <input type="text" id="editUserPhone" name="phone" required />
      <select name="usertype" id="editUserType" required>
        <option value="Admin">Admin</option>
        <option value="User">User</option>
        <option value="Manager">Manager</option>
      </select>
      <button type="submit">Update User</button>
    </form>
  </div>
</div>

<!-- Add User Modal -->
<div class="modal" id="addUserModal">
  <div class="modal-content">
    <span class="close-btn" onclick="closeModal('addUserModal')">&times;</span>
    <h2>Add New User</h2>
    <form method="POST" action="{{ route('users.store') }}">
      @csrf
      <input type="text" name="name" placeholder="Full Name" required />
      <input type="email" name="email" placeholder="Email Address" required />
      <input type="text" name="phone" placeholder="Phone Number" required />
      <select name="usertype" required>
        <option value="">-- Select Role --</option>
        <option value="Admin">Admin</option>
        <option value="User">User</option>
        <option value="Manager">Manager</option>
      </select>
      <input type="password" name="password" placeholder="Password" required />
      <button type="submit">Create User</button>
    </form>
  </div>
</div>


<!-- Toast -->
  <div id="toast-container"></div>

  <!-- add sound -->
   <audio id="success-sound" src="{{ asset('sounds/success.mp3') }}" preload="auto"></audio>
    <audio id="error-sound" src="{{ asset('sounds/error.mp3') }}" preload="auto"></audio>

<script>
  function closeModal(modalId) {
    document.getElementById(modalId).style.display = "none";
  }

  function editUser(id, name, email, phone, usertype) {
    console.log(id, name, email, phone, usertype); // Debugging
    document.getElementById("editUserName").value = name;
    document.getElementById("editUserEmail").value = email;
    document.getElementById("editUserPhone").value = phone;
    document.getElementById("editUserType").value = usertype;
    document.getElementById("editUserForm").action = `/admin/users/${id}`;
    document.getElementById("editUserModal").style.display = "block";
  }

  window.onclick = function (e) {
    if (e.target.classList.contains("modal")) {
        closeModal('editUserModal');
    }
  };

  // 🔍 Search Functionality for User Table
  document.getElementById('userSearchInput').addEventListener('keyup', function () {
    const searchValue = this.value.toLowerCase();
    const rows = document.querySelectorAll('.data-table tbody tr');

    rows.forEach(row => {
      const rowText = row.textContent.toLowerCase();
      row.style.display = rowText.includes(searchValue) ? '' : 'none';
    });
  });

  function showToast(message, type = 'success') {
        const container = document.getElementById('toast-container');
        const toast = document.createElement('div');
        toast.className = `toast-message ${type}`;
        const icon = type === 'error' ? 'fa-circle-xmark' : 'fa-circle-check';
        toast.innerHTML = ` 
          <i class="fas ${icon}"></i> 
          <span style="flex: 1;">${message}</span>
          <button class="close-toast" onclick="this.parentElement.remove()">×</button>
        `;
        container.appendChild(toast);

        const sound = type === 'error' ? document.getElementById('error-sound') : document.getElementById('success-sound');
        sound.play();

        setTimeout(() => toast.remove(), 3000);
  }

 function openAddUserModal() {
    document.getElementById("addUserModal").style.display = "block";
  }

  // Close modal when clicking outside
  window.onclick = function (e) {
    if (e.target.classList.contains("modal")) {
      closeModal('editUserModal');
      closeModal('addUserModal');
    }
  };

  function confirmSuspend(userId, isSuspended) {
  if (isSuspended) {
    if (confirm("Are you sure you want to unsuspend this user?")) {
      submitSuspendForm(userId, '');
    }
  } else {
    const reason = prompt("Are you sure you want to suspend this user?\nPlease enter the reason for suspension:");
    if (reason !== null && reason.trim() !== "") {
      submitSuspendForm(userId, reason.trim());
    } else {
      alert("Suspension cancelled. Reason is required.");
    }
  }
}

function submitSuspendForm(userId, reason) {
  const form = document.createElement('form');
  form.method = 'POST';
  form.action = `/admin/users/${userId}/toggleSuspend`;

  const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
  const tokenInput = document.createElement('input');
  tokenInput.type = 'hidden';
  tokenInput.name = '_token';
  tokenInput.value = csrfToken;

  const reasonInput = document.createElement('input');
  reasonInput.type = 'hidden';
  reasonInput.name = 'reason';
  reasonInput.value = reason;

  form.appendChild(tokenInput);
  form.appendChild(reasonInput);
  document.body.appendChild(form);
  form.submit();
}

</script>

<script>

  @if(session('success'))
    window.onload = function () {
  showToast("{{ session('success') }}");
}
@endif

</script>

</body>
</html>
