@extends('layouts.main')
@section('content')
<div class="p-10 bg-gray-100 rounded-lg m-auto">
  <div class="text-3xl text-center m-4">You Are Not Login</div>
  <div class="flex justify-center gap-10">
    <button id="btnAdmin" class="p-3 text-white font-medium bg-emerald-400 hover:bg-emerald-500 rounded-xl">Login with admin Account</button>
    <button id="btnUser" class="p-3 text-gray-600 font-medium bg-fuchsia-200 hover:bg-fuchsia-400 rounded-xl">Login with user Account</button>
  </div>
  <div class="flex justify-center">
    <button class="mt-8 font-bold text-blue-700" id="btgRegis">not have Account</button>
  </div>
</div>
@endsection
@section('scripts')
  @vite('resources/js/home.js')
@endsection