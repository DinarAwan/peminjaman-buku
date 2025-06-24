@extends('layout.main')
@section('content')
<div class="flex flex-wrap -mx-3">
  <div class="flex-none w-full max-w-full px-3">
    <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
      <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
        <h6 class="mt-6">Daftar Member</h6>
      </div>
      <div class="flex-auto px-0 pt-0 pb-2">
        <div class="p-0 overflow-x-auto">
          <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
            <thead class="align-bottom">
              <tr>
                <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nama</th>
                <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Email</th>
                <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Action</th>

            </tr>
            </thead>
            <tbody>
              @foreach ($user as $item)

              <tr>
                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                  <div class="flex px-2 py-1">
                    <div>
                      @if ($item->foto_profile)
                        <img alt="profile_image" class="inline-flex items-center justify-center mr-4 text-sm text-white transition-all duration-200 ease-soft-in-out h-9 w-9 rounded-xl" src="{{ url('foto_profile').'/'.$item->foto_profile}}" >
                      @else
                        <img alt="profile_image" class="inline-flex items-center justify-center mr-4 text-sm text-white transition-all duration-200 ease-soft-in-out h-9 w-9 rounded-xl" src="{{ asset('gambar/p-profile.jpg') }}">
                      @endif
                    </div>
                    <div class="flex flex-col justify-center">
                      <h6 class="mb-0 text-sm leading-normal">{{$item->name}}</h6>
                    </div>
                  </div>
                </td>
                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                  <p class="mb-0 text-xs font-semibold leading-tight">{{$item->email}}</p>
                </td>
                
                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                  <a href="{{ route('user.delete', $item->id) }}" class="text-xs font-semibold leading-tight text-red-600 p-2" onclick="return confirm('Yakin ingin Banned user ini? ')"> Band </a>
                  <a href="#" class="mb-0 text-xs font-semibold leading-tight text-slate-400 p-2"> Detail </a>
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
