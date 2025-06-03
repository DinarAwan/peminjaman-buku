@extends('layout.main')
@section('content')
<form method="POST" action="" enctype="multipart/form-data">
    @csrf
      <div class="space-y-12 p-12">
        {{-- {{ route('produk.store') }} --}}
    
        <div class="border-b border-gray-900/10 pb-12">
          <h2 class="text-base/7 font-semibold text-gray-900">Penambahan Buku</h2>
          <p class="mt-1 text-sm/6 text-gray-600">Isi form dibawah untuk mencatat buku</p>
    
          <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-3">
              <label for="judul" class="block text-sm/6 font-medium text-gray-900">Nama Kategori</label>
              <div class="mt-2">
                <input type="text" name="nama_kategori" id="nama_kategori" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
              </div>
              @error('namaBarang')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="sm:col-span-3">
            <label for="harga_jual" class="block text-sm/6 font-medium text-gray-900">Deskripsi</label>
            <div class="mt-2">
              <textarea type="text" name="deskripsi" id="deskripsi" step="0.01" min="0" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"></textarea>
            </div>
          </div>
        </div>
        
      </div>
        
        
   
      <div class="mt-6 flex items-center justify-end gap-x-6 m-10">
        <button type="submit" class="btn btn-primary">
          Simpan
      </button>
        <button type="button" class="text-sm/6 font-semibold text-gray-900"><a href="/buku"> Cancel</a></button>
        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
      </div>
    </form>

@endsection