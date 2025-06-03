@extends('layout.main')
@section('content')
<div class="flex flex-wrap -mx-3">
  <div class="flex-none w-full max-w-full px-3">
    <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
      <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
        <a href="/buku/create" class="p-2 end rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Tambah</a>

        <h6 class="mt-5">Daftar Buku</h6>

      </div>
      
      <div class="flex-auto px-0 pt-0 pb-2">
        <div class="p-0 overflow-x-auto">
          <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
            <thead class="align-bottom">
              <tr>
                <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Judul</th>
                <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Kategori</th>
                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Pengarang</th>
                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Penerbit</th>
                <th class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-gray-200 border-solid shadow-none tracking-none whitespace-nowrap text-slate-400 opacity-70">Tahun Terbit</th>
                <th class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-gray-200 border-solid shadow-none tracking-none whitespace-nowrap text-slate-400 opacity-70">Jumlah</th>
                <th class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-gray-200 border-solid shadow-none tracking-none whitespace-nowrap text-slate-400 opacity-70">ISBN</th>
                <th class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-gray-200 border-solid shadow-none tracking-none whitespace-nowrap text-slate-400 opacity-70">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($buku as $item)

              <tr>
                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                  <div class="flex px-2 py-1">
                    <div>
                      {{-- <img src="../assets/img/team-2.jpg" class="inline-flex items-center justify-center mr-4 text-sm text-white transition-all duration-200 ease-soft-in-out h-9 w-9 rounded-xl" alt="user1" /> --}}
                    </div>
                    <div class="flex flex-col justify-center">
                      <h6 class="mb-0 text-sm leading-normal">{{$item->judul}}</h6>
                    </div>
                  </div>
                </td>
                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                  <p class="mb-0 text-xs font-semibold leading-tight">{{$item->kategori->nama_kategori}}</p>
                </td>
                <td class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                  {{-- <span class="bg-gradient-to-tl from-green-600 to-lime-400 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">Online</span> --}}
                {{$item->pengarang}}
                </td>
                <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                  <span class="text-xs font-semibold leading-tight text-slate-400">{{$item->penerbit}}</span>
                </td>
                <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                  <span class="text-xs font-semibold leading-tight text-slate-400">{{$item->tahun_terbit}}</span>
                </td>
                <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                  <span class="text-xs font-semibold leading-tight text-slate-400">{{$item->jumlah}}</span>
                </td>
                <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                  <span class="text-xs font-semibold leading-tight text-slate-400">{{$item->isbn}}</span>
                </td>
                <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                  <a href="{{ route('buku.edit', $item->id) }}" class="text-xs font-semibold leading-tight text-yellow-400 p-2"> Edit </a>
                  <a href="{{ route('buku.delete', $item->id) }}" class="text-xs font-semibold leading-tight text-red-600 p-2" onclick="return confirm('Yakin ingin menghapus buku ini? '). $item->kategori"> Hapus </a>
                  <a href="javascript:;" class="text-xs font-semibold leading-tight text-slate-400 p-2"> Detail </a>
                </td>
              </tr>
                  
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
