<?php
session_start();

$id_user = $_SESSION['id_user'];
$keranjang = $_SESSION['keranjang'];

if(!isset($_SESSION['keranjang'])) {
    echo "<script>
    document.location.href = 'index.php'
    </script>";
}

if(!isset($_SESSION['id_user'])) {
    echo "<script>
    document.location.href = 'login.php'
    </script>";
}

$total = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>keranjang Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="container mx-auto p-4">
        <h1 class="font-bold mb-7 text-3xl">Keranjang</h1>
        <div class="flex flex-col">
            <?php
            if (!empty($_SESSION['keranjang'])) {
                foreach($_SESSION['keranjang'] as $value) { ?>
            <div class="min-w-full bg-slate-50 flex items-center gap-4 p-4 justify-between">
                <div class="flex items-center gap-4">
                    <img src="./images/<?php echo $value['foto'] ?>" alt="" class="w-32">
                    <div class="flex flex-col gap-1">
                        <h1 class="font-bold text-xl"><?php echo $value['nama'] ?></h1>
                        <p>jumlah beli : <span> <?php echo $value['jumlah'] ?> </span></p>
                        <p class="text-lg font-bold text-yellow-500">Rp. <?php echo number_format( $value['harga'] * $value['jumlah']) ?></p>
                    </div>
                </div>
                <a name="hapus" href=" keranjang.php?aksi=hapus&id=<?= $value['id'] ?>" class="text-slate-900 font-bold text-lg hover:bg-red-500 hover:text-slate-50 px-3 py-2 rounded-xl">Hapus</a>
            </div>
            <?php 
            
        } 
            ?>
            <?php } ?>
 
            <div class="flex justify-end">
                <div class="flex gap-4 items-center justify-center">
                    <h1>Total Belanja :</h1>
                    <?php foreach ($_SESSION['keranjang'] as $value) { 
                        $total = $total + ($value['harga'] * $value['jumlah']);
                                    }
                    ?>
        
                        <h1 class="font-bold text-lg text-yellow-500">Rp. <?php echo number_format($total)?></h1>
                        <form action="keranjang.php" method="POST">

                            <a href="keranjang.php?aksi=beli&total=<?= $total ?>" class="bg-yellow-500 text-slate-50 px-4 py-2 text-xl rounded-xl">Checkout</a>
                        </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>