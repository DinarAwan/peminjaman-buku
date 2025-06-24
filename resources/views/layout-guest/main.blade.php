<!--
=========================================================
* Soft UI Dashboard Tailwind - v1.0.5
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard-tailwind
* Copyright 2023 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    @include('layout-guest.partials.link')
    </head>

  <body class="m-0 font-sans antialiased font-normal text-base leading-default bg-gray-50 text-slate-500 min-h-screen flex flex-col">
    <!-- sidenav  -->
  @include('layout-guest.partials.sidebar')

    <!-- end sidenav -->

    <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200 flex-grow">
      <!-- Navbar -->
     @include('layout-guest.partials.navbar')

      <!-- end Navbar -->

      <!-- cards -->
      @if (session('success'))
        <div class="mb-4 px-4 py-3 rounded-lg bg-green-100 text-green-800 border border-green-300">
          {{ session('success') }}
        </div>
      @endif

      @if (session('error'))
        <div class="mb-4 px-4 py-3 rounded-lg bg-red-100 text-red-800 border border-red-300">
          {{ session('error') }}
        </div>
      @endif
      @yield('content')
      <!-- end cards -->
    </main>
@include('layout-guest.partials.footer')
  </body>
@include('layout-guest.partials.script')
</html>
