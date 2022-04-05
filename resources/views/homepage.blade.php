<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MZT test assignment</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
       font-family: 'Roboto', sans-serif;
        }
    </style>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
<div class="container">
<h1 class="p-40 text-4xl font-bold text-center">Welcome to the hiring platform</h1>
<div class="flex items-center justify-center">
 <a href="/candidates-list" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow align-middle">
  Go to candidates list
      </a></div></div>
</div>

<script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>
