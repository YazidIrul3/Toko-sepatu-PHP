<?php 
include "koneksi.php";

function tampilkan($query) {
    global $koneksi;
    $result = mysqli_query($koneksi,$query);
    
    while($data = mysqli_fetch_assoc($result)) {
        $items[] = array(
            'id_transaksi' =>$data["id_transaksi"],
            'tanggal' => $data["tanggal"],
            'produk' => $data['nama'],
            'jumlah' => $data["jumlah"],
            'harga' => $data["harga"],
        );
        $response = array(
            'status' => 'ok',
            'items' => $items,
        );
 
    }        
    return $response;
    }

?>