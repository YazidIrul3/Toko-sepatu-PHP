<?php

include('koneksi.php');

// cek apakah tombol daftar sudah diklik atau blum?
function perbarui_sepatu($post, $id_sepatu) {
    global $koneksi;
        
  /*
    $title = $post['title'];
    $description = $post['description'];
    $image = $post['image'];
    $categoty = $post['category'];
  */
    $nama = $post['nama'];
    $brand = $post['brand'];
    $deskripsi = $post['deskripsi'];
    $stock = $post['stock'];
    $harga = $post['harga'];
    $foto = $_FILES['foto']['name'];
    $jenis = $post['jenis'];
    $file_tmp = $_FILES['foto']['tmp_name'];
    move_uploaded_file($file_tmp, 'images/'.$foto);
    
    $query = "update product set nama = '$nama', brand = '$brand' , deskripsi = '$deskripsi',stock = '$stock', harga = '$harga', foto = '$foto', jenis = '$jenis' where id=$id_sepatu";
    mysqli_query($koneksi, $query);
    
   return mysqli_affected_rows($koneksi);
}


?>