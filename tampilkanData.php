<?php 
include "koneksi.php";

function tampilkan($query) {
    global $koneksi;
    $result = mysqli_query($koneksi,$query);
    
    while($data = mysqli_fetch_assoc($result)) {
        $items[] = array(
            'id' =>$data["id"],
            'nama' => $data["nama"],
            'brand' => $data["brand"],
            'jenis' => $data["jenis"],
            'deskripsi' => $data["deskripsi"],
            'foto' => $data["foto"],
            'harga' => $data["harga"],
            'stock' => $data["stock"],
        );
        $response = array(
            'status' => 'ok',
            'items' => $items,
        );
 
    }        
    return $response;
    }

?>