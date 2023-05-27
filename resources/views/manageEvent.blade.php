<x-HeaderFooter>
    <div class="container">
        <div class="card p-4">
            <header>
                <h1 class="text-3xl text-center font-bold my-6 uppercase">
                    Manage Events
                </h1>
            </header>

            <table class="table table-striped table-bordered">
                <tbody>
                    @unless ($events->isEmpty())
                    @foreach ($events as $event)
                    <tr>
                        <td class="text-lg">
                            <a href="/job/{{ $event->id }}">
                                {{ $event->title }}
                            </a>
                        </td>

                        <td class="text-lg">
                            <a href="/registeredAttendees/{{ $event->id }}" class="btn btn-primary"><i class="fas fa-edit"></i> Registered Attendees</a>
                        </td>
                        <td class="text-lg">
                            <a href="/editpage/{{ $event->id }}" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</a>
                        </td>
                        <td class="text-lg">
                            <form method="POST" action="/delete/{{ $event->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="3" class="text-lg text-center">
                            <p>No Events found</p>
                        </td>
                    </tr>
                    @endunless
                </tbody>
            </table>
        </div>
    </div>
</x-HeaderFooter>
