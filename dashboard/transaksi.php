<?php
include '../perbaruiData.php';
include "../koneksi.php";

session_start();
if(!isset($_SESSION['role']) == 'admin') {
    echo "<script>
    document.location.href = '../login.php'
    </script>";
}

function tampilkan($query){
    global $koneksi;
    $result = mysqli_query($koneksi,$query);
    
    while($data = mysqli_fetch_assoc($result)) {
        $items[] = array(
            'id' =>$data["id_transaksi"],
            'nama_pelanggan' => $data["nama"],
            'tanggal' => $data["tanggal"],
            'total_harga' => $data["total_harga"],
        );
        $response = array(
            'status' => 'ok',
            'items' => $items,
        );
 
    }        
    return $response;
}

$data = tampilkan("SELECT t.id_transaksi,u.nama,t.tanggal,t.total_harga FROM transaksi t INNER JOIN user u ON t.id_pelanggan = u.id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="flex 2xl:flex-row xl:flex-row lg:flex-row flex-col h-screen relative ">
<nav class="sidebar 2xl:flex xl:flex lg:flex md:flex flex-col items-centerx bg-yellow-500 2xl:w-2/6 xl:w-2/6 lg:w-2/6 w-screen">
        <div class="flex justify-end">
            <a href="../logout.php" class=" text-slate-50 font-bold text-lg p-2 mt-3 mr-7">
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAalJREFUSEvtlr9KA0EQxmcuR2BvNyCChfoCFiqCjZ36CBaWaqVoJ8TCzj+PoIIgdlpaSGxs1PgG2lhYKPoEQna2zGdWDBwa9DboBTEL19x+3G/2m9m5YerQ4g5x6e+AAbCIjADozepWHMePSqmntD7oxM65QQDnRDScFdrUMfORUmqBmeHfBYFF5ICIFkOhKf2M1vo0GOycuwQwTUS39Xp9NWsAURRdvWs3tNbbwWBrbZWZJxvwa2PMVFawiLzZ23B4S2u92QV/cq5Wq/UVCoVykiTrfjMXq0VknIjOANw382mtHQPQw8wvxpibH8+xtXaOmQ+JqBhaSK2C+ba4AMTOuR0iWkl9IOjqlEql6kf4l2CfzyiKKkQ0kdXCVjqt9aem9CVYRPp9ThuPz23bKxjsSQCKzrm9D23xd61OH1FElohoN7fiSsOdcxMAKgDucrtOzQB83gGsGWPKuTWQVtWVS+fqgr0DHRsERGSfiJbb7S7MPJskyUnwINCYuQaY+QLAUCicmY+VUvNtDXvv3S0SkVH/e8wKj+P4QSn1nNYHTZlZQVl0/w/8CohhOi4J2iyXAAAAAElFTkSuQmCC"/>
                </div>    
                
                <div class="text-slate-50 W-full font-bold text-lg flex flex-col justify-center items-center">
                <img class="w-[72px] h-[72px]" src="data:image/png;base64,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"/>
                <h1 class="font-bold text-3xl p-2 mt-5 text-slate-900"><?php echo $_SESSION['nama'] ?></h1>
                
                </div>

                <div class="flex flex-col">
                <a href="produk.php" class="text-slate-50 font-bold text-lg p-2 w-full hover:bg-yellow-600">Product</a>
                <a href="customer.php" class="text-slate-50 font-bold text-lg p-2 w-full hover:bg-yellow-600">Customer</a>
                <a href="" class="text-slate-50 font-bold text-lg p-2 w-full bg-yellow-600">Transaksi</a>
            </div>
        </nav>
        <section id="product" class="p-3 mt-3 w-full flex flex-col gap-5 max-h-screen overflow-y-scroll">
            <table class="border border-slate-900">
                <tr class="bg-slate-900 text-slate-50">
                    <th class="border border-slate-900 px-2">No Transaksi</th>
                    <th class="border border-slate-900 px-2 w-44">Nama Pelanggan</th>
                    <th class="border border-slate-900 px-2">Tanggal</th>
                    <th class="border border-slate-900 px-2">Total Harga</th>
                   
                </tr>

                <?php foreach($data['items'] as $transaksi) { ?>
                <tr class="font-bold">
                    <td class="border border-slate-900 px-2"><?php echo $transaksi['id'] ?></td>
                    <td class="border border-slate-900 px-2"><?php echo $transaksi['nama_pelanggan'] ?></td>
                    <td class="border border-slate-900 px-2"><?php echo $transaksi['tanggal'] ?></td>
                    <td class="border border-slate-900 px-2">Rp. <?php echo number_format($transaksi['total_harga']) ?></td>
                   
                </tr>
                <?php } ?>
            </table> 
        </div>
        </section>

        <footer>
        <div class="text-center p-3 bg-slate-900 text-slate-50">
            © <?php echo date('Y'); ?> Copyright By
            <a class="text-slate-50" href="">Yazid Khairul</a>
        </div>
    </footer>
    </div>
</body>
</html>