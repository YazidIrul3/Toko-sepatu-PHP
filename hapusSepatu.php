<?php 
include 'hapusData.php';

$id_sepatu = (int)$_GET['id_sepatu'];

if(hapus($id_sepatu, 'product') > 0 ) {
    echo "<script>
            alert('Data deleted success');
            document.location.href = 'dashboard/produk.php';
        </script>";
} else {
    echo "<script>
    alert('Data deleted failed');
    document.location.href = 'dashboard/produk.php';
    </script>";
}
?>