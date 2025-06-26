
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokumentasi - Sistem Perpustakaan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#e91e63',
                        secondary: '#8e24aa',
                        accent: '#fce4ec'
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 sm:py-8">
        <div class="flex flex-col lg:flex-row gap-4 sm:gap-8">
            <!-- Sidebar -->
            <div class="w-full lg:w-64 flex-shrink-0 order-2 lg:order-1">
                <div class="bg-white rounded-lg shadow-sm p-4 sm:p-6 lg:sticky lg:top-24">
                    <h3 class="text-base sm:text-lg font-semibold text-gray-900 mb-3 sm:mb-4">Daftar Isi</h3>
                    <nav class="space-y-1 sm:space-y-2">
                        <a href="#pengenalan" class="block py-2 px-3 text-xs sm:text-sm text-gray-600 hover:text-white hover:bg-gradient-to-r hover:from-primary hover:to-secondary rounded-lg transition-all duration-200">Pengenalan</a>
                        <a href="#cara-meminjam" class="block py-2 px-3 text-xs sm:text-sm text-gray-600 hover:text-white hover:bg-gradient-to-r hover:from-primary hover:to-secondary rounded-lg transition-all duration-200">Cara Meminjam Buku</a>
                        <a href="#cara-mengembalikan" class="block py-2 px-3 text-xs sm:text-sm text-gray-600 hover:text-white hover:bg-gradient-to-r hover:from-primary hover:to-secondary rounded-lg transition-all duration-200">Cara Mengembalikan</a>
                        <a href="#mencari-buku" class="block py-2 px-3 text-xs sm:text-sm text-gray-600 hover:text-white hover:bg-gradient-to-r hover:from-primary hover:to-secondary rounded-lg transition-all duration-200">Mencari Buku</a>
                        <a href="#profil" class="block py-2 px-3 text-xs sm:text-sm text-gray-600 hover:text-white hover:bg-gradient-to-r hover:from-primary hover:to-secondary rounded-lg transition-all duration-200">Mengelola Profil</a>
                        <a href="#aturan" class="block py-2 px-3 text-xs sm:text-sm text-gray-600 hover:text-white hover:bg-gradient-to-r hover:from-primary hover:to-secondary rounded-lg transition-all duration-200">Aturan & Kebijakan</a>
                        <a href="#faq" class="block py-2 px-3 text-xs sm:text-sm text-gray-600 hover:text-white hover:bg-gradient-to-r hover:from-primary hover:to-secondary rounded-lg transition-all duration-200">FAQ</a>
                        <a href="#kontak" class="block py-2 px-3 text-xs sm:text-sm text-gray-600 hover:text-white hover:bg-gradient-to-r hover:from-primary hover:to-secondary rounded-lg transition-all duration-200">Bantuan & Kontak</a>
                        <a href="/dashboard-pengguna" class="block py-2 px-3 text-xs sm:text-sm text-gray-600 hover:text-white hover:bg-gradient-to-r hover:from-primary hover:to-secondary rounded-lg transition-all duration-200">KembaliKe Dashboard</a>
                    </nav>
                </div>
            </div>

            <!-- Main Content -->
            <div class="flex-1 order-1 lg:order-2">
                <!-- Hero Section -->
                <div class="bg-gradient-to-r from-primary to-secondary rounded-xl p-6 sm:p-8 text-white mb-6 sm:mb-8">
                    <h1 class="text-2xl sm:text-3xl font-bold mb-3 sm:mb-4">📚 Dokumentasi Pengguna</h1>
                    <p class="text-pink-100 text-base sm:text-lg">Panduan lengkap untuk menggunakan sistem perpustakaan DEMEN BACA</p>
                </div>

                <!-- Content Sections -->
                <div class="space-y-6 sm:space-y-8">
                    <!-- Pengenalan -->
                    <section id="pengenalan" class="bg-white rounded-lg shadow-sm p-4 sm:p-6">
                        <h2 class="text-xl sm:text-2xl font-bold text-gray-900 mb-3 sm:mb-4 flex items-center">
                            <span class="w-7 h-7 sm:w-8 sm:h-8 bg-gradient-to-r from-primary to-secondary rounded-lg flex items-center justify-center text-white text-xs sm:text-sm mr-2 sm:mr-3 font-bold">1</span>
                            Pengenalan Sistem
                        </h2>
                        <div class="prose max-w-none">
                            <p class="text-gray-600 mb-4 text-sm sm:text-base">Selamat datang di sistem perpustakaan DEMEN BACA! Sistem ini dirancang untuk memudahkan Anda dalam meminjam dan mengelola koleksi buku perpustakaan.</p>
                            <div class="bg-gradient-to-r from-pink-50 to-purple-50 border-l-4 border-gradient-to-b border-primary p-3 sm:p-4 rounded-r-lg">
                                <h4 class="font-semibold text-gray-900 mb-2 text-sm sm:text-base">Fitur Utama:</h4>
                                <ul class="text-gray-600 space-y-1 text-xs sm:text-sm">
                                    <li>• Pencarian buku berdasarkan judul, penulis, atau kategori</li>
                                    <li>• Peminjaman buku secara online</li>
                                    <li>• Riwayat peminjaman dan status buku</li>
                                    <li>• Perpanjangan masa peminjaman</li>
                                    <li>• Notifikasi pengingat pengembalian</li>
                                </ul>
                            </div>
                        </div>
                    </section>

                    <!-- Cara Meminjam -->
                    <section id="cara-meminjam" class="bg-white rounded-lg shadow-sm p-4 sm:p-6">
                        <h2 class="text-xl sm:text-2xl font-bold text-gray-900 mb-3 sm:mb-4 flex items-center">
                            <span class="w-7 h-7 sm:w-8 sm:h-8 bg-gradient-to-r from-primary to-secondary rounded-lg flex items-center justify-center text-white text-xs sm:text-sm mr-2 sm:mr-3 font-bold">2</span>
                            Cara Meminjam Buku
                        </h2>
                        <div class="space-y-3 sm:space-y-4">
                            <div class="flex items-start space-x-3 sm:space-x-4">
                                <div class="w-7 h-7 sm:w-8 sm:h-8 bg-gradient-to-r from-pink-100 to-purple-100 text-primary rounded-full flex items-center justify-center font-semibold text-xs sm:text-sm flex-shrink-0">1</div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 text-sm sm:text-base">Cari Buku yang Diinginkan</h4>
                                    <p class="text-gray-600 text-xs sm:text-sm">Gunakan fitur pencarian untuk menemukan buku berdasarkan judul, penulis, atau kategori.</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3 sm:space-x-4">
                                <div class="w-7 h-7 sm:w-8 sm:h-8 bg-gradient-to-r from-pink-100 to-purple-100 text-primary rounded-full flex items-center justify-center font-semibold text-xs sm:text-sm flex-shrink-0">2</div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 text-sm sm:text-base">Periksa Ketersediaan</h4>
                                    <p class="text-gray-600 text-xs sm:text-sm">Pastikan status buku menunjukkan "Tersedia" sebelum melakukan peminjaman.</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3 sm:space-x-4">
                                <div class="w-7 h-7 sm:w-8 sm:h-8 bg-gradient-to-r from-pink-100 to-purple-100 text-primary rounded-full flex items-center justify-center font-semibold text-xs sm:text-sm flex-shrink-0">3</div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 text-sm sm:text-base">Klik Tombol Pinjam</h4>
                                    <p class="text-gray-600 text-xs sm:text-sm">Klik tombol "Pinjam" pada halaman detail buku yang ingin dipinjam.</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3 sm:space-x-4">
                                <div class="w-7 h-7 sm:w-8 sm:h-8 bg-gradient-to-r from-pink-100 to-purple-100 text-primary rounded-full flex items-center justify-center font-semibold text-xs sm:text-sm flex-shrink-0">4</div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 text-sm sm:text-base">Konfirmasi Peminjaman</h4>
                                    <p class="text-gray-600 text-xs sm:text-sm">Periksa detail peminjaman dan konfirmasi. Buku akan otomatis tercatat dalam daftar pinjaman Anda.</p>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Cara Mengembalikan -->
                    <section id="cara-mengembalikan" class="bg-white rounded-lg shadow-sm p-4 sm:p-6">
                        <h2 class="text-xl sm:text-2xl font-bold text-gray-900 mb-3 sm:mb-4 flex items-center">
                            <span class="w-7 h-7 sm:w-8 sm:h-8 bg-gradient-to-r from-primary to-secondary rounded-lg flex items-center justify-center text-white text-xs sm:text-sm mr-2 sm:mr-3 font-bold">3</span>
                            Cara Mengembalikan Buku
                        </h2>
                        <div class="space-y-3 sm:space-y-4">
                            <p class="text-gray-600 text-sm sm:text-base">Pengembalian buku dapat dilakukan melalui sistem atau langsung ke perpustakaan:</p>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                                <div class="bg-gradient-to-br from-pink-50 to-purple-50 p-3 sm:p-4 rounded-lg">
                                    <h4 class="font-semibold text-gray-900 mb-2 text-sm sm:text-base">📱 Melalui Sistem</h4>
                                    <ul class="text-gray-600 space-y-1 text-xs sm:text-sm">
                                        <li>1. Buka menu "Peminjaman"</li>
                                        <li>2. Pilih buku yang akan dikembalikan</li>
                                        <li>3. Klik "Kembalikan Buku"</li>
                                        <li>4. Serahkan buku ke petugas perpustakaan</li>
                                    </ul>
                                </div>
                                <div class="bg-gradient-to-br from-pink-50 to-purple-50 p-3 sm:p-4 rounded-lg">
                                    <h4 class="font-semibold text-gray-900 mb-2 text-sm sm:text-base">🏢 Langsung ke Perpustakaan</h4>
                                    <ul class="text-gray-600 space-y-1 text-xs sm:text-sm">
                                        <li>1. Bawa buku dan kartu anggota</li>
                                        <li>2. Serahkan ke petugas</li>
                                        <li>3. Petugas akan memproses pengembalian</li>
                                        <li>4. Status akan otomatis terupdate</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Mencari Buku -->
                    <section id="mencari-buku" class="bg-white rounded-lg shadow-sm p-4 sm:p-6">
                        <h2 class="text-xl sm:text-2xl font-bold text-gray-900 mb-3 sm:mb-4 flex items-center">
                            <span class="w-7 h-7 sm:w-8 sm:h-8 bg-gradient-to-r from-primary to-secondary rounded-lg flex items-center justify-center text-white text-xs sm:text-sm mr-2 sm:mr-3 font-bold">4</span>
                            Mencari Buku
                        </h2>
                        <div class="space-y-3 sm:space-y-4">
                            <p class="text-gray-600 text-sm sm:text-base">Sistem pencarian DEMEN BACA memungkinkan Anda menemukan buku dengan mudah:</p>
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 sm:gap-4">
                                <div class="text-center p-3 sm:p-4 bg-gradient-to-br from-pink-50 to-purple-50 rounded-lg">
                                    <div class="w-10 h-10 sm:w-12 sm:h-12 bg-gradient-to-r from-primary to-secondary rounded-full flex items-center justify-center text-white mx-auto mb-2 text-lg sm:text-xl">🔍</div>
                                    <h4 class="font-semibold text-gray-900 text-xs sm:text-sm">Pencarian Judul</h4>
                                    <p class="text-gray-600 text-xs">Cari berdasarkan nama buku</p>
                                </div>
                                <div class="text-center p-3 sm:p-4 bg-gradient-to-br from-pink-50 to-purple-50 rounded-lg">
                                    <div class="w-10 h-10 sm:w-12 sm:h-12 bg-gradient-to-r from-primary to-secondary rounded-full flex items-center justify-center text-white mx-auto mb-2 text-lg sm:text-xl">👤</div>
                                    <h4 class="font-semibold text-gray-900 text-xs sm:text-sm">Pencarian Penulis</h4>
                                    <p class="text-gray-600 text-xs">Cari berdasarkan nama penulis</p>
                                </div>
                                <div class="text-center p-3 sm:p-4 bg-gradient-to-br from-pink-50 to-purple-50 rounded-lg">
                                    <div class="w-10 h-10 sm:w-12 sm:h-12 bg-gradient-to-r from-primary to-secondary rounded-full flex items-center justify-center text-white mx-auto mb-2 text-lg sm:text-xl">📚</div>
                                    <h4 class="font-semibold text-gray-900 text-xs sm:text-sm">Filter Kategori</h4>
                                    <p class="text-gray-600 text-xs">Filter berdasarkan genre buku</p>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Profil -->
                    <section id="profil" class="bg-white rounded-lg shadow-sm p-4 sm:p-6">
                        <h2 class="text-xl sm:text-2xl font-bold text-gray-900 mb-3 sm:mb-4 flex items-center">
                            <span class="w-7 h-7 sm:w-8 sm:h-8 bg-gradient-to-r from-primary to-secondary rounded-lg flex items-center justify-center text-white text-xs sm:text-sm mr-2 sm:mr-3 font-bold">5</span>
                            Mengelola Profil
                        </h2>
                        <div class="space-y-3 sm:space-y-4">
                            <p class="text-gray-600 text-sm sm:text-base">Kelola informasi pribadi dan preferensi akun Anda:</p>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div class="space-y-2">
                                    <h4 class="font-semibold text-gray-900 text-sm sm:text-base">📝 Update Informasi</h4>
                                    <ul class="text-gray-600 space-y-1 text-xs sm:text-sm">
                                        <li>• Ubah data pribadi</li>
                                        <li>• Update nomor telepon</li>
                                        <li>• Ganti password</li>
                                        <li>• Upload foto profil</li>
                                    </ul>
                                </div>
                                <div class="space-y-2">
                                    <h4 class="font-semibold text-gray-900 text-sm sm:text-base">🔔 Pengaturan Notifikasi</h4>
                                    <ul class="text-gray-600 space-y-1 text-xs sm:text-sm">
                                        <li>• Pengingat pengembalian</li>
                                        <li>• Notifikasi buku baru</li>
                                        <li>• Info perpustakaan</li>
                                        <li>• Status reservasi</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Aturan & Kebijakan -->
                    <section id="aturan" class="bg-white rounded-lg shadow-sm p-4 sm:p-6">
                        <h2 class="text-xl sm:text-2xl font-bold text-gray-900 mb-3 sm:mb-4 flex items-center">
                            <span class="w-7 h-7 sm:w-8 sm:h-8 bg-gradient-to-r from-primary to-secondary rounded-lg flex items-center justify-center text-white text-xs sm:text-sm mr-2 sm:mr-3 font-bold">6</span>
                            Aturan & Kebijakan
                        </h2>
                        <div class="space-y-3 sm:space-y-4">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                                <div class="border-2 border-pink-200 rounded-lg p-3 sm:p-4 hover:border-primary transition-colors">
                                    <h4 class="font-semibold text-gray-900 mb-2 text-sm sm:text-base flex items-center">
                                        <span class="text-lg sm:text-xl mr-2">⏰</span> Masa Peminjaman
                                    </h4>
                                    <p class="text-gray-600 text-xs sm:text-sm">Buku dapat dipinjam selama maksimal 14 hari dengan kemungkinan perpanjangan 1x selama 7 hari.</p>
                                </div>
                                <div class="border-2 border-pink-200 rounded-lg p-3 sm:p-4 hover:border-primary transition-colors">
                                    <h4 class="font-semibold text-gray-900 mb-2 text-sm sm:text-base flex items-center">
                                        <span class="text-lg sm:text-xl mr-2">📖</span> Batas Peminjaman
                                    </h4>
                                    <p class="text-gray-600 text-xs sm:text-sm">Setiap anggota dapat meminjam maksimal 3 buku secara bersamaan.</p>
                                </div>
                                <div class="border-2 border-pink-200 rounded-lg p-3 sm:p-4 hover:border-primary transition-colors">
                                    <h4 class="font-semibold text-gray-900 mb-2 text-sm sm:text-base flex items-center">
                                        <span class="text-lg sm:text-xl mr-2">💰</span> Denda Keterlambatan
                                    </h4>
                                    <p class="text-gray-600 text-xs sm:text-sm">Denda Rp 1,000 per hari untuk setiap buku yang terlambat dikembalikan.</p>
                                </div>
                                <div class="border-2 border-pink-200 rounded-lg p-3 sm:p-4 hover:border-primary transition-colors">
                                    <h4 class="font-semibold text-gray-900 mb-2 text-sm sm:text-base flex items-center">
                                        <span class="text-lg sm:text-xl mr-2">🔄</span> Perpanjangan
                                    </h4>
                                    <p class="text-gray-600 text-xs sm:text-sm">Perpanjangan dapat dilakukan maksimal 3 hari sebelum batas waktu pengembalian.</p>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- FAQ -->
                    <section id="faq" class="bg-white rounded-lg shadow-sm p-4 sm:p-6">
                        <h2 class="text-xl sm:text-2xl font-bold text-gray-900 mb-3 sm:mb-4 flex items-center">
                            <span class="w-7 h-7 sm:w-8 sm:h-8 bg-gradient-to-r from-primary to-secondary rounded-lg flex items-center justify-center text-white text-xs sm:text-sm mr-2 sm:mr-3 font-bold">7</span>
                            Frequently Asked Questions (FAQ)
                        </h2>
                        <div class="space-y-3 sm:space-y-4">
                            <div class="border-b border-gray-200 pb-3 sm:pb-4">
                                <h4 class="font-semibold text-gray-900 mb-2 text-sm sm:text-base">❓ Bagaimana cara mendaftar sebagai anggota perpustakaan?</h4>
                                <p class="text-gray-600 text-xs sm:text-sm">Hubungi petugas perpustakaan dengan membawa KTP/Kartu Pelajar dan mengisi formulir pendaftaran.</p>
                            </div>
                            <div class="border-b border-gray-200 pb-3 sm:pb-4">
                                <h4 class="font-semibold text-gray-900 mb-2 text-sm sm:text-base">❓ Apakah bisa memesan buku yang sedang dipinjam orang lain?</h4>
                                <p class="text-gray-600 text-xs sm:text-sm">Ya, Anda dapat menggunakan fitur reservasi untuk mengantri buku yang sedang dipinjam.</p>
                            </div>
                            <div class="border-b border-gray-200 pb-3 sm:pb-4">
                                <h4 class="font-semibold text-gray-900 mb-2 text-sm sm:text-base">❓ Bagaimana jika lupa password?</h4>
                                <p class="text-gray-600 text-xs sm:text-sm">Gunakan fitur "Lupa Password" di halaman login atau hubungi petugas perpustakaan.</p>
                            </div>
                            <div class="pb-3 sm:pb-4">
                                <h4 class="font-semibold text-gray-900 mb-2 text-sm sm:text-base">❓ Apakah ada notifikasi untuk batas waktu pengembalian?</h4>
                                <p class="text-gray-600 text-xs sm:text-sm">Ya, sistem akan mengirim notifikasi 3 hari dan 1 hari sebelum batas waktu pengembalian.</p>
                            </div>
                        </div>
                    </section>

                    <!-- Kontak -->
                    <section id="kontak" class="bg-white rounded-lg shadow-sm p-4 sm:p-6">
                        <h2 class="text-xl sm:text-2xl font-bold text-gray-900 mb-3 sm:mb-4 flex items-center">
                            <span class="w-7 h-7 sm:w-8 sm:h-8 bg-gradient-to-r from-primary to-secondary rounded-lg flex items-center justify-center text-white text-xs sm:text-sm mr-2 sm:mr-3 font-bold">8</span>
                            Bantuan & Kontak
                        </h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                            <div class="bg-gradient-to-br from-pink-50 to-purple-50 p-3 sm:p-4 rounded-lg">
                                <h4 class="font-semibold text-gray-900 mb-3 text-sm sm:text-base">📞 Informasi Kontak</h4>
                                <div class="space-y-2 text-xs sm:text-sm text-gray-600">
                                    <p><span class="font-medium">Telepon:</span> (0274) 123-4567</p>
                                    <p><span class="font-medium">Email:</span> info@demenbaca.ac.id</p>
                                    <p><span class="font-medium">Alamat:</span> Jl. Perpustakaan No. 123, Yogyakarta</p>
                                </div>
                            </div>
                            <div class="bg-gradient-to-br from-pink-50 to-purple-50 p-3 sm:p-4 rounded-lg">
                                <h4 class="font-semibold text-gray-900 mb-3 text-sm sm:text-base">🕒 Jam Operasional</h4>
                                <div class="space-y-2 text-xs sm:text-sm text-gray-600">
                                    <p><span class="font-medium">Senin - Jumat:</span> 08:00 - 17:00</p>
                                    <p><span class="font-medium">Sabtu:</span> 08:00 - 15:00</p>
                                    <p><span class="font-medium">Minggu:</span> Tutup</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 sm:mt-6 p-3 sm:p-4 bg-gradient-to-r from-yellow-50 to-orange-50 border-l-4 border-yellow-400 rounded-r-lg">
                            <h4 class="font-semibold text-yellow-800 mb-2 text-sm sm:text-base">💡 Tips untuk Bantuan Cepat</h4>
                            <p class="text-yellow-700 text-xs sm:text-sm">Sebelum menghubungi, pastikan Anda sudah mencoba mencari solusi di FAQ atau restart aplikasi jika mengalami masalah teknis.</p>
                        </div>
                    </section>
                </div>

              
    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Highlight active section in sidebar
        window.addEventListener('scroll', () => {
            const sections = document.querySelectorAll('section[id]');
            const navLinks = document.querySelectorAll('nav a[href^="#"]');
            
            let current = '';
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;
                if (scrollY >= (sectionTop - 200)) {
                    current = section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('bg-pink-100', 'text-primary');
                if (link.getAttribute('href').substring(1) === current) {
                    link.classList.add('bg-pink-100', 'text-primary');
                }
            });
        });
    </script>
</body>
</html>