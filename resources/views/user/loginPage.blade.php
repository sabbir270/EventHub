<x-HeaderFooter>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <header class="text-center mb-4">
                            <h2 class="text-2xl font-bold uppercase mb-1">
                                Login
                            </h2>
                            <p class="mb-0">Login into your account to post jobs</p>
                        </header>

                        <form method="POST" action="/logged">
                            @csrf

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
                                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                            </div>
                        </form>

                        <div class="text-center">
                            <p>Don't have an account? <a href="/registation" class="text-primary">Register</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-HeaderFooter>
