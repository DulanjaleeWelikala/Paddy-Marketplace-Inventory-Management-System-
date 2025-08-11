<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Paddies</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
    <h1>My Paddies</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($paddies->isEmpty())
        <p>You have not added any paddies yet.</p>
    @else
        <table class="table table-bordered align-middle">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price (Rs.)</th>
                <th>Quantity</th>
                <th>Badge</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($paddies as $paddy)
                <tr>
                    <td>{{ $paddy->paddy_id }}</td>
                    <td>{{ $paddy->product_name }}</td>
                    <td>{{ $paddy->description }}</td>
                    <td>{{ $paddy->price }}</td>
                    <td>{{ $paddy->quantity }}</td>
                    <td>{{ $paddy->badge }}</td>
                    <td>
                        @if ($paddy->image)
                            <img src="{{ asset('storage/' . $paddy->image) }}" alt="Image" width="70" />
                        @else
                            N/A
                        @endif
                    </td>
                    <td>
                        <button class="btn btn-sm btn-primary"
                                onclick="openEditModal({{ $paddy->id }},
                                                       '{{ addslashes($paddy->product_name) }}',
                                                       '{{ addslashes($paddy->description) }}',
                                                       '{{ $paddy->price }}',
                                                       '{{ $paddy->quantity }}',
                                                       '{{ addslashes($paddy->badge) }}',
                                                       '{{ $paddy->image }}')">
                            Edit
                        </button>

                        <form action="{{ route('mypaddies.destroy', $paddy->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this paddy?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif

    <!-- EDIT MODAL -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form method="POST" id="editForm" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Paddy</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="paddy_id" id="edit_id">

                        <div class="mb-3">
                            <label for="edit_product_name" class="form-label">Product Name</label>
                            <input type="text" name="product_name" id="edit_product_name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="edit_description" class="form-label">Description</label>
                            <textarea name="description" id="edit_description" class="form-control" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="edit_price" class="form-label">Price (Rs.)</label>
                            <input type="number" name="price" id="edit_price" class="form-control" step="0.01" required>
                        </div>

                        <div class="mb-3">
                            <label for="edit_quantity" class="form-label">Quantity</label>
                            <input type="number" name="quantity" id="edit_quantity" class="form-control" step="0.01" required>
                        </div>

                        <div class="mb-3">
                            <label for="edit_badge" class="form-label">Badge (optional)</label>
                            <input type="text" name="badge" id="edit_badge" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="edit_image" class="form-label">Image (Upload new to replace)</label><br>
                            <img id="current_image" src="#" alt="Current Image" width="100" style="display:none;"><br><br>
                            <input type="file" name="image" id="edit_image" class="form-control">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update Paddy</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

  <hr class="my-5" />
<h2>Orders</h2>

@if($orders->isEmpty())
    <p>No orders available.</p>
@else
    @foreach($orders as $order)
        <div class="card mb-3">
            <div class="card-body">
                <strong>
                    {{ $order->paddy ? ($order->paddy->product_name ?? $order->paddy->name) : 'Unknown Paddy' }}
                </strong> - {{ $order->quantity }} kg ordered

                @if($order->status === 'pending')
                    <!-- Accept Button -->
                    <form action="{{ route('orders.accept', $order->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button class="btn btn-success btn-sm">Accept</button>
                    </form>

                    <!-- Reject Button -->
                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#rejectModal{{ $order->id }}">Reject</button>

                    <!-- Reject Modal -->
                    <div class="modal fade" id="rejectModal{{ $order->id }}" tabindex="-1">
                        <div class="modal-dialog">
                            <form action="{{ route('orders.reject', $order->id) }}" method="POST">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Reject Order</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <textarea name="reason" class="form-control" required placeholder="Reason for rejection"></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-danger">Reject</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif

                <!-- View Button (always shown) -->
                <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewOrderModal{{ $order->id }}">View Order</button>

                <!-- View Modal -->
                <div class="modal fade" id="viewOrderModal{{ $order->id }}" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Order Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                @if($order->paddy)
                                    <p><strong>Paddy Name:</strong> {{  $order->product_name = $paddy->product_name }}</p>
                                    <p><strong>Quantity:</strong> {{ $order->quantity }} kg</p>
                                    <p><strong>Total Price:</strong> Rs. {{ number_format($order->quantity * $order->paddy->price, 2) }}</p>
                                @else
                                    <p><strong>Paddy Name:</strong>{{$order->product_name}}</p>
                                    <p><strong>Quantity:</strong> {{ $order->quantity }} kg</p>
                                    <p><strong>Total Price:</strong>{{ $order->price }}</p>
                                @endif

                                <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
                                <p><strong>Placed At:</strong> {{ $order->created_at->format('d M Y, h:i A') }}</p>

                                @if($order->status == 'rejected' && $order->rejection_reason)
                                    <p><strong>Rejection Reason:</strong> {{ $order->rejection_reason }}</p>
                                @endif
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endforeach
@endif

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function openEditModal(id, name, desc, price, qty, badge, imagePath) {
        const form = document.getElementById('editForm');
        form.action = '/mypaddies/' + id;

        document.getElementById('edit_id').value = id;
        document.getElementById('edit_product_name').value = name;
        document.getElementById('edit_description').value = desc;
        document.getElementById('edit_price').value = price;
        document.getElementById('edit_quantity').value = qty;
        document.getElementById('edit_badge').value = badge;

        const currentImage = document.getElementById('current_image');
        if (imagePath) {
            currentImage.src = '/storage/' + imagePath;
            currentImage.style.display = 'block';
        } else {
            currentImage.style.display = 'none';
        }

        new bootstrap.Modal(document.getElementById('editModal')).show();
    }
</script>
</body>
</html>
