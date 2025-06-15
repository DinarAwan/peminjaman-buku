@extends('layout-pengguna.main')
@section('content')

<div class="w-full max-w-full px-3 lg-max:mt-6 xl:w-4/12 mx-auto text-center justify-center">
    <div class="relative flex flex-col h-full min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
      <div class="p-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
        <div class="flex flex-wrap -mx-3">
          <div class="flex items-center w-full max-w-full px-3 shrink-0 md:w-8/12 md:flex-none">
            <h6 class="mb-0">Books Information</h6>
          </div>
          <div class="w-full max-w-full px-3 text-right shrink-0 md:w-4/12 md:flex-none">           
          </div>
        </div>
      </div>
      <div class="flex-auto p-4">
        @if ($buku->foto)
            <img class="w-30 mb-4 h-44 text-center justify-center shadow-2xl rounded-md mx-auto" src="{{ url('foto').'/'.$buku->foto}}" alt="">
        @else
            <img class="w-30 mb-4 h-44 text-center justify-center shadow-2xl rounded-md mx-auto" src="{{ asset('gambar/cover-not-found.png') }}" alt="">
        @endif
        <p class="mt-5 leading-normal text-sm">{{$buku->deskripsi}}</p>
        <hr class="h-px my-3 bg-transparent bg-gradient-to-r from-transparent via-white to-transparent" />
        <ul class="flex flex-col pl-0 mb-0 rounded-lg">
          <li class="relative block px-4 py-2 pt-0 pl-0 leading-normal bg-white border-0 rounded-t-lg text-sm text-inherit"><strong class="text-slate-700">Judul Buku:</strong> &nbsp; {{$buku->judul}}</li>
          <li class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit"><strong class="text-slate-700">Pengarang:</strong> &nbsp; {{$buku->pengarang}}</li>
          <li class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit"><strong class="text-slate-700">Penerbit:</strong> &nbsp; {{$buku->penerbit}}</li>
          <li class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit"><strong class="text-slate-700">Tahun Terbit:</strong> &nbsp; {{$buku->tahun_terbit}}</li>
          <li class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit"><strong class="text-slate-700">ISBN:</strong> &nbsp; {{$buku->isbn}}</li>
        </ul>
      </div>
      <a href="/buku/peminjaman-pengguna" class="p-2 end rounded-md bg-violet-800 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-violet-900 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-fiolet-600">Kembali</a>
    </div>
  </div>
@endsection