<?php 
include 'hapusData.php';

$id_sepatu = (int)$_GET['id_sepatu'];

if(hapus_sepatu($id_sepatu) > 0 ) {
    echo "<script>
            alert('Data deleted success');
            document.location.href = 'dashboard.php';
        </script>";
} else {
    echo "<script>
    alert('Data deleted failed');
    document.location.href = 'dashboard.php';
    </script>";
}
?>