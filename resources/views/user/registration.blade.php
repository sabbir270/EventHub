<x-HeaderFooter>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <header class="text-center mb-4">
                            <h2 class="text-2xl font-bold uppercase mb-1">
                                Register
                            </h2>
                            <p class="mb-0">Create an account to post jobs</p>
                        </header>

                        <form method="POST" action="/registered">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                                @error('password')
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                                @error('password_confirmation')
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="user_type" class="form-label">User Type</label><br>
                                <input type="radio" id="organizer" name="role" value="organizer" {{ old('role') === 'organizer' ? 'checked' : '' }}>
                                <label for="organizer">Organizer</label><br>
                                <input type="radio" id="attendee" name="role" value="attendee" {{ old('role') === 'attendee' ? 'checked' : '' }}>
                                <label for="attendee">Attendee</label>
                                @error('role')
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
                            </div>
                        </form>

                        <div class="text-center">
                            <p>Already have an account? <a href="/login" class="text-primary">Login</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-HeaderFooter>
