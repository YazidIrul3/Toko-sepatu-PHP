<?php
include 'koneksi.php';
include 'tampilkanCetak.php';
$id = (int)$_GET['id'];

$total = 0;
function tampilkanNamaProduk($query) {
    global $koneksi;
    $result = mysqli_query($koneksi,$query);
    
    while($data = mysqli_fetch_assoc($result)) {
        $items[] = array(
            'nama_pelanggan' => $data['nama'],
        );
        $response = array(
            'status' => 'ok',
            'items' => $items,
        );
 
    }        
    return $response;
    }

$data = tampilkan("SELECT t.id_transaksi,t.tanggal,p.nama,d.jumlah,p.harga FROM transaksi t INNER JOIN user u ON t.id_pelanggan = u.id INNER JOIN detail d ON t.id_transaksi = d.id_transaksi INNER JOIN product p ON d.id_produk = p.id  WHERE t.id_transaksi = $id");
$data2 = tampilkanNamaProduk("SELECT u.nama FROM transaksi t INNER JOIN detail d ON t.id_transaksi = d.id_transaksi INNER JOIN user u ON t.id_pelanggan = u.id INNER JOIN product p ON d.id_produk = p.id  WHERE t.id_transaksi = $id");

foreach($data2['items'] as $key => $value2) {
    $nama_pelanggan = $value2['nama_pelanggan'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Kuwitansi</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="">
    <div class=" container mx-auto flex justify-center items-center flex-col">
        <h1 class=" text-center text-yellow-500 font-extrabold text-4xl mb-5">INVOICE</h1>
        <div class="max-w-full 2zl:overflow-hidden xl:overflow-hidden lg:overflow-hidden md:overflow-hidden sm:overflow-hidden overflow-x-scroll p-2">

            <table>
                <thead class=" bg-slate-900 text-slate-50">
                <tr class="">
                    <th class="px-3">No Transaksi</th>
                    <th class="px-3">Tanggal</th>
                    <th class="px-3">Nama Pelanggan</th>
                    <th class="px-3">Jumlah</th>
                    <th class="px-3">Nama Produk</th>
                    <th class="px-3">Harga</th>
                </tr>
            </thead>

            <tbody>
                <?php
                foreach($data['items'] as $value) {
                    $total = $total + ($value['harga'] * $value['jumlah']);
                    
                    ?>
                <Tr>
                    <td class="px-3"><?php echo $value['id_transaksi'] ?></td>
                    <td class="px-3"><?php echo $value['tanggal'] ?></td>
                    <td class="px-3"><?php echo $nama_pelanggan ?></td>
                    <td class="px-3"><?php echo $value['jumlah']?></td>
                    <td class="px-3"><?php echo $value['produk'] ?></td>
                    <td class="px-3"><?php echo number_format($value['harga']) ?></td>
                </Tr>
                <?php } ?>
            </tbody>
            
        </table>
        
        <h1 class="flex justify-end mt-10 font-semibold text-lg items-center gap-2">Total Harga: <span class="text-xl font-extrabold text-yellow-600">Rp. <?php echo number_format($total) ?></h1></span>
    </div>
        
        <div class="flex gap-3 mt-24 items-end justify-end" id="print">
            <button class=" bg-slate-900 text-slate-50 px-7 rounded-xl font-bold py-2 hover:bg-yellow-600">Print</button>
        </div>
    </div>
</body>
<script>
    const print_btn = document.getElementById('print');
    print_btn.addEventListener('click', () => {
        window.print();
        print_btn.style.display = 'none';
    })
</script>
</html>