<x-headerfooter>
     <!-- Hero Section -->
  <section class="hero">
    <div class="container text-center">
      <h1>Welcome to the Event Hub</h1>
      <p>Plan and manage your events with ease</p>
      @if(auth()->check() && auth()->user()->role == 'organizer')
      <a href="/createevent" class="btn btn-primary">Create Events</a>
      @endif
    </div>
  </section>


  <!-- Featured Events Section -->
  <section class="featured-events">
    <div class="container">
      <h2 class="text-center">Featured Events</h2>
      <div class="row">
        @foreach ($events as $event)
        <div class="col-md-4">
          <div class="card">
            <img src="{{ $event->logo? asset('storage/'. $event->logo):asset('/images/eventhub.jpg') }}"alt="Event Logo">
            <div class="card-body">
              <h5 class="card-title">{{ $event->title }}</h5>
              <p class="card-text">Location: {{ $event->location }}</p>
              <a href="/details/{{ $event->id }}" class="btn btn-primary">Details</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
</x-headerfooter>
