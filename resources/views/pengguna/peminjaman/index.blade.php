@extends('layout-pengguna.main')
@section('content')
<style>
@media (min-width: 768px) {
    .desktop-grid-4 {
        width: 25% !important;
    }
}
@media (max-width: 767px) {
    .mobile-grid {
        width: 100% !important;
    }
}
@media (min-width: 640px) and (max-width: 767px) {
    .tablet-grid {
        width: 50% !important;
    }
}
</style>
<div class="container-fluid px-3">
    <form action="{{ route('pinjam.buku') }}" method="POST">
        @csrf
    <div class="flex flex-wrap -mx-2">
        @foreach ($buku as $item)
        <div class="desktop-grid-4 tablet-grid mobile-grid px-2 mb-4">
            <div class="relative flex flex-col min-w-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
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
                    <hr class="h-px my-4 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />
                    <a class="inline w-1/2 px-1 py-3 my-2 font-bold text-center text-white uppercase align-middle transition-all ease-in border-0 rounded-lg select-none shadow-soft-md bg-150 bg-x-25 leading-pro text-xs bg-gradient-to-tl from-purple-700 to-pink-500 hover:shadow-soft-2xl hover:scale-102" href="{{ route('detail-buku', $item->id) }}">Detail</a>
                    <button onclick="return confirm('Yakin ingin meminjam buku ini? ')" type="submit" name="buku_id" value="{{ $item->id }}" class="inline-block w-1/2 px-1 py-3 my-2 font-bold text-center text-white uppercase align-middle transition-all ease-in border-0 rounded-lg select-none shadow-soft-md bg-150 bg-x-25 leading-pro text-xs bg-gradient-to-tl from-purple-700 to-pink-500 hover:shadow-soft-2xl hover:scale-102" >Pinjam</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</form>
</div>
@endsection

{{-- @extends('layout-pengguna.main')
@section('content')
<div class="container-fluid px-3">
    <form action="{{ route('pinjam.buku') }}" method="POST">
        @csrf
    <div class="flex flex-wrap -mx-2">
        @foreach ($buku as $item)
        <div class="w-1/4 px-2 mb-4">
            <div class="relative flex flex-col min-w-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
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
                    <hr class="h-px my-4 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />
                    <a class="inline w-1/2 px-1 py-3 my-2 font-bold text-center text-white uppercase align-middle transition-all ease-in border-0 rounded-lg select-none shadow-soft-md bg-150 bg-x-25 leading-pro text-xs bg-gradient-to-tl from-purple-700 to-pink-500 hover:shadow-soft-2xl hover:scale-102" href="{{ route('detail-buku', $item->id) }}">Detail</a>
                    <button onclick="return confirm('Yakin ingin meminjam buku ini? ')" type="submit" name="buku_id" value="{{ $item->id }}" class="inline-block w-1/2 px-1 py-3 my-2 font-bold text-center text-white uppercase align-middle transition-all ease-in border-0 rounded-lg select-none shadow-soft-md bg-150 bg-x-25 leading-pro text-xs bg-gradient-to-tl from-purple-700 to-pink-500 hover:shadow-soft-2xl hover:scale-102" >Pinjam</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</form>
</div>

@endsection --}}