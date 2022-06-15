<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <script src="//unpkg.com/alpinejs" defer></script>

</head>
<body>
 

 
  <main>
      {{ $slot }}
  </main>


  <x-flash-message />
</body>
</html>