<?php 
include 'hapusData.php';

$id_pelanggan = (int)$_GET['id_pelanggan'];

if(hapus($id_pelanggan, 'user') > 0 ) {
    echo "<script>
            alert('Data deleted success');
            document.location.href = 'dashboard/customer.php';
        </script>";
} else {
    echo "<script>
    alert('Data deleted failed');
    document.location.href = 'dashboard/customer.php';
    </script>";
}
?>