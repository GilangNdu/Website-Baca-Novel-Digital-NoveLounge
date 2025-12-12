<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{ asset('css/auth-style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/addnovel.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/styleadmin.css') }}">
  <!-- <script src="datanovel.js"></script> -->
</head>

<body>
<div class="app">
  @include('partials.sidebar')

  <!-- MAIN WRAPPER -->
  <main class="main">
    
    <!-- TOPBAR -->
    <header class="topbar">
      <div class="search-wrap">
        <input class="search" type="search" placeholder="Cari judul, penulis, atau kata kunci..." />
      </div>
    </header>

    <!-- SECTION -->
    <section class="form-section">
        @yield('content')
    </section>

  </main>
</div>

<script>
// nanti bisa ditambahkan fungsi delete + edit dari datanovel.js
</script>

</body>
</html>
