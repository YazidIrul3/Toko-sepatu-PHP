<?php
include 'tampilkanData.php';

session_start();
$id = (int)$_GET['id'];
$id_user = $_SESSION['id_user'];
$sepatu = tampilkan("SELECT * FROM product WHERE id = '$id'");

if (isset($_SESSION['keranjang'])) {
    $totalBarangKeranjang =  count($_SESSION['keranjang']);
 } else {
     $totalBarangKeranjang = 0;
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Page</title>
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
<div class="flex flex-col ">
            <nav class="flex justify-between flex-row items-center bg-yellow-500 py-3 2xl:px-3 xl:px-3 lg:px-3 md:px-3 px-2">
            <a href="index.php" class="text-xl font-bold">
                <h1>Toko Sepatu</h1>
            </a>
            
            <div class="2xl:flex xl:flex lg:flex md:flex hidden items-center gap-2 text-lg font-bold text-slate-50">
                <a class="hover:bg-slate-900 hover:text-slate-50 px-3 py-2 rounded-xl" href="category/?category=Sepak bola">Sepak bola</a>
                <a class="hover:bg-slate-900 hover:text-slate-50 px-3 py-2 rounded-xl" href="category/?category=Futsal">Futsal</a>
                <a class="hover:bg-slate-900 hover:text-slate-50 px-3 py-2 rounded-xl" href="category/?category=Running">Running</a>
                <a class="hover:bg-slate-900 hover:text-slate-50 px-3 py-2 rounded-xl" href="category/?category=Sneakers">Sneakers</a>
            </div>
            
            
            <div class="flex items-center gap-2">
                <div class="relative">
                    <a href="keranjangPage.php" class="box-icon text-slate-900 ">
                        <img class="w-10 h-10" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAgdJREFUSEvN1kuoTXEUx/HPlYFHpEQyIhnIxEQiEwYykMHFhJnyLAMDxUCkPAYG0i2RMnJH9w6NhIEoxUAJA4/yiGIgMvAIZ93+u3bbuef893k4Vp3B2Wf91/e/fuuxz5AB2dCAuP4L8CLEJ+wLHvRTjXLGx3GsBHuGjXjejwu0AgfvIVb0G1yWehgHEnAt7vQaPllzzcV7TMUodvwrcHCuYju+YzO+dQl/hRdFjFbjFBLf7hJWPb4V4/Gw3Rw/wvIewnfiSg54Ny4m8Clc7+ASJ7EGPzEPn3LAM/AOsxN0Q03wTHzENIxhW06NC5/zabR+Nxpuac2FUlZsE67VAS9BbLGwczhYI+u7WI0PWIBfdcDhewPr8RnzM0drcWl8zuJQ+cLturrw3ZJqFN934XJG1tGMR5LfMjztBDylAXyb5HqcMWKR0BssxP1GbVdWL5qbcZw7ihMpQMzjyxZZx+yPpN/340I34GiO12l/Zyg94fIj9cTE7HYidXHmUqpxLjiWz95mznWkjvNR66jX9Azy11TfmP+/rC44AsRSmJPqFn+RqjYL+9JqDIWaWl3waRxOkW6l2a4Gvol16eGZ0kh1VeNy0JAwpK9abKciocku1/a1WA1a3r0h454m4Gio8AuL35vKXVfqCBZbKN5W91o02Kq0Xp/0qsYZzZzn0knGeZHbeA0M/AffmVMfIK6tVQAAAABJRU5ErkJggg=="/>
                    </a>
                    <p class="text-xl font-bold absolute bg-slate-50  rounded-full top-0 right-0 w-5 h-5 flex justify-center items-center"><?php echo $totalBarangKeranjang ?></p>
                </div>
                
                <div class="relative z-40" id="userLogo">
                    <img class="w-10 h-10 " src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAA7xJREFUSEvFl3fIj2sYxz/IHp2yZcXhhMimKBIiK1mHhMg4ji0kOyMroyQzf8geGQkndLJHiMieiZAie7u/uh7dv9vveZ+fv1z1ej33te5rfa/7zcZvomy/yS+/6jg7UB+oAJSySz8EbgGnga+ZBpKp47+A4UBnoGiM8afAZmARcDPpAkmOCwPLgU5Jhjy+ot4CDAaexell5bgccAD405RlcDdw1vsRq4791APawI/yXQVaAA/SOY9zrHSeA0qb0n3gb+BEQuSNgPVAWU9PF3oS6qVznBM4ak0k+TXAMOCVKecDWlmDSf86sA94b/wCwBKgt32fdJlrDHz2nadzPBsYZ0Jy2tdTUPr3uBpWCyK4AHQA7nnn0u1j3zOBiVk5VorUkYpa6a0KvDaFXMA1oHxMum+bfBR5IeCKjd1HoJJ/sTDihcAIM6x6HfecTAMmu5t/AoYAG42nqKQnW5OAGZ5OM+CgfS8ARkc837H+/wgo7rrzjFfjSPYiUN3dfJ3LSs8g6k1AV+v2ugHvPFDTMqhSfSffsRrgiJ0LBEYGBt4BuYFZwISAp7PxLqKXgFLskxrtXztoYAiX4lidu9gEugBbAwOXrYZrgV4BT1no4ZDtkmXFZ3e3EdPZP8CyMGJ13XTTKJIGdYRgA2ys1On/maxGSx2cF1jqRRc5V8NG3a5pmRs6VmrVACItANXbp4KAoi4TnEefd4Ealm5fpKS7sBaJaJQ1YkqqlV6BvKitzWvoQ0ZWGjT6vG0uQ0PTXDayJagVaclINsVxQw8SNTZR2tMFWNmhW3Nj7HUodScmCzqe4v6ZanytVE1MiuM8rviPrSt3AB0DY9rFaiDNt0BENRW9dQilNB8GNFZfAr1dbszaOXx4bqP6IXSs79UGkRodgbu6VCTUUWQVs4hMrBtAa3sY6Fvze8qNoFBvhSvFwEg/RK4mwP/G1FqrDWgnaxUWs3PdWGASQWl+ayoZF2kT1XI48MLht8BDlxYJJ47FOdb5TrcS25uAbqmGUqpEgjyNjDLik8okHJhjh2oglSBCuO3hYyLddvrDIgrHRnM8KCHVq4B+gYxmWFArVPtBcQ+BKsAhhzIlPFl1cQT4cf5bAvs9prBA5VPtUyirp48aSfWOXiFa5CqDUEqG9KTJYWAj2f5WEnW/SJE2tY7/6aJJjz29NgRzY7zxScj299rOs3q/iRNOchzpKer5brF3S/C6ARgb98DLpMZx9oXXesxrr+q3SC8PAYh+R++ypKz88l8SiQYzFcg01Znay1juGzC8sh8i2SWvAAAAAElFTkSuQmCC"/>

                    <div id="userMenu" class="absolute top-14 right-0 font-bold flex flex-col w-32 justify-center  items-center">
                        <div id="login-div" class="w-full flex justify-center border border-slate-900 hover:bg-slate-200 bg-slate-50">
                            <a id="login-btn" href="login.php" class="py-2 text-lg  hover:text-slate-900">Login</a>
                        </div>

                        
                        <div class="w-full flex justify-center border border-slate-900 hover:bg-slate-200 bg-slate-50">
                            
                            <a id="profile-btn" href="profile.php" class="py-2 text-lg  hover:text-slate-900">Profile</a>
                        </div>
                        <?php

                        if(isset($_SESSION['id_user'])) {
                            echo "<script>
                            document.getElementById('login-btn').style.display = 'none';
                            </script>";
                            echo "<script>
                            document.getElementById('profile-btn').style.display = 'flex';
                            </script>";
                        } else {
                            echo "<script>
                            document.getElementById('login-btn').style.display = 'flex';
                            </script>";
                            echo "<script>
                            document.getElementById('profile-btn').style.display = 'none';
                            </script>";
                        }
                        ?>
                    </div>
                </div>
                
            </div>
        </div>
    </nav>

    
    <div class="2xl:hidden xl:hidden lg:hidden md:hidden flex items-center gap-2 text-sm font-bold text-slate-900 px-4 py-2">
                <a class="hover:bg-slate-900 hover:text-slate-50 px-3 py-2 rounded-xl" href="category/?category=Sepak bola">Sepak bola</a>
                <a class="hover:bg-slate-900 hover:text-slate-50 px-3 py-2 rounded-xl" href="category/?category=Futsal">Futsal</a>
                <a class="hover:bg-slate-900 hover:text-slate-50 px-3 py-2 rounded-xl" href="category/?category=Running">Running</a>
                <a class="hover:bg-slate-900 hover:text-slate-50 px-3 py-2 rounded-xl" href="category/?category=Sneakers">Sneakers</a>
    </div>
</div>

    <div class="grid 2xl:grid-cols-2 xl:grid-cols-2 lg:grid-cols-2 grid-cols-1 mb-4 place-content-center p-5 2xl:h-screen xl:h-screen lg:h-screen h-full container mx-auto px-3">
        <div class="w-full h-full">
            <img class="w-full h-[400px] object-contain" src="./images/<?php foreach($sepatu['items'] as $sepatu) echo $sepatu['foto'] ?>" alt="">
        </div>

        <div class=" border border-slate-900 shadow-slate-900 rounded-xl shadow-sm p-7 h-full flex flex-col justify-center gap-5">
            <div class="flex items-center gap-2">
                <a href="index.php" class="text-slate-900 font-bold text-lg">Home /</a>
                <a href="category/?category=<?php echo $sepatu['jenis'] ?>" class="text-slate-900 font-bold text-lg"><?php echo $sepatu['jenis'] ?></a>
            </div>

            <div class="flex flex-col gap-2 mt-4">
                <h1 class="font-normal text-3xl"><?php echo $sepatu['nama'] ?></h1>
                <h1 class="font-extrabold text-4xl">Rp. <?php echo number_format($sepatu['harga']) ?></h1>
            </div>

            <div class="flex gap-4 mt-5">
                <form action="keranjang.php?id=<?php echo $id ?>" method="POST">
                    <div class="flex flex-col gap-1 mb-4">
                        <h1>Jumlah</h1>
                        <input type="number" class="border border-slate-900 w-44 px-2 py-1 rounded-full text-slate-900 font-bold text-xl mb-4" name="jumlah" value="1">
                        <input type="hidden" name="nama" value="<?php echo $sepatu['nama']  ?>">
                        <input type="hidden" name="harga" value="<?php echo $sepatu['harga']  ?>">
                        <input type="hidden" name="foto" value="<?php echo $sepatu['foto'] ?>">
                    </div>

                    <div class="flex gap-4">
                        <input type="submit" class="border border-slate-900 w-60 py-3 rounded-full text-slate-900 font-bold text-xl hover:bg-yellow-800 hover:text-slate-50" name="add" value="Tambah ke keranjang" />
                    </div>
                </form>
            </div>
        </div>
    </div> 

    

    <footer>
        <div class="text-center py-3 bg-slate-900 text-slate-50">
            © <?php echo date('Y'); ?> Copyright By
            <a class="text-slate-50" href="">Yazid Khairul</a>
        </div>
    </footer>


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