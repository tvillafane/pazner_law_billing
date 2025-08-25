<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="noindex, nofollow">

    <title>Pazner Law</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>

    <link rel="icon" href="{{ asset('favicon.webp') }}" type="image/x-icon">
</head>

<body>
    <main>
        <section class="alertBanner">
            @session('error')
                <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                    {{ $value }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endsession

            @session('success')
                <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                    <strong>Success!</strong><br>
                    {{ $value }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endsession
        </section>
        <div class="container mt-4">
            <div class="row">
                <div class="col-lg-6 col-xl-5 px-5 mb-5">
                    <h2 class="mb-4">
                        Sign in to the Pazner Law Experience
                    </h2>

                    <form action="/login" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" required
                                value="{{ old('email') }}" tabindex="1">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" required tabindex="1">
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg mobileFullWidth mt-3">Sign In</button>
                    </form>
                </div>
                <div class='col'>
                    <img src="{{ asset('jake.jpg') }}" />
                </div>
            </div>
        </div>
    </main>
</body>

</html>
