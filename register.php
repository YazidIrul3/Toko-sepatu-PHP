<?php
include 'koneksi.php';

if (isset($_POST['register'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $no_telepon = $_POST['no_telepon'];
    $alamat = $_POST['alamat'];
    $sql = mysqli_query($koneksi, "INSERT INTO user(nama,username,password, no_telepon,alamat,role) VALUE ('$nama', '$username','$password','$no_telepon','$alamat','pelanggan')");

    if ($sql > 0) {
        echo "<script>
        alert('Register success')
        document.location.href = 'register.php'
        </script>";
    } else {
        echo "<script>
        alert('Register failed')
        document.location.href = 'register.php'
        </script>";    
    }  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <div class=" h-full w-full flex justify-center items-center">
  <div class="m-auto p-5 rounded-lg bg-slate-50 shadow-slate-900 shadow-md">
      <div class="flex flex-col justify-center items-center gap-5">
        <h1 class=" text-center text-yellow-500 font-extrabold text-4xl">
          Register
        </h1> 

        <form
          action=""
          method="POST"
          class="flex flex-col gap-5 bg-slate-900 w-[400px] h-full px-5 py-7 text-slate-50"
        >
        <div class=" relative flex flex-col gap-4 ">
            <div class="flex flex-col justify-center gap-2">
                <label class="font-bold">Nama</label>
                <input
                    class=" bg-slate-50 p-2 text-slate-900"
                    type="text"
                    name="nama"
                    placeholder="nama"
                />
            </div>

            <div class="flex flex-col justify-center gap-2">
                <label class="font-bold">Username</label>
                <input
                    class=" bg-slate-50 p-2 text-slate-900"
                    type="text"
                    name="username"
                    placeholder="username"
                />
            </div>

            <div class="flex flex-col justify-center gap-2">
                <label class="font-bold">Password</label>
                <input
                    class=" bg-slate-50 p-2 text-slate-900"
                    type="password"
                    name="password"
                    placeholder="password"
                />
            </div>

            <div class="flex flex-col justify-center gap-2">
                <label class="font-bold">No Telepon</label>
                <input
                    class=" bg-slate-50 p-2 text-slate-900"
                    type="text"
                    name="no_telepon"
                    placeholder="no telepon"
                />
            </div>

            <div class="flex flex-col justify-center gap-2">
                <label class="font-bold">Alamat</label>
                <input
                    class=" bg-slate-50 p-2 text-slate-900"
                    type="text"
                    name="alamat"
                    placeholder="alamat"
                />
            </div>

            <div
              class="absolute text-slate-900 right-2 top-1/2 translate-y-1/2 z-50"
            >
            </div>

          <button name="register" type="submit" class=" bg-yellow-600 font-bold mt-3 text-lg py-2 w-full mt-3">
            Register
          </button>
          <p class="text-center font-bold">sudah punya akun? <a href="login.php" class="text-yellow-600">Login</a></p>
        </form>
      </div>
    </div>
  </div>
</body>
</html>