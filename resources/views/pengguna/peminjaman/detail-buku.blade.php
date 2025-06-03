@extends('layout-pengguna.main')
@section('content')

<div class="w-full max-w-full px-3 lg-max:mt-6 xl:w-4/12">
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
        <img class="w-20 h-34 text-center justify-center shadow-2xl rounded-md" src="{{ asset('1.jpg') }}" alt="">

        <p class="leading-normal text-sm">Hi, I’m Alec Thompson, Decisions: If you can’t decide, the answer is no. If two equally difficult paths, choose the one more painful in the short term (pain avoidance is creating an illusion of equality).</p>
        <hr class="h-px my-6 bg-transparent bg-gradient-to-r from-transparent via-white to-transparent" />
        <ul class="flex flex-col pl-0 mb-0 rounded-lg">
          <li class="relative block px-4 py-2 pt-0 pl-0 leading-normal bg-white border-0 rounded-t-lg text-sm text-inherit"><strong class="text-slate-700">Full Name:</strong> &nbsp; Alec M. Thompson</li>
          <li class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit"><strong class="text-slate-700">Mobile:</strong> &nbsp; (44) 123 1234 123</li>
          <li class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit"><strong class="text-slate-700">Email:</strong> &nbsp; alecthompson@mail.com</li>
          <li class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit"><strong class="text-slate-700">Location:</strong> &nbsp; USA</li>
          <li class="relative block px-4 py-2 pb-0 pl-0 bg-white border-0 border-t-0 rounded-b-lg text-inherit">
            <strong class="leading-normal text-sm text-slate-700">Social:</strong> &nbsp;
            <a class="inline-block py-0 pl-1 pr-2 mb-0 font-bold text-center text-blue-800 align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in bg-none" href="javascript:;">
              <i class="fab fa-facebook fa-lg"></i>
            </a>
            <a class="inline-block py-0 pl-1 pr-2 mb-0 font-bold text-center align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in bg-none text-sky-600" href="javascript:;">
              <i class="fab fa-twitter fa-lg"></i>
            </a>
            <a class="inline-block py-0 pl-1 pr-2 mb-0 font-bold text-center align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in bg-none text-sky-900" href="javascript:;">
              <i class="fab fa-instagram fa-lg"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
@endsection