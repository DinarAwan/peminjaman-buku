@extends('layout.main')
@section('content')
<div class="container-fluid px-3">
    <div class="flex flex-wrap -mx-2">
        @foreach ($buku as $item)
        <div class="w-1/4 px-2 mb-4">
            <div class="relative flex flex-col min-w-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="p-4 mx-6 mb-0 text-center bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <div class="w-16 h-16 text-center bg-center icon bg-gradient-to-tl from-purple-700 to-pink-500 shadow-soft-2xl rounded-xl">
                        <img class="w-20 h-34 text-center justify-center shadow-2xl rounded-md" src="{{ asset('1.jpg') }}" alt="">
                    </div>
                </div>
                <div class="flex-auto p-4 pt-9 mt-9 text-center">
                    <h6 class="mb-0 text-center">{{$item->judul}}</h6>
                    <span class="leading-tight text-xs">{{$item->kategori->nama_kategori}}</span>
                    <hr class="h-px my-4 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />
                    <a class="inline w-1/2 px-1 py-3 my-2 font-bold text-center text-white uppercase align-middle transition-all ease-in border-0 rounded-lg select-none shadow-soft-md bg-150 bg-x-25 leading-pro text-xs bg-gradient-to-tl from-purple-700 to-pink-500 hover:shadow-soft-2xl hover:scale-102" target="_blank" href="#">Detail</a>
                    <button type="submit" class="inline-block w-1/2 px-1 py-3 my-2 font-bold text-center text-white uppercase align-middle transition-all ease-in border-0 rounded-lg select-none shadow-soft-md bg-150 bg-x-25 leading-pro text-xs bg-gradient-to-tl from-purple-700 to-pink-500 hover:shadow-soft-2xl hover:scale-102">Pinjam</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection