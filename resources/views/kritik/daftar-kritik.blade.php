@extends('layout.main')
@section('content')

<div class="flex flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
      <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
        <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
          <h6 class="mt-6">Draft kritik Dan Saran</h6>
        </div>
        <div class="flex-auto px-0 pt-0 pb-2">
          <div class="p-0 overflow-x-auto">
            <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
              <thead class="align-bottom">
                <tr>
                  <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nama Pemgirim</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Kritik Dan Saran</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tangal Di Kirim</th> 
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Action</th>

                </tr>
              </thead>
              <tbody>
                @foreach ($kritiks as $item)
                <tr>
                  <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <div class="flex px-2 py-1">

                      <div class="flex flex-col justify-center">
                        <h6 class="mb-0 text-sm leading-normal">{{$item->nama_pengirim}}</h6>
                      </div>
                    </div>
                  </td>
                  <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <p class="mb-0 text-xs font-semibold leading-tight">
                        {{ Str::limit($item->kritik_saran, 50, '...') }}
                    </p>
                  </td> 
                  <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <p class="mb-0 text-xs font-semibold leading-tight">
                        {{ $item->created_at->format('d-m-Y H:i') }}
                    </p>
                  </td>       
                  <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <a href="{{ route('kritik.delete', $item->id) }}" class="text-xs font-semibold leading-tight text-red-600 p-2" onclick="return confirm('Yakin ingin Delete ini? ')"> Delete </a>
                    <a href="{{ route('kritik.detail', $item->id) }}" class="mb-0 text-xs font-semibold leading-tight text-slate-400 p-2"> Detail </a>
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


