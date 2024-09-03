<?php
    include 'koneksi.php';

    session_start();
    
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $login = mysqli_query($koneksi, "select * from user where username='$username' and password='$password' ");

        if ($data = mysqli_fetch_array($login)) {
            $_SESSION['id_user'] = $data['id'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['password'] = $data['password'];
            $_SESSION['role'] = $data['role'];
            $_SESSION['nama'] = $data['nama'];

            if($_SESSION['role'] == 'admin') {
            echo "<script>
            alert('Login sebagai admin')
            document.location.href = 'dashboard/produk.php'
            </script>";
            } 
              echo "<script>
              alert('Login sebagai pelanggan')
              document.location.href = 'index.php'
              </script>";
        } else {
            echo "<script>
            alert('Login failed')
            document.location.href = 'login.php'
            </script>"; 
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <div class=" h-screen w-full flex justify-center items-center">
  <div class="m-auto p-5 rounded-lg bg-slate-50 shadow-slate-900 shadow-md">
      <div class="flex flex-col justify-center items-center gap-5">
        <h1 class=" text-center text-yellow-500 font-extrabold text-4xl">
          Login
        </h1> 

        <form
          action=""
          method="POST"
          class="flex flex-col gap-5 bg-slate-900 w-[400px] h-full px-5 py-7 text-slate-50"
        >
        <div class=" relative flex flex-col gap-2">
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

            <div
              class="absolute text-slate-900 right-2 top-1/2 translate-y-1/2 z-50"
            >
            </div>

          <button name="login" type="submit" class=" bg-yellow-600 font-bold mt-3 text-lg py-1 w-full mt-3">
            Login
          </button>
          <p class="text-center font-bold">Belum punya akun? <a href="register.php" class="text-yellow-600">Register</a></p>
        </form>
      </div>
    </div>
  </div>
</body>
</html>