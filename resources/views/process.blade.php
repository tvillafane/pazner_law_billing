<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="robots" content="noindex, nofollow">

        <title>Upload a file</title>

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
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <svg id="Layer_1" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 159.9 65">
                    <!-- Generator: Adobe Illustrator 29.1.0, SVG Export Plug-In . SVG Version: 2.1.0 Build 142)  -->
                    <defs>
                        <style>
                        .st0 {
                            fill: #928973;
                        }

                        .st1 {
                            fill: #002b47;
                        }
                        </style>
                    </defs>
                    <path class="st1" d="M11,20.7v-8.8h3.1c.6,0,1.2.1,1.7.3.5.2.9.5,1.2,1s.4.9.4,1.6-.1,1.1-.4,1.5c-.3.4-.6.7-1.1,1-.5.2-1,.3-1.6.3h-1.8v3.2h-1.5ZM12.5,16.3h1.8c.5,0,.9-.1,1.3-.5s.5-.7.5-1.2-.2-.9-.5-1.2c-.3-.3-.8-.4-1.3-.4h-1.8s0,3.3,0,3.3Z"/>
                    <path class="st1" d="M20.7,20.7l3.2-8.8h1.6l3.2,8.8h-1.5l-.8-2.2h-3.4l-.8,2.2s-1.5,0-1.5,0ZM23.3,17.1h2.6l-1.3-3.9-1.3,3.9Z"/>
                    <path class="st1" d="M32.2,20.7v-.8l4.6-6.8h-4.4v-1.3h6.5v.7l-4.7,6.8h4.7v1.3h-6.7Z"/>
                    <path class="st1" d="M43,20.7v-8.8h1.5l4.3,6.3v-6.3h1.5v8.8h-1.3l-4.4-6.5v6.5h-1.5Z"/>
                    <path class="st1" d="M54.8,20.7v-8.8h5.8v1.3h-4.3v2.5h3.8v1.3h-3.8v2.5h4.4v1.3h-5.9,0Z"/>
                    <path class="st1" d="M64.9,20.7v-8.8h3.6c.7,0,1.2.1,1.7.3s.8.5,1,.9.3.8.3,1.3,0,.9-.2,1.2c-.2.3-.3.6-.6.8s-.5.4-.8.5l1.7,3.8h-1.6l-1.5-3.6h-2.1v3.6h-1.5,0ZM66.4,15.9h1.8c.6,0,1-.1,1.3-.4s.5-.6.5-1.1-.2-.8-.4-1.1c-.3-.2-.7-.4-1.2-.4h-1.9v2.9h0Z"/>
                    <path class="st1" d="M75.2,22.3l.7-1.6h-.6v-1.6h1.6v1.4l-1.1,1.8h-.6Z"/>
                    <path class="st1" d="M86.6,20.7v-8.8h1.5v3.6h4.3v-3.6h1.5v8.8h-1.5v-3.9h-4.3v3.9h-1.5Z"/>
                    <path class="st1" d="M97.7,20.7l3.2-8.8h1.6l3.2,8.8h-1.5l-.8-2.2h-3.4l-.8,2.2h-1.5ZM100.4,17.1h2.7l-1.3-3.9-1.3,3.9Z"/>
                    <path class="st1" d="M111.9,20.7l-3.1-8.8h1.4l2.5,7.1,2.5-7.1h1.4l-3.1,8.8h-1.7,0Z"/>
                    <path class="st1" d="M120.4,20.7v-8.8h5.8v1.3h-4.3v2.5h3.8v1.3h-3.8v2.5h4.4v1.3h-5.9,0Z"/>
                    <path class="st1" d="M130.6,20.7v-8.8h1.4l4.3,6.3v-6.3h1.5v8.8h-1.3l-4.4-6.5v6.5h-1.5Z"/>
                    <path class="st1" d="M145.5,20.8c-.4,0-.9,0-1.3-.2s-.8-.3-1.1-.5-.6-.5-.8-.8c-.2-.3-.4-.7-.4-1.1h1.5c0,.3.2.5.4.8.2.2.4.4.7.5.3.1.6.2,1,.2s.6,0,.9-.1.5-.2.7-.4c.2-.2.3-.4.3-.7s-.1-.6-.3-.8-.6-.3-1-.4l-1.7-.4c-.4-.1-.8-.2-1.2-.5s-.6-.4-.8-.8-.3-.7-.3-1.2.1-1,.4-1.4c.3-.4.7-.7,1.2-.9s1.1-.3,1.7-.3,1.3.1,1.8.4c.5.2.9.6,1.1.9.3.4.4.8.4,1.3h-1.5c0-.4-.1-.6-.3-.8s-.4-.4-.7-.4c-.3,0-.6-.1-.9-.1-.6,0-1,.1-1.3.4s-.4.5-.4.9.1.6.3.7c.2.2.5.3.9.4l1.6.4c.6.1,1,.3,1.3.5.3.2.6.5.7.8s.2.7.2,1.1-.1,1-.4,1.4c-.3.4-.7.7-1.2.9-.5.2-1.1.3-1.8.3h0Z"/>
                    <path class="st1" d="M13.3,35.4c-.6,0-1.1,0-1.5-.3s-.7-.5-.9-.8c-.2-.3-.3-.7-.3-1.2s0-.8.2-1.1.4-.6.7-.9c.3-.3.7-.5,1.2-.8-.2-.2-.4-.5-.6-.7-.2-.2-.3-.4-.4-.6,0-.2-.1-.5-.1-.7,0-.4.1-.7.3-1,.2-.3.5-.5.9-.7.4-.2.8-.3,1.3-.3s.9,0,1.3.2.7.4.9.7.4.6.4,1,0,.4-.1.5c0,.2-.2.4-.3.6-.2.2-.4.4-.6.6s-.6.4-.9.6l1.6,1.9c0-.1.1-.3.2-.5s.2-.5.3-.7c0-.3.1-.6.2-.9h1.5c0,.4-.2.8-.4,1.1s-.3.7-.5,1-.4.6-.6.9l1.6,1.9h-1.7l-.8-.9c-.5.3-.9.6-1.4.8-.5.2-.9.2-1.4.2h0ZM13.6,34.2c.3,0,.6,0,.9-.2.3-.1.6-.3.8-.5l-1.9-2.2c-.4.2-.7.5-.9.8-.2.3-.4.6-.3,1,0,.2.1.5.2.6.1.2.3.3.5.4s.4.1.7.1h0ZM14,29.8c.4-.2.6-.4.8-.6.2-.2.3-.3.4-.5,0-.2.1-.3.1-.5,0-.2,0-.4-.2-.6s-.3-.3-.4-.3c-.2,0-.4-.1-.6,0-.3,0-.6.1-.8.3-.2.2-.3.4-.3.7s0,.3.1.5c0,.2.2.3.3.5s.2.3.3.4l.2.2h0Z"/>
                    <path class="st1" d="M31.1,35.4c-.4,0-.9,0-1.3-.2s-.8-.3-1.1-.5-.6-.5-.8-.8-.4-.7-.4-1.1h1.5c0,.3.2.5.4.8.2.2.4.4.7.5.3.1.6.2,1,.2s.6,0,.9-.2c.3,0,.5-.2.7-.4.2-.2.3-.4.3-.7s-.1-.6-.3-.8-.5-.3-1-.4l-1.7-.4c-.5-.1-.8-.2-1.2-.5s-.6-.5-.8-.8-.3-.7-.3-1.2.1-1,.4-1.4c.3-.4.7-.7,1.2-.9s1.1-.3,1.7-.3,1.3.1,1.8.4c.5.2.9.6,1.1,1,.3.4.4.8.4,1.3h-1.5c0-.4-.1-.6-.3-.8-.2-.2-.4-.4-.7-.5-.3,0-.6-.1-.9-.1-.6,0-1,.1-1.3.4s-.4.5-.4.9.1.6.3.7.5.3,1,.4l1.6.4c.5.1,1,.3,1.3.5.3.2.6.5.7.8.2.3.2.7.2,1.1s-.2,1-.4,1.4c-.3.4-.7.7-1.2.9-.5.2-1.1.3-1.8.3h0Z"/>
                    <path class="st1" d="M38.7,35.3v-8.8h1.5v7.5h4v1.3h-5.5Z"/>
                    <path class="st1" d="M48.1,35.3v-8.8h1.5v8.8h-1.5Z"/>
                    <path class="st1" d="M54.2,35.3v-8.8h1.5l4.3,6.3v-6.3h1.5v8.8h-1.3l-4.4-6.5v6.5h-1.5Z"/>
                    <path class="st1" d="M69.4,35.4c-.8,0-1.5-.2-2.1-.5s-1-.9-1.3-1.5-.5-1.5-.5-2.4.2-1.8.5-2.4.8-1.2,1.4-1.6,1.3-.5,2.1-.5.9,0,1.3.2c.4.2.8.4,1.1.7.3.3.6.6.7,1,.2.4.3.7.3,1.1h-1.6c0-.3-.2-.6-.3-.8s-.4-.5-.7-.6c-.3-.1-.6-.2-.9-.2s-.8.1-1.2.3-.6.6-.8,1-.3,1.1-.3,1.9,0,1.1.2,1.5.3.7.5,1,.5.4.8.5.6.2.9.2.6,0,.8-.2.4-.2.6-.4.3-.3.4-.5.1-.4.2-.6v-.6c0,0-1.9,0-1.9,0v-1h3.5v4.6h-1.1v-1.2c-.2.2-.3.4-.6.7-.2.2-.5.4-.8.5-.3.1-.7.2-1.2.2h0Z"/>
                    <path class="st1" d="M79.3,35.3l-2.6-8.8h1.5l1.8,6.4,1.8-6.4h1.1l1.8,6.4,1.8-6.4h1.5l-2.6,8.8h-1.2l-1.8-6.2-1.8,6.2h-1.2Z"/>
                    <path class="st1" d="M91.7,35.3v-8.8h5.8v1.3h-4.3v2.5h3.8v1.3h-3.8v2.5h4.4v1.3h-5.9,0Z"/>
                    <path class="st1" d="M101.8,35.3v-8.8h1.5v8.8h-1.5Z"/>
                    <path class="st1" d="M107.9,35.3v-8.8h1.4l4.3,6.3v-6.3h1.5v8.8h-1.3l-4.4-6.5v6.5h-1.5Z"/>
                    <path class="st0" d="M10.2,53.3l1.8-4.9h.7l1.8,4.9h-.6l-.5-1.3h-2l-.5,1.3h-.6,0ZM11.5,51.4h1.7l-.8-2.4-.8,2.4Z"/>
                    <path class="st0" d="M17.9,53.3v-4.4h-1.6v-.6h3.7v.6h-1.5v4.4h-.6Z"/>
                    <path class="st0" d="M23.3,53.3v-4.4h-1.6v-.6h3.7v.6h-1.5v4.4h-.6Z"/>
                    <path class="st0" d="M29.5,53.4c-.4,0-.8,0-1.1-.3s-.6-.5-.7-.9c-.2-.4-.3-.8-.3-1.4s0-1,.3-1.4.4-.7.8-.9.7-.3,1.1-.3.8,0,1.1.3.6.5.7.9c.2.4.3.8.3,1.4s0,1-.3,1.4-.4.7-.7.9-.7.3-1.1.3ZM29.5,52.8c.3,0,.6,0,.8-.2.2-.1.4-.3.5-.7.1-.3.2-.7.2-1.1s0-.8-.2-1.1-.3-.5-.5-.7-.5-.2-.8-.2-.6,0-.8.2c-.2.1-.4.4-.5.7s-.2.7-.2,1.1,0,.8.2,1.1c.1.3.3.5.5.7.2.1.5.2.8.2Z"/>
                    <path class="st0" d="M34,53.3v-4.9h1.9c.3,0,.7,0,.9.2.2.1.4.3.5.5.1.2.2.4.2.7s0,.5-.1.7c0,.2-.2.3-.4.4s-.3.2-.5.2l1,2.2h-.7l-.9-2.1h-1.3v2.1h-.6ZM34.7,50.7h1.1c.4,0,.7,0,.9-.2s.3-.4.3-.7,0-.5-.3-.7-.4-.2-.7-.2h-1.2v1.8h0Z"/>
                    <path class="st0" d="M40,53.3v-4.9h.6l2.6,3.8v-3.8h.6v4.9h-.6l-2.7-3.9v3.9s-.6,0-.6,0Z"/>
                    <path class="st0" d="M46.5,53.3v-4.9h3.1v.6h-2.5v1.6h2.2v.5h-2.2v1.7h2.5v.6s-3.2,0-3.2,0Z"/>
                    <path class="st0" d="M53.3,53.3v-2.1l-1.7-2.8h.7l1.3,2.3,1.3-2.3h.7l-1.7,2.8v2.1h-.6Z"/>
                    <path class="st0" d="M59.3,53.4c-.2,0-.5,0-.7,0-.2,0-.4-.2-.6-.3-.2-.1-.3-.3-.4-.4-.1-.2-.2-.4-.2-.6h.7c0,.2.1.3.2.5.1.1.3.2.5.3.2,0,.4,0,.6,0s.4,0,.6,0,.3-.2.4-.3.2-.3.2-.5,0-.3-.2-.5c-.1-.1-.3-.2-.6-.3l-1-.3c-.2,0-.4-.1-.6-.2-.2,0-.3-.2-.4-.4,0-.2-.2-.4-.2-.6s0-.5.2-.7c.2-.2.4-.4.6-.5.3-.1.6-.2.9-.2s.7,0,1,.2.5.3.6.5c.1.2.2.5.2.7h-.7c0-.2,0-.4-.2-.5s-.2-.2-.4-.3c-.2,0-.3,0-.5,0-.3,0-.6,0-.8.2s-.3.3-.3.6,0,.4.2.5c.1.1.3.2.6.3l1,.3c.3,0,.5.2.7.3.2.1.3.3.4.5s.1.4.1.6,0,.5-.2.7c-.2.2-.4.4-.6.5s-.6.2-1,.2h0Z"/>
                    <path class="st0" d="M66.3,53.3l1.8-4.9h.7l1.8,4.9h-.7l-.5-1.3h-2l-.5,1.3h-.7,0ZM67.6,51.4h1.7l-.8-2.4s-.8,2.4-.8,2.4Z"/>
                    <path class="st0" d="M73.9,53.3v-4.4h-1.6v-.6h3.7v.6h-1.5v4.4h-.6Z"/>
                    <path class="st0" d="M81.3,53.3v-4.9h.7v4.4h2.3v.6h-3Z"/>
                    <path class="st0" d="M86.2,53.3l1.8-4.9h.7l1.8,4.9h-.7l-.5-1.3h-2l-.5,1.3h-.7,0ZM87.5,51.4h1.7l-.8-2.4s-.8,2.4-.8,2.4Z"/>
                    <path class="st0" d="M93.8,53.3l-1.4-4.9h.6l1.1,3.9,1.1-3.9h.5l1.1,3.9,1.1-3.9h.6l-1.4,4.9h-.6l-1.1-3.8-1.1,3.8h-.6Z"/>
                    <rect x="9.9" y="41.8" width="140" height=".2"/>
                    </svg>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
                aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav ms-auto">
                    <!-- Dropdown -->
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle"></i>Welcome, {{ Auth::user()?->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                        <!-- Laravel logout form -->
                        <form action="/logout" method="POST" class="px-3">
                            @csrf
                            <button type="submit" class="btn btn-link dropdown-item">Logout</button>
                        </form>
                        </li>
                    </ul>
                    </li>
                </ul>
                </div>
            </div>
            </nav>

       <form action="/process" method="POST" enctype="multipart/form-data" class="mx-auto mt-5" style="max-width: 500px;">
            @csrf
            <h1 class=" mb-2">Process Workbook</h1>
            <p class="text-muted small mb-4">Pick a client and upload an .xlsx.</p>

            <!-- Client -->
            <div class="mb-3">
                <label for="client_id" class="form-label text-uppercase small fw-semibold">Client</label>
                <select name="client_id" id="client_id" class="form-select" required>
                    @foreach (\App\Models\Client::all() as $client)
                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- File Upload -->
            <div class="mb-4">
                <label for="file" class="form-label text-uppercase small fw-semibold">Workbook (.xlsx)</label>
                <input
                    id="file"
                    type="file"
                    name="file"
                    accept=".xlsx"
                    required
                    class="form-control"
                />
            </div>

            <!-- Submit Button -->
            <div class="d-grid">
                <button type="submit" class="btn btn-dark">
                    Process File
                </button>
            </div>
        </form>
    </body>
</html>
