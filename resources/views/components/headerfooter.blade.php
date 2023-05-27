<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Event Management System</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
  <!-- Custom CSS -->
  <style>
    /* Custom styles go here */
  </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="/">Event Hub</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/">Events</a>
          </li>
          @auth
          <li class="nav-item">
            <a class="nav-link" href="#">Welcome {{ auth()->user()->name }}</a>
          </li>
          @if(auth()->check() && auth()->user()->role == 'organizer')
          <li class="nav-item">
            <a class="nav-link" href="/manage">Manage Event</a>
          </li>
          @endif

          <li>
            <form id="logout-form" action="/logout" method="POST">
              @csrf
              <button type="submit" class="btn btn-link nav-link">Logout</button>
            </form>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link" href="/registration">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/login">Login</a>
          </li>
          @endauth

        </ul>
      </div>
    </div>
  </nav>
  @if (session()->has('message'))
{{--   <div class="position-fixed top-0 start-50 translate-middle-x mt-4" style="z-index: 1000;">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('message') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
  </div> --}}
  <div class="position-fixed top-0 start-50 translate-middle-x mt-5" style="z-index: 1000;">
    <div class="alert alert-primary fade show" role="alert" style="background-color: #f5f5f5; border-color: #3498db;">
      <span style="font-family: 'Segoe UI', Arial, sans-serif; font-size: 24px; color: #3498db;">
        {{ session('message') }}
      </span>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="color: #3498db;"></button>
    </div>
  </div>


  @endif

  <main>
    {{ $slot }}
  </main>

  <!-- Footer -->
  <footer class="footer bg-dark text-light text-center py-3">
    <div class="container">
      <span>&copy; 2023 Event Hub. All rights reserved.</span>
    </div>
  </footer>

  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Custom scripts go here -->
</body>
</html>
