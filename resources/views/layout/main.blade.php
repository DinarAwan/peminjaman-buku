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
    @include('layout.partials.link')
    <base href="/">
    </head>

  <body class="m-0 font-sans antialiased font-normal text-base leading-default bg-gray-50 text-slate-500">
    <!-- sidenav  -->
  @include('layout.partials.sidebar')

    <!-- end sidenav -->

    <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
      <!-- Navbar -->
     @include('layout.partials.navbar')

      <!-- end Navbar -->



      {{-- Popup error =================================== --}}
        @if ($errors->any())
  <!-- Overlay backdrop -->
  <div id="errorOverlay" class="fixed inset-0 bg-stone-300 bg-opacity-50 z-40 opacity-0 transition-opacity duration-300"></div>

  <!-- Error Popup -->
  <div id="errorPopup" class="fixed top-0 left-0 right-0 z-50 transform -translate-y-full transition-transform duration-300 ease-out">
      <div class="max-w-md mx-auto mt-8 bg-white rounded-lg shadow-2xl">
          <!-- Header -->
          <div class="flex items-center justify-between p-4 border-b border-gray-200">
              <div class="flex items-center">
                  <div class="flex-shrink-0">
                      <svg class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
                      </svg>
                  </div>
                  <div class="ml-3">
                      <h3 class="text-lg font-medium text-gray-900">
                          Oops! Terjadi Kesalahan
                      </h3>
                  </div>
              </div>
              <button onclick="closeErrorPopup()" class="text-gray-400 hover:text-gray-600 transition-colors">
                  <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                  </svg>
              </button>
          </div>

          <!-- Body -->
          <div class="p-4">
              <div class="text-sm text-gray-600">
                  <p class="mb-3">Silakan perbaiki kesalahan berikut:</p>
                  <ul class="space-y-2">
                      @foreach ($errors->all() as $error)
                          <li class="flex items-start">
                              <svg class="h-4 w-4 text-red-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                              </svg>
                              <span class="ml-2 text-gray-700">{{ $error }}</span>
                          </li>
                      @endforeach
                  </ul>
              </div>
          </div>

          <!-- Footer -->
          <div class="flex justify-end p-4 border-t border-gray-200 bg-gray-50 rounded-b-lg">
              <button onclick="closeErrorPopup()" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                  Tutup
              </button>
          </div>
      </div>
  </div>

  <script>
      // Tampilkan popup saat halaman dimuat
      document.addEventListener('DOMContentLoaded', function() {
          const overlay = document.getElementById('errorOverlay');
          const popup = document.getElementById('errorPopup');
          
          // Tampilkan popup dengan animasi
          setTimeout(() => {
              overlay.classList.remove('opacity-0');
              overlay.classList.add('opacity-100');
              popup.classList.remove('-translate-y-full');
              popup.classList.add('translate-y-0');
          }, 100);
          
          // Prevent body scroll
          document.body.style.overflow = 'hidden';
      });

      function closeErrorPopup() {
          const overlay = document.getElementById('errorOverlay');
          const popup = document.getElementById('errorPopup');
          
          // Sembunyikan popup dengan animasi
          overlay.classList.remove('opacity-100');
          overlay.classList.add('opacity-0');
          popup.classList.remove('translate-y-0');
          popup.classList.add('-translate-y-full');
          
          // Hapus elemen setelah animasi selesai
          setTimeout(() => {
              overlay.remove();
              popup.remove();
              document.body.style.overflow = 'auto';
          }, 300);
      }

      // Close popup when clicking overlay
      document.getElementById('errorOverlay').addEventListener('click', closeErrorPopup);

      // Close popup with Escape key
      document.addEventListener('keydown', function(event) {
          if (event.key === 'Escape') {
              closeErrorPopup();
          }
      });
  </script>
  @endif
      {{-- End Pop Up Error ================================================= --}}



      <!-- cards -->
      @if (session('success'))
      <div class="mb-4 flex items-center justify-between px-4 py-3 rounded-lg bg-green-50 text-green-700 border border-green-200" id="success-alert">
        <div class="flex items-center">
          <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
          </svg>
          {{ session('success') }}
        </div>
        <button onclick="document.getElementById('success-alert').style.display='none'" class="text-green-500 hover:text-green-700">
          <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
          </svg>
        </button>
      </div>
    @endif

@if (session('error'))
  <div class="mb-4 flex items-center px-4 py-3 rounded-lg bg-red-50 text-red-700 border-l-4 border-red-400">
    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
      <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
    </svg>
    {{ session('error') }}
  </div>
@endif
      @yield('content')
      <!-- end cards -->
    </main>
@include('layout.partials.footer')
  </body>
@include('layout.partials.script')
</html>
