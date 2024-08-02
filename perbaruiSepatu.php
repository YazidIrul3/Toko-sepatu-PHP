<?php
include 'perbaruiData.php';

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