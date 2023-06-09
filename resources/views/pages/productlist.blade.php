@extends('layouts.main')
@section('content')
<div class="m-10"><a href="/createproduct" class="m- rounded-lg p-4 bg-blue-400">Create</a></div>
  <div class="relative overflow-x-auto">
      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
              <tr>
                  <th scope="col" class="px-6 py-3">
                      Product name
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
            @if(count($products) > 0)
            @foreach($products as $product)
              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                  <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                      {{$product->nameproduct}}
                  </th>
                  <td class="px-6 py-4">
                    {{$product->description}}
                  </td>
                  <td class="px-6 py-4">
                    {{$product->price}}
                  </td>
                  <td class="px-6 py-4">
                    {{$product->quantity}}
                  </td>
                  <td class="px-6 py-4">
                    <button class="mr-4 bg-orange-400 rounded-xl text-white p-4" onClick="addProductCart({{$product->id}})">Add Cart</button>
                    <a class="mr-4 bg-orange-400 rounded-xl text-white p-4" href="/editproduct/{{$product->id}}">Edit</a>
                    <button class="bg-red-600 rounded-xl text-white p-4 " onClick="deleteProduct({{$product->id}})">Delete</button>
                  </td>
              </tr>
            @endforeach
            @else
              <tr>
                <td colspan="5" class="px-6 py-4 text-center">
                  No data 
                </td>
              </tr>
            @endif
          </tbody>
      </table>
  </div>
@endsection

<script>
    function deleteProduct(productID) {
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        axios
            .delete(`api/delete/${productID}`)
            .then(function (response) {
                console.log(response.data);
            })
            .catch(function (error) {
                console.error(error);
            });
            Swal.fire({
              position: 'center',
              icon: 'success',
              title: 'Product has deleted',
              showConfirmButton: false,
              timer: 1500
            }).then(() => {
          window.location.href = "/products";
        })
      }
})
      
    }


  function addProductCart(productID) {
    axios.post(`/api/cart/${productID}`)
      .then(function (response){
        console.log(response.data);
      }).catch(function (error) {
        console.log(error);
      });
  }
</script>
