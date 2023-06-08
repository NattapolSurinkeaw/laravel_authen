@extends('layouts.main')
@section('content')


<div class="flex gap-4">
  
    @if(auth()->guard('admin')->check())
    <h1 class="text-3xl">Welcome </h1>
      <h1 class="text-3xl text-green-600">{{ auth()->guard('admin')->user()->name}}</h1>
      <a href="/admin/logout">Logout</a>
    @endif

    @if(auth()->guard('users')->check())
      <h1 class="text-3xl">Welcome </h1>
      <h1 class="text-3xl text-green-600">{{ auth()->guard('users')->user()->name}}</h1>
      <a href="/user/logout">Logout</a>
    @endif

    @if(! auth()->guard('admin')->check() && !auth()->guard('users')->check())
      <div class="p-10 bg-gray-100 rounded-lg m-auto">
          <div class="text-3xl text-center m-4">You Are Not Login</div>
          <div class="flex gap-10">
            <a class="p-3 text-white font-medium bg-emerald-400 hover:bg-emerald-500 rounded-xl" href="/admin">Login with admin Account</a>
            <a class="p-3 text-gray-600 font-medium bg-fuchsia-200 hover:bg-fuchsia-400 rounded-xl" href="/user">Login with user Account</a>
          </div>
      </div>
    @endif
</div>



@endsection