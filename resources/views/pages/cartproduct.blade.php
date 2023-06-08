@extends('layouts.main')
@section('content')
<h1 class="text-3xl text-center my-10">Order cart</h1>
  <div class="relative overflow-x-auto">
      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
              <tr>
                  <th scope="col" class="px-6 py-3">
                      cart name
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Description
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Price
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Quantity
                  </th>
                  <th scope="col" class="px-6 py-3 ">
                    Action
                </th>
              </tr>
          </thead>
          <tbody>
            @php
              $totalPrice = 0;
              $totalQuantity = 0;
            @endphp
            @if(count($carts) > 0)
            @foreach($carts as $cart)
              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                  <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                      {{$cart->name}}
                  </th>
                  <td class="px-6 py-4">
                    {{$cart->description}}
                  </td>
                  <td class="px-6 py-4">
                    {{$cart->price}}
                  </td>
                  <td class="px-6 py-4">
                    {{$cart->quantity}}
                  </td>
                  <td class="px-6 py-4">
                    <a class="mr-4 bg-orange-400 rounded-xl text-white p-4" href="/editcart/">Edit</a>
                    <button class="bg-red-600 rounded-xl text-white p-4 " onClick="deletecart()">Delete</button>
                  </td>
              </tr>

              @php 
                $totalPrice += $cart->price;
                $totalQuantity += $cart->quantity;
              @endphp
            @endforeach
            <tr class="bg-yellow-50 hover:bg-yellow-100">
              <td colspan="2" class="px-6 py-4 text-center">
                รวม 
              </td>
              <td class="px-6 py-4">
                {{$totalPrice}}
              </td>
              <td class="px-6 py-4">
                {{$totalQuantity}}
              </td>
              <td class="px-6 py-4">
              </td>
            </tr>
            @else
              <tr>
                <td colspan="5" class="px-6 py-4 text-center">
                  No Selected Product
                </td>
              </tr>
            @endif
          </tbody>
      </table>
  </div>
@endsection