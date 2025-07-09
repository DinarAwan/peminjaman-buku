@extends('layout-pengguna.main')
@section('content')
<link rel="stylesheet" href="../css/pengguna-peminjam-index.css">
<div class="container-fluid px-3">
    
    <div class="flex flex-wrap -mx-2">
        @foreach ($buku as $item)
        <div class="desktop-grid-4 tablet-grid mobile-grid px-2 mb-4">
            <div class="relative flex flex-col min-w-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                <!-- Tombol Like -->        
                @auth
                <form action="{{ $item->isLikeBy(auth()->user()) 
                    ? route('buku.unlike', $item) 
                    : route('buku.like', $item) }}" method="POST" class="absolute top-2 right-2">
                    @csrf
                    @if($item->isLikeBy(auth()->user()))
                        @method('DELETE')
                    @endif
                    <button type="submit" class="bg-white bg-opacity-90 hover:bg-opacity-100 rounded-full w-10 h-10 flex items-center justify-center shadow-lg transition-all duration-300 hover:scale-110">
                        <span class="text-{{ $item->isLikeBy(auth()->user()) ? 'red' : 'gray' }}-500 text-lg">♥</span>
                    </button>
                </form>
                @endauth
                
                <div class="p-4 mx-6 mb-0 text-center bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <div class="w-16 h-16 text-center bg-center icon bg-gradient-to-tl from-purple-700 to-pink-500 shadow-soft-2xl rounded-xl">
                        @if ($item->foto)
                        <img class="w-20 h-34 text-center justify-center shadow-2xl rounded-md" src="{{ url('foto').'/'.$item->foto}}" alt="">
                        @else
                        <img class="w-20 h-34 text-center justify-center shadow-2xl rounded-md" src="{{ asset('gambar/cover-not-found.png') }}" alt="">
                        @endif
                    </div>
                </div>
                <div class="flex-auto p-4 pt-9 mt-9 text-center">
                    <h6 class="mb-0 text-center">{{$item->judul}}</h6>
                    <span class="leading-tight text-xs">{{$item->kategori->nama_kategori}}</span>
                    
                    <!-- Jumlah Like -->
                    <div class="flex items-center justify-center mt-2 mb-2">
                        <span class="text-red-500 text-sm mr-1">♥</span>
                        <span class="text-gray-600 text-sm">{{ $item->likes()->count() ?? 0 }}</span>
                    </div>
                <form action="{{ route('pinjam.buku') }}" method="POST">
                        @csrf
                    <hr class="h-px my-4 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />
                    <a class="inline w-1/2 px-1 py-3 my-2 font-bold text-center text-white uppercase align-middle transition-all ease-in border-0 rounded-lg select-none shadow-soft-md bg-150 bg-x-25 leading-pro text-xs bg-gradient-to-tl from-purple-700 to-pink-500 hover:shadow-soft-2xl hover:scale-102" href="{{ route('detail-buku', $item->id) }}">Detail</a>
                    <button onclick="return confirm('Yakin ingin meminjam buku ini? ')" type="submit" name="buku_id" value="{{ $item->id }}" class="inline-block w-1/2 px-1 py-3 my-2 font-bold text-center text-white uppercase align-middle transition-all ease-in border-0 rounded-lg select-none shadow-soft-md bg-150 bg-x-25 leading-pro text-xs bg-gradient-to-tl from-purple-700 to-pink-500 hover:shadow-soft-2xl hover:scale-102" >Pinjam</button>
                </form>

            


                    {{-- Komentar --}}
                    <div class="flex justify-center mt-2">
                        <button onclick="toggleCommentPopup({{ $item->id }})" class="comment-btn inline-flex items-center justify-center px-4 py-2 font-medium text-center text-white align-middle transition-all ease-in border-0 rounded-full select-none shadow-md text-xs tracking-wide hover:shadow-lg">
                            <svg class="comment-icon w-3 h-3 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd"></path>
                            </svg>
                            <span>Komentar</span>
                            <span class="ml-2 px-2 py-1 bg-opacity-30 rounded-full text-xs font-medium">
                                {{ $item->komentars()->count() ?? 0 }}
                            </span>
                        </button>
                    </div>
                <!-- Popup Komentar -->
                <div id="commentPopup{{ $item->id }}" class="popup-overlay fixed inset-0 bg-gray-500 bg-opacity-50 flex items-center justify-center z-50 hidden">
                    <div class="popup-content bg-white rounded-2xl shadow-2xl max-w-md w-full mx-4 max-h-[80vh] overflow-hidden">
                        <!-- Header Popup -->
                        <div class="bg-gradient-to-r from-purple-700 to-pink-500 text-white p-4 rounded-t-2xl">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-semibold">Komentar</h3>
                                <button onclick="toggleCommentPopup({{ $item->id }})" class="text-white hover:text-gray-200 transition-colors">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                            <p class="text-sm text-purple-100 mt-1">{{ $item->judul }}</p>
                        </div>

                        <!-- Daftar Komentar -->
                        <div class="max-h-64 overflow-y-auto p-4 space-y-3">
                            @forelse($item->komentars ?? [] as $comment)
                            <div class="comment-item p-3 bg-gray-50 rounded-lg border-l-4 border-purple-500">
                                <div class="flex items-start space-x-3">
                                    @if ($comment->user->foto_profile)
                                        <img alt="profile_image" class="w-10 h-10 bg-gradient-to-br rounded-full flex items-center justify-center text-white text-sm font-semibold flex-shrink-0" src="{{ url('foto_profile').'/'.$comment->user->foto_profile}}" >
                                    @else
                                        <div class="w-8 h-8 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full flex items-center justify-center text-white text-sm font-semibold">
                                            {{ substr($comment->user->name ?? 'A', 0, 1) }}
                                        </div>
                                    @endif
                                    <div class="flex-1">
                                        <div class="flex items-center space-x-2">
                                            <span class="font-medium text-gray-800 text-sm">{{ $comment->user->name ?? 'Anonim' }}</span>
                                            <span class="text-xs text-gray-500">{{ $comment->created_at->diffForHumans() ?? 'Baru saja' }}</span>
                                        </div>
                                        <p class="text-gray-700 text-sm mt-1">{{ $comment->isi ?? 'Komentar sample' }}</p>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="text-center py-8 text-gray-500">
                                <svg class="w-12 h-12 mx-auto mb-3 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                </svg>
                                <p class="text-sm">Belum ada komentar</p>
                                <p class="text-xs text-gray-400">Jadilah yang pertama berkomentar!</p>
                            </div>
                            @endforelse
                        </div>

                        <!-- Form Komentar -->
                        @auth
                        <div class="comment-form p-4 border-t">
                            <form action="{{ route('buku.komentar', $item->id) }}" method="POST" class="space-y-3">
                                @csrf
                                <input type="hidden" name="buku_id" value="{{ $item->id }}">
                                <div class="flex items-start space-x-3">
                                    <div class="w-8 h-8 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full flex items-center justify-center text-white text-sm font-semibold">
                                        {{ substr(auth()->user()->name, 0, 1) }}
                                    </div>
                                    <div class="flex-1">
                                        <textarea 
                                            name="isi" 
                                            placeholder="Tulis komentar Anda..." 
                                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent resize-none text-sm"
                                            rows="3"
                                            required
                                        ></textarea>
                                        <div class="flex justify-end mt-2">
                                            <button type="submit" class="px-4 py-2 bg-gradient-to-r from-purple-700 to-pink-500 text-white rounded-lg hover:from-purple-800 hover:to-pink-600 transition-all duration-200 text-sm font-medium">
                                                Kirim
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        {{-- @else
                        <div class="p-4 bg-gray-50 text-center border-t">
                            <p class="text-sm text-gray-600 mb-2">Silakan login untuk berkomentar</p>
                            <a href="{{ route('login') }}" class="inline-block px-4 py-2 bg-gradient-to-r from-purple-700 to-pink-500 text-white rounded-lg hover:from-purple-800 hover:to-pink-600 transition-all duration-200 text-sm font-medium">
                                Login
                            </a>
                        </div> --}}
                        @endauth
                    </div>
                </div>






                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>


<script src="../javaScript/peminjaman-index.js"></script>
    

@endsection