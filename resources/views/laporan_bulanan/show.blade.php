@extends('layout.main')
@section('content')
<div class="container">
    <h1>Detail Laporan</h1>
    <p>{{ $laporan->tahun }}</p>
</div>
@endsection

{{-- noted : jika ingin berjalan sempurnaka layout nya didak rusak harus memakai asset, for example :  <a href="{{asset('css.index')}}"></a>       --}}
