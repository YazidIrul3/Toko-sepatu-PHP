<?php
include 'koneksi.php';
session_start();

if(!isset($_SESSION['role']) == 'pelanggan' ) {
    echo "<script>
    document.location.href = 'login.php'
    </script>";
}

function tampilkan($query){
    global $koneksi;
    $result = mysqli_query($koneksi,$query);
    
    while($data = mysqli_fetch_assoc($result)) {
        $items[] = array(
            'id' =>$data["id"],
            'nama' => $data["nama"],
            'username' => $data["username"],
            'password' => $data["password"],
            'no_telepon' => $data["no_telepon"],
            'alamat' => $data["alamat"],
            'role' => $data["role"],
        );
        $response = array(
            'status' => 'ok',
            'items' => $items,
        );
 
    }        
    return $response;
}

function perbarui_pelanggan($post, $id_pelanggan) {
    global $koneksi;
        
    $nama = $post['nama'];
    $username = $post['username'];
    $no_telepon = $post['no_telepon'];
    $alamat = $post['alamat'];

  $sql = mysqli_query($koneksi, "UPDATE user SET nama = '$nama', username = '$username' , no_telepon = '$no_telepon', alamat = '$alamat' WHERE id='$id_pelanggan'");
    
  if($sql > 0) {
    return mysqli_affected_rows($koneksi);
  } else {
    return mysqli_error($koneksi);
  }
}

$data = tampilkan("SELECT * FROM user WHERE username = '$_SESSION[username]'");

if(isset($_POST['simpan'])) { 
    if(perbarui_pelanggan($_POST, $_SESSION['id']) > 0 ) {
        echo "<script>
        alert('Data updated success');
        document.location.href = 'profile.php';
        </script>";
    } else {
        echo "<script>
        alert('Data updated failed');
        document.location.href = 'profile.php';
        </script>";
    }
}

if (isset($_SESSION['keranjang'])) {
    $totalBarangKeranjang =  count($_SESSION['keranjang']);
 } else {
     $totalBarangKeranjang = 0;
 }

 function tampilkanHistory($query) {
    global $koneksi;
    $result = mysqli_query($koneksi,$query);
    
    while($data = mysqli_fetch_assoc($result)) {
        $items[] = array(
            'id_transaksi' => $data['id_transaksi'],
            'tanggal' => $data['tanggal'],
            'total_harga' => $data['total_harga'],
        );
        $response = array(
            'status' => 'ok',
            'items' => $items,
        );
 
    }        
    return $response;
    }

    $history = tampilkanHistory("SELECT t.id_transaksi,t.tanggal,t.total_harga FROM transaksi t INNER JOIN user u ON t.id_pelanggan = u.id WHERE u.username = '$_SESSION[username]' ORDER BY t.id_transaksi DESC");
 ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .show {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
        }

        #userMenu {
            display: none;
        }
        
        #userMenu.hidden {
            display: flex;
            flex-direction: column;
        }

        #brandMenu {
            display: none;
        }

        #brandMenu.show {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
        }

    </style>
</head>
    <body>
    <nav class="flex justify-between flex-row items-center bg-yellow-500 py-3 2xl:px-3 xl:px-3 lg:px-3 md:px-3 px-2">
            <a href="index.php" class="text-xl font-bold">
                <h1>Toko Sepatu</h1>
            </a>
            
            <div class="flex items-center gap-4 relative w-3/6 bg-slate-50 p-2 rounded-lg">
                <input type="text" value="" name="search" class="border-2 w-full h-full  focus:outline-none focus:border-none" placeholder="Cari Sepatu">
                <div class="box-icon text-slate-900 absolute right-1 rounded-lg top-1/2 -translate-y-1/2  bg-yellow-500 py-1 px-2">
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAotJREFUSEvllkuojVEYhp8j15QYUMdlJPeQg+QeEykDI7coIU5kgIGYGaEwMCARQ7klBgwkJXIXEkXuuU9IIUm+N99/Wv69//N/HXt3BtZk7/b+3vdda32XdzXQTquhnXSJCHcEJgJDgV7AI+A68OZfNt2acD9gM7AY6FFF5CqwEzjelg0UCS8CDgDdAqRngfnAl0BsS0g14eUuqqBfwGHgNHAHeGffm4DJwCpggDPdBKYB36LieeHRwG2gA/ABmAPcKCDrChwEFvr/ew2zuq3CZ4DZDp4KXCohUuEpZgLw025nCPA0Ip6euA/w3kH7rWpXRgiAMX5LClcxbo3gUuEFnk/hJgFXIgQecx8YAVwAZkZwqfB6bw/hugNfIwQeow5QUb4F+kZwqfBGYJuDuti1/YgQeIxwwn8GekZwqfBS4JCDBgOPIwQecwSY5+lRmkpXKjwKuOuINcCeUvSfgE5elBqn+6zXmyO4fB+/suHR3/KlT536e4BkA7DD48JFmRdeC+x2El37shLhscBlayHVxDG/7sBeqXCnzj4Qxjv6lBXMOuBZjk1CK2yWb/cO0PAYBDwPqVIpLFxv4DwwMiFRn97zXI4DtDGNTC3NZ+X5hPFtMcN4GBEvcie50i4/lcZi0dKGlpgzKc+yTy2ZyibgRWsbKHsIyH1EOMuLTb6sh8A54Chwy8mHWX4fJEJ6JMitnhSJlwlHbi2LOWnWOTcBaIPT3UoreGoprPaTU6lGsqW2nGLd8TKvXEthcSs1MoqBiZCue4bPhpafay2ciV+zKdaYiL92+/yY/VYPYXGrpzVYsmuXR8ur63rijHy4efNFfxjoNfrXqteJMxFZ5KdqrVFv4cJ2/P+EfwPso2Yfp6I9kgAAAABJRU5ErkJggg=="/>           
                </div>
            </div>
            
            <div class="flex items-center gap-2">
                <div class="relative">
                    <div class="box-icon text-slate-900 ">
                        <img class="w-10 h-10" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAgdJREFUSEvN1kuoTXEUx/HPlYFHpEQyIhnIxEQiEwYykMHFhJnyLAMDxUCkPAYG0i2RMnJH9w6NhIEoxUAJA4/yiGIgMvAIZ93+u3bbuef893k4Vp3B2Wf91/e/fuuxz5AB2dCAuP4L8CLEJ+wLHvRTjXLGx3GsBHuGjXjejwu0AgfvIVb0G1yWehgHEnAt7vQaPllzzcV7TMUodvwrcHCuYju+YzO+dQl/hRdFjFbjFBLf7hJWPb4V4/Gw3Rw/wvIewnfiSg54Ny4m8Clc7+ASJ7EGPzEPn3LAM/AOsxN0Q03wTHzENIxhW06NC5/zabR+Nxpuac2FUlZsE67VAS9BbLGwczhYI+u7WI0PWIBfdcDhewPr8RnzM0drcWl8zuJQ+cLturrw3ZJqFN934XJG1tGMR5LfMjztBDylAXyb5HqcMWKR0BssxP1GbVdWL5qbcZw7ihMpQMzjyxZZx+yPpN/340I34GiO12l/Zyg94fIj9cTE7HYidXHmUqpxLjiWz95mznWkjvNR66jX9Azy11TfmP+/rC44AsRSmJPqFn+RqjYL+9JqDIWaWl3waRxOkW6l2a4Gvol16eGZ0kh1VeNy0JAwpK9abKciocku1/a1WA1a3r0h454m4Gio8AuL35vKXVfqCBZbKN5W91o02Kq0Xp/0qsYZzZzn0knGeZHbeA0M/AffmVMfIK6tVQAAAABJRU5ErkJggg=="/>
                    </div>
                    <p class="text-xl font-bold absolute bg-slate-50  rounded-full top-0 right-0 w-5 h-5 flex justify-center items-center"><?php echo $totalBarangKeranjang ?></p>
                </div>
                
                <div class="relative z-40" id="userLogo">
                    <img class="w-10 h-10 " src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAA7xJREFUSEvFl3fIj2sYxz/IHp2yZcXhhMimKBIiK1mHhMg4ji0kOyMroyQzf8geGQkndLJHiMieiZAie7u/uh7dv9vveZ+fv1z1ej33te5rfa/7zcZvomy/yS+/6jg7UB+oAJSySz8EbgGnga+ZBpKp47+A4UBnoGiM8afAZmARcDPpAkmOCwPLgU5Jhjy+ot4CDAaexell5bgccAD405RlcDdw1vsRq4791APawI/yXQVaAA/SOY9zrHSeA0qb0n3gb+BEQuSNgPVAWU9PF3oS6qVznBM4ak0k+TXAMOCVKecDWlmDSf86sA94b/wCwBKgt32fdJlrDHz2nadzPBsYZ0Jy2tdTUPr3uBpWCyK4AHQA7nnn0u1j3zOBiVk5VorUkYpa6a0KvDaFXMA1oHxMum+bfBR5IeCKjd1HoJJ/sTDihcAIM6x6HfecTAMmu5t/AoYAG42nqKQnW5OAGZ5OM+CgfS8ARkc837H+/wgo7rrzjFfjSPYiUN3dfJ3LSs8g6k1AV+v2ugHvPFDTMqhSfSffsRrgiJ0LBEYGBt4BuYFZwISAp7PxLqKXgFLskxrtXztoYAiX4lidu9gEugBbAwOXrYZrgV4BT1no4ZDtkmXFZ3e3EdPZP8CyMGJ13XTTKJIGdYRgA2ys1On/maxGSx2cF1jqRRc5V8NG3a5pmRs6VmrVACItANXbp4KAoi4TnEefd4Ealm5fpKS7sBaJaJQ1YkqqlV6BvKitzWvoQ0ZWGjT6vG0uQ0PTXDayJagVaclINsVxQw8SNTZR2tMFWNmhW3Nj7HUodScmCzqe4v6ZanytVE1MiuM8rviPrSt3AB0DY9rFaiDNt0BENRW9dQilNB8GNFZfAr1dbszaOXx4bqP6IXSs79UGkRodgbu6VCTUUWQVs4hMrBtAa3sY6Fvze8qNoFBvhSvFwEg/RK4mwP/G1FqrDWgnaxUWs3PdWGASQWl+ayoZF2kT1XI48MLht8BDlxYJJ47FOdb5TrcS25uAbqmGUqpEgjyNjDLik8okHJhjh2oglSBCuO3hYyLddvrDIgrHRnM8KCHVq4B+gYxmWFArVPtBcQ+BKsAhhzIlPFl1cQT4cf5bAvs9prBA5VPtUyirp48aSfWOXiFa5CqDUEqG9KTJYWAj2f5WEnW/SJE2tY7/6aJJjz29NgRzY7zxScj299rOs3q/iRNOchzpKer5brF3S/C6ARgb98DLpMZx9oXXesxrr+q3SC8PAYh+R++ypKz88l8SiQYzFcg01Znay1juGzC8sh8i2SWvAAAAAElFTkSuQmCC"/>

                    <div id="userMenu" class="absolute top-14 right-0 font-bold flex flex-col w-32 justify-center  items-center">
                        <div id="login-div" class="w-full flex justify-center border border-slate-900 hover:bg-slate-200 bg-slate-50">
                            <a href="login.php" class="py-2 text-lg  hover:text-slate-900">Login</a>
                        </div>
                        
                        <div class="w-full flex justify-center border border-slate-900 hover:bg-slate-200 bg-slate-50">
                            
                            <a href="profile.php" class="py-2 text-lg  hover:text-slate-900">Profile</a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </nav>
    <div class=" mx-auto h-screen bg-slate-100">
        
            <section class="bg-slate-50 shadow shadow-inner grid 2xl:grid-cols-2 xl:grid-cols-2 lg:grid-cols-2 md:grid-cols-2 grid-cols-1 gap-5 h-full p-7">
                <div class="flex-col flex gap-10">
                <div class="flex flex-col gap-4 items-center shadow-slate-800 shadow-sm font-bold text-center justify-center w-[250px] mx-auto h-52">

                        <?php foreach($data['items'] as $pelanggan) { ?>
                            <img class="w-24 h-24" src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="">
                            <h1><?php echo $pelanggan['nama'] ?></h1>
                            <?php } ?>
                    </div>

                    <div class="flex flex-col">
                        <h1 class="font-bold text-xl mb-2">HISTORY</h1>
                        <div class="flex flex-col bg-slate-100 text-slate-950 items-center gap-2 h-[400px] overflow-auto ">
                            <?php foreach($history['items'] as $value) { ?>
                            <div class=" flex items-center justify-evenly py-3 w-full flex-row gap-4 font-bold text-xl">
                                <h1><?php echo $value['id_transaksi'] ?></h1>
                                <h1><?php echo $value['tanggal'] ?></h1>
                                <h1 class="text-red-500 font-extrabold" >Rp. <?php echo number_format($value['total_harga']) ?></h1>
                                <a href="cetak.php?id=<?php echo $value['id_transaksi'] ?>" class="bg-slate-900 text-slate-50 px-4 py-1 hover:bg-yellow-600" >Detail</a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>

            <div class="shadow-slate-800 shadow-sm p-7 flex flex-col h-full flex flex-col gap-5 justify-evenly ">
            <div class="flex justify-between">
                <h1 class="font-bold text-3xl">Profile</h1>
                <form action="logout.php">
                    <button class="bg-red-500 px-2 py-1 text-slate-50 font-bold" name="logout">Log Out</button>
                </form>
            </div>
                <form action="" method="POST" class="flex flex-col">
                    <div class="flex flex-col gap-7">
                    <div class="flex flex-col justify-center gap-2">
                    <label class="font-bold">Nama</label>
                    <input
                        class=" bg-slate-50 p-2 text-slate-900"
                        type="text"
                        name="nama"
                        value="<?php foreach($data['items'] as $pelanggan) echo $pelanggan['nama'] ?>"
                        placeholder="nama"
                    />
                </div>

                <div class="flex flex-col justify-center gap-2">
                    <label class="font-bold">Username</label>
                    <input
                        class=" bg-slate-50 p-2 text-slate-900"
                        type="text"
                        name="username"
                        value="<?php foreach($data['items'] as $pelanggan) echo $pelanggan['username'] ?>"
                        placeholder="username"
                    />
                </div>

                <!-- <div class="flex flex-col justify-center gap-2">
                    <label class="font-bold">Password</label>
                    <input
                        class=" bg-slate-50 p-2 text-slate-900"
                        type="password"
                        name="password"
                        placeholder="password"
                    />
                </div> -->

                <div class="flex flex-col justify-center gap-2">
                    <label class="font-bold">No Telepon</label>
                    <input
                        class=" bg-slate-50 p-2 text-slate-900"
                        type="text"
                        name="no_telepon"
                        value="<?php foreach($data['items'] as $pelanggan) echo $pelanggan['no_telepon'] ?>"
                        placeholder="no telepon"
                    />
                </div>

                <div class="flex flex-col justify-center gap-2">
                    <label class="font-bold">Alamat</label>
                    <input
                        class=" bg-slate-50 p-2 text-slate-900"
                        type="text"
                        name="alamat"
                        value="<?php foreach($data['items'] as $pelanggan) echo $pelanggan['alamat'] ?>"
                        placeholder="alamat"
                    />
                </div>
                </div>
                <button type="submit" name="simpan" class="bg-yellow-500 text-slate-50 hover:bg-yellow-600 px-4 py-2 mt-4 focus:bg-yellow-600 font-bold">Simpan</button>
                </form>

            </div>
            </section>
        </div>

        <script>
        const userLogo = document.querySelector('#userLogo');
        const userMenu = document.querySelector('#userMenu');
        const brandMenu = document.querySelector('#brandMenu');
        const brand = document.querySelector('#brandLink');
        const closeBrandMenu = document.querySelector('#closeBrandMenu');
        const lihatSemuaBtn = document.querySelector('#lihatSemua-btn');

        userLogo.addEventListener('click', () => {
            userMenu.classList.toggle('hidden');
        })

        lihatSemuaBtn.addEventListener('click', () => {
            brandMenu.classList.add("show");
        })

        closeBrandMenu.addEventListener('click', () => {
            brandMenu.classList.remove('show');
        });

        function formatToIDR(amount) {
    // Buat instance Intl.NumberFormat dengan locale 'id-ID' dan format mata uang 'IDR'
        const formatter = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
        });

        // Format jumlah dengan formatter
        return formatter.format(amount);
}
    </script>
    </body>
</html>
