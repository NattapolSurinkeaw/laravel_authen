const btnAdmin = document.querySelector("#btnAdmin");
const btnUser = document.querySelector("#btnUser");
const btgRegis = document.querySelector("#btgRegis");
 
btnAdmin.addEventListener("click", () => {
    adminForm();
})

btnUser.addEventListener("click", ()=> {
  userForm();
})

btgRegis.addEventListener("click", ()=> {
  regisForm();
})



function adminForm() {
  Swal.fire({
    title: "Admin Login",
    html: `
          <input type="email" id="email" class="swal2-input" placeholder="Email">
          <input type="password" id="password" class="swal2-input" placeholder="Password">`,
    confirmButtonText: "Submit",
    focusConfirm: false,
    preConfirm: () => {
      const email = Swal.getPopup().querySelector("#email").value;
      const password = Swal.getPopup().querySelector("#password").value;
      if (!email || !password) {
          Swal.showValidationMessage(`Please enter your data.`);
      }
      return {
        email: email,
        password: password,
    };
    },
  }).then((resutl) => {
    if(resutl.isConfirmed){
    axios.post(`api/authen/admin`,resutl.value)
    .then(function (response) {
      console.log(response.data);
      if (response.data.status = 200) {
        const data = response.data
        localStorage.setItem('dataUser', JSON.stringify(data));
        Swal.fire({
          position: 'center',
          icon: 'success',
          title: 'Login Success',
          showConfirmButton: false,
          timer: 1000
        }).then(() => {
          window.location.href = "/admindashboard";
        })
      } 
    })
    .catch((error) => {
      Swal.fire({
        position: 'center',
        icon: 'error',
        title: 'Login Failed',
        showConfirmButton: false,
        timer: 2000
      })
    })
  }})
}


function userForm() {
  Swal.fire({
    title: "User Login",
    html: `
          <input type="email" id="email" class="swal2-input" placeholder="Email">
          <input type="password" id="password" class="swal2-input" placeholder="Password">`,
    confirmButtonText: "Submit",
    focusConfirm: false,
    preConfirm: () => {
      const email = Swal.getPopup().querySelector("#email").value;
      const password = Swal.getPopup().querySelector("#password").value;
      if (!email || !password) {
          Swal.showValidationMessage(`Please enter your data.`);
      }
      return {
        email: email,
        password: password,
    };
    },
  }).then((resutl) => {
    if(resutl.isConfirmed){
    axios.post(`api/authen/user`,resutl.value)
    .then(function (response) {
      console.log(response.data);
      if (response.data.status = 200) {
        const data = response.data
        localStorage.setItem('dataUser', JSON.stringify(data));
        Swal.fire({
          position: 'center',
          icon: 'success',
          title: 'Login Success',
          showConfirmButton: false,
          timer: 1000
        }).then(() => {
          window.location.href = "/";
        })
      } 
    })
    .catch((error) => {
      console.log(error);
      Swal.fire({
        position: 'center',
        icon: 'error',
        title: 'Login Failed',
        showConfirmButton: false,
        timer: 1000
      })
    })
  }})
}

function regisForm(){
  Swal.fire({
    title: "User registration",
    html: `
          <input type="email" id="email" class="swal2-input" placeholder="Email">
          <input type="text" id="name" class="swal2-input" placeholder="name">
          <input type="password" id="password" class="swal2-input" placeholder="Password">`,
    confirmButtonText: "Submit",
    focusConfirm: false,
    preConfirm: () => {
      const email = Swal.getPopup().querySelector("#email").value;
      const fname = Swal.getPopup().querySelector("#name").value;
      const password = Swal.getPopup().querySelector("#password").value;
      if (!email || !password || !fname) {
          Swal.showValidationMessage(`Please enter your data.`);
      }
      return {
        email: email,
        name: fname,
        password: password,
    };
    },
  }).then((result) => {
    if(result.isConfirmed){
      axios.post(`api/register`,result.value)
      .then((response) => {
        console.log(response.data.message);
        Swal.fire({
          position: 'center',
          icon: 'success',
          title: 'Register Success',
          showConfirmButton: false,
          timer: 1000
        })
      })
      .catch((error) => {
        console.log(error);
        Swal.fire({
          position: 'center',
          icon: 'error',
          title: error,
          showConfirmButton: false,
          timer: 2000
        })
      })
    }
  })



}