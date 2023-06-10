@extends('layouts.main')
@section('content')


<div class="m-auto">
  
    <div class="flex">
      <h1 class="text-3xl font-bold">Hello Welcome :  </h1>
      <h1 class="text-3xl font-bold ml-2" id="user_email"></h1>
    </div>
    <div class="flex">
      <h1 class="text-3xl">Hello : </h1>
      <h1 class="text-3xl ml-2" id="user_name"></h1>
    </div>

    <button class="m-8 p-3 text-2xl font-bold rounded-xl text-white border bg-red-500 hover:bg-red-600" onclick="logOut()">Logout</button>
</div>


@endsection

@section('scripts')
  <script>
      const userData = localStorage.getItem('dataUser');
      const user = JSON.parse(userData);
      console.log(user);
    
      if (user) {
        // แสดง email และ name ของ user
        const emailElement = document.getElementById('user_email');
        emailElement.textContent = user.data.email;

        const nameElement = document.getElementById('user_name');
        nameElement.textContent = user.data.name;
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
