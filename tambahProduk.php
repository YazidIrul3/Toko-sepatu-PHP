<?php
include 'koneksi.php';
    
    if (isset($_POST['simpan'])) {
        $nama = $_POST['nama'];
        $brand = $_POST['brand'];
        $deskripsi = $_POST['deskripsi'];
        $stock = $_POST['stock'];
        $harga = $_POST['harga'];
        $foto = $_FILES['foto']['name'];
        $jenis = $_POST['jenis'];
        $file_tmp = $_FILES['foto']['tmp_name'];
        move_uploaded_file($file_tmp, 'images/'.$foto);

            
        $sql = mysqli_query($koneksi, "INSERT INTO product(nama,brand,jenis, deskripsi,foto, harga, stock) VALUES ('$nama', '$brand','$jenis','$deskripsi','$foto', '$harga', '$stock')");

        if ($sql > 0) {
            echo "<script>
            alert('Data created success');
            document.location.href = 'dashboard/produk.php'
            </script>";
        } else {
            echo "<script>
            alert('Data created failed')
            document.location.href = 'dashboard/produk.php'
            </script>";    
        }  
}
?>
