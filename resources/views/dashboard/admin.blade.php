@extends('layout.main')
@section('content')
<div class="w-full px-6 py-6 mx-auto">
    <!-- row 1 -->
    <div class="flex flex-wrap -mx-3">
      <!-- card1 -->
      <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
        <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
          <div class="flex-auto p-4">
            <div class="flex flex-row -mx-3">
              <div class="flex-none w-2/3 max-w-full px-3">
                <div>
                  <p class="mb-0 font-sans font-semibold leading-normal text-sm">Buku</p>
                  <h5 class="mb-0 font-bold">
                    {{$buku}}
                    <span class="leading-normal text-sm font-weight-bolder text-lime-500"></span>
                  </h5>
                </div>
              </div>
              <div class="px-3 text-right basis-1/3">
                <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-700 to-pink-500">
                  <i class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  
      <!-- card2 -->
      <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
        <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
          <div class="flex-auto p-4">
            <div class="flex flex-row -mx-3">
              <div class="flex-none w-2/3 max-w-full px-3">
                <div>
                  <p class="mb-0 font-sans font-semibold leading-normal text-sm">Kategori</p>
                  <h5 class="mb-0 font-bold">
                    {{$kategori}}
                    <span class="leading-normal text-sm font-weight-bolder text-lime-500"></span>
                  </h5>
                </div>
              </div>
              <div class="px-3 text-right basis-1/3">
                <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-700 to-pink-500">
                  <i class="ni leading-none ni-world text-lg relative top-3.5 text-white"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  
      <!-- card3 -->
      <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
        <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
          <div class="flex-auto p-4">
            <div class="flex flex-row -mx-3">
              <div class="flex-none w-2/3 max-w-full px-3">
                <div>
                  <p class="mb-0 font-sans font-semibold leading-normal text-sm">Pengguna</p>
                  <h5 class="mb-0 font-bold">
                    {{$users}}
                    <span class="leading-normal text-red-600 text-sm font-weight-bolder"></span>
                  </h5>
                </div>
              </div>
              <div class="px-3 text-right basis-1/3">
                <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-700 to-pink-500">
                  <i class="ni leading-none ni-paper-diploma text-lg relative top-3.5 text-white"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  
      <!-- card4 -->
      <div class="w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:w-1/4">
        <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
          <div class="flex-auto p-4">
            <div class="flex flex-row -mx-3">
              <div class="flex-none w-2/3 max-w-full px-3">
                <div>
                  <p class="mb-0 font-sans font-semibold leading-normal text-sm">Buku Di Pinjam</p>
                  <h5 class="mb-0 font-bold">
                    {{$peminjaman}}
                    <span class="leading-normal text-sm font-weight-bolder text-lime-500"></span>
                  </h5>
                </div>
              </div>
              <div class="px-3 text-right basis-1/3">
                <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-700 to-pink-500">
                  <i class="ni leading-none ni-cart text-lg relative top-3.5 text-white"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  
    <div class="flex flex-wrap mt-6 -mx-3">
{{--       
      <div class="w-full max-w-full px-3 mt-0 lg:w-7/12 lg:flex-none">
        <div class="border-black/12.5 shadow-soft-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
          <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid bg-white p-6 pb-0">
            <h6>Peminjaman Buku 1 Tahun Terakhir</h6>
            <p class="leading-normal text-sm">
              <i class="fa fa-arrow-up text-lime-500"></i>
              <span class="font-semibold">4% more</span> in 2025
            </p>
          </div>
          <div class="flex-auto p-4">
            <div>
              <canvas id="chart-line" height="300"></canvas>
            </div>
          </div>
        </div>
      </div> --}}

      <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-6">
        <!-- Header -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800 mb-2">Peminjaman Buku 1 Tahun Terakhir</h1>
            <div class="flex items-center gap-2">
                <span class="text-green-600 font-semibold">↗ 4% more</span>
                <span class="text-gray-500">in 2025</span>
            </div>
        </div>

        <!-- Chart Container -->
        <div class="relative h-96 bg-gray-50 rounded-lg overflow-hidden">
            <svg id="chart" class="w-full h-full" viewBox="0 0 800 400">
                <!-- Grid Lines -->
                <defs>
                    <pattern id="grid" width="80" height="40" patternUnits="userSpaceOnUse">
                        <path d="M 80 0 L 0 0 0 40" fill="none" stroke="#e5e7eb" stroke-width="1"/>
                    </pattern>
                    
                    <!-- Gradients for areas -->
                    <linearGradient id="purpleGradient" x1="0%" y1="0%" x2="0%" y2="100%">
                        <stop offset="0%" style="stop-color:#e879f9;stop-opacity:0.3" />
                        <stop offset="100%" style="stop-color:#e879f9;stop-opacity:0.05" />
                    </linearGradient>
                    
                    <linearGradient id="blueGradient" x1="0%" y1="0%" x2="0%" y2="100%">
                        <stop offset="0%" style="stop-color:#6366f1;stop-opacity:0.2" />
                        <stop offset="100%" style="stop-color:#6366f1;stop-opacity:0.05" />
                    </linearGradient>
                </defs>
                
                <!-- Grid Background -->
                <rect width="100%" height="100%" fill="url(#grid)" />
                
                <!-- Y-axis labels -->
                <g class="text-gray-400 text-sm">
                    <text x="30" y="15" text-anchor="middle">500</text>
                    <text x="30" y="95" text-anchor="middle">400</text>
                    <text x="30" y="175" text-anchor="middle">300</text>
                    <text x="30" y="255" text-anchor="middle">200</text>
                    <text x="30" y="335" text-anchor="middle">100</text>
                    <text x="30" y="395" text-anchor="middle">0</text>
                </g>
                
                <!-- Chart Area -->
                <g transform="translate(60, 0)">
                    <!-- Purple Area (Upper curve) -->
                    <path id="purpleArea" fill="url(#purpleGradient)" />
                    
                    <!-- Blue Area (Lower curve) -->
                    <path id="blueArea" fill="url(#blueGradient)" />
                    
                    <!-- Purple Line -->
                    <path id="purpleLine" fill="none" stroke="#e879f9" stroke-width="3" />
                    
                    <!-- Blue Line -->
                    <path id="blueLine" fill="none" stroke="#6366f1" stroke-width="3" />
                </g>
                
                <!-- X-axis labels -->
                <g class="text-gray-400 text-sm">
                    <text x="120" y="390" text-anchor="middle">Apr</text>
                    <text x="200" y="390" text-anchor="middle">May</text>
                    <text x="280" y="390" text-anchor="middle">Jun</text>
                    <text x="360" y="390" text-anchor="middle">Jul</text>
                    <text x="440" y="390" text-anchor="middle">Aug</text>
                    <text x="520" y="390" text-anchor="middle">Sep</text>
                    <text x="600" y="390" text-anchor="middle">Oct</text>
                    <text x="680" y="390" text-anchor="middle">Nov</text>
                    <text x="760" y="390" text-anchor="middle">Dec</text>
                </g>
            </svg>
        </div>

        <!-- Legend -->
        <div class="mt-6 flex gap-6">
            <div class="flex items-center gap-2">
                <div class="w-4 h-4 bg-purple-400 rounded-full"></div>
                <span class="text-gray-600">Tren Tinggi</span>
            </div>
            <div class="flex items-center gap-2">
                <div class="w-4 h-4 bg-indigo-500 rounded-full"></div>
                <span class="text-gray-600">Tren Rendah</span>
            </div>
        </div>
    </div>

    <script>
        // Data points for the chart (scaled to fit 0-400 range)
        const purpleData = [50, 80, 120, 300, 230, 480, 320, 280, 400, 230, 400, 500];
        const blueData = [40, 70, 90, 50, 80, 200, 280, 250, 280, 260, 340, 380];
        
        const months = 12;
        const width = 680; 
        const height = 360; 
        
        // Convert data to SVG coordinates
        function dataToSVG(data) {
            return data.map((value, index) => {
                const x = (index * width) / (months - 1);
                const y = height - (value * height) / 500; // Scale to 500 max
                return `${x},${y}`;
            }).join(' ');
        }
        
        // Create area path (includes bottom line)
        function createAreaPath(data) {
            const points = data.map((value, index) => {
                const x = (index * width) / (months - 1);
                const y = height - (value * height) / 500;
                return [x, y];
            });
            
            let path = `M 0,${height}`;
            points.forEach(([x, y]) => {
                path += ` L ${x},${y}`;
            });
            path += ` L ${width},${height} Z`;
            return path;
        }
        
        // Create smooth curve path
        function createSmoothPath(data) {
            const points = data.map((value, index) => {
                const x = (index * width) / (months - 1);
                const y = height - (value * height) / 500;
                return [x, y];
            });
            
            if (points.length < 2) return '';
            
            let path = `M ${points[0][0]},${points[0][1]}`;
            
            for (let i = 1; i < points.length; i++) {
                const prev = points[i - 1];
                const curr = points[i];
                const next = points[i + 1] || curr;
                
                // Calculate control points for smooth curve
                const cp1x = prev[0] + (curr[0] - prev[0]) * 0.3;
                const cp1y = prev[1];
                const cp2x = curr[0] - (next[0] - prev[0]) * 0.3;
                const cp2y = curr[1];
                
                if (i === 1) {
                    path += ` C ${cp1x},${cp1y} ${cp2x},${cp2y} ${curr[0]},${curr[1]}`;
                } else {
                    path += ` S ${cp2x},${cp2y} ${curr[0]},${curr[1]}`;
                }
            }
            
            return path;
        }
        
        // Apply paths to SVG elements
        document.getElementById('purpleArea').setAttribute('d', createAreaPath(purpleData));
        document.getElementById('blueArea').setAttribute('d', createAreaPath(blueData));
        document.getElementById('purpleLine').setAttribute('d', createSmoothPath(purpleData));
        document.getElementById('blueLine').setAttribute('d', createSmoothPath(blueData));
        
        // Add hover effects
        const svg = document.getElementById('chart');
        svg.addEventListener('mousemove', function(e) {
            const rect = svg.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            // Add interactive features here if needed
        });
    </script>
    </div>

   

 
  </div>
@endsection