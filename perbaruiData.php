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
    $jenis = $post['jenis'];
    /*
    $foto = $_FILES['foto']['name'];
    $file_tmp = $_FILES['foto']['tmp_name'];
 move_uploaded_file($file_tmp, 'images/'.$foto);
 */
    
    
  $sql = mysqli_query($koneksi, "UPDATE product SET nama = '$nama', brand = '$brand' , deskripsi = '$deskripsi',stock = '$stock', harga = '$harga',  jenis = '$jenis' WHERE id='$id_sepatu'");
    
  if($sql > 0) {
    return mysqli_affected_rows($koneksi);
  } else {
    return mysqli_error($koneksi);
  }
}


?>