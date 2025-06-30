@extends('layout.main')
@section('content')
<div class="max-w-4xl mx-auto p-5">
    <!-- Header Section -->
    <div class="text-center mb-8">
        <div class="flex items-center justify-center gap-4 mb-4">
            <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl flex items-center justify-center text-white text-2xl shadow-lg">
                👤
            </div>
            <h1 class="text-4xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">
                Edit Profile
            </h1>
        </div>
        <p class="text-gray-600 text-lg">
            Personalisasi profil Anda untuk pengalaman yang lebih baik
        </p>
    </div>

    <!-- Profile Preview Card -->
    <div class="mb-8">
        <div class="relative bg-gradient-to-r from-purple-400 to-pink-400 rounded-3xl overflow-hidden shadow-xl" id="backgroundPreview">
            <!-- Background overlay for better text contrast -->
            <div class="absolute inset-0 bg-opacity-20 min-h-75 bg-center" style="background-image: url('{{ $user->foto_bacground ? url('foto_bacground/' . $user->foto_bacground) : asset('assets/img/curved-images/curved0.jpg') }}'); background-size: cover;">
                <span class="absolute inset-y-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-purple-700 to-pink-500 opacity-60"></span>

            </div>
            
            <!-- Profile content -->
            <div class="relative z-10 p-8 text-center text-white">
                <div class="inline-block relative mb-4">

                    @if ($user->foto_profile)
                    <img alt="Profile" class="w-24 h-24 rounded-full border-4 border-white shadow-lg object-cover" src="{{ url('foto_profile').'/'.$user->foto_profile}}" >
                  @else
                    <img alt="Profile" class="w-24 h-24 rounded-full border-4 border-white shadow-lg object-cover" src="{{ asset('gambar/p-profile.jpg') }}">
                  @endif
                    <div class="absolute -bottom-2 -right-2 w-8 h-8 bg-green-400 rounded-full border-2 border-white flex items-center justify-center">
                        <span class="text-xs">✓</span>
                    </div>
                </div>
                <h2 id="usernamePreview" class="text-2xl font-bold mb-2">{{$user->name}}</h2>
                <p class="text-purple-100">Member Perpustakaan</p>
            </div>
        </div>
    </div>

    <!-- Edit Form -->
    <div class="bg-white rounded-3xl shadow-xl border border-gray-200 overflow-hidden">
        <form id="editProfileForm" action="{{ route('update-profile-admin') }}" method="post" enctype="multipart/form-data">
            @csrf
            
            <!-- Form Header -->
            <div class="bg-gradient-to-r from-purple-50 to-pink-50 px-8 py-6 border-b border-gray-200">
                <h3 class="text-xl font-semibold text-gray-800 flex items-center gap-3">
                    ✏️ Edit Informasi Profile
                </h3>
                <p class="text-gray-600 text-sm mt-2">Ubah foto, background, dan username sesuai keinginan Anda</p>
            </div>

            <div class="p-8 space-y-8">
                <!-- Profile Picture Section -->
                <div class="space-y-4">
                    <label class="block text-lg font-semibold text-gray-800 mb-4">
                        📸 Foto Profile
                    </label>
                    
                    <div class="flex items-center gap-6">
                        <div class="flex-shrink-0">
                            @if ($user->foto_profile)
                    <img alt="Profile" class="w-24 h-24 rounded-full border-4 border-white shadow-lg object-cover" src="{{ url('foto_profile').'/'.$user->foto_profile}}" >
                  @else
                    <img alt="Profile" class="w-24 h-24 rounded-full border-4 border-white shadow-lg object-cover" src="{{ asset('gambar/p-profile.jpg') }}">
                  @endif
                        </div>
                        
                        <div class="flex-1">
                            <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:border-purple-400 transition-colors duration-300">
                                <input type="file" 
                                       id="profilePicture" 
                                       name="foto_profile" 
                                       accept="image/*" 
                                       class="hidden">
                                <label for="profilePicture" class="cursor-pointer">
                                    <div class="text-4xl mb-2">📷</div>
                                    <p class="text-gray-600 font-medium">Klik untuk upload foto baru</p>
                                    <p class="text-gray-400 text-sm mt-1">PNG, JPG hingga 5MB</p>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Background Section -->
                <div class="space-y-4">
                    <label class="block text-lg font-semibold text-gray-800 mb-4">
                        🎨 Background Profile
                    </label>                   
                    <!-- Custom Background Upload -->
                    <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:border-purple-400 transition-colors duration-300">
                        <input type="file" 
                               id="backgroundImage" 
                               name="foto_bacground" 
                               accept="image/*" 
                               class="hidden">
                        <label for="backgroundImage" class="cursor-pointer">
                            <div class="text-4xl mb-2">🖼️</div>
                            <p class="text-gray-600 font-medium">Upload background custom</p>
                            <p class="text-gray-400 text-sm mt-1">PNG, JPG hingga 10MB</p>
                        </label>
                    </div>
                    
                    <input type="hidden" id="selectedBackground" name="selectedBackground" value="gradient-to-r from-purple-400 to-pink-400">
                </div>

                <!-- Username Section -->
                <div class="space-y-4">
                    <label for="username" class="block text-lg font-semibold text-gray-800">
                        👤 Username
                    </label>
                    <div class="relative">
                        <input type="text" 
                               id="username" 
                               name="name" 
                               value="{{$user->name}}"
                               class="w-full px-4 py-4 bg-gray-50 border-2 border-gray-200 rounded-2xl focus:border-purple-500 focus:bg-white focus:ring-4 focus:ring-purple-100 transition-all duration-300 text-gray-800 text-lg"
                               placeholder="Masukkan username baru...">
                        <div class="absolute right-4 top-1/2 transform -translate-y-1/2">
                            <span class="text-gray-400">✏️</span>
                        </div>
                    </div>
                    <p class="text-gray-500 text-sm">Username akan ditampilkan di profil dan aktivitas Anda</p>
                </div>

                 <!-- password Section -->
                 <div class="space-y-4">
                    <label for="username" class="block text-lg font-semibold text-gray-800">
                        <h4>JIKA INGIN RESSET PASSWORD</h4>
                    </label>
                    <label for="username" class="block text-lg font-semibold text-gray-800">
                        👤 Password Saat ini
                    </label>
                    <div class="relative">
                        <input type="password" 
                               id="username" 
                               name="current_password" 
                               class="w-full px-4 py-4 bg-gray-50 border-2 border-gray-200 rounded-2xl focus:border-purple-500 focus:bg-white focus:ring-4 focus:ring-purple-100 transition-all duration-300 text-gray-800 text-lg"
                               placeholder="Masukkan password saat ini...">
                        <div class="absolute right-4 top-1/2 transform -translate-y-1/2">
                            <span class="text-gray-400">✏️</span>
                        </div>
                    </div>

                    <label for="username" class="block text-lg font-semibold text-gray-800">
                        👤 Password
                    </label>
                    <div class="relative">
                        <input type="password" 
                               id="username" 
                               name="password" 
                               class="w-full px-4 py-4 bg-gray-50 border-2 border-gray-200 rounded-2xl focus:border-purple-500 focus:bg-white focus:ring-4 focus:ring-purple-100 transition-all duration-300 text-gray-800 text-lg"
                               placeholder="Masukkan password baru...">
                        <div class="absolute right-4 top-1/2 transform -translate-y-1/2">
                            <span class="text-gray-400">✏️</span>
                        </div>
                    </div>

                    <label for="username" class="block text-lg font-semibold text-gray-800">
                        👤 Password Confirmation
                    </label>
                    <div class="relative">
                        <input type="password" 
                               id="username" 
                               name="password_confirmation" 
                               class="w-full px-4 py-4 bg-gray-50 border-2 border-gray-200 rounded-2xl focus:border-purple-500 focus:bg-white focus:ring-4 focus:ring-purple-100 transition-all duration-300 text-gray-800 text-lg"
                               placeholder="Masukkan konfirmasi password baru...">
                        <div class="absolute right-4 top-1/2 transform -translate-y-1/2">
                            <span class="text-gray-400">✏️</span>
                        </div>
                    </div>
                </div>


                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-200">
                    <button type="submit" 
                            class="flex-1 px-6 py-3 bg-gradient-to-r from-purple-500 to-pink-500 hover:from-purple-600 hover:to-pink-600 text-white font-semibold rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 flex items-center justify-center gap-2">
                        💾 Simpan Profile
                </button>
                <a href="/profile-pengguna">
                <button type="button" 
                id="previewButton"
                class="flex-1 px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold rounded-2xl transition-colors duration-300 flex items-center justify-center gap-2">
                Ngga Jadi Deng
                </button></a>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
// Preview functionality
function updatePreview() {
    const username = document.getElementById('username').value || 'John Doe';
    const selectedBg = document.getElementById('selectedBackground').value;
    
    // Update username preview
    document.getElementById('usernamePreview').textContent = username;
    
    // Update background preview
    const bgPreview = document.getElementById('backgroundPreview');
    bgPreview.className = `relative bg-${selectedBg} rounded-3xl overflow-hidden shadow-xl`;
}

// Profile picture preview
document.getElementById('profilePicture').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('currentProfileImg').src = e.target.result;
            document.getElementById('profileImagePreview').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});

// Background selection
document.querySelectorAll('[data-bg]').forEach(element => {
    element.addEventListener('click', function() {
        // Remove previous selection
        document.querySelectorAll('[data-bg]').forEach(el => {
            el.querySelector('.absolute').className = 'absolute inset-0 border-2 border-transparent group-hover:border-purple-500 rounded-lg transition-colors duration-200';
        });
        
        // Add selection to clicked element
        this.querySelector('.absolute').className = 'absolute inset-0 border-2 border-purple-500 rounded-lg transition-colors duration-200';
        
        // Update selected background
        const bgClass = this.getAttribute('data-bg');
        document.getElementById('selectedBackground').value = bgClass;
        
        updatePreview();
    });
});

// Custom background upload
document.getElementById('backgroundImage').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const bgPreview = document.getElementById('backgroundPreview');
            bgPreview.style.backgroundImage = `url(${e.target.result})`;
            bgPreview.style.backgroundSize = 'cover';
            bgPreview.style.backgroundPosition = 'center';
            bgPreview.className = 'relative rounded-3xl overflow-hidden shadow-xl';
            
            // Clear gradient selection
            document.getElementById('selectedBackground').value = 'custom';
            document.querySelectorAll('[data-bg]').forEach(el => {
                el.querySelector('.absolute').className = 'absolute inset-0 border-2 border-transparent group-hover:border-purple-500 rounded-lg transition-colors duration-200';
            });
        };
        reader.readAsDataURL(file);
    }
});

// Username real-time preview
document.getElementById('username').addEventListener('input', updatePreview);

// Preview button
document.getElementById('previewButton').addEventListener('click', function() {
    updatePreview();
    
    // Scroll to preview
    document.getElementById('backgroundPreview').scrollIntoView({ 
        behavior: 'smooth',
        block: 'center'
    });
    
    // Add temporary highlight effect
    const preview = document.getElementById('backgroundPreview');
    preview.style.transform = 'scale(1.02)';
    preview.style.transition = 'transform 0.3s ease';
    
    setTimeout(() => {
        preview.style.transform = 'scale(1)';
    }, 300);
});

// // Form submission
// document.getElementById('editProfileForm').addEventListener('submit', function(e) {
//     e.preventDefault();
    
//     // Get form data
//     const formData = new FormData(this);
    
//     // Show loading state
//     const submitButton = this.querySelector('button[type="submit"]');
//     const originalText = submitButton.innerHTML;
//     submitButton.innerHTML = '⏳ Menyimpan...';
//     submitButton.disabled = true;
    
//     // Simulate API call (replace with actual endpoint)
//     setTimeout(() => {
//         // Success state
//         submitButton.innerHTML = '✅ Tersimpan!';
//         submitButton.className = submitButton.className.replace('from-purple-500 to-pink-500', 'from-green-500 to-emerald-500');
        
//         // Reset after 2 seconds
//         setTimeout(() => {
//             submitButton.innerHTML = originalText;
//             submitButton.className = submitButton.className.replace('from-green-500 to-emerald-500', 'from-purple-500 to-pink-500');
//             submitButton.disabled = false;
//         }, 2000);
        
        // Here you would typically send the data to your Laravel controller
        // fetch('/update-profile', {
        //     method: 'POST',
        //     body: formData,
        //     headers: {
        //         'X-CSRF-TOKEN': document.querySelector('[name="_token"]').value
        //     }
        // });
        
//     }, 1500);
// });

// Initialize preview on page load
document.addEventListener('DOMContentLoaded', function() {
    updatePreview();
});
</script>

@endsection