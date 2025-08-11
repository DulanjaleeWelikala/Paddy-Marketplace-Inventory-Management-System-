<div class="container">
  <div class="row justify-content-start"> <!-- Left align the column -->
    <div class="col-md-4">
      <div class="card shadow-sm border-0 rounded-3 mb-4" style="font-size: 1rem; overflow: hidden;">
        <div class="card-header py-3 px-4 d-flex justify-content-between align-items-center rounded-top-3 text-white" style="background-color: rgb(42, 186, 239);">
          <h6 class="mb-0 fw-semibold" style="font-size: 1.1rem;">
            <i class="bi bi-bar-chart-fill me-2"></i> Top 5 Stock Varieties
          </h6>
          <span class="badge bg-light text-dark" style="font-size: 0.85rem;">Live</span>
        </div>

        <div class="card-body p-3 d-flex bg-light" style="position: relative; min-height: 200px;">
          <div class="position-absolute top-0 bottom-0 start-0 bg-success" style="width: 5px; border-top-left-radius: 0.5rem; border-bottom-left-radius: 0.5rem;"></div>

          <div class="ms-3 w-100">
            @if($topVarieties->count())
              <ul class="list-group list-group-flush">
                @foreach($topVarieties as $index => $variety)
                  <li class="list-group-item d-flex justify-content-between align-items-center px-3 py-3 rounded-2 mb-2 bg-white shadow-sm border-0 list-hover" style="font-size: 0.95rem;">
                    <div class="d-flex align-items-center">
                      <span class="badge me-3
                        @if($index == 0) bg-primary
                        @elseif($index == 1) bg-info
                        @elseif($index == 2) bg-warning
                        @else bg-secondary
                        @endif
                        text-black rounded-circle shadow"
                        style="width: 30px; height: 30px; display: flex; align-items: center; justify-content: center; font-size: 0.85rem;">
                        {{ $index + 1 }}
                      </span>
                      <div class="fw-semibold text-dark" style="font-size: 0.95rem;">
                        {{ $variety->product_name }}
                        <div class="small text-muted" style="font-size: 0.8rem;">Price: {{ $variety->price }}</div>
                      </div>
                    </div>
                    <div class="text-end">
                      <span class="badge bg-quantity text-dark fw-semibold" style="font-size: 0.85rem; padding: 4px 10px;">
                        <i class="bi bi-box-fill me-1 text-success"></i>{{ number_format($variety->quantity, 2) }} kg
                      </span>
                    </div>
                  </li>
                @endforeach
              </ul>
            @else
              <p class="text-muted text-center m-0" style="font-size: 0.95rem;">No data available</p>
            @endif
          </div>
        </div>
      </div>

      <style>
        .list-hover:hover {
          background-color: #eef9fc;
          transition: 0.2s ease;
          cursor: pointer;
        }
        .bg-quantity {
          background: linear-gradient(90deg, #e0f7fa, #d9fdd3);
          border-radius: 0.5rem;
        }
      </style>
    </div>
  </div>
</div>
