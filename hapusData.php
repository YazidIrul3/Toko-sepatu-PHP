<?php

include "koneksi.php";

function hapus_sepatu($id_sepatu) {
    global $koneksi;

    mysqli_query($koneksi, "delete from product where id=$id_sepatu");

    return mysqli_affected_rows($koneksi);
}
?>