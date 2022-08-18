<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="stylesheet" href="{{ mix('css/app.css') }}">

<!-- App favicon -->
<link rel="shortcut icon" href="/assets/images/favicon.ico">
<!-- Bootstrap Css -->
<link href="/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">




<title>{{ config('app.name', 'Laravel') }}</title>
<!-- Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
<!-- Styles -->
@livewireStyles

<!-- Scripts -->
<script src="{{ mix('js/app.js') }}" defer></script>
