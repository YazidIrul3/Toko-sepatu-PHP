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
        <div class="flex flex-col relative">
            <nav class="flex justify-between flex-row items-center bg-yellow-500 py-3 2xl:px-3 xl:px-3 lg:px-3 md:px-3 px-2">
            <div class="text-xl font-bold">
                <h1>Toko Sepatu</h1>
            </div>
            
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
                    <p class="text-xl font-bold absolute bg-slate-50  rounded-full top-0 right-0 w-5 h-5 flex justify-center items-center">0</p>
                </div>
                
                <div class="relative z-40" id="userLogo">
                    <img class="w-10 h-10 " src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAA7xJREFUSEvFl3fIj2sYxz/IHp2yZcXhhMimKBIiK1mHhMg4ji0kOyMroyQzf8geGQkndLJHiMieiZAie7u/uh7dv9vveZ+fv1z1ej33te5rfa/7zcZvomy/yS+/6jg7UB+oAJSySz8EbgGnga+ZBpKp47+A4UBnoGiM8afAZmARcDPpAkmOCwPLgU5Jhjy+ot4CDAaexell5bgccAD405RlcDdw1vsRq4791APawI/yXQVaAA/SOY9zrHSeA0qb0n3gb+BEQuSNgPVAWU9PF3oS6qVznBM4ak0k+TXAMOCVKecDWlmDSf86sA94b/wCwBKgt32fdJlrDHz2nadzPBsYZ0Jy2tdTUPr3uBpWCyK4AHQA7nnn0u1j3zOBiVk5VorUkYpa6a0KvDaFXMA1oHxMum+bfBR5IeCKjd1HoJJ/sTDihcAIM6x6HfecTAMmu5t/AoYAG42nqKQnW5OAGZ5OM+CgfS8ARkc837H+/wgo7rrzjFfjSPYiUN3dfJ3LSs8g6k1AV+v2ugHvPFDTMqhSfSffsRrgiJ0LBEYGBt4BuYFZwISAp7PxLqKXgFLskxrtXztoYAiX4lidu9gEugBbAwOXrYZrgV4BT1no4ZDtkmXFZ3e3EdPZP8CyMGJ13XTTKJIGdYRgA2ys1On/maxGSx2cF1jqRRc5V8NG3a5pmRs6VmrVACItANXbp4KAoi4TnEefd4Ealm5fpKS7sBaJaJQ1YkqqlV6BvKitzWvoQ0ZWGjT6vG0uQ0PTXDayJagVaclINsVxQw8SNTZR2tMFWNmhW3Nj7HUodScmCzqe4v6ZanytVE1MiuM8rviPrSt3AB0DY9rFaiDNt0BENRW9dQilNB8GNFZfAr1dbszaOXx4bqP6IXSs79UGkRodgbu6VCTUUWQVs4hMrBtAa3sY6Fvze8qNoFBvhSvFwEg/RK4mwP/G1FqrDWgnaxUWs3PdWGASQWl+ayoZF2kT1XI48MLht8BDlxYJJ47FOdb5TrcS25uAbqmGUqpEgjyNjDLik8okHJhjh2oglSBCuO3hYyLddvrDIgrHRnM8KCHVq4B+gYxmWFArVPtBcQ+BKsAhhzIlPFl1cQT4cf5bAvs9prBA5VPtUyirp48aSfWOXiFa5CqDUEqG9KTJYWAj2f5WEnW/SJE2tY7/6aJJjz29NgRzY7zxScj299rOs3q/iRNOchzpKer5brF3S/C6ARgb98DLpMZx9oXXesxrr+q3SC8PAYh+R++ypKz88l8SiQYzFcg01Znay1juGzC8sh8i2SWvAAAAAElFTkSuQmCC"/>

                    <div id="userMenu" class="absolute top-14 right-0 font-bold flex flex-col w-32 justify-center  items-center">
                        <div class="w-full flex justify-center border border-slate-900 hover:bg-slate-200 bg-slate-50">
                            <a href="login.php" class="py-2 text-lg  hover:text-slate-900">Login</a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </nav>

    <nav class="bg-slate-50  text-slate-900 py-2 font-semibold text-lg flex flex-row gap-5 px-3">
        <div class="flex gap-4">
            <div id="brandLink" class="hover:text-slate-900">Brand</div>
            <a href="" class="hover:text-slate-900">Jenis Sepatu</a>
        </div>


        <div id="brandMenu" class="absolute top-0 right-0 z-40 p-2 bg-opacity-30 bg-slate-900 h-screen">

            <div class="bg-slate-50 flex flex-col gap-4 px-3 py-2">


            <div class="flex flex-row justify-end" id="closeBrandMenu">X</div>
            <div class=" flex flex-row flex-wrap mx-auto justify-start items-start container h-full">
                <a href="">
                <img src="https://topsystem.id/api/brand/thumbs/1656596624.jpg" alt="">
            </a>
            <a href="">
                <img src="https://topsystem.id/api/brand/thumbs/1656596550.jpg" alt="">
            </a>
            <a href="">
                <img src="https://topsystem.id/api/brand/thumbs/1650270331.png" alt="">
            </a>
            <a href="">
                <img src="https://topsystem.id/api/brand/thumbs/1650270376.png" alt="">
            </a>
            <a href="">
                <img src="https://topsystem.id/api/brand/thumbs/1650270344.png" alt="">
            </a>
            <a href="">
                <img src="https://topsystem.id/api/brand/thumbs/1650270132.png" alt="">
            </a>
            <a href="">
                <img src="https://topsystem.id/api/brand/thumbs/1656596356.jpg" alt="">
            </a>
            
        </div>
        </div>
        </div>
    </nav>
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
    <button class=" carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden"></span>
    </button>
    <button class=" carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden"></span>
    </button>
  </div>
    </header>


        <section class=" container mx-auto p-2 w-11/12 flex flex-col gap-3">
         <header>
            <div>
                <img src="https://stockx.com/nike-sb-dunk-low-trocadero-gardens" alt="" width="100%">
            </div>
         </header>

        <div class="flex flex-row gap-4 justify-center min-w-full">
            <a href="">
                <img src="https://topsystem.id/api/brand/thumbs/1656596624.jpg" alt="">
            </a>
            <a href="">
                <img src="https://topsystem.id/api/brand/thumbs/1656596550.jpg" alt="">
            </a>
            <a href="">
                <img src="https://topsystem.id/api/brand/thumbs/1650270331.png" alt="">
            </a>
            <a href="">
                <img src="https://topsystem.id/api/brand/thumbs/1650270376.png" alt="">
            </a>
            <a href="">
                <img src="https://topsystem.id/api/brand/thumbs/1650270344.png" alt="">
            </a>
            <a href="">
                <img src="https://topsystem.id/api/brand/thumbs/1650270132.png" alt="">
            </a>
            <a href="">
                <img src="https://topsystem.id/api/brand/thumbs/1656596356.jpg" alt="">
            </a>
        </div>

        <div>
            <h1 class="text-3xl font-bold">Sepatu Sneakers</h1>
            <div class="flex flex-row gap-2 2xl:overflow-hidden xl:overflow-hidden overflow-x-scroll min-w-full scroll-smooth">
                
                <div class="bg-slate-50 p-2 rounded-lg min-w-48 min-h-full">
                    <img class="" src="https://static.nike.com/a/images/q_auto:eco/t_product_v1/f_auto/dpr_1.3/h_466,c_limit/4f37fca8-6bce-43e7-ad07-f57ae3c13142/air-force-1-07-shoes-WrLlWX.png" alt="">
                    <h1 class="text-xl font-bold">Air Force 1 07</h1>
                    <p>Rp. 1.000.000</p>
                </div>
                <div class="bg-slate-50 p-2 rounded-lg min-w-48 min-h-full">
                    <img class="" src="https://static.nike.com/a/images/q_auto:eco/t_product_v1/f_auto/dpr_1.3/h_466,c_limit/4f37fca8-6bce-43e7-ad07-f57ae3c13142/air-force-1-07-shoes-WrLlWX.png" alt="">
                    <h1 class="text-xl font-bold">Air Force 1 07</h1>
                    <p>Rp. 1.000.000</p>
                </div>
                <div class="bg-slate-50 p-2 rounded-lg min-w-48 min-h-full">
                    <img class="" src="https://static.nike.com/a/images/q_auto:eco/t_product_v1/f_auto/dpr_1.3/h_466,c_limit/4f37fca8-6bce-43e7-ad07-f57ae3c13142/air-force-1-07-shoes-WrLlWX.png" alt="">
                    <h1 class="text-xl font-bold">Air Force 1 07</h1>
                    <p>Rp. 1.000.000</p>
                </div>
                <div class="bg-slate-50 p-2 rounded-lg min-w-48 min-h-full">
                    <img class="" src="https://static.nike.com/a/images/q_auto:eco/t_product_v1/f_auto/dpr_1.3/h_466,c_limit/4f37fca8-6bce-43e7-ad07-f57ae3c13142/air-force-1-07-shoes-WrLlWX.png" alt="">
                    <h1 class="text-xl font-bold">Air Force 1 07</h1>
                    <p>Rp. 1.000.000</p>
                </div>
                <div class="bg-slate-50 p-2 rounded-lg min-w-48 min-h-full">
                    <img class="" src="https://static.nike.com/a/images/q_auto:eco/t_product_v1/f_auto/dpr_1.3/h_466,c_limit/4f37fca8-6bce-43e7-ad07-f57ae3c13142/air-force-1-07-shoes-WrLlWX.png" alt="">
                    <h1 class="text-xl font-bold">Air Force 1 07</h1>
                    <p>Rp. 1.000.000</p>
                </div>
                <div class="bg-slate-50 p-2 rounded-lg min-w-48 min-h-full">
                    <img class="" src="https://static.nike.com/a/images/q_auto:eco/t_product_v1/f_auto/dpr_1.3/h_466,c_limit/4f37fca8-6bce-43e7-ad07-f57ae3c13142/air-force-1-07-shoes-WrLlWX.png" alt="">
                    <h1 class="text-xl font-bold">Air Force 1 07</h1>
                    <p>Rp. 1.000.000</p>
                </div>
                
                
            </div>
        </div>

        <div>
            <h1 class="text-3xl font-bold">Sepatu Basket</h1>
            <div class="flex flex-row gap-2 2xl:overflow-hidden xl:overflow-hidden overflow-x-scroll min-w-full scroll-smooth">
                
                <div class="bg-slate-50 p-2 rounded-lg min-w-48 min-h-full">
                    <img class="" src="https://static.nike.com/a/images/q_auto:eco/t_product_v1/f_auto/dpr_1.3/h_466,c_limit/4f37fca8-6bce-43e7-ad07-f57ae3c13142/air-force-1-07-shoes-WrLlWX.png" alt="">
                    <h1 class="text-xl font-bold">Air Force 1 07</h1>
                    <p>Rp. 1.000.000</p>
                </div>
                <div class="bg-slate-50 p-2 rounded-lg min-w-48 min-h-full">
                    <img class="" src="https://static.nike.com/a/images/q_auto:eco/t_product_v1/f_auto/dpr_1.3/h_466,c_limit/4f37fca8-6bce-43e7-ad07-f57ae3c13142/air-force-1-07-shoes-WrLlWX.png" alt="">
                    <h1 class="text-xl font-bold">Air Force 1 07</h1>
                    <p>Rp. 1.000.000</p>
                </div>
                <div class="bg-slate-50 p-2 rounded-lg min-w-48 min-h-full">
                    <img class="" src="https://static.nike.com/a/images/q_auto:eco/t_product_v1/f_auto/dpr_1.3/h_466,c_limit/4f37fca8-6bce-43e7-ad07-f57ae3c13142/air-force-1-07-shoes-WrLlWX.png" alt="">
                    <h1 class="text-xl font-bold">Air Force 1 07</h1>
                    <p>Rp. 1.000.000</p>
                </div>
                <div class="bg-slate-50 p-2 rounded-lg min-w-48 min-h-full">
                    <img class="" src="https://static.nike.com/a/images/q_auto:eco/t_product_v1/f_auto/dpr_1.3/h_466,c_limit/4f37fca8-6bce-43e7-ad07-f57ae3c13142/air-force-1-07-shoes-WrLlWX.png" alt="">
                    <h1 class="text-xl font-bold">Air Force 1 07</h1>
                    <p>Rp. 1.000.000</p>
                </div>
                <div class="bg-slate-50 p-2 rounded-lg min-w-48 min-h-full">
                    <img class="" src="https://static.nike.com/a/images/q_auto:eco/t_product_v1/f_auto/dpr_1.3/h_466,c_limit/4f37fca8-6bce-43e7-ad07-f57ae3c13142/air-force-1-07-shoes-WrLlWX.png" alt="">
                    <h1 class="text-xl font-bold">Air Force 1 07</h1>
                    <p>Rp. 1.000.000</p>
                </div>
                <div class="bg-slate-50 p-2 rounded-lg min-w-48 min-h-full">
                    <img class="" src="https://static.nike.com/a/images/q_auto:eco/t_product_v1/f_auto/dpr_1.3/h_466,c_limit/4f37fca8-6bce-43e7-ad07-f57ae3c13142/air-force-1-07-shoes-WrLlWX.png" alt="">
                    <h1 class="text-xl font-bold">Air Force 1 07</h1>
                    <p>Rp. 1.000.000</p>
                </div>
                
                
            </div>
        </div>
        </section>
    </div>

    <script>
        const userLogo = document.querySelector('#userLogo');
        const userMenu = document.querySelector('#userMenu');
        const brandMenu = document.querySelector('#brandMenu');
        const brand = document.querySelector('#brandLink');
        const closeBrandMenu = document.querySelector('#closeBrandMenu');

        userLogo.addEventListener('click', () => {
            userMenu.classList.toggle('hidden');
        })

        brand.addEventListener('click', () => {
            brandMenu.classList.add("show");
        })

        closeBrandMenu.addEventListener('click', () => {
            brandMenu.classList.remove('show');
        })
    </script>
</body>
</html>