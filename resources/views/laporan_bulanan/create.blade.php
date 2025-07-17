@extends('layout.main')
@section('content')

<form method="POST" action="{{route('laporan-bulanan.store')}}" enctype="multipart/form-data">
    @csrf
      <div class="space-y-12 p-12">    
        <div class="border-b border-gray-900/10 pb-12">
          <h2 class="text-base/7 font-semibold text-gray-900">Buat Catatan Bulalan</h2>
          <p class="mt-1 text-sm/6 text-gray-600">Isi form dibawah untuk mencatat laporan bulanan</p>
    
          <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-3">
              <label for="tahun" class="block text-sm/6 font-medium text-gray-900">Tahun</label>
              <div class="mt-2">
                <input type="text" name="tahun" id="tahun" value="{{ old('tahun') }}" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                @error('tahun')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>
          <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-3">
              <label for="pengarang" class="block text-sm/6 font-medium text-gray-900">Bulan</label>
              <div class="mt-2">
                {{-- <input type="number" name="bulan" id="bulan" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"> --}}
                <input list="bulanList" name="bulan" id="bulan" value="{{ old('bulan') }}" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                    <datalist id="bulanList">
                        <option value="Januari">
                        <option value="Februari">
                        <option value="Maret">
                        <option value="April">
                        <option value="Mei">
                        <option value="Juni">
                        <option value="Juli">
                        <option value="Agustus">
                        <option value="September">
                        <option value="Oktober">
                        <option value="November">
                        <option value="Desember">
                    </datalist>
            </div>
            </div>
          </div>
          <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-3">
              <label for="jumlah=peminjaman" class="block text-sm/6 font-medium text-gray-900">Jumlah Buku Di Pinjama</label>
              <div class="mt-2">
                <input type="number" name="jumlah_peminjaman" id="jumlah_peminjaman" value="{{ old('jumlah_peminjaman') }}" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
              </div>
            </div>
          </div>
          <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-3">
              <label for="penerbit" class="block text-sm/6 font-medium text-gray-900">Jumlah Buku belum Dikwmbalikan</label>
              <div class="mt-2">
                <input type="number" name="jumlah_buku_belum_kembali" id="jumlah_buku_belum_kembali" value="{{ old('jumlah_buku_belum_kembali') }}" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
              </div>
            </div>
          </div>
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="sm:col-span-3">
            <label for="deskripsi" class="block text-sm/6 font-medium text-gray-900">Deskripsi</label>
            <div class="mt-2">
              <textarea name="deskripsi" id="deskripsi" step="0.01" min="0" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">{{ old('deskripsi') }}</textarea>
            </div>
          </div>
        </div>     
      </div>
    <div class="mt-6 flex items-center gap-x-6 m-10">
        <button type="submit" class="btn btn-primary">
          Simpan
        </button>
        <button type="button" class="text-sm/6 font-semibold text-gray-900"><a href="/laporan-bulanan"> Cancel</a></button>
    </div>
    </form>

@endsection