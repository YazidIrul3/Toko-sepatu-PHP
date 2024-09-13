<?php
include 'tampilkanData.php';

session_start();
$totalBarangKeranjang = 0;
$sepatu_running = tampilkan("SELECT * FROM product WHERE jenis= 'Running'");
$sepatu_sepakbola = tampilkan("SELECT * FROM product WHERE jenis= 'Sepak bola'");
$sepatu_futsal = tampilkan("SELECT * FROM product WHERE jenis= 'Futsal'");
$sepatu_sneakers = tampilkan("SELECT * FROM product WHERE jenis= 'Sneakers'");

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
    <title>Home Page</title>
    <link rel="stylesheet" href="boxicons.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
     
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
    <div class="">
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

    <header>
    <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <!-- <img src="https://topscore.id/sepatu-running" alt="" class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></img> -->
        <img class="w-full h-full" src="https://topsystem.id/api/banner/1905x914/1721642080.jpg" alt="">
        
    </div>
    
    <div class="carousel-item">
        <img class="w-full h-full" src="https://topsystem.id/api/banner/1905x914/1720782641.jpg" alt="">          
    </div>
        
        <div class="carousel-item">
            <img class="w-full h-full" src="https://topsystem.id/api/banner/1905x914/1721218692.jpg" alt="">
      
        </div>
        </div>
      </div>
    </div>

  </div>
    </header>


        <section class=" container mx-auto p-2 w-11/12 flex flex-col gap-3 relative">
         <header>
            <div>
                <img src="https://stockx.com/nike-sb-dunk-low-trocadero-gardens" alt="" width="100%">
            </div>
         </header>

        <div class="flex flex-row gap-4 justify-center min-w-full items-center" data-aos="fade-right">
            <a href="brand/?brand=Adidas">
                <img src="https://topsystem.id/api/brand/thumbs/1656596624.jpg" alt="">
            </a>
            <a href="brand/?brand=Specs">
                <img src="https://topsystem.id/api/brand/thumbs/1656596550.jpg" alt="">
            </a>
            <a href="brand/?brand=Ortuseight">
                <img src="https://topsystem.id/api/brand/thumbs/1650270344.png" alt="">
            </a>
            <a href="brand/?brand=Mills">
                <img src="https://topsystem.id/api/brand/thumbs/1656596356.jpg" alt="">
            </a>
            <button id="lihatSemua-btn">Lihat semua</button>
        </div>

        <div id="brandMenu" class="absolute  right-1/2 translate-x-1/2 mx-auto z-40 p-2 bg-opacity-30 bg-slate-900 w-[500px]">

            <div class="bg-slate-50 flex flex-col gap-4 px-3 py-2 w-full">


            <div class="flex flex-row gap-4 justify-end hover:cursor-pointer" id="closeBrandMenu">X</div>
            <div class="grid 2xl:grid-cols-4 xl:grid-cold-4 lg:grid-cols-4 md:grid-cols-3 grid-cols-3 gap-4 mx-auto container h-full">
            <a href="brand/?brand=Adidas">
                <img class="max-w-24" src="https://topsystem.id/api/brand/thumbs/1656596624.jpg" alt="">
            </a>
            <a href="brand/?brand=Specs">
                <img class="max-w-24" src="https://topsystem.id/api/brand/thumbs/1656596550.jpg" alt="">
            </a>
            
            <a href="brand/?brand=Ortuseight">
                <img class="max-w-24" src="https://topsystem.id/api/brand/thumbs/1650270344.png" alt="">
            </a>
            <a href="brand/?brand=Mills">
                <img class="max-w-24" src="https://topsystem.id/api/brand/thumbs/1656596356.jpg" alt="">
            </a>
            <a href="brand/?brand=NIke">
                <img class="max-w-24" src="https://topsystem.id/api/brand/thumbs/1650270132.png" alt="">
            </a>
        </div>
        </div>
        </div>

        <div class="flex flex-col mt-5 gap-3">

            <div>
                <h1 class="text-3xl font-bold">Sepatu Running</h1>
                <div class="flex flex-row gap-2 2xl:overflow-hidden xl:overflow-hidden overflow-x-scroll min-w-full scroll-smooth">                
                <?php foreach($sepatu_running['items'] as $value) { ?>    
                    <a data-aos="fade-up" href="detail.php?id=<?php echo $value['id'] ?>" class="bg-slate-50 p-2 rounded-lg max-w-52 min-h-full hover:text-slate-900">
                        <!-- <div class="flex justify-end p-2 text-yellow-500 font-extrabold">
                            <h1><?php echo $value['jenis'] ?></h1>
                        </div> -->
                    <img class="" src="./images/<?php echo $value['foto'] ?>" alt="">
                    <h1 class="text-xl truncate font-bold"><?php echo $value['nama'] ?></h1>
                    <p>Rp. <?php echo number_format($value['harga']) ?></p>
                </a>
                <?php } ?>              
            </div>
        </div>
        
        <div>
            <h1 class="text-3xl font-bold">Sepatu Sepak bola</h1>
            <div class="flex flex-row gap-2 2xl:overflow-hidden xl:overflow-hidden overflow-x-scroll min-w-full scroll-smooth">                
                <?php foreach($sepatu_sepakbola['items'] as $value) { ?>    
                <a data-aos="fade-up" href="detail.php?id=<?php echo $value['id'] ?>" class="bg-slate-50 p-2 rounded-lg max-w-52 min-h-full hover:text-slate-900">
                    <!-- <div class="flex justify-end p-2 text-yellow-500 font-extrabold">
                        <h1><?php echo $value['jenis'] ?></h1>
                    </div> -->
                    <img class="" src="./images/<?php echo $value['foto'] ?>" alt="">
                    <h1 class="text-xl truncate font-bold"><?php echo $value['nama'] ?></h1>
                    <p>Rp. <?php echo number_format($value['harga']) ?></p>
                </a>
                <?php } ?>              
            </div>
        </div>
        
        <div>
            <h1 class="text-3xl font-bold">Sepatu Futsal</h1>
            <div class="flex flex-row gap-2 2xl:overflow-hidden xl:overflow-hidden overflow-x-scroll min-w-full scroll-smooth">                
                <?php foreach($sepatu_futsal['items'] as $value) { ?>    
                    <a data-aos="fade-up" href="detail.php?id=<?php echo $value['id'] ?>" class="bg-slate-50 p-2 rounded-lg max-w-52 min-h-full hover:text-slate-900">
                        <!-- <div class="flex justify-end p-2 text-yellow-500 font-extrabold">
                        <h1><?php echo $value['jenis'] ?></h1>
                    </div> -->
                    <img class="" src="./images/<?php echo $value['foto'] ?>" alt="">
                    <h1 class="text-xl truncate font-bold"><?php echo $value['nama'] ?></h1>
                    <p>Rp. <?php echo number_format($value['harga']) ?></p>
                </a>
                <?php } ?>              
            </div>
        </div>
        
        <div>
            <h1 class="text-3xl font-bold">Sepatu Sneakers</h1>
            <div class="flex flex-row gap-2 2xl:overflow-hidden xl:overflow-hidden overflow-x-scroll min-w-full scroll-smooth">                
                <?php foreach($sepatu_sneakers['items'] as $value) { ?>    
                    <a data-aos="fade-up" href="detail.php?id=<?php echo $value['id'] ?>" class="bg-slate-50 p-2 rounded-lg max-w-52 min-h-full hover:text-slate-900">
                        <!-- <div class="flex justify-end p-2 text-yellow-500 font-extrabold">
                            <h1><?php echo $value['jenis'] ?></h1>
                    </div> -->
                    <img class="" src="./images/<?php echo $value['foto'] ?>" alt="">
                    <h1 class="text-xl truncate font-bold"><?php echo $value['nama'] ?></h1>
                    <p>Rp. <?php echo number_format($value['harga']) ?></p>
                </a>
                <?php } ?>              
            </div>
        </div>
    </div>
        
    </div>
        </section>
    </div>
    
    <footer>
        <div class="text-center p-3 bg-slate-900 text-slate-50">
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

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>