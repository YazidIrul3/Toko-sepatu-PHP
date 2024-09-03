<?php

include "koneksi.php";

function hapus($id_sepatu, $table) {
    global $koneksi;

    mysqli_query($koneksi, "delete from $table where id=$id_sepatu");

    return mysqli_affected_rows($koneksi);
}
?> 