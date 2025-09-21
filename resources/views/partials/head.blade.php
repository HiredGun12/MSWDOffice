<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>{{ $title ?? config('app.name') }}</title>

<!-- Favicon -->
<link rel="icon" href="{{ asset('images/Tanauan.png') }}" type="image/png/jpg">

<!-- Optional: iOS icon -->
<link rel="apple-touch-icon" href="{{ asset('images/Tanauan.jpg') }}">

<!-- Fonts & Styles -->
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

@vite(['resources/css/app.css', 'resources/js/app.js'])
@fluxAppearance
