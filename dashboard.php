<?php
include('tampilkanData.php');
include 'perbaruiData.php';

$data_sepatu = tampilkan("SELECT * FROM product");

$id_sepatu = (int)$_GET['id_sepatu'];

if(isset($_POST['perbarui'])) { 
        if(perbarui_sepatu($_POST, $id_sepatu) > 0 ) {
        echo "<script>
        alert('Data updated success');
        document.location.href = 'dashboard.php';
        </script>";
    } else {
        echo "<script>
        alert('Data updated failed');
        document.location.href = 'dashboard.php';
        </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        #form-perbarui {
            display: none;
        }

        #form-perbarui.muncul {
            display: flex;
            flex-direction: column;
        }
    </style>
</head>
<body>
    <div class="flex h-full relative ">
        <nav class="sidebar 2xl:flex xl:flex lg:flex md:flex hidden flex-col bg-yellow-500 gap-2 w-1/6">
            <h1 class="font-bold text-xl p-2 mt-5">DASHBOARD ADMIN</h1>

            <div class="flex flex-col">
                <a href="" class="text-slate-50 font-bold text-lg p-2 w-full bg-yellow-600">Product</a>
                <a href="" class="text-slate-50 font-bold text-lg p-2 w-full hover:bg-yellow-600">User</a>
                <a href="" class="text-slate-50 font-bold text-lg p-2 w-full hover:bg-yellow-600">Transaksi</a>
            </div>
        </nav>

        <section id="product" class="p-3 mt-3 w-full flex flex-col gap-5">
            <form enctype="multipart/form-data" action="tambahProduk.php" method="POST" class="bg-slate-50 shadow-slate-900 w-3/6 shadow-sm p-2 flex flex-col gap-3" >
                <div class="flex flex-col justify-center gap-2 w-full">
                    <label class="font-bold">Nama</label>
                    <input require
                        class=" bg-slate-50 p-2 text-slate-900"
                        type="text"
                        name="nama"
                        placeholder="nama"
                    />
                </div>

                <div class="flex flex-col justify-center gap-2 w-full">
                    <label class="font-bold">Brand</label>
                    <select name="brand" id="">
                        <option>Adidas</option>
                        <option>Nike</option>
                        <option>Puma</option>
                        <option>Specs</option>
                        <option>New Balance</option>
                        <option>Ortuseight</option>
                        <option>Ardiles</option>
                    </select>
                </div>

                <div class="flex flex-col justify-center gap-2 w-full">
                    <label class="font-bold">Jenis</label>
                    <select name="jenis" id="">
                        <option>Sneakers</option>
                        <option>Futsal</option>
                        <option>Sepak bola</option>
                        <option>Basket</option>
                        <option>Running</option>
                    </select>
                </div>

                <div class="flex flex-col justify-center gap-2 w-full">
                    <label class="font-bold">Deskripsi</label>
                    <textarea
                     class=" bg-slate-50 p-2 text-slate-900" 
                     name="deskripsi" 
                     id=""></textarea>
                </div>

                <div class="flex flex-col justify-center gap-2 w-full">
                    <label class="font-bold">Foto</label>
                    <input require type="file" name="foto">
                </div>

                <div class="flex flex-col justify-center gap-2 w-full">
                    <label class="font-bold">Harga</label>
                    <input require type="number" class=" bg-slate-50 p-2 text-slate-900" name="harga" placeholder="harga">
                </div>

                <div class="flex flex-col justify-center gap-2 w-full">
                    <label class="font-bold">Stock</label>
                    <input require type="number" class=" bg-slate-50 p-2 text-slate-900" name="stock" placeholder="stock">
                </div>

                <button type="submit" name="simpan" class="bg-yellow-500 text-slate-50 font-bold py-2 hover:bg-yellow-600">
                    Simpan
                </button>
            </form>

            <table class="border border-slate-900">
                <tr>
                    <th class="border border-slate-900 px-2">No</th>
                    <th class="border border-slate-900 px-2 w-44">Nama</th>
                    <th class="border border-slate-900 px-2">Brand</th>
                    <th class="border border-slate-900 px-2">Jenis</th>
                    <th class="border border-slate-900 px-2">Deskripsi</th>
                    <th class="border border-slate-900 px-2">Foto</th>
                    <th class="border border-slate-900 px-2">Harga</th>
                    <th class="border border-slate-900 px-2">Stock</th>
                    <th class="border border-slate-900 px-2">Aksi</th>
                </tr>

                <?php foreach($data_sepatu['items'] as $sepatu) { ?>
                <tr>
                    <td class="border border-slate-900 px-2"><?php echo $sepatu['id'] ?></td>
                    <td class="border border-slate-900 px-2"><?php echo $sepatu['nama'] ?></td>
                    <td class="border border-slate-900 px-2"><?php echo $sepatu['brand'] ?></td>
                    <td class="border border-slate-900 px-2"><?php echo $sepatu['jenis'] ?></td>
                    <td class="border border-slate-900 px-2"><?php echo $sepatu['deskripsi'] ?></td>
                    <td class="border border-slate-900 px-2">
                        <img class=" h-20 w-24" src="./images/<?php echo $sepatu['foto'] ?>" alt="">
                    </td>
                    <td class="border border-slate-900 px-2"><?php echo $sepatu['harga'] ?></td>
                    <td class="border border-slate-900 px-2"><?php echo $sepatu['stock'] ?></td>
                    <td class=" px-4 ">
                        <div class="flex gap-4">
                            <button id="edit-button" class="bg-yellow-500 p-2">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAdxJREFUSEvllk9LFlEUxn8HXEYihH8gQQ1JaONONFJ34a6v4Cdw00ZpF7rxS/gN3Nku/+LWUJCIoLSCVFDcGQVPnrjGvPPe0Zl3rrjwwmzmMvd3njPnPucYd7TsjrjcClhSG/AM2Dez3zFxycGS+oF3wFPgI/DSzA7z8KRgSX3AJvA4A/oOvDCzr1l4MrCkdmAP6I2k9hswamY/rvaSgf1ASa+BxYKCXTKz6WRgSU+Aiys1kuaA+Qj8F/DAzP74Xi3FkgaADcAPe56Bx5SnUSxpEFgHeoK6L6GI/v1HSbPAQtjzdyO1/3FQug105VJ6EFE+k6SqJQ0Bq0B3QRHllbeb2XmteyzJTWELeHSD1TYor+VcFaDOiZpGZQOR5L67VkJpKWip6xSgboMdJTrZz+BQDfZYOdUtQN2TP5cIsNhAJA0D7ysoLQ0tTHWAujk8LBH9CTBWVum1Xi3J+2esy+TjOL680xNm5n230mryakkObGrckVNd6Xgr0GiqJb0Clm8I/zRYY2WlhamW9Pay27y5BuzQSTPzpt/yiqV6BZgqODEJtCjVR0BnBHwWlO62LDPzYYNiST6k+XzkhbOTeT4An8xMKaBNisPA5uPJ/6EsFSh/Tq3Rp05Q9w/8F5vDrx8WvK3tAAAAAElFTkSuQmCC"/>                        
                            </button>
                            
                            <a href="hapusSepatu.php?id_sepatu=<?php echo $sepatu['id']?>" class="bg-red-500 p-2">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAATZJREFUSEvtlrFNBDEQRd8XERGUQAknGoCrAQICTtABEiKHiwmghENcggQ1wDWAKIESICJjWKPdkzl25bWNtAR2spLHf77nz3hnxEBLA/HSm9jM1oAzYL3jsh/ApaTPPsHEEF8DJwGnV5JO/4zYzI6AWR+HwIGku9DZHxGb2S7wGAIl2seSnhrsvyHeAo4TIwrBZpJeWyP2kWY2AjZD3gL2N0kvbWc6q7rKt8vHTibxosqrq5tfqxAvJWmRelobnXSrKVgAzVM593TNl1rSd1rM7KL6+M7d9rQyu31nt0KcVdVF6hX5SnE1gpR3vCyNmCYxrlGuX7tRyF833mjkTzD5Uie2xyTie2AvkbCBPUjaj/1zHQK3mcQTSfMo4rrTbNctcCPyAu+Ak/m5C9d7oI8kDh4fjPgL4OzkH4Sm50YAAAAASUVORK5CYII="/>                        
                            </a>
                            
                        </td>
                    </div>
                    </tr>
                <?php }?>
            </table>

            <div id="form-perbarui" class="absolute mx-auto min-h-full justify-center items-center w-screen bg-slate-900 bg-opacity-30 top-0 left-0 right-0 ">

                <form  enctype="multipart/form-data" method="POST" class="bg-slate-50 shadow-slate-900 z-50 w-3/6 shadow-sm p-2 flex flex-col gap-3" >
                    <a href="" id="tutup" class="text-slate-900 p-2 justify-end font-bold text-lg flex hover:text-red-500">X</a>

                    <div class="flex flex-col justify-center gap-2 w-full">
                    <label class="font-bold">Nama</label>
                    <input require
                        class=" bg-slate-50 p-2 text-slate-900"
                        type="text"
                        name="nama"
                        value="<?php foreach ($data_sepatu['items'] as $data)  echo $data['nama'] ?>"
                        placeholder="nama"
                    />
                </div>

                <div class="flex flex-col justify-center gap-2 w-full">
                    <label class="font-bold">Brand</label>
                    <select require name="brand" value="<?php foreach ($data_sepatu['items'] as $data)  echo $data['brand'] ?>" id="">
                        <option>Adidas</option>
                        <option>Nike</option>
                        <option>Puma</option>
                        <option>Specs</option>
                        <option>New Balance</option>
                        <option>Ortuseight</option>
                        <option>Ardiles</option>
                    </select>
                </div>

                <div class="flex flex-col justify-center gap-2 w-full">
                    <label class="font-bold">Jenis</label>
                    <select require name="jenis" id="" value="<?php foreach ($data_sepatu['items'] as $data)  echo $data['jenis'] ?>">
                        <option>Sneakers</option>
                        <option>Futsal</option>
                        <option>Sepak bola</option>
                        <option>Basket</option>
                        <option>Running</option>
                    </select>
                </div>

                <div class="flex flex-col justify-center gap-2 w-full">
                    <label class="font-bold">Deskripsi</label>
                    <textarea
                     class=" bg-slate-50 p-2 text-slate-900" 
                     name="deskripsi" 
                     placeholder="deskripsi"
                     rows="5"
                     id=""><?php foreach ($data_sepatu['items'] as $data)  echo $data['deskripsi'] ?></textarea>
                </div>

                <div class="flex flex-col justify-center gap-2 w-full">
                    <label class="font-bold">Foto</label>
                    <input require type="file" name="foto">
                </div>
                
                <div class="flex flex-col justify-center gap-2 w-full">
                    <label class="font-bold">Harga</label>
                    <input require type="number" value="<?php foreach ($data_sepatu['items'] as $data)  echo $data['harga'] ?>" class=" bg-slate-50 p-2 text-slate-900" name="harga" placeholder="harga">
                </div>

                <div class="flex flex-col justify-center gap-2 w-full">
                    <label class="font-bold">Stock</label>
                    <input require type="number" value="<?php foreach ($data_sepatu['items'] as $data)  echo $data['stock'] ?>" class=" bg-slate-50 p-2 text-slate-900" name="stock" placeholder="stock">
                </div>
                
                <button type="submit" name="perbarui" class="bg-yellow-500 text-slate-50 font-bold py-2 hover:bg-yellow-600 text-center">
                    Perbarui
                </button>
            </form>
        </div>
        </section>
    </div>

    <script>
        const editButton = document.querySelector('#edit-button');
        const formPerbarui = document.querySelector('#form-perbarui');
        const tutupTombol = document.querySelector('#tutup');

        editButton.addEventListener('click', () => {
            formPerbarui.classList.add('muncul');
        })

        tutupTombol.addEventListener('click', () => {
            formPerbarui.classList.remove('muncul');
        })
    </script>
</body>
</html>