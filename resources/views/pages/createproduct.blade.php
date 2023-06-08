@extends('layouts.main')
@section('content')
<div class="w-8/12 m-auto">
  <div >
    <h1 class="m-10 text-center text-3xl text-green-700 font-medium">Create Product</h1>
    <label for="nameproduct" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Name</label>
    <input type="text" id="nameproduct" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
  </div>
  <div>
    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">description</label>
    <input type="text" id="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
  </div>
  <div>
    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
    <input type="text" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
  </div>  
  <div>
    <label for="quantity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantity</label>
    <input type="tel" id="quantity" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required>
  </div>
  <button onclick="createproduct()" class="m-8 bg-green-500 p-5 rounded-xl">บันทึก</button>
</div>
@endsection

<script>
  function createproduct() {
    let nameproduct = document.getElementById("nameproduct").value
    let description = document.getElementById("description").value
    let price = document.getElementById("price").value
    let quantity = document.getElementById("quantity").value
    
    if(!nameproduct || !description || !price || !quantity || isNaN(price) || isNaN(quantity)){
        Swal.fire(
        'Please fill in all fields',
        'Check your fill All and price or quantity is not a number',
        'warning')
      }
      else {
      let productData = {
        nameproduct: nameproduct,
        description: description,
        price: price,
        quantity: quantity
      };
      
      axios.post(`/api/createproduct`, productData)
        .then(function (response){
          Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'response.data',
            showConfirmButton: false,
            timer: 2000
          })
        }).catch(function (error) {
          console.log(error);
        });
        setInterval(function() {
      window.location.href = "/products";
    }, 1000);
    }
  }
</script>