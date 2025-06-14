<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Mouvement de reveil méthodiste</title>

  <!-- CSS compilé -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  @include('partials.global-style')

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="font-sans antialiased bg-gray-100 text-gray-900">
  <!-- Barre de navigation -->
  @include('partials.header')

  <!-- Affichage des messages flash -->
  @if(session('success'))
    <div class="container mx-auto mt-4">
      <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
        {{ session('success') }}
      </div>
    </div>
  @endif

  <!-- Contenu principal -->
  <main class="container-lg container-lg py-8">
    @yield('content')
  </main>

   @include('partials.footer')

  <!-- Scripts compilés -->
  <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>


