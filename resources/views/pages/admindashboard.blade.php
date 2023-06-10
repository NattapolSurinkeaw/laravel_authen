@extends('layouts.main')
@section('dashboard')
    <div class="flex justify-between w-full h-screen overflow-hidden">
        <div class="w-full max-w-[300px] bg-gray-700 p-4 transition-all ease-in-out duration-300">
            <ul class="flex flex-col justify-center items-center gap-8 w-full">
              <li class="w-full transition ease-in-out duration-150 py-2 border-b-2 border-gray-500">
                  <h1 class="w-full text-white p-3 text-center text-3xl" id="admin"></h1>
              </li>
              <li class="w-full hover:bg-gray-400 transition ease-in-out duration-150 py-2 rounded-md">
                <a href="">
                  <p class="w-full text-white text-center ">home</p></a>
              </li>
              <li class="w-full hover:bg-gray-400 transition ease-in-out duration-150 py-2 rounded-md">
                <a href="">
                  <p class="w-full text-white text-center ">product</p></a>
              </li>
              <li class="w-full hover:bg-gray-400 transition ease-in-out duration-150 py-2 rounded-md">
                <a href="">
                  <p class="w-full text-white text-center ">member</p></a>
              </li>
              <li class="w-full hover:bg-gray-400 transition ease-in-out duration-150 py-2 rounded-md">
                <a href="">
                  <p class="w-full text-white text-center ">cart</p></a>
              </li>
            </ul>
        </div>
        <div class="w-full">
            <div class="bg-blue-500 h-[50px] flex justify-between items-center px-4">
                <p>hamburger</p>
                <p>icon</p>
            </div>
            <div class="p-4 w-full overflow-auto grid grid-cols-12 gap-4">
              <div class="col-span-3 p-4 bg-blue-500 w-full">
                <p class="w-full">test222asdasda</p>
                <p class="w-full">test222asdasda</p>
                <p class="w-full">test222asdasd</p>
                <p class="w-full">test222asdasda</p>
                <p class="w-full">test222asdasda</p>
                <p class="w-full">test222asdasda</p>
              </div>
              <div class="col-span-9 p-4 bg-red-500">
                <div>
                  <p>sdsdfs</p>
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        const userData = localStorage.getItem('dataUser');
        const user = JSON.parse(userData);
        console.log(user);

        if (user) {
            // แสดง email และ name ของ user
            const emailElement = document.getElementById('admin');
            emailElement.textContent = user.data.name;
        } else {
            window.location.href = '/login'
        }

        function logOut() {
            Swal.fire({
                title: 'Logout',
                text: "Are you sure to log out?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Logout!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Your Have a Loguts',
                        showConfirmButton: false,
                        timer: 1000
                    }).then(() => {
                        window.location.href = '/login';
                        localStorage.clear();
                    })
                }
            })
        }
    </script>



    </script>
@endsection
