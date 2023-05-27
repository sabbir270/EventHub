<x-headerfooter>
    <section class="registered-attendees">
        <div class="container">
            <h2>Registered Attendees for <a href="/details/{{ $event->id }}" >{{ $event->title }}</a></h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($attendees as $attendee)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $attendee->attendee->name }}</td>
                            <td>{{ $attendee->attendee->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</x-headerfooter>
