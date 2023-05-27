<x-headerfooter>
    <section class="event-details">
        <div class="container">
            <div class="card">
                <img src="{{ $event->logo? asset('storage/'. $event->logo):asset('/images/eventhub.jpg') }}"alt="Event Logo">
                <div class="card-body">
                    <h5 class="card-title">{{ $event->title }}</h5>
                    <p class="card-text">Location: {{ $event->location }}</p>
                    <p class="card-text">Start Date: {{ $event->start_date }}</p>
                    <p class="card-text">Description: {{ $event->description }}</p>
                    <div class="d-flex justify-content-end">
                        @if(auth()->check() && auth()->user()->role == 'attendee')
                        <a href="/registerEvent/{{ $event->id }}" class="btn btn-primary mr-2">Register for Event</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-headerfooter>
