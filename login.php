<?php
    include 'koneksi.php';

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $login = mysqli_query($koneksi, "select * from user where username='$username' and password='$password' ");
        if (mysqli_num_rows($login) > 0) {
            header("location: index.php");
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
        <div class=" relative ">
            <div class="flex flex-col justify-center gap-2">
                <label class="font-bold">Username</label>
                <input
                    class=" bg-slate-50 p-2 text-slate-900"
                    type="text"
                    name="username"
                    placeholder="username"
                />
            </div>

          <div class=" relative mt-3">
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
              <!-- {showPassword ? <Eye /> : <EyeSlash />} -->
            </div>
          </div>

          <button name="login" type="submit" class=" bg-yellow-600 font-bold mt-3 text-lg py-1 w-full mt-3">
            Login
          </button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>