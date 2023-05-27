<x-headerfooter>
<section class="event-creation-form">
    <div class="container">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Create Event</h5>
          <form action="/saveevent" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <input type="text" class="form-control" id="title" name="title" required>
              @error('title')
              <div class="invalid-feedback">{{$message}}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="logo" class="form-label">Logo</label>
              <input type="file" class="form-control" id="logo" name="logo">
            </div>
            <div class="mb-3">
              <label for="description" class="form-label">Description</label>
              <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
              @error('description')
              <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
            <div class="mb-3">
              <label for="location" class="form-label">Location</label>
              <input type="text" class="form-control" id="location" name="location" required>
              @error('location')
              <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
            <div class="mb-3">
              <label for="start_date" class="form-label">Start Date</label>
              <input type="date" class="form-control" id="start_date" name="start_date" required>
              @error('start_date')
              <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
          </form>
        </div>
      </div>
    </div>
  </section>
</x-headerfooter>
